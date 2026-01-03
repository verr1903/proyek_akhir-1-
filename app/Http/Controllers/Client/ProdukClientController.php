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
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        // Jika promo & diskon → ambil produk yang DISKONNYA MASIH AKTIF
        if ($request->discount == 'true') {

            $discounts = Discount::whereHas('product')
                ->where('start_at', '<=', now())
                ->where('end_at', '>=', now())
                ->with('product')
                ->get();

            $productIds = $discounts->pluck('id_product');

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
