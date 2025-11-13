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
            'durasi' => 'required|integer|min:1',
        ]);

        Discount::create($validated);

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
            'persentase' => 'required|integer|min:1|max:100',
            'durasi' => 'required|integer|min:1',
            'id_product' => 'required|exists:products,id',
        ]);

        $discount = Discount::findOrFail($id);
        $discount->update([
            'persentase' => $request->persentase,
            'durasi' => $request->durasi,
            'id_product' => $request->id_product,
        ]);

        return redirect()->back()->with('success', 'Diskon berhasil diperbarui!');
    }
}
