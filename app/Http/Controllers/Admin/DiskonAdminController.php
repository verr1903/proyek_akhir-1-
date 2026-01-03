<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;

class DiskonAdminController extends Controller
{
    public function index(Request $request)
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        // Query dasar
        $query = Discount::with('product');

        // 🔍 Searching
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('product', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // 🔽 Sorting
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');

        // Jika kolom dari relasi (misal product.nama)
        if ($sort === 'nama_produk') {
            $query->join('products', 'discounts.id_product', '=', 'products.id')
                ->orderBy('products.nama', $direction)
                ->select('discounts.*');
        } else {
            $query->orderBy($sort, $direction);
        }

        // Pagination (10 per halaman)
        $discounts = $query->paginate(10)->appends($request->query());

        // Produk yang sudah punya diskon
        $usedProductIds = Discount::pluck('id_product');

        // Semua produk
        $products = Product::all();

        return view('admin.diskon', [
            'title' => 'Diskon',
            'discounts' => $discounts,
            'products' => $products,
            'usedProductIds' => $usedProductIds,
        ]);
    }




    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_product' => 'required|exists:products,id',
            'persentase' => 'required|integer|min:1|max:100',
            'start_at'   => 'required|date',
            'end_at'     => 'required|date|after:start_at',
        ]);

        Discount::create([
            'id_product' => $validated['id_product'],
            'persentase' => $validated['persentase'],
            'start_at'   => $validated['start_at'],
            'end_at'     => $validated['end_at'],
            'status'     => 'aktif',
        ]);

        return redirect()->route('diskonAdmin')->with('success', 'Diskon berhasil ditambahkan.');
    }


    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_product' => 'required|exists:products,id',
            'persentase' => 'required|integer|min:1|max:100',
            'start_at'   => 'required|date',
            'end_at'     => 'required|date|after:start_at',
        ]);

        $discount = Discount::findOrFail($id);
        $discount->update([
            'id_product' => $request->id_product,
            'persentase' => $request->persentase,
            'start_at'   => $request->start_at,
            'end_at'     => $request->end_at,
            'status'     => now()->between($request->start_at, $request->end_at)
                ? 'aktif'
                : 'nonaktif',
        ]);

        return redirect()->back()->with('success', 'Diskon berhasil diperbarui!');
    }
}
