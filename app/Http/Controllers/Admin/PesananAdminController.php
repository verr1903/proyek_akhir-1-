<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class PesananAdminController extends Controller
{
    public function online(Request $request)
    {
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




    public function offline()
    {
        return view('admin.pesananOffline', [
            'title' => 'Pesanan Offline',
            'products' => Product::all()
        ]);
    }


    public function storeOffline(Request $request)
    {
        $request->validate([
            'produk' => 'required|array',
            'produk.*.id_product' => 'required|exists:products,id',
            'produk.*.jumlah' => 'required|integer|min:1',
            'produk.*.ukuran' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'total_harga' => 'required|numeric|min:0'
        ]);

        // Generate nomor pesanan offline
        $noPesanan = 'OFF-' . date('Ymd') . '-' . strtoupper(uniqid());

        // Buat order offline
        $order = Order::create([
            'id_users' => null,                   // offline tidak ada user
            'id_address' => null,                 // offline tidak butuh alamat
            'no_pesanan' => $noPesanan,
            'total_harga' => $request->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'diproses',
            'tempat_pesanan' => 'offline',
        ]);

        // Simpan item order
        foreach ($request->produk as $item) {
            $product = Product::find($item['id_product']);

            $harga = $product->harga_setelah_diskon ?? $product->harga;
            $subtotal = $harga * $item['jumlah'];

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id_product'],
                'quantity' => $item['jumlah'],
                'size' => $item['ukuran'],
                'harga_awal' => $product->harga,
                'diskon_presentase' => $product->diskon_presentase ?? 0,
                'harga_setelah_diskon' => $harga,
                'subtotal' => $subtotal,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesanan offline berhasil dibuat!',
            'order_id' => $order->id
        ]);
    }
}
