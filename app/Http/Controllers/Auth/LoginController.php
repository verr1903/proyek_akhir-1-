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

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Data login
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // jika remember me dicentang

        // Coba autentikasi
        if (Auth::attempt($credentials, $remember)) {
            // regenerasi session untuk keamanan
            $request->session()->regenerate();
            $user = Auth::user();
            // Cek role dan redirect sesuai peran
            if ($user->role === 'karyawan') {
                return redirect()->intended('/admin')->with('success', 'Login berhasil sebagai Karyawan!');
            } else {
                return redirect()->intended('/')->with('success', 'Login berhasil!');
            }
        }

        // Gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
}
