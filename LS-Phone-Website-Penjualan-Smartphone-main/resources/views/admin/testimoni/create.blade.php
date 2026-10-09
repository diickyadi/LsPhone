{{-- resources/views/admin/testimoni/create.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER + BUTTON KEMBALI (STYLE SERAGAM) --}}
<div class="mb-8 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-900">Tambah Testimoni</h1>

    <a href="{{ route('admin.testimoni.index') }}"
       class="px-7 py-2.5 rounded-full bg-gray-100 hover:bg-gray-200
              text-gray-900 text-sm md:text-base font-semibold shadow-md
              transition-all duration-300 hover:-translate-y-[2px]">
        Kembali
    </a>
</div>

{{-- ERROR VALIDATION --}}
@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-xl shadow-sm">
        <ul class="list-disc list-inside text-sm">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- FORM WRAPPER --}}
<div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-200 max-w-xl">

    <form action="{{ route('admin.testimoni.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        {{-- UPLOAD FOTO --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Foto Testimoni
            </label>

            <input type="file" name="foto" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white
                          text-sm focus:ring-blue-400 focus:border-blue-400 transition">

            <p class="text-xs text-gray-500 mt-1">
                Format: JPG, JPEG, PNG, WEBP — Maks 2MB
            </p>
        </div>

        {{-- BUTTONS --}}
        <div class="flex gap-4 mt-6">

            {{-- BATAL (Abu classy soft) --}}
            <a href="{{ route('admin.testimoni.index') }}"
               class="px-6 py-2.5 rounded-full border border-gray-300
                      text-gray-700 text-sm md:text-base font-semibold
                      hover:bg-gray-100 shadow-sm transition-all hover:-translate-y-[2px]">
                Batal
            </a>

            {{-- SIMPAN (Hitam elegan sesuai aturan Tambah) --}}
            <button type="submit"
                    class="px-6 py-2.5 rounded-full bg-black hover:bg-gray-900
                           text-white text-sm md:text-base font-semibold shadow-md
                           transition-all duration-300 hover:-translate-y-[2px] hover:shadow-lg">
                Simpan
            </button>

        </div>

    </form>

</div>

@endsection
