<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KaryawanAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'karyawan');

        // Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Sort by
        $sort = $request->sort ?? 'created_at';
        $direction = $request->direction ?? 'desc';

        $allowedSort = ['created_at', 'username', 'email'];
        if (!in_array($sort, $allowedSort)) {
            $sort = 'created_at';
        }

        $karyawans = $query->orderBy($sort, $direction)->paginate(10);

        return view('admin.karyawan', [
            'title' => 'Karyawan',
            'karyawans' => $karyawans,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'karyawan',
            'avatar' => 'default.png',
        ]);

        return redirect()->back()->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Karyawan berhasil dihapus');
    }
}
