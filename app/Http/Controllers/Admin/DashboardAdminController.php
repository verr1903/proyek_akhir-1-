<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Discount;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index()
    {

        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $tahun  = request('tahun', date('Y'));
        $tempat = request('tempat'); // online | offline | null

        // total karayawan
        $totalKaryawan = User::where('role', 'karyawan')->count();

        // rating
        $rataRating = round(Review::avg('bintang') ?? 0, 1);
        // Bulatkan 1 angka di belakang koma
        $rataRating = round($rataRating, 1);

        /* ================= PESANAN SAYA (DIANTAR) ================= */
        $pesananDiantarSaya = Order::with('address')
            ->where('status', 'diantar')
            ->where('action_by', Auth::id())
            ->whereNull('action_by_2') // 🔥 PENTING
            ->latest()
            ->get();


        /* ================= CARD TOP ================= */
        $totalProduk   = Product::count();
        $totalPesanan  = Order::count();

        /* ================= PESANAN BELUM DIPROSES ================= */
        $pesananPending = Order::where('status', '!=', 'selesai')
            ->latest()
            ->limit(5)
            ->get();


        /* ================= GRAFIK PENDAPATAN ================= */
        $pendapatanBulanan = Order::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(total_harga) as total')
        )
            ->whereYear('created_at', $tahun)
            ->where('status', 'selesai')
            ->when($tempat, function ($q) use ($tempat) {
                $q->where('tempat_pesanan', $tempat);
            })
            ->groupBy('bulan')
            ->pluck('total', 'bulan');


        $income = [];
        for ($i = 1; $i <= 12; $i++) {
            $income[] = $pendapatanBulanan[$i] ?? 0;
        }

        /* ================= DONUT PRODUK ================= */
        $distribusiProduk = DB::table('order_items')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select(
                'products.kategori',
                DB::raw('SUM(order_items.quantity) as total')
            )
            ->whereYear('orders.created_at', $tahun)
            ->where('orders.status', 'selesai')
            ->when($tempat, function ($q) use ($tempat) {
                $q->where('orders.tempat_pesanan', $tempat);
            })
            ->groupBy('products.kategori')
            ->orderByDesc('total')
            ->get();



        /* ================= STOK MENIPIS ================= */
        $produkStokMenipis = Product::select(
            'nama',
            'stok_s',
            'stok_m',
            'stok_l',
            'stok_xl'
        )
            ->whereRaw('(stok_s + stok_m + stok_l + stok_xl) <= ?', [5])

            ->get();

        /* ================= CUSTOMER TERLOYAL ================= */
        $customerTerloyal = Order::select(
            'id_users',
            DB::raw('COUNT(*) as total_pesanan'),
            DB::raw('SUM(total_harga) as total_belanja')
        )
            ->where('status', 'selesai') // hanya pesanan sukses
            ->groupBy('id_users')
            ->orderByDesc('total_pesanan')
            ->with('user') // relasi ke user
            ->limit(5) // Top 5 customer
            ->get();


        return view('admin.dashboard', [
            'title'             => 'Dashboard',
            'totalProduk'       => $totalProduk,
            'totalKaryawan'     => $totalKaryawan,
            'totalPesanan'      => $totalPesanan,
            'pesananPending'    => $pesananPending,
            'income'            => $income,
            'customerTerloyal'  => $customerTerloyal,
            'distribusiProduk'  => $distribusiProduk,
            'produkStokMenipis' => $produkStokMenipis,
            'tahun'             => $tahun,
            'pesananDiantarSaya' => $pesananDiantarSaya,
            'rataRating'        => $rataRating
        ]);
    }
}
