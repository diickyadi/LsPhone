<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminAccessoriesController extends Controller
{
    public function index()
    {
        $accessories = Accessory::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.accessories.index', compact('accessories'));
    }

    public function create()
    {
        return view('admin.accessories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'       => 'required|string|max:255',
            'jenis'      => 'required|string|max:100',
            'keterangan' => 'nullable|string',
            'harga'      => 'required|integer|min:0',
            'stok'       => 'required|integer|min:0',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('gambar')) {
            $file   = $data['gambar'];
            $name   = time() . '_' . $file->getClientOriginalName();
            $path   = 'images/accessories/' . $name;
            $target = public_path('images/accessories');

            if (! File::isDirectory($target)) {
                File::makeDirectory($target, 0755, true);
            }

            $file->move($target, $name);
        }

        Accessory::create([
            'nama'       => $data['nama'],
            'jenis'      => $data['jenis'],
            'keterangan' => $data['keterangan'] ?? null,
            'harga'      => $data['harga'],
            'stok'       => $data['stok'],
            'gambar'     => $path,
        ]);

        return redirect()
            ->route('admin.accessories.index')
            ->with('success', 'Aksesoris berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $accessory = Accessory::findOrFail($id);

        return view('admin.accessories.edit', compact('accessory'));
    }

    public function update(Request $request, $id)
    {
        $accessory = Accessory::findOrFail($id);

        $data = $request->validate([
            'nama'       => 'required|string|max:255',
            'jenis'      => 'required|string|max:100',
            'keterangan' => 'nullable|string',
            'harga'      => 'required|integer|min:0',
            'stok'       => 'required|integer|min:0',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($accessory->gambar && File::exists(public_path($accessory->gambar))) {
                File::delete(public_path($accessory->gambar));
            }

            $file   = $data['gambar'];
            $name   = time() . '_' . $file->getClientOriginalName();
            $path   = 'images/accessories/' . $name;
            $target = public_path('images/accessories');

            if (! File::isDirectory($target)) {
                File::makeDirectory($target, 0755, true);
            }

            $file->move($target, $name);

            $accessory->gambar = $path;
        }

        $accessory->nama       = $data['nama'];
        $accessory->jenis      = $data['jenis'];
        $accessory->keterangan = $data['keterangan'] ?? null;
        $accessory->harga      = $data['harga'];
        $accessory->stok       = $data['stok'];

        $accessory->save();

        return redirect()
            ->route('admin.accessories.index')
            ->with('success', 'Aksesoris berhasil diupdate.');
    }

    public function destroy($id)
    {
        $accessory = Accessory::findOrFail($id);

        if ($accessory->gambar && File::exists(public_path($accessory->gambar))) {
            File::delete(public_path($accessory->gambar));
        }

        $accessory->delete();

        return redirect()
            ->route('admin.accessories.index')
            ->with('success', 'Aksesoris berhasil dihapus.');
    }
}
