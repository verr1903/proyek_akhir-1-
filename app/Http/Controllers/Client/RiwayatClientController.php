<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatClientController extends Controller
{
    public function index()
    {
        return view('client.riwayat', [
            'title'            => 'Riwayat'
        ]);
    }
}
