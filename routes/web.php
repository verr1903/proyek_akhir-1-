<?php

use App\Http\Controllers\DashboardClientControlller;
use App\Http\Controllers\DetailClientControlller;
use Illuminate\Support\Facades\Route;

 Route::get('/', [DashboardClientControlller::class, 'index'])->name('dashboard');
 Route::get('/detail', [DetailClientControlller::class, 'index'])->name('detail');
