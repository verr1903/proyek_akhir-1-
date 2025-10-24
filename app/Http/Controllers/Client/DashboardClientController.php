<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Iklan;
use App\Models\Product;

class DashboardClientController extends Controller
{
    public function index(Request $request)
{
    $iklan = Iklan::all();
    $products = Product::with('discount')->paginate(9);

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
