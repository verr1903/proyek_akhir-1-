<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class RiwayatClientController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items.product'])
            ->where('id_users', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('client.riwayat', [
            'title'  => 'Riwayat Pesanan',
            'orders' => $orders
        ]);
    }
}
