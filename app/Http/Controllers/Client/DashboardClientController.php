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
        // Hapus diskon yang sudah expired
        $discounts = Discount::all();

        foreach ($discounts as $discount) {
            if ($discount->isExpired()) {
                $discount->delete();
            }
        }

        // Ambil data lain
        $iklan = Iklan::all();
        $products = Product::with('discount')
            ->latest()
            ->paginate(9);

        if ($request->ajax()) {
            return view('client.product_list', compact('products'))->render();
        }

        return view('client.dashboard', [
            'title' => 'Dashboard',
            'iklan' => $iklan,
            'products' => $products,
        ]);
    }
}
