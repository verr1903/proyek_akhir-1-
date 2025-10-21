<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanAdminController extends Controller
{
    public function index()
    {
        return view('admin.laporan', [
            'title'            => 'Laporan'
        ]);
    }
}
