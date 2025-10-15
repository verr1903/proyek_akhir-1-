<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardClientController extends Controller
{
    public function index()
    {
        return view('client.dashboard', [
            'title'            => 'Dashboard'
        ]);
    }
}
