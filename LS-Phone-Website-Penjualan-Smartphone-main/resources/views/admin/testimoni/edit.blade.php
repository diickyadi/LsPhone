@extends('admin.layout')

@section('content')

{{-- HEADER + BUTTON KEMBALI (ABU TERANG CLASSY) --}}
<div class="mb-8 flex items-center justify-between"
     data-aos="fade-down" data-aos-duration="700">

    <h1 class="text-2xl font-bold text-gray-900">Edit Testimoni</h1>

    <a href="{{ route('admin.testimoni.index') }}"
       class="px-7 py-2.5 rounded-full bg-gray-200 hover:bg-gray-300
              text-gray-900 text-sm md:text-base font-semibold shadow-md
              transition-all duration-300 hover:-translate-y-[2px] hover:shadow-lg">
        Kembali
    </a>
</div>

{{-- ERROR --}}
@if($errors->any())
    <div class="mb-4 p-4 bg-red-50 border border-red-300 text-red-800 rounded-xl shadow-sm"
         data-aos="fade-right" data-aos-duration="600">
        <ul class="list-disc list-inside text-sm space-y-1">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- CARD FORM --}}
<div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-200 max-w-xl"
     data-aos="fade-up" data-aos-duration="700">

    <form action="{{ route('admin.testimoni.update', $testimoni->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- FOTO SEKARANG --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Foto Sekarang</label>

            <div class="w-32 h-32 rounded-xl overflow-hidden border border-gray-200 bg-gray-100 shadow-sm mb-3">
                <img src="{{ asset($testimoni->foto) }}"
                     class="w-full h-full object-cover">
            </div>

            {{-- INPUT GANTI --}}
            <label class="block font-semibold mb-1 text-gray-700">Ganti Foto (opsional)</label>
            <input type="file" name="foto"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white text-sm
                          focus:ring-gray-400 focus:border-gray-400 transition">
            <p class="text-xs text-gray-500 mt-1">
                Kosongkan jika tidak ingin mengganti foto.
            </p>
        </div>

        {{-- BUTTONS --}}
        <div class="flex gap-4 mt-6">

            {{-- BATAL → Abu terang classy --}}
            <a href="{{ route('admin.testimoni.index') }}"
               class="px-6 py-2.5 rounded-full bg-gray-200 hover:bg-gray-300
                      text-gray-900 shadow-sm text-sm md:text-base font-semibold
                      transition-all duration-300 hover:-translate-y-[2px]">
                Batal
            </a>

            {{-- UPDATE → Hitam elegan --}}
            <button type="submit"
                    class="px-6 py-2.5 rounded-full bg-black hover:bg-gray-900
                           text-white shadow-md text-sm md:text-base font-semibold
                           transition-all duration-300 hover:-translate-y-[2px] hover:shadow-lg">
                Update
            </button>

        </div>

    </form>
</div>

@endsection
