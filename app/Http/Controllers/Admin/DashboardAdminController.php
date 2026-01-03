<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index()
    {

        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $tahun = request('tahun', date('Y'));

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
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $income = [];
        for ($i = 1; $i <= 12; $i++) {
            $income[] = $pendapatanBulanan[$i] ?? 0;
        }

        /* ================= DONUT PRODUK ================= */
        $distribusiProduk = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select(
                'products.kategori',
                DB::raw('SUM(order_items.quantity) as total')
            )
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


        return view('admin.dashboard', [
            'title'             => 'Dashboard',
            'totalProduk'       => $totalProduk,
            'totalPesanan'      => $totalPesanan,
            'pesananPending'    => $pesananPending,
            'income'            => $income,
            'distribusiProduk'  => $distribusiProduk,
            'produkStokMenipis' => $produkStokMenipis,
            'tahun'             => $tahun
        ]);
    }
}
