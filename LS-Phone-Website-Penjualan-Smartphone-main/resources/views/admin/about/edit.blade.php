{{-- resources/views/admin/about/edit.blade.php --}}
@extends('admin.layout')

@section('content')

<div class="mb-6" data-aos="fade-down">
    <h1 class="text-2xl font-bold text-gray-900">Kelola Tentang Kami</h1>
    <p class="text-gray-500 text-sm mt-1">
        Atur teks dan foto yang tampil di bagian Tentang Kami di halaman utama.
    </p>
</div>

@if(session('success'))
    <div class="mb-4 px-4 py-3 rounded-xl border border-green-200 bg-green-50 text-green-800 text-sm
                shadow-sm transform transition duration-300 hover:-translate-y-0.5 hover:shadow-md"
         data-aos="fade-right">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 px-4 py-3 rounded-xl border border-red-200 bg-red-50 text-red-800 text-sm
                shadow-sm transform transition duration-300 hover:-translate-y-0.5 hover:shadow-md"
         data-aos="fade-right">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 max-w-3xl
            transform transition duration-500 hover:-translate-y-1 hover:shadow-2xl"
     data-aos="fade-up" data-aos-delay="80">

    <form action="{{ route('admin.about.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-5">
        @csrf

        {{-- Judul --}}
        <div class="mb-2" data-aos="fade-up" data-aos-delay="120">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label>
            <input type="text" name="judul"
                   value="{{ old('judul', $about->judul ?? 'Tentang Kami') }}"
                   class="w-full border rounded-lg px-3 py-2 text-sm
                          focus:ring-gray-900 focus:border-gray-900
                          transition duration-200 focus:shadow-sm">
        </div>

        {{-- Subjudul --}}
        <div class="mb-2" data-aos="fade-up" data-aos-delay="150">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Subjudul (opsional)</label>
            <input type="text" name="subjudul"
                   value="{{ old('subjudul', $about->subjudul ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2 text-sm
                          focus:ring-gray-900 focus:border-gray-900
                          transition duration-200 focus:shadow-sm">
        </div>

        {{-- Foto --}}
        <div class="mb-4" data-aos="fade-up" data-aos-delay="180">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Foto / Ilustrasi</label>

            @if(!empty($about?->foto))
                <div class="mb-3">
                    <img src="{{ asset($about->foto) }}"
                         class="w-64 h-40 object-contain rounded-xl border bg-gray-50
                                shadow-sm transition duration-300 hover:shadow-md hover:-translate-y-0.5">
                </div>
            @endif

            <input type="file" name="foto"
                   accept="image/png,image/jpeg,image/jpg,image/webp"
                   class="w-full border rounded-lg px-3 py-2 text-sm bg-white
                          focus:ring-gray-900 focus:border-gray-900
                          transition duration-200 focus:shadow-sm">

            <p class="text-xs text-gray-500 mt-1">
                Biarkan kosong jika tidak ingin mengubah foto. Format: JPG, JPEG, PNG, WEBP (maks 2MB).
            </p>
        </div>

        {{-- Poin-poin benefit --}}
        <div class="grid md:grid-cols-2 gap-4 mb-4" data-aos="fade-up" data-aos-delay="210">
            @for($i = 1; $i <= 8; $i++)
                @php
                    $field = 'poin'.$i;
                @endphp
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-700">Poin {{ $i }}</label>
                    <input type="text" name="poin{{ $i }}"
                           value="{{ old('poin'.$i, $about->$field ?? '') }}"
                           class="w-full border rounded-lg px-3 py-2 text-xs
                                  focus:ring-gray-900 focus:border-gray-900
                                  transition duration-200 focus:shadow-sm"
                           placeholder="Isi jika ingin tampil sebagai poin {{ $i }}">
                </div>
            @endfor
        </div>

        <button type="submit"
                class="w-full bg-gray-900 hover:bg-black text-white py-2.5 rounded-full text-sm font-semibold shadow
                       transform transition duration-300 hover:-translate-y-0.5 hover:shadow-lg"
                data-aos="fade-up" data-aos-delay="240">
            Simpan Perubahan
        </button>
    </form>
</div>

@endsection
