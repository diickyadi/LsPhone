<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    // ===============================
    // LIST TESTIMONI
    // ===============================
    public function index()
    {
        $testimonis = Testimonial::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.testimoni.index', compact('testimonis'));
    }

    // ===============================
    // FORM TAMBAH
    // ===============================
    public function create()
    {
        return view('admin.testimoni.create');
    }

    // ===============================
    // SIMPAN DATA BARU
    // ===============================
    public function store(Request $request)
    {
        $data = $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/testimoni'), $namaFile);

            $data['foto'] = 'uploads/testimoni/' . $namaFile;
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditambahkan.');
    }

    // ===============================
    // FORM EDIT
    // ===============================
    public function edit(Testimonial $testimoni)
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    // ===============================
    // UPDATE DATA
    // ===============================
    public function update(Request $request, Testimonial $testimoni)
    {
        $data = $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Jika ada foto baru → upload & hapus foto lama
        if ($request->hasFile('foto')) {

            // Upload baru
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/testimoni'), $namaFile);

            // HAPUS foto lama
            if ($testimoni->foto && file_exists(public_path($testimoni->foto))) {
                @unlink(public_path($testimoni->foto));
            }

            $data['foto'] = 'uploads/testimoni/' . $namaFile;
        }

        $testimoni->update($data);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }

    // ===============================
    // HAPUS DATA
    // ===============================
    public function destroy(Testimonial $testimoni)
    {
        // Hapus foto dari server
        if ($testimoni->foto && file_exists(public_path($testimoni->foto))) {
            @unlink(public_path($testimoni->foto));
        }

        // Hapus row
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
