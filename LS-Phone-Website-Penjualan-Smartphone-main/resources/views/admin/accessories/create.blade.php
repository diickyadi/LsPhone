@extends('admin.layout')

@section('content')

{{-- HEADER --}}
<div class="mb-8 flex items-center justify-between"
     data-aos="fade-down" data-aos-duration="700">

    <h1 class="text-2xl font-bold text-gray-900">Tambah Aksesoris</h1>

    <a href="{{ route('admin.accessories.index') }}"
       class="px-6 py-2.5 rounded-full bg-gray-100 hover:bg-gray-200 
              text-gray-800 text-sm md:text-base font-semibold shadow-sm 
              hover:shadow-md transition-all duration-300 hover:-translate-y-[2px]">
        Kembali
    </a>

</div>

{{-- ERROR --}}
@if ($errors->any())
    <div class="mb-6 px-4 py-3 rounded-xl border border-red-300 
                bg-red-50 text-red-800 text-sm shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- CARD FORM --}}
<div class="bg-white border border-gray-200 shadow-xl rounded-2xl p-6 md:p-8 max-w-xl"
     data-aos="fade-up" data-aos-duration="700">

    <form action="{{ route('admin.accessories.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf

        {{-- NAMA --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Nama Aksesoris
            </label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                       focus:ring-gray-800 focus:border-gray-900 transition">
        </div>

        {{-- JENIS --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Jenis
            </label>
            <select name="jenis"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                       focus:ring-gray-800 focus:border-gray-900 transition">

                <option value="">-- Pilih Jenis Aksesoris --</option>
                <option value="Case"           {{ old('jenis') == 'Case' ? 'selected' : '' }}>Case / Softcase / Hardcase</option>
                <option value="Tempered Glass" {{ old('jenis') == 'Tempered Glass' ? 'selected' : '' }}>Tempered Glass</option>
                <option value="Charger"        {{ old('jenis') == 'Charger' ? 'selected' : '' }}>Charger / Adapter</option>
                <option value="Kabel Data"     {{ old('jenis') == 'Kabel Data' ? 'selected' : '' }}>Kabel Data</option>
                <option value="Headset"        {{ old('jenis') == 'Headset' ? 'selected' : '' }}>Headset / EarPods</option>
                <option value="Lainnya"        {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>

            </select>
        </div>

        {{-- KETERANGAN --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Keterangan
            </label>
            <textarea name="keterangan" rows="4"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                       focus:ring-gray-800 focus:border-gray-900 transition"
                placeholder="Tuliskan detail aksesoris…">{{ old('keterangan') }}</textarea>
        </div>

        {{-- HARGA & STOK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Harga (Rp)
                </label>
                <input type="number" name="harga" value="{{ old('harga') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                           focus:ring-gray-800 focus:border-gray-900 transition">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Stok
                </label>
                <input type="number" name="stok" value="{{ old('stok') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                           focus:ring-gray-800 focus:border-gray-900 transition">
            </div>
        </div>

        {{-- GAMBAR --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Gambar Aksesoris
            </label>

            <input type="file" name="gambar" accept="image/png,image/jpeg,image/jpg,image/webp"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white
                       focus:ring-gray-800 focus:border-gray-900 transition">

            <p class="text-xs text-gray-500 mt-1">
                Format: JPG, JPEG, PNG, WEBP — Maks 2MB.
            </p>
        </div>

        {{-- TOMBOL SIMPAN (Tambah = Hitam elegan) --}}
        <button type="submit"
            class="w-full bg-black hover:bg-gray-900 text-white py-2.5 rounded-full 
                   font-semibold text-sm md:text-base shadow-md hover:shadow-lg
                   transition-all duration-300 hover:-translate-y-[2px]">
            Simpan Aksesoris
        </button>

    </form>
</div>

@endsection
