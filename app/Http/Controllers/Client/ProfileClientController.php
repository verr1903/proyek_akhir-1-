<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\Discount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileClientController extends Controller
{
    public function index()
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $user = Auth::user();

        return view('client.profile', [
            'title' => 'Profile',
            'user'  => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input umum
        $request->validate([
            'username' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update username dan email
        $user->username = $request->username;

        // Ganti avatar kalau ada
        if ($request->hasFile('avatar')) {
            if ($user->avatar && $user->avatar !== 'default.png' && !str_contains($user->avatar, 'googleusercontent.com')) {
                Storage::disk('public')->delete('profile/' . $user->avatar);
            }

            $path = $request->file('avatar')->store('profile', 'public');
            $user->avatar = basename($path);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
