<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminSliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:51200', // 🔥 50MB
            'urutan' => 'nullable|integer|min:1',
        ]);

        $file   = $data['gambar'];
        $name   = time() . '_' . $file->getClientOriginalName();
        $path   = 'images/sliders/' . $name;
        $target = public_path('images/sliders');

        if (! File::isDirectory($target)) {
            File::makeDirectory($target, 0755, true);
        }

        $file->move($target, $name);

        Slider::create([
            'gambar' => $path,
            'urutan' => $data['urutan'] ?? null,
        ]);

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $data = $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:51200', // 🔥 50MB
            'urutan' => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('gambar')) {
            if ($slider->gambar && File::exists(public_path($slider->gambar))) {
                File::delete(public_path($slider->gambar));
            }

            $file   = $data['gambar'];
            $name   = time() . '_' . $file->getClientOriginalName();
            $path   = 'images/sliders/' . $name;
            $target = public_path('images/sliders');

            if (! File::isDirectory($target)) {
                File::makeDirectory($target, 0755, true);
            }

            $file->move($target, $name);

            $slider->gambar = $path;
        }

        if (array_key_exists('urutan', $data)) {
            $slider->urutan = $data['urutan'];
        }

        $slider->save();

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider berhasil diupdate.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->gambar && File::exists(public_path($slider->gambar))) {
            File::delete(public_path($slider->gambar));
        }

        $slider->delete();

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider berhasil dihapus.');
    }
}
