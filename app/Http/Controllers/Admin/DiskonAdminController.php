<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;

class DiskonAdminController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('product')->get();

        // Ambil semua produk yang tidak punya diskon
        // ATAU produk yang sedang dipakai dalam diskon yang sedang diedit (biar muncul di modal edit)
        $products = Product::whereNotIn('id', Discount::pluck('id_product'))
            ->orWhereIn('id', $discounts->pluck('id_product'))
            ->get();

        return view('admin.diskon', [
            'title' => 'Diskon',
            'discounts' => $discounts,
            'products' => $products
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
