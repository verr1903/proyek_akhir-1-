<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iklan;
use Illuminate\Support\Facades\Storage;

class IklanAdminController extends Controller
{
    public function index()
    {
        $iklans = Iklan::latest()->get();

        return view('admin.iklan', [
            'title' => 'Iklan',
            'iklans' => $iklans
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                [$width, $height] = getimagesize($file);

                // pastikan gambar landscape
                if ($width <= $height) {
                    return back()
                        ->withErrors(['gambar' => 'Gambar harus berorientasi landscape (lebar lebih besar dari tinggi).'])
                        ->withInput();
                }

                $validated['gambar'] = $file->store('iklan', 'public');
            }


            // Simpan gambar
            $validated['gambar'] = $file->store('iklan', 'public');
        }

        Iklan::create($validated);

        return redirect()->route('iklanAdmin')->with('success', 'Iklan berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        $iklan = Iklan::findOrFail($id);

        $request->validate([
            'judul' => 'required|string',
            'sub_judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $iklan->judul = $request->judul;
        $iklan->sub_judul = $request->sub_judul;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            [$width, $height] = getimagesize($file);
            $aspectRatio = $width / $height;

            if ($aspectRatio < 2.5 || $aspectRatio > 2.9) {
                return back()
                    ->withErrors(['gambar' => 'Ukuran gambar harus memiliki rasio sekitar 1920x700 (±10%).'])
                    ->withInput();
            }

            // Hapus gambar lama
            if ($iklan->gambar) {
                Storage::delete('public/' . $iklan->gambar);
            }

            $iklan->gambar = $file->store('iklan', 'public');
        }

        $iklan->save();

        return redirect()->back()->with('success', 'Iklan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $iklan = Iklan::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($iklan->gambar && Storage::exists('public/' . $iklan->gambar)) {
            Storage::delete('public/' . $iklan->gambar);
        }

        $iklan->delete();

        return redirect()->back()->with('success', 'Iklan berhasil dihapus!');
    }
}
