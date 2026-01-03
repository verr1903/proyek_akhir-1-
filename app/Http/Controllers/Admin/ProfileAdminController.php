<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use app\Models\Discount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProfileAdminController extends Controller
{
    public function index()
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $admin = Auth::user(); // ambil admin yang login

        return view('admin.profile', [
            'title' => 'Profile',
            'admin' => $admin
        ]);
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'username' => 'required|string|max:100',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $admin->username = $request->username;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $filename = 'avatar_' . $admin->id . '_' . time() . '.' . $file->getClientOriginalExtension();

            // simpan file ke folder profile
            $file->storeAs('profile', $filename, 'public');

            // simpan HANYA nama file
            $admin->avatar = $filename;
        }

        $admin->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
