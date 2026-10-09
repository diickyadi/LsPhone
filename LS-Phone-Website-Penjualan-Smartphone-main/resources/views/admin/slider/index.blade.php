{{-- resources/views/admin/slider/index.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER + TOMBOL TAMBAH --}}
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-8"
     data-aos="fade-down" data-aos-duration="700">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            Kelola Slider
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Atur gambar slider yang tampil di halaman utama LS Phone.
        </p>
    </div>

    {{-- Tombol Tambah Slider (tema: hitam elegan) --}}
    <a href="{{ route('admin.slider.create') }}"
       class="px-7 py-3 bg-black hover:bg-gray-900 text-white rounded-full font-semibold shadow-md 
              text-sm md:text-base
              inline-flex items-center justify-center gap-2
              transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg"
       data-aos="zoom-in" data-aos-duration="700">
        <span class="text-lg leading-none">+</span>
        <span>Tambah Slider</span>
    </a>
</div>

{{-- PESAN SUKSES --}}
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-xl shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        {{ session('success') }}
    </div>
@endif

{{-- TABEL SLIDER --}}
<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100"
     data-aos="fade-up" data-aos-duration="700">

    {{-- HEADER KECIL DI ATAS TABEL --}}
    <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between bg-gray-50">
        <p class="text-sm font-semibold text-gray-700">
            Daftar Slider Aktif
        </p>
        <p class="text-xs text-gray-400">
            Total: {{ $sliders->count() }} item
        </p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            {{-- THEAD: hitam elegan --}}
            <thead class="bg-black text-white">
                <tr>
                    <th class="px-4 py-3">Urutan</th>
                    <th class="px-4 py-3">Preview</th>
                    <th class="px-4 py-3">Path Gambar</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse($sliders as $slider)
                <tr class="border-b hover:bg-gray-50 transition-all duration-300"
                    data-aos="fade-up" data-aos-duration="650">

                    {{-- KOLOM URUTAN --}}
                    <td class="px-4 py-3 font-bold text-center text-gray-800 align-middle">
                        {{ $slider->urutan ?? '-' }}
                    </td>

                    {{-- PREVIEW GAMBAR --}}
                    <td class="px-4 py-3 align-middle">
                        <div class="w-32 h-20 overflow-hidden rounded-lg border bg-gray-100 shadow-sm">
                            <img src="{{ asset($slider->gambar) }}"
                                 class="w-full h-full object-cover transition duration-300 hover:scale-110">
                        </div>
                    </td>

                    {{-- PATH GAMBAR --}}
                    <td class="px-4 py-3 align-middle">
                        <div class="max-w-md">
                            <p class="text-gray-800 text-sm font-medium truncate">
                                {{ $slider->gambar }}
                            </p>
                            <p class="text-xs text-gray-400 mt-0.5">
                                Disimpan di folder publik.
                            </p>
                        </div>
                    </td>

                    {{-- AKSI --}}
                    <td class="px-4 py-3 align-middle">
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-4">

                            {{-- Edit → Abu terang classy --}}
                            <a href="{{ route('admin.slider.edit', $slider->id) }}"
                               class="px-7 py-2 bg-gray-200 hover:bg-gray-300 text-gray-900 rounded-full text-sm font-semibold 
                                      shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-[3px] text-center">
                                Edit
                            </a>

                            {{-- Hapus → Merah deep premium --}}
                            <form action="{{ route('admin.slider.destroy', $slider->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus slider ini?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="px-7 py-2 bg-red-600 hover:bg-red-700 text-white rounded-full text-sm font-semibold 
                                               shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-[3px]">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-8 text-gray-500 text-sm"
                        data-aos="fade-up" data-aos-duration="600">
                        Belum ada data slider.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
