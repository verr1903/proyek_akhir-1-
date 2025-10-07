<?php

use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DetailClientController;
use App\Http\Controllers\KeranjangClientController;
use Illuminate\Support\Facades\Route;

 Route::get('/', [DashboardClientController::class, 'index'])->name('dashboard');
 Route::get('/detail', [DetailClientController::class, 'index'])->name('detail');
 Route::get('/keranjang', [KeranjangClientController::class, 'index'])->name('keranjang');
