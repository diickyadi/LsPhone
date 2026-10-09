<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminAboutController extends Controller
{
    public function edit()
    {
        // ambil baris pertama (kalau belum ada, nanti di form dianggap kosong)
        $about = AboutSection::first();

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:191',
            'subjudul' => 'nullable|string|max:191',
            'poin1'    => 'nullable|string|max:255',
            'poin2'    => 'nullable|string|max:255',
            'poin3'    => 'nullable|string|max:255',
            'poin4'    => 'nullable|string|max:255',
            'poin5'    => 'nullable|string|max:255',
            'poin6'    => 'nullable|string|max:255',
            'poin7'    => 'nullable|string|max:255',
            'poin8'    => 'nullable|string|max:255',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $about = AboutSection::first() ?? new AboutSection();

        // handle upload foto
        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($about->foto && File::exists(public_path($about->foto))) {
                File::delete(public_path($about->foto));
            }

            $file   = $request->file('foto');
            $name   = time() . '_' . $file->getClientOriginalName();
            $path   = 'images/about/' . $name;
            $target = public_path('images/about');

            if (! File::isDirectory($target)) {
                File::makeDirectory($target, 0755, true);
            }

            $file->move($target, $name);

            $about->foto = $path;
        }

        // isi field lain
        $about->judul    = $data['judul'];
        $about->subjudul = $data['subjudul'] ?? null;
        $about->poin1    = $data['poin1'] ?? null;
        $about->poin2    = $data['poin2'] ?? null;
        $about->poin3    = $data['poin3'] ?? null;
        $about->poin4    = $data['poin4'] ?? null;
        $about->poin5    = $data['poin5'] ?? null;
        $about->poin6    = $data['poin6'] ?? null;
        $about->poin7    = $data['poin7'] ?? null;
        $about->poin8    = $data['poin8'] ?? null;

        $about->save();

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'Tentang Kami berhasil diperbarui.');
    }
}
