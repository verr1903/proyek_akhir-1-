<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Client\DetailClientController;
use App\Http\Controllers\Client\KeranjangClientController;
use App\Http\Controllers\Client\LokasiClientController;
use App\Http\Controllers\Client\ProdukClientController;
use App\Http\Controllers\Client\ProfileClientController;
use App\Http\Controllers\Client\RiwayatClientController;
use Illuminate\Support\Facades\Route;

 Route::get('/', [DashboardClientController::class, 'index'])->name('dashboard');
 Route::get('/login', [LoginController::class, 'index'])->name('login');
 Route::get('/register', [RegisterController::class, 'index'])->name('register');
 Route::get('/detail', [DetailClientController::class, 'index'])->name('detail');
 Route::get('/keranjang', [KeranjangClientController::class, 'index'])->name('keranjang');
 Route::get('/lokasi', [LokasiClientController::class, 'index'])->name('lokasi');
 Route::get('/profile', [ProfileClientController::class, 'index'])->name('profile');
 Route::get('/riwayat', [RiwayatClientController::class, 'index'])->name('riwayat');
 Route::get('/produk', [ProdukClientController::class, 'index'])->name('produk');
