@extends('admin.layout')

@section('content')

<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Edit Slider</h1>

    {{-- TOMBOL KEMBALI – pill abu classy --}}
    <a href="{{ route('admin.slider.index') }}"
       class="px-7 py-3 rounded-full bg-gray-100 hover:bg-gray-200 
              text-gray-800 font-semibold shadow-md transition text-center
              hover:-translate-y-[2px] hover:shadow-lg">
        Kembali
    </a>
</div>

{{-- ERROR MESSAGE --}}
@if ($errors->any())
    <div class="mb-6 px-4 py-3 rounded-xl border border-red-200 bg-red-50 text-red-800 text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6 max-w-lg">

    <form action="{{ route('admin.slider.update', $slider->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Gambar Saat Ini --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini</label>

            <div class="rounded-xl overflow-hidden border border-gray-200 bg-gray-100 shadow-sm">
                <img src="{{ asset($slider->gambar) }}"
                     class="w-full h-48 object-cover">
            </div>

            <p class="text-xs text-gray-500 mt-2">
                Biarkan kosong jika tidak ingin mengganti gambar.
            </p>
        </div>

        {{-- Ganti Gambar --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Ganti Gambar (opsional)
            </label>

            <input type="file"
                   name="gambar"
                   accept="image/png, image/jpeg, image/jpg, image/webp"
                   class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2
                          bg-white focus:ring-gray-400 focus:border-gray-500">

            <p class="text-xs text-gray-500 mt-1">
                Format: JPG, JPEG, PNG, WEBP — Maks 2MB
            </p>
        </div>

        {{-- Tombol Update (Hitam elegan, selaras tema utama) --}}
        <button type="submit"
                class="w-full bg-black hover:bg-gray-900 
                       text-white py-2.5 rounded-full font-semibold shadow-md transition
                       hover:-translate-y-[2px] hover:shadow-lg">
            Update Slider
        </button>

    </form>
</div>

@endsection
