{{-- resources/views/admin/testimoni/index.blade.php --}}
@extends('admin.layout')

@section('content')

{{-- HEADER + TOMBOL TAMBAH --}}
<div class="flex justify-between items-center mb-8"
     data-aos="fade-down" data-aos-duration="700">

    <h1 class="text-2xl font-bold text-gray-900">
        Kelola Testimoni
    </h1>

    {{-- Tambah Testimoni → Hitam elegan --}}
    <a href="{{ route('admin.testimoni.create') }}"
       class="px-7 py-3 bg-black hover:bg-gray-900 text-white rounded-full font-semibold shadow-md 
              transition-all duration-300 hover:-translate-y-[3px] hover:shadow-lg"
       data-aos="zoom-in" data-aos-duration="700">
        + Tambah Testimoni
    </a>
</div>

{{-- PESAN SUKSES --}}
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-xl shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        {{ session('success') }}
    </div>
@endif

{{-- TABEL TESTIMONI --}}
<div class="bg-white shadow-xl rounded-2xl overflow-hidden"
     data-aos="fade-up" data-aos-duration="700">

    <table class="w-full text-left text-sm">
        {{-- Header tabel hitam elegan --}}
        <thead class="bg-black text-white">
            <tr>
                <th class="px-4 py-3">Foto</th>
                <th class="px-4 py-3">Tanggal Upload</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($testimonis as $t)
                <tr class="border-b hover:bg-gray-50 transition-all duration-300"
                    data-aos="fade-up" data-aos-duration="650">

                    {{-- FOTO --}}
                    <td class="px-4 py-3">
                        <div class="w-24 h-24 overflow-hidden rounded-lg border bg-gray-100 shadow-sm">
                            <img src="{{ asset($t->foto) }}"
                                 class="w-full h-full object-cover transition duration-300 hover:scale-110">
                        </div>
                    </td>

                    {{-- TANGGAL --}}
                    <td class="px-4 py-3 text-gray-700 font-medium">
                        {{ $t->created_at ? $t->created_at->format('d M Y • H:i') : '-' }}
                    </td>

                    {{-- AKSI --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-center gap-4">

                            {{-- Edit → Abu terang classy --}}
                            <a href="{{ route('admin.testimoni.edit', $t->id) }}"
                               class="px-7 py-2 bg-gray-200 hover:bg-gray-300 text-gray-900 rounded-full 
                                      text-sm font-semibold shadow-md hover:shadow-lg 
                                      transition-all duration-300 hover:-translate-y-[3px]">
                                Edit
                            </a>

                            {{-- Hapus → Merah deep premium --}}
                            <form action="{{ route('admin.testimoni.destroy', $t->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus testimoni ini?');">
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
                    <td colspan="3" class="text-center py-6 text-gray-500"
                        data-aos="fade-up" data-aos-duration="600">
                        Belum ada testimoni.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>

{{-- PAGINASI --}}
<div class="mt-6" data-aos="fade-up" data-aos-duration="700">
    {{ $testimonis->links() }}
</div>

@endsection
