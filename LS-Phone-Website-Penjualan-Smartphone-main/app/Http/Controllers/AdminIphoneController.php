<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminIphoneController extends Controller
{
    // LIST DATA IPHONE + FILTER + SEARCH + SORT
    public function index(Request $request)
    {
        $query = Product::query();

        // FILTER TIPE (exibox, wifionly, beacukai, accessories)
        $filterTipe = $request->input('tipe', 'all');
        if ($filterTipe !== 'all') {
            $query->where('tipe', $filterTipe);
        }

        // SEARCH NAMA IPHONE
        $search = $request->input('search', '');
        if ($search !== '') {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        // SORT HARGA
        $sortHarga = $request->input('sort_harga', '');
        if ($sortHarga === 'termurah') {
            $query->orderBy('harga', 'asc');
        } elseif ($sortHarga === 'termahal') {
            $query->orderBy('harga', 'desc');
        } else {
            // default: terbaru
            $query->orderBy('created_at', 'desc');
        }

        $iphones = $query->paginate(10);

        return view('admin.iphone.index', [
            'iphones'    => $iphones,
            'filterTipe' => $filterTipe,
            'search'     => $search,
            'sortHarga'  => $sortHarga,
        ]);
    }

    // FORM TAMBAH PRODUK
    public function create()
    {
        return view('admin.iphone.create');
    }

    // SIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:191',
            'kapasitas' => 'nullable|string|max:50',
            'warna'     => 'nullable|string|max:50',
            'asal'      => 'nullable|string|max:100',
            'harga'     => 'required|integer|min:0',
            'stok'      => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'deskripsi_lengkap' => 'nullable|string',
            'tipe'      => 'required|string|max:50',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // 👉 Generate slug unik dari nama (tidak mengubah alur logika lain)
        $baseSlug = str()->slug($data['nama']);   // contoh: "iphone-13"
        $slug     = $baseSlug;
        $counter  = 1;

        while (Product::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $baseSlug . '-' . $counter;   // iphone-13-2, iphone-13-3, dst
        }

        $data['slug'] = $slug;

        // UPLOAD GAMBAR (JIKA ADA)
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();

            // simpan ke public/uploads/produk
            $file->move(public_path('uploads/produk'), $namaFile);

            // path relatif untuk disimpan di DB
            $data['gambar'] = 'uploads/produk/' . $namaFile;
        }

        Product::create($data);

        return redirect()
            ->route('admin.iphone.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // FORM EDIT PRODUK
    public function edit(Product $iphone)
    {
        return view('admin.iphone.edit', compact('iphone'));
    }

    // UPDATE DATA PRODUK
    public function update(Request $request, Product $iphone)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:191',
            'kapasitas' => 'nullable|string|max:50',
            'warna'     => 'nullable|string|max:50',
            'asal'      => 'nullable|string|max:100',
            'harga'     => 'required|integer|min:0',
            'stok'      => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'deskripsi_lengkap' => 'nullable|string',
            'tipe'      => 'required|string|max:50',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // 👉 slug di-update, tapi tetap unik & tidak bentrok dengan produk lain
        $baseSlug = str()->slug($data['nama']);
        $slug     = $baseSlug;
        $counter  = 1;

        while (
            Product::where('slug', $slug)
                ->where('id', '!=', $iphone->id)  // jangan hitung dirinya sendiri
                ->exists()
        ) {
            $counter++;
            $slug = $baseSlug . '-' . $counter;
        }

        $data['slug'] = $slug;

        // UPLOAD GAMBAR BARU (JIKA ADA)
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $namaFile);

            // hapus gambar lama (opsional)
            if ($iphone->gambar && file_exists(public_path($iphone->gambar))) {
                @unlink(public_path($iphone->gambar));
            }

            $data['gambar'] = 'uploads/produk/' . $namaFile;
        }

        $iphone->update($data);

        return redirect()
            ->route('admin.iphone.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    // HAPUS PRODUK
    public function destroy(Product $iphone)
    {
        if ($iphone->gambar && file_exists(public_path($iphone->gambar))) {
            @unlink(public_path($iphone->gambar));
        }

        $iphone->delete();

        return redirect()
            ->route('admin.iphone.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
