{{-- resources/views/admin/iphone/index.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER + TOMBOL TAMBAH --}}
<div class="flex justify-between items-center mb-8"
     data-aos="fade-down" data-aos-duration="700">
    <h1 class="text-2xl font-bold text-gray-800">
        Kelola Data iPhone
    </h1>

    <a href="{{ route('admin.iphone.create') }}"
       class="bg-black hover:bg-gray-800 text-white px-6 py-2.5 rounded-full font-semibold shadow-md
              text-sm md:text-base
              transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg"
       data-aos="zoom-in" data-aos-duration="700">
        + Tambah Produk
    </a>
</div>

{{-- PESAN SUKSES --}}
@if(session('success'))
    <div class="mb-4 p-4 bg-gray-100 border border-gray-300 text-gray-800 rounded-xl text-sm shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        {{ session('success') }}
    </div>
@endif

{{-- FILTER --}}
<form method="GET"
      action="{{ route('admin.iphone.index') }}"
      class="mb-6 bg-white rounded-2xl shadow-xl p-4 flex flex-col md:flex-row gap-4 md:items-end"
      data-aos="fade-up" data-aos-duration="700">

    {{-- FILTER TIPE --}}
    <div class="w-full md:w-1/4">
        <label class="block text-xs font-semibold mb-1 text-gray-700">Filter Tipe</label>
        <select name="tipe"
                class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-black focus:border-black transition">
            <option value="all" {{ ($filterTipe ?? 'all') === 'all' ? 'selected' : '' }}>Semua Tipe</option>
            <option value="exibox" {{ ($filterTipe ?? '') === 'exibox' ? 'selected' : '' }}>Ex Ibox</option>
            <option value="wifionly" {{ ($filterTipe ?? '') === 'wifionly' ? 'selected' : '' }}>Wifi Only</option>
            <option value="beacukai" {{ ($filterTipe ?? '') === 'beacukai' ? 'selected' : '' }}>Bea Cukai</option>
            <option value="accessories" {{ ($filterTipe ?? '') === 'accessories' ? 'selected' : '' }}>Accessories</option>
        </select>
    </div>

    {{-- SEARCH --}}
    <div class="w-full md:w-1/3">
        <label class="block text-xs font-semibold mb-1 text-gray-700">Cari Nama iPhone</label>
        <input type="text" name="search" value="{{ $search ?? '' }}"
               placeholder="Contoh: iPhone 13 Pro Max"
               class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-black focus:border-black transition">
    </div>

    {{-- SORT --}}
    <div class="w-full md:w-1/4">
        <label class="block text-xs font-semibold mb-1 text-gray-700">Urutkan Harga</label>
        <select name="sort_harga"
                class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-black focus:border-black transition">
            <option value="" {{ ($sortHarga ?? '') === '' ? 'selected' : '' }}>Default (Terbaru)</option>
            <option value="termurah" {{ ($sortHarga ?? '') === 'termurah' ? 'selected' : '' }}>Termurah ↑</option>
            <option value="termahal" {{ ($sortHarga ?? '') === 'termahal' ? 'selected' : '' }}>Termahal ↓</option>
        </select>
    </div>

    {{-- TOMBOL --}}
    <div class="flex gap-2 w-full md:w-auto">
        <button type="submit"
                class="flex-1 md:flex-none bg-black hover:bg-gray-800 text-white px-6 py-2.5 rounded-full
                       text-sm md:text-base font-semibold shadow-md transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg">
            Terapkan
        </button>

        <a href="{{ route('admin.iphone.index') }}"
           class="flex-1 md:flex-none border border-gray-400 text-gray-800 px-6 py-2.5 rounded-full text-sm md:text-base font-semibold hover:bg-gray-100 text-center
                  transition-all duration-300 hover:-translate-y-[2px]">
            Reset
        </a>
    </div>
</form>

{{-- TABEL --}}
<div class="bg-white shadow-xl rounded-2xl overflow-hidden"
     data-aos="fade-up" data-aos-duration="700">

    <table class="w-full text-left text-sm">
        <thead class="bg-black text-white">
            <tr>
                <th class="px-4 py-3">Gambar</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Tipe</th>
                <th class="px-4 py-3">Harga</th>
                <th class="px-4 py-3">Stok</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($iphones as $iphone)
                <tr class="border-b hover:bg-gray-50 transition-all duration-300">

                    {{-- GAMBAR --}}
                    <td class="px-4 py-3">
                        @if($iphone->gambar)
                            <div class="w-16 h-16 overflow-hidden rounded-lg bg-gray-100 border shadow-sm">
                                <img src="{{ asset($iphone->gambar) }}"
                                     class="w-full h-full object-contain transition-transform duration-300 hover:scale-105">
                            </div>
                        @else
                            <div class="w-16 h-16 flex items-center justify-center rounded-lg bg-gray-100 border text-[11px] text-gray-500">
                                Tidak ada<br>gambar
                            </div>
                        @endif
                    </td>

                    {{-- NAMA --}}
                    <td class="px-4 py-3 font-semibold text-gray-800">
                        {{ $iphone->nama }}
                    </td>

                    {{-- TIPE --}}
                    <td class="px-4 py-3">
                        @php
                            $labelTipe = match($iphone->tipe) {
                                'exibox'      => 'Ex Ibox',
                                'wifionly'    => 'Wifi Only',
                                'beacukai'    => 'Bea Cukai',
                                'accessories' => 'Accessories',
                                default       => ucfirst($iphone->tipe),
                            };
                        @endphp

                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                     bg-gray-900 text-white border border-gray-700">
                            {{ $labelTipe }}
                        </span>
                    </td>

                    {{-- HARGA --}}
                    <td class="px-4 py-3 text-gray-800 font-semibold">
                        Rp {{ number_format($iphone->harga, 0, ',', '.') }}
                    </td>

                    {{-- STOK --}}
                    <td class="px-4 py-3 text-gray-700">
                        {{ $iphone->stok ?? 0 }}
                    </td>

                    {{-- AKSI --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-center gap-3">

                            {{-- EDIT → Abu Elegan --}}
                            <a href="{{ route('admin.iphone.edit', $iphone->id) }}"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-900 px-5 py-2 rounded-full
                                      text-sm font-semibold shadow-md transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg">
                                Edit
                            </a>

                            {{-- HAPUS → Merah Premium --}}
                            <form action="{{ route('admin.iphone.destroy', $iphone->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full
                                               text-sm font-semibold shadow-md transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- PAGINASI --}}
<div class="mt-6" data-aos="fade-up" data-aos-duration="700">
    {{ $iphones->appends(request()->query())->links() }}
</div>

@endsection
