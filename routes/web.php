<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Client\DetailClientController;
use App\Http\Controllers\Client\KeranjangClientController;
use App\Http\Controllers\Client\LokasiClientControlller;
use App\Http\Controllers\Client\ProdukClientControlller;
use App\Http\Controllers\Client\ProfileClientControlller;
use App\Http\Controllers\Client\RiwayatClientControlller;
use Illuminate\Support\Facades\Route;

 Route::get('/', [DashboardClientController::class, 'index'])->name('dashboard');
 Route::get('/login', [LoginController::class, 'index'])->name('login');
 Route::get('/register', [RegisterController::class, 'index'])->name('register');
 Route::get('/detail', [DetailClientController::class, 'index'])->name('detail');
 Route::get('/keranjang', [KeranjangClientController::class, 'index'])->name('keranjang');
 Route::get('/lokasi', [LokasiClientControlller::class, 'index'])->name('lokasi');
 Route::get('/profile', [ProfileClientControlller::class, 'index'])->name('profile');
 Route::get('/riwayat', [RiwayatClientControlller::class, 'index'])->name('riwayat');
 Route::get('/produk', [ProdukClientControlller::class, 'index'])->name('produk');
