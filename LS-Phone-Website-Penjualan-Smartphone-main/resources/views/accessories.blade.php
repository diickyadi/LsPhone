{{-- resources/views/accessories.blade.php --}}
@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-14">

    {{-- JUDUL --}}
    <h2 class="text-2xl font-bold text-center mb-12 animate-fade-up"
        data-aos="fade-up" data-aos-duration="800">
        Aksesoris & Pelengkap
    </h2>

    @php
        // Bisa terima dari controller sebagai $products ATAU $accessories
        $items = $products ?? $accessories ?? collect();
    @endphp

    @if($items->isEmpty())

        <p class="text-center text-gray-500 animate-fade-up"
           data-aos="fade-up" data-aos-duration="800" data-aos-delay="50">
            Belum ada aksesoris tersedia.
        </p>

    @else

        {{-- GRID 3 KECIL --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-4">
            @foreach ($items as $index => $item)
                <div
                    class="bg-white shadow-md rounded-3xl p-6 md:p-8 flex flex-col
                           animate-fade-up transition-transform duration-300
                           hover:-translate-y-1 hover:shadow-2xl"
                    data-aos="fade-up"
                    data-aos-duration="850"
                    data-aos-delay="{{ 100 + ($index % 3) * 120 }}"
                    data-aos-once="true">

                    {{-- GAMBAR --}}
                    <div class="w-full mb-5 flex justify-center">
                        <div class="bg-gray-50 rounded-3xl border border-gray-200 p-4 w-full">
                            <img src="{{ asset($item->gambar) }}"
                                 class="w-full h-48 md:h-56 object-contain rounded-2xl mx-auto
                                        transition-transform duration-300 hover:scale-105"
                                 alt="{{ $item->nama }}">
                        </div>
                    </div>

                    {{-- TEKS / INFO --}}
                    <div class="flex-1 flex flex-col items-center text-center">

                        {{-- NAMA --}}
                        <h3 class="font-bold text-lg md:text-xl mb-2 text-gray-900">
                            {{ $item->nama }}
                        </h3>

                        {{-- JENIS --}}
                        @if($item->jenis)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                         bg-blue-50 text-blue-700 border border-blue-100 mb-3">
                                {{ $item->jenis }}
                            </span>
                        @endif

                        {{-- HARGA --}}
                        <p class="text-sm md:text-base text-gray-900 font-semibold mt-1 mb-4">
                            Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>

                        {{-- TOMBOL LIHAT RINCIAN --}}
                        <a href="{{ route('accessories.show', $item->id) }}"
                           class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white rounded-full
                                  text-sm font-semibold hover:bg-blue-700 transition shadow mt-auto">
                            Lihat rincian
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

    @endif

</section>

@endsection
