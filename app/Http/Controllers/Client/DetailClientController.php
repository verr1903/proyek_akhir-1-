<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailClientController extends Controller
{
    public function index()
    {
        return view('client.detail', [
            'title'            => 'Detail'
        ]);
    }
}
