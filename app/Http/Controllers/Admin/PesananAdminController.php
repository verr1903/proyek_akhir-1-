<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Discount;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PesananAdminController extends Controller
{
    // online

    public function online(Request $request)
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $query = Order::with(['user', 'items.product', 'address'])
            ->where('tempat_pesanan', 'online');

        // 🔍 Searching (berdasarkan nama penerima atau no pesanan)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('no_pesanan', 'like', "%{$search}%")
                    ->orWhereHas('address', function ($qa) use ($search) {
                        $qa->where('nama_penerima', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($qu) use ($search) {
                        $qu->where('username', 'like', "%{$search}%");
                    });
            });
        }

        // 🔽 Sorting
        $sort = $request->get('sort', 'created_at'); // default kolom
        $direction = $request->get('direction', 'desc'); // default urutan
        $query->orderBy($sort, $direction);

        // Pagination
        $orders = $query->paginate(10)->appends($request->query());

        return view('admin.pesananOnline', [
            'title' => 'Pesanan Online',
            'orders' => $orders,
        ]);
    }


    public function getItems($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return response()->json([
            'items' => $order->items->map(function ($item) {
                $gambar = $item->product->gambar ?? $item->product->image ?? null;
                return [
                    'gambar' => $gambar
                        ? asset('storage/' . $gambar)
                        : asset('Adminassets/images/noimage.png'),

                    'nama' => $item->product->nama ?? '-',
                    'size' => $item->size ?? '-',
                    'jumlah' => $item->quantity,
                    'harga' => $item->harga_setelah_diskon,
                    'subtotal' => $item->subtotal,
                ];
            }),
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan.'], 404);
        }

        $newStatus = $request->input('status');
        $allowed = ['diproses', 'diantar', 'selesai'];

        if (!in_array($newStatus, $allowed)) {
            return response()->json(['success' => false, 'message' => 'Status tidak valid.'], 400);
        }

        // Update status
        $order->status = $newStatus;

        // Tambahkan pencatatan siapa yang melakukan aksi
        if ($newStatus === 'diantar' && !$order->action_by) {
            $order->action_by = Auth::id(); // user yang mengantar
        }

        if ($newStatus === 'selesai' && !$order->action_by_2) {
            $order->action_by_2 = Auth::id(); // user yang menandai selesai
        }

        $order->save();

        return response()->json(['success' => true]);
    }


    // Offline

    public function offlineindex(Request $request)
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $query = Order::with(['user', 'items.product', 'address'])
            ->where('tempat_pesanan', 'offline');

        // 🔍 Searching (berdasarkan nama penerima atau no pesanan)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('no_pesanan', 'like', "%{$search}%")
                    ->orWhereHas('address', function ($qa) use ($search) {
                        $qa->where('nama_penerima', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($qu) use ($search) {
                        $qu->where('username', 'like', "%{$search}%");
                    });
            });
        }

        // 🔽 Sorting
        $sort = $request->get('sort', 'created_at'); // default kolom
        $direction = $request->get('direction', 'desc'); // default urutan
        $query->orderBy($sort, $direction);

        // Pagination
        $orders = $query->paginate(10)->appends($request->query());

        return view('admin.pesananOfflineIndex', [
            'title' => 'Pesanan Online',
            'orders' => $orders,
        ]);
    }


    public function offline()
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);
            
        $products = Product::all();

        Debugbar::info($products);

        return view('admin.pesananOffline', [
            'title' => 'Pesanan Offline',
            'products' => Product::all()
        ]);
    }


    public function coOffline(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'metode_pembayaran' => 'required|in:cash,transfer,qris',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.size' => 'required|string|in:S,M,L,XL',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $adminId = Auth::id();

        DB::beginTransaction();

        try {
            // ============================
            // AMBIL PRODUK + KATEGORI
            // ============================
            $products = Product::whereIn(
                'id',
                collect($request->items)->pluck('product_id')
            )->get()->keyBy('id');

            $kategoriUnik = $products->pluck('kategori')->unique();

            if ($kategoriUnik->count() > 1) {
                $kodeKategori = 'MX';
            } else {
                $namaKategori = strtolower($kategoriUnik->first());

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

            // ============================
            // KODE PESANAN OFFLINE
            // ============================
            $kodePembayaran = 'OFL';
            $kodeTanggal = now()->format('dmy');

            $jumlahHariIni = Order::whereDate('created_at', today())
                ->where('no_pesanan', 'LIKE', "{$kodeKategori}-{$kodePembayaran}-%")
                ->count() + 1;

            $kodeUrut = str_pad($jumlahHariIni, 3, '0', STR_PAD_LEFT);

            $noPesanan = "{$kodeKategori}-{$kodePembayaran}-{$kodeTanggal}-{$kodeUrut}";

            // ============================
            // HITUNG TOTAL (AMAN)
            // ============================
            $totalHarga = 0;

            foreach ($request->items as $item) {
                $product = $products[$item['product_id']];
                $diskon = optional($product->discount)->persentase ?? 0;
                $hargaFinal = $product->harga - ($product->harga * $diskon / 100);
                $totalHarga += $hargaFinal * $item['quantity'];
            }

            // ============================
            // BUAT ORDER UTAMA
            // ============================
            $order = Order::create([
                'no_pesanan' => $noPesanan,
                'id_users' => $adminId,
                'id_address' => null,        // offline tidak pakai alamat
                'total_harga' => $totalHarga,
                'status' => 'selesai',
                'action_by' => $adminId,     // admin / kasir
                'action_by_2' => $adminId,
                'tempat_pesanan' => 'offline',
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);

            // ============================
            // ORDER ITEMS + UPDATE STOK
            // ============================
            foreach ($request->items as $item) {
                $product = $products[$item['product_id']];
                $size = strtolower($item['size']);
                $kolomStok = "stok_{$size}";

                if ($product->{$kolomStok} < $item['quantity']) {
                    throw new \Exception("Stok {$product->nama} ukuran {$item['size']} tidak mencukupi.");
                }

                $diskon = optional($product->discount)->persentase ?? 0;

                $hargaFinal = $product->harga - ($product->harga * $diskon / 100);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'harga_awal' => $product->harga,
                    'diskon_presentase' => $diskon,
                    'harga_setelah_diskon' => $hargaFinal,
                    'subtotal' => $hargaFinal * $item['quantity'],
                ]);

                // update stok
                $product->{$kolomStok} -= $item['quantity'];
                $product->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pesanan offline berhasil dibuat.',
                'order_id' => $order->id,
                'no_pesanan' => $noPesanan
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();

            \Log::error('CO OFFLINE ERROR', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(), // sementara tampilkan
            ], 500);
        }
    }
}
