{{-- resources/views/admin/iphone/edit.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER + BUTTON KEMBALI --}}
<div class="mb-8 flex items-center justify-between"
     data-aos="fade-down" data-aos-duration="700">
    <h1 class="text-2xl font-bold text-gray-900">
        Edit Data iPhone
    </h1>

    {{-- Tombol Kembali – pill abu --}}
    <a href="{{ route('admin.iphone.index') }}"
       class="px-7 py-3 rounded-full bg-gray-100 hover:bg-gray-200
              text-gray-800 text-sm md:text-base font-semibold shadow-md
              transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg">
        Kembali
    </a>
</div>

{{-- ERROR VALIDATION --}}
@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-xl text-sm shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.iphone.update', $iphone->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="bg-white rounded-2xl shadow-xl p-8 max-w-3xl"
      data-aos="fade-up" data-aos-duration="700">
    @csrf
    @method('PUT')

    {{-- NAMA PRODUK --}}
    <div class="mb-5">
        <label class="block text-sm font-semibold mb-1 text-gray-700">Nama Produk</label>
        <input type="text" name="nama"
               value="{{ old('nama', $iphone->nama) }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                      focus:ring-1 focus:ring-black focus:border-black transition">
    </div>

    {{-- KAPASITAS & WARNA --}}
    <div id="kapasitas-warna-wrapper"
         class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div>
            <label class="block text-sm font-semibold mb-1 text-gray-700">Kapasitas</label>
            <input type="text" name="kapasitas"
                   value="{{ old('kapasitas', $iphone->kapasitas) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                          focus:ring-1 focus:ring-black focus:border-black transition">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1 text-gray-700">Warna</label>
            <input type="text" name="warna"
                   value="{{ old('warna', $iphone->warna) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                          focus:ring-1 focus:ring-black focus:border-black transition">
        </div>
    </div>

    {{-- JENIS AKSESORIS --}}
    <div id="jenis-aksesoris-wrapper" class="mb-5 hidden">
        <label class="block text-sm font-semibold mb-1 text-gray-700">Jenis Aksesoris</label>
        <select name="jenis_aksesoris"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                       focus:ring-1 focus:ring-black focus:border-black transition">
            <option value="">-- Pilih Jenis Aksesoris --</option>
            <option value="case" {{ old('jenis_aksesoris', $iphone->jenis_aksesoris ?? null) == 'case' ? 'selected' : '' }}>Case / Softcase / Hardcase</option>
            <option value="tempered_glass" {{ old('jenis_aksesoris', $iphone->jenis_aksesoris ?? null) == 'tempered_glass' ? 'selected' : '' }}>Tempered Glass</option>
            <option value="charger" {{ old('jenis_aksesoris', $iphone->jenis_aksesoris ?? null) == 'charger' ? 'selected' : '' }}>Charger / Adapter</option>
            <option value="kabel_data" {{ old('jenis_aksesoris', $iphone->jenis_aksesoris ?? null) == 'kabel_data' ? 'selected' : '' }}>Kabel Data</option>
            <option value="headset" {{ old('jenis_aksesoris', $iphone->jenis_aksesoris ?? null) == 'headset' ? 'selected' : '' }}>Headset / EarPods</option>
            <option value="lainnya" {{ old('jenis_aksesoris', $iphone->jenis_aksesoris ?? null) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
    </div>

    {{-- ASAL / KONDISI --}}
    <div class="mb-5">
        <label class="block text-sm font-semibold mb-1 text-gray-700">Asal / Kondisi</label>
        <input type="text" name="asal"
               value="{{ old('asal', $iphone->asal) }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                      focus:ring-1 focus:ring-black focus:border-black transition">
    </div>

    {{-- HARGA & STOK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div>
            <label class="block text-sm font-semibold mb-1 text-gray-700">Harga</label>
            <input type="number" name="harga"
                   value="{{ old('harga', $iphone->harga) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                          focus:ring-1 focus:ring-black focus:border-black transition">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1 text-gray-700">Stok</label>
            <input type="number" name="stok"
                   value="{{ old('stok', $iphone->stok) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                          focus:ring-1 focus:ring-black focus:border-black transition">
        </div>
    </div>

    {{-- DESKRIPSI LENGKAP --}}
    <div class="mb-5">
        <label class="block text-sm font-semibold mb-1 text-gray-700">Deskripsi Lengkap</label>
        <textarea name="deskripsi_lengkap" rows="5"
                  class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                         focus:ring-1 focus:ring-black focus:border-black transition">{{ old('deskripsi_lengkap', $iphone->deskripsi_lengkap) }}</textarea>
    </div>

    {{-- TIPE PRODUK --}}
    <div class="mb-5">
        <label class="block text-sm font-semibold mb-1 text-gray-700">Tipe</label>
        <select name="tipe" id="tipe-produk"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm 
                       focus:ring-1 focus:ring-black focus:border-black transition">
            <option value="exibox"      {{ old('tipe', $iphone->tipe) == 'exibox' ? 'selected' : '' }}>Ex Ibox</option>
            <option value="wifionly"    {{ old('tipe', $iphone->tipe) == 'wifionly' ? 'selected' : '' }}>Wifi Only</option>
            <option value="beacukai"    {{ old('tipe', $iphone->tipe) == 'beacukai' ? 'selected' : '' }}>Beacukai</option>
            <option value="accessories" {{ old('tipe', $iphone->tipe) == 'accessories' ? 'selected' : '' }}>Accessories</option>
        </select>
    </div>

    {{-- GAMBAR --}}
    <div class="mb-6">
        <label class="block text-sm font-semibold mb-1 text-gray-700">Gambar Saat Ini</label>

        @if($iphone->gambar)
            <div class="w-32 h-32 overflow-hidden rounded-lg border border-gray-200 mb-2 bg-gray-100 shadow-sm">
                <img src="{{ asset($iphone->gambar) }}"
                     class="w-full h-full object-cover transition duration-300 hover:scale-110">
            </div>
        @else
            <p class="text-xs text-gray-500 mb-2">Belum ada gambar.</p>
        @endif

        <label class="block text-sm font-semibold mb-1 mt-3 text-gray-700">Ganti Gambar (opsional)</label>
        <input type="file" name="gambar"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white 
                      focus:ring-1 focus:ring-black focus:border-black transition">
    </div>

    {{-- TOMBOL SIMPAN --}}
    <div class="flex justify-end">
        <button type="submit"
                class="px-7 py-2 bg-black hover:bg-gray-900 text-white rounded-full text-sm font-semibold 
                       shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-[3px]">
            Simpan Perubahan
        </button>
    </div>

</form>

{{-- SCRIPT: logika tampilan khusus tipe accessories (TIDAK DIUBAH) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tipeSelect       = document.getElementById('tipe-produk');
        var wrapperKapasitas = document.getElementById('kapasitas-warna-wrapper');
        var kapasitasInput   = document.querySelector('input[name="kapasitas"]');
        var warnaInput       = document.querySelector('input[name="warna"]');
        var jenisWrapper     = document.getElementById('jenis-aksesoris-wrapper');

        function syncFieldsWithTipe() {
            if (!tipeSelect) return;

            if (tipeSelect.value === 'accessories') {
                if (wrapperKapasitas) wrapperKapasitas.classList.add('hidden');
                if (kapasitasInput && !kapasitasInput.value) kapasitasInput.value = '-';
                if (warnaInput && !warnaInput.value)       warnaInput.value     = '-';
                if (jenisWrapper) jenisWrapper.classList.remove('hidden');
            } else {
                if (wrapperKapasitas) wrapperKapasitas.classList.remove('hidden');
                if (kapasitasInput && kapasitasInput.value === '-') kapasitasInput.value = '';
                if (warnaInput && warnaInput.value === '-')         warnaInput.value     = '';
                if (jenisWrapper) jenisWrapper.classList.add('hidden');
            }
        }

        if (tipeSelect) {
            tipeSelect.addEventListener('change', syncFieldsWithTipe);
            syncFieldsWithTipe();
        }
    });
</script>

@endsection
