<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;

class ProdukClientController extends Controller
{
    public function index(Request $request, $kategori = null)
    {
        // Hapus diskon expired
        $discounts = Discount::all();
        foreach ($discounts as $discount) {
            if ($discount->isExpired()) {
                $discount->delete();
            }
        }
        // Jika promo & diskon → ambil produk yang ada di tabel discount
        if ($request->discount == 'true') {

            // Ambil semua discount yang belum expired
            $discounts = Discount::whereHas('product')->with('product')->get();

            // Ambil hanya product ID yang ada di tabel discount
            $productIds = $discounts->pluck('id_product');

            // Ambil produk berdasarkan id product yang punya diskon
            $products = Product::whereIn('id', $productIds)->paginate(9);

            return view('client.produk', [
                'title' => 'Promo & Diskon',
                'products' => $products,
                'kategoriAktif' => null,
            ]);
        }

        // MODE NORMAL: kategori
        $query = Product::query();

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $products = $query->paginate(9);

        return view('client.produk', [
            'title' => 'Produk',
            'products' => $products,
            'kategoriAktif' => $kategori
        ]);
    }
}
