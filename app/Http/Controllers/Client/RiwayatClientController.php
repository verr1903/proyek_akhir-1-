<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Review;

class RiwayatClientController extends Controller
{
    
    public function index()
    {
        $orders = Order::with(['items.product.ulasan'])
            ->where('id_users', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        // Urutkan ulang koleksi secara manual
        $orders = $orders->sortBy(function ($order) {
            // Ambil produk pertama
            $firstItem = $order->items->first();

            // Cek apakah sudah ada ulasan untuk produk itu
            $sudahUlas = $firstItem && $firstItem->product->ulasan->isNotEmpty();

            // Logika urutan:
            // 0 => belum diulas (paling atas)
            // 1 => sudah diulas (paling bawah)
            return [
                $order->status === 'selesai' ? ($sudahUlas ? 1 : 0) : 2, // status lain di bawah selesai
                -strtotime($order->created_at), // urutkan terbaru dulu
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
