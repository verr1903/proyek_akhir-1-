<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class KeranjangClientController extends Controller
{
    public function index()
    {
        // Ambil semua data cart milik user yang sedang login + relasi produk
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('client.keranjang', [
            'title' => 'Keranjang',
            'carts' => $carts
        ]);
    }


}
