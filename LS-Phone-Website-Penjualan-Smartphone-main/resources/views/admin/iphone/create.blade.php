{{-- resources/views/admin/iphone/create.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER + BUTTON KEMBALI --}}
<div class="mb-8 flex items-center justify-between"
     data-aos="fade-down" data-aos-duration="700">
    <h1 class="text-2xl font-bold text-gray-900">
        Tambah Produk iPhone
    </h1>

   <a href="{{ route('admin.iphone.index') }}"
       class="px-7 py-3 rounded-full bg-gray-200 hover:bg-gray-300
              text-gray-800 text-sm md:text-base font-semibold shadow-sm
              transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg">
        Kembali
    </a>
</div>

{{-- ERROR VALIDATION --}}
@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-xl shadow-md"
         data-aos="fade-right" data-aos-duration="600">
        <ul class="list-disc list-inside text-sm space-y-1">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-8 rounded-2xl shadow-xl max-w-3xl"
     data-aos="fade-up" data-aos-duration="700">
    <form action="{{ route('admin.iphone.store') }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf

        {{-- NAMA PRODUK --}}
        <div class="mb-5">
            <label class="block font-semibold mb-1 text-gray-800">Nama Produk</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                          focus:ring-black focus:border-black">
        </div>

        {{-- KAPASITAS & WARNA --}}
        <div id="kapasitas-warna-wrapper"
             class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

            <div>
                <label class="block font-semibold mb-1 text-gray-800">Kapasitas</label>
                <input type="text" name="kapasitas" value="{{ old('kapasitas') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                              focus:ring-black focus:border-black">
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-800">Warna</label>
                <input type="text" name="warna" value="{{ old('warna') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                              focus:ring-black focus:border-black">
            </div>

        </div>

        {{-- ASAL / KONDISI --}}
        <div class="mb-5">
            <label class="block font-semibold mb-1 text-gray-800">Asal / Kondisi</label>
            <input type="text" name="asal" value="{{ old('asal') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                          focus:ring-black focus:border-black">
        </div>

        {{-- GAMBAR --}}
        <div class="mb-5">
            <label class="block font-semibold mb-1 text-gray-800">Gambar Produk</label>

            <input type="file" name="gambar"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white
                          focus:ring-black focus:border-black">

            <p class="text-xs text-gray-500 mt-1">
                Format: JPG, JPEG, PNG, WEBP — Maks 2MB
            </p>
        </div>

        {{-- HARGA --}}
        <div class="mb-5">
            <label class="block font-semibold mb-1 text-gray-800">Harga (Rp)</label>
            <input type="number" name="harga" value="{{ old('harga') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                          focus:ring-black focus:border-black">
        </div>

        {{-- STOK --}}
        <div class="mb-5">
            <label class="block font-semibold mb-1 text-gray-800">Stok</label>
            <input type="number" name="stok" value="{{ old('stok') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                          focus:ring-black focus:border-black">
        </div>

        {{-- DESKRIPSI LENGKAP --}}
        <div class="mb-5">
            <label class="block font-semibold mb-1 text-gray-800">Deskripsi Lengkap</label>

            <textarea name="deskripsi_lengkap" rows="5"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                             focus:ring-black focus:border-black"
                      placeholder="Tuliskan deskripsi lengkap produk...">{{ old('deskripsi_lengkap') }}</textarea>
        </div>

        {{-- TIPE PRODUK --}}
        <div class="mb-8">
            <label class="block font-semibold mb-1 text-gray-800">Tipe Produk</label>

            <select name="tipe" id="tipe-produk"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                           focus:ring-black focus:border-black">
                <option value="exibox"   {{ old('tipe')=='exibox'   ? 'selected' : '' }}>Ex Ibox</option>
                <option value="wifionly" {{ old('tipe')=='wifionly' ? 'selected' : '' }}>Wifi Only</option>
                <option value="beacukai" {{ old('tipe')=='beacukai' ? 'selected' : '' }}>Bea Cukai</option>
            </select>
        </div>

        {{-- TOMBOL --}}
        <div class="flex gap-4">

            <a href="{{ route('admin.iphone.index') }}"
               class="px-6 py-2.5 rounded-full border border-gray-400 text-gray-700 text-sm md:text-base
                      font-semibold hover:bg-gray-100 shadow-sm
                      transition-all duration-300 hover:-translate-y-[2px]">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2.5 rounded-full bg-black hover:bg-gray-800 text-white text-sm md:text-base
                           font-semibold shadow-md transition-all duration-300 hover:-translate-y-[2px] hover:shadow-lg">
                Simpan Produk
            </button>
        </div>

    </form>
</div>

{{-- SCRIPT — LOGIKA TETAP SAMA --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipeSelect       = document.getElementById('tipe-produk');
        const wrapperKapasitas = document.getElementById('kapasitas-warna-wrapper');
        const kapasitasInput   = document.querySelector('input[name="kapasitas"]');
        const warnaInput       = document.querySelector('input[name="warna"]');

        const jenisWrapper = document.getElementById('jenis-aksesoris-wrapper');
        const jenisSelect  = document.querySelector('select[name="jenis_aksesoris"]');

        function syncFieldsWithTipe() {
            if (!tipeSelect || !wrapperKapasitas || !kapasitasInput || !warnaInput) return;

            if (tipeSelect.value === 'accessories' && jenisWrapper && jenisSelect) {
                wrapperKapasitas.classList.add('hidden');
                kapasitasInput.value = '-';
                warnaInput.value     = '-';
                jenisWrapper.classList.remove('hidden');
            } else {
                wrapperKapasitas.classList.remove('hidden');

                if (kapasitasInput.value === '-') kapasitasInput.value = '';
                if (warnaInput.value === '-')     warnaInput.value = '';

                if (jenisWrapper) {
                    jenisWrapper.classList.add('hidden');
                }
            }
        }

        tipeSelect.addEventListener('change', syncFieldsWithTipe);
        syncFieldsWithTipe();
    });
</script>

@endsection
