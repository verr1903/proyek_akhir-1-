<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiClientControlller extends Controller
{
    public function index()
    {
        return view('client.lokasi', [
            'title'            => 'Lokasi'
        ]);
    }
}
