<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangClientController extends Controller
{
    public function index()
    {
        return view('client.keranjang', [
            'title'            => 'keranjang'
        ]);
    }
}
