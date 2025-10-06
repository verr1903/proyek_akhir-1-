<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailClientControlller extends Controller
{
    public function index()
    {
        return view('client.detail', [
            'title'            => 'Detail'
        ]);
    }
}
