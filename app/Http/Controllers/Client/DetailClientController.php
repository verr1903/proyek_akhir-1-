<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DetailClientController extends Controller
{
    public function index($id)
{
    $product = Product::with('discount')->findOrFail($id);

    $discountPrice = null;
    if ($product->discount) {
        $discountPrice = $product->harga - ($product->harga * $product->discount->persentase / 100);
    }

    return view('client.detail', [
        'title' => $product->nama,
        'product' => $product,
        'discountPrice' => $discountPrice,
    ]);
}

}
