<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukClientControlller extends Controller
{
    public function index()
    {
        return view('client.produk', [
            'title'            => 'Produk'
        ]);
    }
}
