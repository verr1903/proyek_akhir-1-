<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    /**
     * Redirect ke halaman login Google.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah user sudah ada berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if (!$user) {
                $user = User::create([
                    'username' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'role' => 'user',
                    // password dummy supaya tidak null (kalau kamu pakai nullable tidak masalah)
                    'password' => Hash::make(uniqid()),
                ]);
            }

            // Login user
            Auth::login($user);

            // Redirect berdasarkan role
            if ($user->role === 'karyawan') {
                return redirect()->intended('/admin')->with('success', 'Login berhasil sebagai Karyawan!');
            } else {
                return redirect()->intended('/')->with('success', 'Login berhasil!');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login dengan Google.');
        }
    }
}
