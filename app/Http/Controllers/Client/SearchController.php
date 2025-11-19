<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    // === LIVE SUGGESTION ===
    public function suggest(Request $request)
    {
        $keyword = $request->query('q');

        if (!$keyword) {
            return response()->json([]);
        }

        $suggestions = Product::where('nama', 'like', '%' . $keyword . '%')
            ->limit(5)
            ->get()
            ->map(function ($product) {
                return [
                    'nama'   => $product->nama,
                    'gambar' => $product->gambar,
                    'harga'  => $product->harga,
                    'encrypted_id' => $product->encrypted_id, // ← penting!
                ];
            });

        return response()->json($suggestions);
    }
}
