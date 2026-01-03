<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Discount;
use Illuminate\Support\Facades\Crypt;

class DetailClientController extends Controller
{
    public function index($encryptedId)
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        try {
            // Dekripsi ID produk
            $id = Crypt::decryptString($encryptedId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Produk tidak ditemukan atau URL tidak valid.');
        }

        // Ambil produk beserta relasi diskon
        $product = Product::with(['discount', 'reviews.user'])->withCount('reviews')->findOrFail($id);

        // Hitung harga setelah diskon (jika ada)
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
