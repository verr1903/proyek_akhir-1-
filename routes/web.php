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
use App\Http\Controllers\Client\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardClientController::class, 'index'])
   ->name('dashboard');

Route::get('/produk/{kategori?}', [ProdukClientController::class, 'index'])
   ->name('produk');

Route::post('/logout', [LoginController::class, 'logout'])
   ->name('logout');

Route::get('/logoutt', [LoginController::class, 'logout'])
   ->name('logoutt');

// search suggestion route
Route::get('/search-suggest', [SearchController::class, 'suggest'])
   ->name('search.suggest');

// detail produk routes
Route::get('/detail/{encryptedId}', [DetailClientController::class, 'index'])
   ->name('detail');




// Routes untuk guest (belum login)
Route::middleware(['guest', 'prevent.back'])->group(function () {
   // login routes
   Route::get('/login', [LoginController::class, 'index'])
      ->name('login');
   Route::post('/login', [LoginController::class, 'login'])
      ->name('login.post');

   // register routes
   Route::get('/register', [RegisterController::class, 'index'])
      ->name('register');
   Route::post('/register', [RegisterController::class, 'store'])
      ->name('register.store');

   // login with google routes
   Route::get('/auth/google', [GoogleController::class, 'redirect'])
      ->name('google.redirect');

   // register with google routes 
   Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
      ->name('google.callback');
});




// Routes yang memerlukan autentikasi user
Route::middleware(['auth', 'prevent.back'])->group(function () {

   // keranjang routes
   Route::get('/keranjang', [KeranjangClientController::class, 'index'])
      ->name('keranjang');
   Route::post('/keranjang/tambah', [KeranjangClientController::class, 'store'])
      ->name('cart.add');
   Route::post('/cart/update-quantity', [KeranjangClientController::class, 'updateQuantity'])
      ->name('cart.updateQuantity');
   Route::delete('/cart/{id}', [KeranjangClientController::class, 'destroy'])
      ->name('cart.destroy');
   Route::post('/checkout', [KeranjangClientController::class, 'co'])
      ->name('checkout.store');
   Route::post('/midtrans/token', [KeranjangClientController::class, 'getSnapToken'])
      ->name('midtrans.token');
   Route::post('/cart/clear-all', [KeranjangClientController::class, 'clearAll'])->name('cart.clearAll');



   // lokasi routes
   Route::get('/lokasi', [LokasiClientController::class, 'index'])
      ->name('lokasi');
   Route::post('/lokasi', [LokasiClientController::class, 'store'])
      ->name('lokasi.store');
   Route::post('/alamat/aktifkan/{id}', [LokasiClientController::class, 'aktifkan'])
      ->name('alamat.aktifkan');
   Route::delete('/alamat/hapus/{id}', [LokasiClientController::class, 'destroy'])
      ->name('alamat.destroy');
   Route::put('/alamat/update/{id}', [LokasiClientController::class, 'update'])
      ->name('alamat.update');


   // profile routes
   Route::get('/profile', [ProfileClientController::class, 'index'])
      ->name('profile');
   Route::post('/profile/update', [ProfileClientController::class, 'update'])
      ->name('profile.update');


   // riwayat routes 
   Route::get('/riwayat', [RiwayatClientController::class, 'index'])
      ->name('riwayat');
   Route::post('/ulasan', [RiwayatClientController::class, 'store'])
      ->name('ulasan.store');
});



// Routes untuk admin
Route::prefix('admin')
   ->middleware(['auth', 'role:karyawan,owner', 'prevent.back'])
   ->group(
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
         Route::get('/orders/{id}/items', [PesananAdminController::class, 'getItems']);
         Route::post('/orders/{id}/status', [PesananAdminController::class, 'updateStatus']);

         // Pesanan Offline
         Route::get('/pesanan/offline/index', [PesananAdminController::class, 'offlineindex'])
            ->name('pesananOffline.index');
         Route::get('/pesanan/offline', [PesananAdminController::class, 'offline'])
            ->name('pesananOfflineAdmin');
         Route::post('/pesanan/offline/store', [PesananAdminController::class, 'coOffline'])
            ->name('pesananOffline.coOffline');


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
         Route::post('/karyawan/store', [KaryawanAdminController::class, 'store'])
            ->name('karyawanAdmin.store');
         Route::put('/karyawan/update/{id}', [KaryawanAdminController::class, 'update'])
            ->name('karyawanAdmin.update');
         Route::delete('/karyawan/delete/{id}', [KaryawanAdminController::class, 'destroy'])
            ->name('karyawanAdmin.destroy');


         // Laporan
         Route::get('/laporan', [LaporanAdminController::class, 'index'])
            ->name('laporanAdmin');
         Route::get('/laporan/bulan', [LaporanAdminController::class, 'orderByMonth']);
         Route::get('/laporan/order-items/{orderId}', [LaporanAdminController::class, 'orderItems']);
         Route::get('/laporan/range', [LaporanAdminController::class, 'range']);
         Route::get('/laporan/export-excel', [LaporanAdminController::class, 'exportExcel']);



         // Profile
         Route::get('/profile', [ProfileAdminController::class, 'index'])
            ->name('profileAdmin');
         Route::post('/profile/update', [ProfileAdminController::class, 'update'])
            ->name('profileAdmin.update');
      }
   );
