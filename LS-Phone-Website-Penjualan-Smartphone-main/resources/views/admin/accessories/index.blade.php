{{-- resources/views/admin/accessories/index.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER + TOMBOL TAMBAH --}}
<div class="flex justify-between items-center mb-8"
     data-aos="fade-down" data-aos-duration="700">
    <h1 class="text-2xl font-bold text-gray-800">
        Kelola Data Aksesoris
    </h1>

    {{-- Tambah Produk → Hitam elegan --}}
    <a href="{{ route('admin.accessories.create') }}"
       class="px-7 py-3 bg-black hover:bg-gray-900 text-white rounded-full font-semibold shadow-md text-sm
              transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg">
        + Tambah Aksesoris
    </a>
</div>

{{-- PESAN SUKSES --}}
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-xl text-sm shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        {{ session('success') }}
    </div>
@endif

{{-- TABEL AKSESORIS --}}
<div class="bg-white shadow-xl rounded-2xl overflow-hidden"
     data-aos="fade-up" data-aos-duration="700">

    <table class="w-full text-left text-sm">
        <thead class="bg-black text-white"> {{-- Hitam elegan selaras --}}
            <tr>
                <th class="px-4 py-3">Gambar</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Jenis</th>
                <th class="px-4 py-3">Harga</th>
                <th class="px-4 py-3">Stok</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($accessories as $item)
            <tr class="border-b hover:bg-gray-50 transition-all duration-300"
                data-aos="fade-up" data-aos-duration="650" data-aos-once="true">

                {{-- GAMBAR --}}
                <td class="px-4 py-3">
                    @if($item->gambar)
                        <div class="w-16 h-16 overflow-hidden rounded-lg border bg-gray-100 shadow-sm">
                            <img src="{{ asset($item->gambar) }}"
                                 class="w-full h-full object-contain transition duration-300 hover:scale-110">
                        </div>
                    @else
                        <div class="w-16 h-16 flex items-center justify-center rounded-lg bg-gray-100 border text-[11px] text-gray-500">
                            Tidak ada<br>gambar
                        </div>
                    @endif
                </td>

                {{-- NAMA --}}
                <td class="px-4 py-3 font-semibold text-gray-800 align-top">
                    {{ $item->nama }}
                </td>

                {{-- JENIS --}}
                <td class="px-4 py-3 text-gray-700 align-top">
                    {{ $item->jenis }}
                </td>

                {{-- HARGA --}}
                <td class="px-4 py-3 text-gray-800 font-semibold align-top">
                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                </td>

                {{-- STOK --}}
                <td class="px-4 py-3 text-gray-700 align-top">
                    {{ $item->stok }}
                </td>

                {{-- AKSI --}}
                <td class="px-4 py-3 align-top">
                    <div class="flex items-center justify-center gap-4">

                        {{-- Edit → Abu terang classy --}}
                        <a href="{{ route('admin.accessories.edit', $item->id) }}"
                           class="px-7 py-2 bg-gray-200 hover:bg-gray-300 text-gray-900 rounded-full text-sm font-semibold shadow-md
                                  hover:shadow-lg transition-all duration-300 hover:-translate-y-[3px]">
                            Edit
                        </a>

                        {{-- Hapus → Merah deep premium --}}
                        <form action="{{ route('admin.accessories.destroy', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus aksesoris ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-7 py-2 bg-red-600 hover:bg-red-700 text-white rounded-full text-sm font-semibold shadow-md
                                           hover:shadow-lg transition-all duration-300 hover:-translate-y-[3px]">
                                Hapus
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-6 text-gray-500"
                    data-aos="fade-up" data-aos-duration="600">
                    Belum ada data aksesoris.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

{{-- PAGINASI --}}
<div class="mt-6" data-aos="fade-up" data-aos-duration="700">
    {{ $accessories->links() }}
</div>

@endsection
