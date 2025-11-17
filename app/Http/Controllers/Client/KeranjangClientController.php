<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;


class KeranjangClientController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Ambil alamat aktif user
        $alamatAktif = Address::where('id_users', $userId)
            ->where('status', 'aktif')
            ->first();

        // Hitung ongkir berdasarkan kecamatan
        $shippingCost = 0;
        if ($alamatAktif) {
            $shippingCost = $this->calculateShippingCost($alamatAktif->kecamatan);
        }

        // Ambil semua data cart milik user + relasi produk & diskon
        $carts = Cart::with(['product.discount'])
            ->where('user_id', $userId)
            ->get()
            ->map(function ($cart) {
                // Hitung harga setelah diskon (jika ada)
                $harga = $cart->product->harga;
                if ($cart->product->discount) {
                    $harga -= $harga * $cart->product->discount->persentase / 100;
                }

                // Simpan ke property tambahan agar mudah diakses di view
                $cart->harga_diskon = $harga;
                $cart->total = $harga * $cart->quantity;
                return $cart;
            });

        return view('client.keranjang', [
            'title' => 'Keranjang',
            'carts' => $carts,
            'alamatAktif' => $alamatAktif,
            'shippingCost' => $shippingCost,
        ]);
    }


    public function calculateShippingCost($kecamatan, $kelurahan = null)
    {
        // Zona Gratis (sekitar Panam dan Rumbai)
        $zonaGratis = [
            'Tuah Karya',
            'Simpang Baru',
            'Tampan', // Panam area
            'Rumbai',
            'Rumbai Barat',
            'Rumbai Timur'
        ];

        // Zona Dekat (Rp5.000)
        $zonaDekat = [
            'Marpoyan Damai',
            'Payung Sekaki'
        ];

        // Zona Sedang (Rp10.000)
        $zonaSedang = [
            'Sukajadi',
            'Pekanbaru Kota',
            'Senapelan',
            'Lima Puluh',
            'Sail'
        ];

        // Zona Jauh (Rp15.000)
        $zonaJauh = [
            'Bukit Raya',
            'Tenayan Raya'
        ];

        // Cek kelurahan dulu jika tersedia
        if ($kelurahan && in_array($kelurahan, ['Tampan', 'Tuah Karya', 'Simpang Baru'])) {
            return 0;
        }

        // Cek berdasarkan kecamatan
        if (in_array($kecamatan, $zonaGratis)) {
            return 0;
        } elseif (in_array($kecamatan, $zonaDekat)) {
            return 5000;
        } elseif (in_array($kecamatan, $zonaSedang)) {
            return 10000;
        } elseif (in_array($kecamatan, $zonaJauh)) {
            return 15000;
        }

        // Default jika tidak ditemukan
        return 20000;
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        // Jika produk dengan ukuran sama sudah ada, tambah jumlahnya
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->where('size', $request->size)
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'size' => $request->size,
                'quantity' => $request->quantity,
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Produk berhasil ditambahkan ke keranjang!']);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'action' => 'required|in:plus,minus',
        ]);

        $cart = \App\Models\Cart::with('product')->find($request->cart_id);

        if ($request->action === 'plus') {
            $cart->quantity++;
        } elseif ($request->action === 'minus' && $cart->quantity > 1) {
            $cart->quantity--;
        }

        $cart->save();

        $harga = $cart->product->harga;
        if ($cart->product->discount) {
            $harga -= $harga * $cart->product->discount->persentase / 100;
        }

        // Kembalikan respon JSON
        return response()->json([
            'success' => true,
            'quantity' => $cart->quantity,
            'total' => $cart->quantity * $harga,
        ]);
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan.']);
        }

        $cart->delete();

        return response()->json(['success' => true, 'message' => 'Item berhasil dihapus.']);
    }

    public function co(Request $request)
    {
        $request->validate([
            'cart_ids' => 'required|array|min:1',
            'cart_ids.*' => 'integer|exists:carts,id',
            'address_id' => 'required|integer|exists:addresses,id',
            'metode_pembayaran' => 'required|string',
            'total_harga' => 'required|numeric|min:0'
        ]);

        $userId = Auth::id();

        // Pastikan alamat milik user
        $alamat = Address::where('id', $request->address_id)
            ->where('id_users', $userId)
            ->first();

        if (! $alamat) {
            return response()->json([
                'success' => false,
                'message' => 'Alamat tidak ditemukan atau bukan milik Anda.'
            ], 422);
        }

        // Ambil cart dan relasi produk + kategori
        $carts = Cart::with('product')
            ->whereIn('id', $request->cart_ids)
            ->where('user_id', $userId)
            ->get();

        if ($carts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Produk yang dipilih tidak ditemukan di keranjang.'
            ], 422);
        }


        DB::beginTransaction();

        try {
            $kategoriUnik = $carts->pluck('product.kategori')->unique();

            if ($kategoriUnik->count() > 1) {
                $kodeKategori = 'MX';
            } else {
                $namaKategori = strtolower($kategoriUnik->first()); // jadi 'hoodie'

                if (str_contains($namaKategori, 'tshirt') || str_contains($namaKategori, 'kaos')) {
                    $kodeKategori = 'TS';
                } elseif (str_contains($namaKategori, 'hoodie')) {
                    $kodeKategori = 'HD';
                } elseif (str_contains($namaKategori, 'sweater')) {
                    $kodeKategori = 'SW';
                } else {
                    $kodeKategori = 'OT';
                }
            }


            $metode = strtolower($request->metode_pembayaran);

            if ($metode === 'online') {
                $kodePembayaran = 'ONL';
            } else {
                $kodePembayaran = strtoupper($metode);
            }
            $kodeTanggal = now()->format('dmy');

            // 🔹 Ambil jumlah order hari ini untuk kategori tertentu
            $jumlahKategoriHariIni = Order::whereDate('created_at', today())
                ->where('no_pesanan', 'LIKE', "{$kodeKategori}-%")
                ->count() + 1;

            // Buat urutan 3 digit
            $kodeUrut = str_pad($jumlahKategoriHariIni, 3, '0', STR_PAD_LEFT);

            // Bentuk no_pesanan akhir
            $noPesanan = "{$kodeKategori}-{$kodePembayaran}-{$kodeTanggal}-{$kodeUrut}";

            // Hitung total
            $totalHarga = (int) $request->total_harga;

            // Buat order utama
            $order = Order::create([
                'no_pesanan' => $noPesanan,
                'id_users' => $userId,
                'id_address' => $alamat->id,
                'total_harga' => $totalHarga,
                'status' => 'diproses',
                'action_by' => null,
                'action_by_2' => null,
                'tempat_pesanan' => 'online',
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);

            // Buat item-item order dengan data harga & diskon
            foreach ($carts as $cart) {
                $product = $cart->product;

                // Ambil harga awal produk
                $hargaAwal = $product->harga;

                // Diskon
                $diskonPersentase = $product->discount->persentase ?? 0;
                $hargaSetelahDiskon = $hargaAwal - ($hargaAwal * $diskonPersentase / 100);

                // Tambah order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'size' => $cart->size,
                    'quantity' => $cart->quantity,
                    'harga_awal' => $hargaAwal,
                    'diskon_presentase' => $diskonPersentase,
                    'harga_setelah_diskon' => $hargaSetelahDiskon,
                    'subtotal' => $cart->quantity * $hargaSetelahDiskon,
                ]);

                // ================================
                // 🔥 UPDATE STOK PRODUK BERDASARKAN SIZE
                // ================================
                $size = strtolower($cart->size);

                $kolomStok = "stok_{$size}";

                if ($product->{$kolomStok} < $cart->quantity) {
                    throw new \Exception("Stok ukuran {$cart->size} tidak mencukupi.");
                }


                // Simpan update stok

                $product->{$kolomStok} -= $cart->quantity;
                $product->save();
            }


            // Hapus keranjang
            Cart::whereIn('id', $request->cart_ids)
                ->where('user_id', $userId)
                ->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dibuat.',
                'order_id' => $order->id,
                'no_pesanan' => $noPesanan,
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat pesanan. Silakan coba lagi.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getSnapToken(Request $request)
    {
        $request->validate([
            'cart_ids' => 'required|array|min:1',
            'total_harga' => 'required|numeric|min:1000',
        ]);

        $user = Auth::user();
        $address = $user->address;
        $cartItems = \App\Models\Cart::with('product')
            ->whereIn('id', $request->cart_ids)
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong atau tidak valid.']);
        }

        // Buat daftar item untuk Midtrans
        $items = [];
        foreach ($cartItems as $cart) {
            $price = $cart->product->harga;
            if ($cart->product->discount) {
                $price -= $price * $cart->product->discount->persentase / 100;
            }

            $items[] = [
                'id' => $cart->id,
                'price' => $price,
                'quantity' => $cart->quantity,
                'name' => $cart->product->nama,
            ];
        }

        // Tambahkan ongkir (opsional)
        $shippingCost = $request->input('shipping_cost', 0);
        if ($shippingCost > 0) {
            $items[] = [
                'id' => 'SHIPPING',
                'price' => $shippingCost,
                'quantity' => 1,
                'name' => 'Ongkos Kirim'
            ];
        }

        // Data transaksi untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . uniqid(),
                'gross_amount' => $request->total_harga,
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name' => $address->nama_penerima,
                'email' => $user->email,
                'phone' => $address->nomor_hp ?? '0810000000',

                // 💡 ini bagian penting: tambahkan struktur alamat lengkap
                'billing_address' => [
                    'first_name'   => $address->nama_penerima,
                    'phone'        => $address->nomor_hp ?? '0810000000',
                    'address'      => "{$address->jalan}, Kel. {$address->kelurahan}, Kec. {$address->kecamatan}",
                    'city'         => $address->kecamatan ?? '',
                    'postal_code'  => $address->kode_pos ?? '',
                    'country_code' => 'IDN'
                ],
                'shipping_address' => [
                    'first_name'   => $address->nama_penerima,
                    'phone'        => $address->nomor_hp ?? '0810000000',
                    'address'      => "{$address->jalan}, Kel. {$address->kelurahan}, Kec. {$address->kecamatan}",
                    'city'         => $address->kecamatan ?? '',
                    'postal_code'  => $address->kode_pos ?? '',
                    'country_code' => 'IDN'
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['success' => true, 'token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat token: ' . $e->getMessage()
            ]);
        }
    }

    public function clearAll()
    {
        $userId = auth()->id(); // user yang sedang login

        // Ambil semua cart milik user
        $carts = Cart::where('user_id', $userId)->get();

        if ($carts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Keranjang kosong.'
            ]);
        }

        // Hapus semua cart milik user
        Cart::where('user_id', $userId)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Semua produk berhasil dihapus.'
        ]);
    }
}
