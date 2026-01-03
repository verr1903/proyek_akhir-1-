<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Iklan;
use App\Models\Product;
use App\Models\Discount;

class DashboardClientController extends Controller
{
    public function index(Request $request)
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        // Data iklan
        $iklan = Iklan::all();

        // TAB 1 — NEW (produk terbaru)
        $newProducts = Product::with(['discount', 'reviews'])
            ->orderBy('created_at', 'desc')
            ->paginate(9, ['*'], 'new_page');

        // TAB 2 — RECOMMENDED (rating tertinggi)
        $recommendedProducts = Product::withCount('reviews')
            ->withAvg('reviews', 'bintang')
            ->orderByDesc('reviews_avg_bintang')
            ->orderByDesc('reviews_count')
            ->paginate(9, ['*'], 'rec_page');

        // TAB 3 — TRENDING (paling banyak dibeli)
        // Pastikan kamu punya relasi orders → order_items → products
        $trendingProducts = Product::withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->paginate(9, ['*'], 'trend_page');

        if ($request->ajax()) {

            $tab = $request->query('tab');
            $sort = $request->query('sort');


            if ($tab === 'new') {
                $query = Product::with(['discount', 'reviews'])
                    ->orderBy('created_at', 'desc');
            } elseif ($tab === 'rec') {
                $query = Product::withCount('reviews')
                    ->withAvg('reviews', 'bintang')
                    ->orderByDesc('reviews_avg_bintang')
                    ->orderByDesc('reviews_count');
            } else { // trend
                $query = Product::withCount('orderItems')
                    ->orderByDesc('order_items_count');
            }

            if ($sort) {
                // Hapus semua orderBy sebelumnya
                $query->getQuery()->orders = [];

                if ($sort === 'asc') {
                    $query->orderBy('harga', 'asc');
                } elseif ($sort === 'desc') {
                    $query->orderBy('harga', 'desc');
                }
            }

            $page = $request->query("{$tab}_page", 1);
            $products = $query->paginate(9, ['*'], "{$tab}_page", $page);

            return response()->json([
                'html' => view('client.product_list', ['products' => $products])->render(),
                'next_page' => $products->nextPageUrl()
            ]);
        }



        return view('client.dashboard', [
            'title' => 'Dashboard',
            'iklan' => $iklan,
            'products' => $newProducts,
            'newProducts' => $newProducts,
            'recommendedProducts' => $recommendedProducts,
            'trendingProducts' => $trendingProducts,
        ]);
    }
}
