<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class PesananAdminController extends Controller
{
    public function online()
    {
        // Ambil semua pesanan online dengan relasi user dan item
        $orders = Order::with(['user', 'items.product', 'address'])
            ->where('tempat_pesanan', 'online')
            ->latest()
            ->get();

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
                    'harga' => $item->harga_saat_ini,
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
            'title'            => 'Pesanan Offline'
        ]);
    }
}
