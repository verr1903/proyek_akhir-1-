<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class KeranjangClientController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Ambil alamat aktif user
        $alamatAktif = Address::where('id_users', $userId)
            ->where('status', 'aktif')
            ->first();

        // Hitung ongkir berdasarkan kecamatan
        $shippingCost = 0;
        if ($alamatAktif) {
            $shippingCost = $this->calculateShippingCost($alamatAktif->kecamatan);
        }

        // Ambil semua data cart milik user yang sedang login + relasi produk
        $carts = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        return view('client.keranjang', [
            'title' => 'Keranjang',
            'carts' => $carts,
            'alamatAktif' => $alamatAktif,
            'shippingCost' => $shippingCost
        ]);
    }

    private function calculateShippingCost($kecamatan, $kelurahan = null)
    {
        // Zona Gratis (sekitar Panam dan Rumbai)
        $zonaGratis = [
            'Tuah Karya',
            'Simpang Baru',
            'Tampan', // Panam area
            'Rumbai',
            'Rumbai Barat',
            'Rumbai Timur'
        ];

        // Zona Dekat (Rp5.000)
        $zonaDekat = [
            'Marpoyan Damai',
            'Payung Sekaki'
        ];

        // Zona Sedang (Rp10.000)
        $zonaSedang = [
            'Sukajadi',
            'Pekanbaru Kota',
            'Senapelan',
            'Lima Puluh',
            'Sail'
        ];

        // Zona Jauh (Rp15.000)
        $zonaJauh = [
            'Bukit Raya',
            'Tenayan Raya'
        ];

        // Cek kelurahan dulu jika tersedia
        if ($kelurahan && in_array($kelurahan, ['Tampan', 'Tuah Karya', 'Simpang Baru'])) {
            return 0;
        }

        // Cek berdasarkan kecamatan
        if (in_array($kecamatan, $zonaGratis)) {
            return 0;
        } elseif (in_array($kecamatan, $zonaDekat)) {
            return 5000;
        } elseif (in_array($kecamatan, $zonaSedang)) {
            return 10000;
        } elseif (in_array($kecamatan, $zonaJauh)) {
            return 15000;
        }

        // Default jika tidak ditemukan
        return 20000;
    }
}
