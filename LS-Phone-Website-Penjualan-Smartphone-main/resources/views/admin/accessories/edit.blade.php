{{-- resources/views/admin/accessories/edit.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER --}}
<div class="flex justify-between items-center mb-8"
     data-aos="fade-down" data-aos-duration="700">
    <h1 class="text-2xl font-bold text-gray-900">Edit Aksesoris</h1>

    {{-- BUTTON KEMBALI – Abu terang classy --}}
    <a href="{{ route('admin.accessories.index') }}"
       class="px-7 py-2.5 rounded-full bg-gray-100 hover:bg-gray-200
              text-gray-900 text-sm md:text-base font-semibold shadow-md
              transition-all duration-300 hover:-translate-y-[2px] hover:shadow-lg">
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

{{-- CARD FORM --}}
<div class="bg-white border border-gray-200 shadow-xl rounded-2xl p-6 max-w-xl"
     data-aos="fade-up" data-aos-duration="700">
    <form action="{{ route('admin.accessories.update', $accessory->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- NAMA AKSESORIS --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Aksesoris</label>
            <input type="text" name="nama"
                   value="{{ old('nama', $accessory->nama) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                          focus:ring-gray-800 focus:border-gray-900 transition">
        </div>

        {{-- JENIS --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis</label>
            <select name="jenis"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                           focus:ring-gray-800 focus:border-gray-900 transition">
                <option value="">-- Pilih Jenis Aksesoris --</option>
                @php
                    $jenisList = ['Case', 'Tempered Glass', 'Charger', 'Kabel Data', 'Headset', 'Lainnya'];
                @endphp
                @foreach($jenisList as $jenis)
                    <option value="{{ $jenis }}" {{ old('jenis', $accessory->jenis) == $jenis ? 'selected' : '' }}>
                        {{ $jenis }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- KETERANGAN --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Keterangan</label>
            <textarea name="keterangan" rows="4"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                             focus:ring-gray-800 focus:border-gray-900 transition"
                      placeholder="Tuliskan detail aksesoris, kompatibilitas iPhone, material, dll.">{{ old('keterangan', $accessory->keterangan) }}</textarea>
        </div>

        {{-- HARGA & STOK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga"
                       value="{{ old('harga', $accessory->harga) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                              focus:ring-gray-800 focus:border-gray-900 transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                <input type="number" name="stok"
                       value="{{ old('stok', $accessory->stok) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                              focus:ring-gray-800 focus:border-gray-900 transition">
            </div>
        </div>

        {{-- GAMBAR --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar Saat Ini</label>

            @if($accessory->gambar)
                <div class="rounded-xl overflow-hidden border border-gray-200 bg-gray-100 shadow-sm mb-2">
                    <img src="{{ asset($accessory->gambar) }}"
                         class="w-full h-48 object-cover transition duration-300 hover:scale-105">
                </div>
            @else
                <p class="text-xs text-gray-400 mb-2">Belum ada gambar.</p>
            @endif

            <label class="block text-sm font-semibold text-gray-700 mb-1 mt-2">Ganti Gambar (opsional)</label>
            <input type="file"
                   name="gambar"
                   accept="image/png, image/jpeg, image/jpg, image/webp"
                   class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white 
                          focus:ring-gray-800 focus:border-gray-900 transition">
            <p class="text-xs text-gray-500 mt-1">
                Biarkan kosong jika tidak ingin mengganti gambar.
            </p>
        </div>

        {{-- TOMBOL SIMPAN – Hitam elegan --}}
        <button type="submit"
                class="w-full bg-black hover:bg-gray-900 text-white py-2.5 rounded-full font-semibold shadow-md
                       hover:shadow-lg transition-all duration-300 hover:-translate-y-[2px]">
            Simpan Perubahan
        </button>

    </form>
</div>

@endsection
