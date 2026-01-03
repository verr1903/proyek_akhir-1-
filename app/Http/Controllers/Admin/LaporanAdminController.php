<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Discount;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanMultiSheetExport;

class LaporanAdminController extends Controller
{
    public function index()
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $ringkasanBulanan = DB::table('orders')
            ->select(
                DB::raw('YEAR(created_at) as tahun'),
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('SUM(total_harga) as total_penjualan')
            )
            ->where('status', 'selesai')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->get();

        return view('admin.laporan', compact('ringkasanBulanan'))
            ->with('title', 'Laporan');
    }

    // 🔹 ORDER PER BULAN
    public function orderByMonth(Request $request)
    {
        return DB::table('orders')
            ->where('status', 'selesai')
            ->whereMonth('created_at', $request->bulan)
            ->whereYear('created_at', $request->tahun)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    // 🔹 ORDER ITEM PER ORDER
    public function orderItems($orderId)
    {
        return DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('order_items.order_id', $orderId)
            ->select(
                'products.nama',
                'order_items.quantity',
                'order_items.subtotal'
            )
            ->get();
    }

    public function range(Request $request)
    {
        return Order::whereBetween('created_at', [
            $request->dari . ' 00:00:00',
            $request->sampai . ' 23:59:59'
        ])
            ->where('status', 'selesai')
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function exportExcel(Request $request)
    {
        $request->validate([
            'dari' => 'required|date',
            'sampai' => 'required|date',
        ]);

        return Excel::download(
            new LaporanMultiSheetExport($request->dari, $request->sampai),
            'laporan_penjualan_' . $request->dari . '_sd_' . $request->sampai . '.xlsx'
        );
    }
}
