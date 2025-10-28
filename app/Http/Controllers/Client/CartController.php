<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
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
}
