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
        // Hapus diskon expired
        $discounts = Discount::all();
        foreach ($discounts as $discount) {
            if ($discount->isExpired()) {
                $discount->delete();
            }
        }

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
            return view('client.product_list', [
                'products' => $newProducts
            ])->render();
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
