<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DiskonAdminController;
use App\Http\Controllers\Admin\IklanAdminController;
use App\Http\Controllers\Admin\KaryawanAdminController;
use App\Http\Controllers\Admin\LaporanAdminController;
use App\Http\Controllers\Admin\PesananAdminController;
use App\Http\Controllers\Admin\ProdukAdminController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Client\DetailClientController;
use App\Http\Controllers\Client\KeranjangClientController;
use App\Http\Controllers\Client\LokasiClientController;
use App\Http\Controllers\Client\ProdukClientController;
use App\Http\Controllers\Client\ProfileClientController;
use App\Http\Controllers\Client\RiwayatClientController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Client\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardClientController::class, 'index'])
   ->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])
   ->name('login');
Route::post('/login', [LoginController::class, 'login'])
   ->name('login.post');

Route::get('/register', [RegisterController::class, 'index'])
   ->name('register');
Route::post('/register', [RegisterController::class, 'store'])
   ->name('register.store');

Route::get('/auth/google', [GoogleController::class, 'redirect'])
   ->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
   ->name('google.callback');

Route::post('/logout', [LoginController::class, 'logout'])
   ->name('logout');

Route::middleware('auth')->group(function () {
   Route::get('/detail/{encryptedId}', [DetailClientController::class, 'index'])
      ->name('detail');


   Route::post('/keranjang/tambah', [CartController::class, 'store'])->name('cart.add');
   Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');


   Route::get('/keranjang', [KeranjangClientController::class, 'index'])->name('keranjang');

   // lokasi routes
   Route::get('/lokasi', [LokasiClientController::class, 'index'])
      ->name('lokasi');
   Route::post('/lokasi', [LokasiClientController::class, 'store'])
      ->name('lokasi.store');
   Route::post('/alamat/aktifkan/{id}', [App\Http\Controllers\Client\LokasiClientController::class, 'aktifkan'])
      ->name('alamat.aktifkan');
   Route::delete('/alamat/hapus/{id}', [LokasiClientController::class, 'destroy'])
      ->name('alamat.destroy');
   Route::put('/alamat/update/{id}', [LokasiClientController::class, 'update'])
      ->name('alamat.update');



   Route::get('/profile', [ProfileClientController::class, 'index'])
      ->name('profile');
   Route::post('/profile/update', [ProfileClientController::class, 'update'])
      ->name('profile.update');

   Route::get('/riwayat', [RiwayatClientController::class, 'index'])->name('riwayat');
   Route::get('/produk', [ProdukClientController::class, 'index'])->name('produk');
});

Route::prefix('admin')->group(
   function () {

      // dashboard admin
      Route::get('/', [DashboardAdminController::class, 'index'])
         ->name('dashboardAdmin');


      // produk 
      Route::get('/produk', [ProdukAdminController::class, 'index'])
         ->name('produkAdmin');
      Route::post('/produk', [ProdukAdminController::class, 'store'])
         ->name('produkAdmin.store');
      Route::put('/produk/update/{id}', [ProdukAdminController::class, 'update'])
         ->name('produkAdmin.update');
      Route::delete('/produk/{id}', [ProdukAdminController::class, 'destroy'])
         ->name('produkAdmin.destroy');


      // Pesanan Online
      Route::get('/pesanan/online', [PesananAdminController::class, 'online'])
         ->name('pesananOnlineAdmin');
      // Pesanan Offline
      Route::get('/pesanan/offline', [PesananAdminController::class, 'offline'])
         ->name('pesananOfflineAdmin');


      // Iklan
      Route::get('/iklan', [IklanAdminController::class, 'index'])
         ->name('iklanAdmin');
      Route::post('/iklan', [IklanAdminController::class, 'store'])
         ->name('iklanAdmin.store');
      Route::put('/iklan/{id}', [IklanAdminController::class, 'update'])
         ->name('iklanAdmin.update');
      Route::delete('/iklan/{id}', [IklanAdminController::class, 'destroy'])
         ->name('iklanAdmin.destroy');


      // Diskon
      Route::get('/diskon', [DiskonAdminController::class, 'index'])
         ->name('diskonAdmin');
      Route::post('/diskon/store', [DiskonAdminController::class, 'store'])
         ->name('diskonAdmin.store');
      Route::delete('/diskon/{id}', [DiskonAdminController::class, 'destroy'])
         ->name('diskonAdmin.destroy');
      Route::put('/diskon/{id}', [DiskonAdminController::class, 'update'])
         ->name('diskonAdmin.update');



      // Karyawan
      Route::get('/karyawan', [KaryawanAdminController::class, 'index'])
         ->name('karyawanAdmin');
      // Laporan
      Route::get('/laporan', [LaporanAdminController::class, 'index'])
         ->name('laporanAdmin');
      // Profile
      Route::get('/profile', [ProfileAdminController::class, 'index'])
         ->name('profileAdmin');
   }
);
