<?php

use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DetailClientController;
use App\Http\Controllers\KeranjangClientController;
use App\Http\Controllers\LokasiClientControlller;
use App\Http\Controllers\ProdukClientControlller;
use App\Http\Controllers\ProfileClientControlller;
use App\Http\Controllers\RiwayatClientControlller;
use Illuminate\Support\Facades\Route;

 Route::get('/', [DashboardClientController::class, 'index'])->name('dashboard');
 Route::get('/detail', [DetailClientController::class, 'index'])->name('detail');
 Route::get('/keranjang', [KeranjangClientController::class, 'index'])->name('keranjang');
 Route::get('/lokasi', [LokasiClientControlller::class, 'index'])->name('lokasi');
 Route::get('/profile', [ProfileClientControlller::class, 'index'])->name('profile');
 Route::get('/riwayat', [RiwayatClientControlller::class, 'index'])->name('riwayat');
 Route::get('/produk', [ProdukClientControlller::class, 'index'])->name('produk');
