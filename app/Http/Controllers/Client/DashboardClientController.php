<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Iklan;
use App\Models\Product;

class DashboardClientController extends Controller
{
    public function index()
    {
        $iklan = Iklan::all(); // ambil semua data iklan
        $products = Product::with('discount')->get(); // ✅ perbaikan di sini

        return view('client.dashboard', [
            'title' => 'Dashboard',
            'iklan' => $iklan,
            'products' => $products
        ]);
    }
}
