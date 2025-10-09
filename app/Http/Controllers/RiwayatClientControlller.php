<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatClientControlller extends Controller
{
    public function index()
    {
        return view('client.riwayat', [
            'title'            => 'Riwayat'
        ]);
    }
}
