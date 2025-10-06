<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardClientControlller extends Controller
{
    public function index()
    {
        return view('client.dashboard', [
            'title'            => 'Dashboard'
        ]);
    }
}
