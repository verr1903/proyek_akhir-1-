<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;

class LokasiClientController extends Controller
{
    public function index()
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $userId = Auth::id();

        // Urutkan: alamat aktif di atas, lalu alamat lain berdasarkan waktu terbaru
        $addresses = Address::where('id_users', $userId)
            ->orderByRaw("CASE WHEN status = 'aktif' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('client.lokasi', [
            'title' => 'Pilih Alamat',
            'addresses' => $addresses
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'jalan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
        ]);

        Address::create([
            'id_users' => Auth::id(),
            'nama_penerima' => $request->nama_penerima,
            'nomor_hp' => $request->nomor_hp,
            'jalan' => $request->jalan,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'status' => 'nonaktif',
        ]);

        return redirect()->back()->with('success', 'Alamat baru berhasil ditambahkan!');
    }

    public function aktifkan($id)
    {
        $userId = Auth::id();

        // Nonaktifkan semua alamat milik user
        Address::where('id_users', $userId)->update(['status' => 'nonaktif']);

        // Aktifkan alamat yang dipilih
        $alamat = Address::where('id_users', $userId)->findOrFail($id);
        $alamat->update(['status' => 'aktif']);

        return response()->json([
            'success' => true,
            'message' => 'Alamat utama telah diperbarui.'
        ]);
    }

    public function destroy($id)
    {
        $address = Address::where('id', $id)
            ->where('id_users', Auth::id()) // pastikan alamat milik user yang login
            ->first();

        if (!$address) {
            return response()->json(['success' => false, 'message' => 'Alamat tidak ditemukan.']);
        }

        $address->delete();

        return response()->json(['success' => true, 'message' => 'Alamat berhasil dihapus.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:100',
            'nomor_hp' => 'required|string|max:20',
            'jalan' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
        ]);

        $address = Address::where('id', $id)
            ->where('id_users', Auth::id())
            ->first();

        if (!$address) {
            return response()->json(['success' => false, 'message' => 'Alamat tidak ditemukan']);
        }

        $address->update($request->only([
            'nama_penerima',
            'nomor_hp',
            'jalan',
            'kecamatan',
            'kelurahan'
        ]));

        return response()->json(['success' => true, 'message' => 'Alamat berhasil diperbarui']);
    }
}
