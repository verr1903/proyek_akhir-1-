<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;
use Illuminate\Support\Facades\Storage;

class ProdukAdminController extends Controller
{

    public function index(Request $request)
    {
        // Nonaktifkan diskon yang sudah expired (TIDAK DIHAPUS)
        Discount::where('status', 'aktif')
            ->where('end_at', '<', now())
            ->update(['status' => 'nonaktif']);

        $query = Product::query();

        // 🔍 Filter pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('kategori', 'like', '%' . $request->search . '%')
                    ->orWhere('detail', 'like', '%' . $request->search . '%');
            });
        }

        // ↕️ Sort berdasarkan kolom
        $sort = $request->get('sort', 'created_at'); // default sort by created_at
        $direction = $request->get('direction', 'desc'); // default descending

        $products = $query->orderBy($sort, $direction)->paginate(10);

        return view('admin.produk', [
            'title' => 'Produk',
            'products' => $products,
            'sort' => $sort,
            'direction' => $direction,
            'search' => $request->search,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:255',
            'detail'    => 'nullable|string',
            'harga'     => 'required|integer|min:0',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stok_s'    => 'required|integer|min:0',
            'stok_m'    => 'required|integer|min:0',
            'stok_l'    => 'required|integer|min:0',
            'stok_xl'   => 'required|integer|min:0',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Product::create($validated);

        return redirect()->route('produkAdmin')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:255',
            'detail'    => 'nullable|string',
            'harga'     => 'required|integer|min:0',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stok_s'    => 'required|integer|min:0',
            'stok_m'    => 'required|integer|min:0',
            'stok_l'    => 'required|integer|min:0',
            'stok_xl'   => 'required|integer|min:0',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $product->update($validated);

        return redirect()->route('produkAdmin')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar lama
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect()->route('produkAdmin')->with('success', 'Produk berhasil dihapus.');
    }
}
