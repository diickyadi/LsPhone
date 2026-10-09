@extends('admin.layout')

@section('content')

{{-- HEADER + BUTTON KEMBALI (SAMA SEPERTI HALAMAN LAIN) --}}
<div class="mb-8 flex items-center justify-between"
     data-aos="fade-down" data-aos-duration="700">
    <h1 class="text-2xl font-bold text-gray-900">
        Tambah Slider
    </h1>

    {{-- BUTTON KEMBALI – PIL BULAT BESAR ABU --}}
    <a href="{{ route('admin.slider.index') }}"
       class="px-7 py-3 bg-gray-100 hover:bg-gray-200 text-gray-900 rounded-full
              text-sm font-semibold shadow-md transition-all duration-300
              hover:-translate-y-[3px] hover:shadow-lg">
        Kembali
    </a>
</div>

{{-- ERROR VALIDATION --}}
@if ($errors->any())
    <div class="mb-6 px-4 py-3 rounded-xl border border-red-200 bg-red-50 text-red-800 text-sm shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- CARD FORM SLIDER --}}
<div class="bg-white border border-gray-200 shadow-md rounded-2xl p-6 max-w-lg"
     data-aos="fade-up" data-aos-duration="700">
    <form action="{{ route('admin.slider.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        {{-- INPUT URUTAN --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Urutan Slider
            </label>
            <input type="number"
                   name="urutan"
                   value="{{ old('urutan') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                          focus:ring-gray-500 focus:border-gray-600"
                   placeholder="Contoh: 1 untuk slider pertama">

            <p class="text-xs text-gray-500 mt-1">
                Urutan menentukan posisi slider di homepage. Biarkan kosong jika tidak ingin mengatur.
            </p>
        </div>

        {{-- INPUT GAMBAR --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Gambar Slider
            </label>

            <input type="file"
                   name="gambar"
                   accept="image/png, image/jpeg, image/jpg, image/webp"
                   class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white
                          focus:ring-gray-500 focus:border-gray-600">

            <p class="text-xs text-gray-500 mt-1">
                Format: JPG, JPEG, PNG, WEBP — Maks 2MB
            </p>
        </div>

        {{-- BUTTON SIMPAN – Tambah → Hitam elegan --}}
        <button type="submit"
                class="w-full bg-black hover:bg-gray-900 text-white py-2.5 rounded-full
                       font-semibold shadow-md transition-all duration-300 hover:-translate-y-[2px] hover:shadow-lg">
            Simpan Slider
        </button>

    </form>
</div>

@endsection
