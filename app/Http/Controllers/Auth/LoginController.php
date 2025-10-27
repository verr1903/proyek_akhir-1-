<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title'            => 'Login'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // keluar dari session

        // hapus semua session supaya aman
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // redirect ke halaman login (atau home)
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
