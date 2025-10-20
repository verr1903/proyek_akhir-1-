<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesananAdminController extends Controller
{
    public function online()
    {
        return view('admin.pesananOnline', [
            'title'            => 'Pesanan Online'
        ]);
    }

    public function offline()
    {
        return view('admin.pesananOffline', [
            'title'            => 'Pesanan Offline'
        ]);
    }
}
