<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileClientControlller extends Controller
{
    public function index()
    {
        return view('login', [
            'title'            => 'Profile'
        ]);
    }
}
