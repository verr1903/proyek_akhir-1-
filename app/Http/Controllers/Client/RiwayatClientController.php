<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Review;

class RiwayatClientController extends Controller
{

    public function index()
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $orders = Order::with(['items.product.ulasan'])
            ->where('id_users', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        // Urutkan ulang koleksi secara manual
        $orders = $orders->sortBy(function ($order) {

            // Cek apakah ada item yang sudah diulas
            $sudahUlas = $order->items->contains(function ($item) {
                return $item->product->ulasan->isNotEmpty();
            });

            return [
                // 0 = Selesai & belum diulas (paling atas)
                // 1 = Status lain (diproses, dikirim, dsb)
                // 2 = Selesai & sudah diulas (paling bawah)
                $order->status === 'selesai'
                    ? ($sudahUlas ? 2 : 0)
                    : 1,

                -strtotime($order->created_at), // terbaru ke atas dalam kategori
            ];
        })->values();


        return view('client.riwayat', [
            'title'  => 'Riwayat Pesanan',
            'orders' => $orders
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_product' => 'required|exists:products,id',
            'bintang' => 'required|numeric|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ]);

        Review::create([
            'id_users'   => Auth::id(),
            'id_product' => $validated['id_product'],
            'bintang'    => $validated['bintang'],
            'komentar'   => $validated['komentar'],
        ]);

        return response()->json(['success' => true, 'message' => 'Ulasan berhasil disimpan!']);
    }
}
