{{-- resources/views/allproduk.blade.php --}}
@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-14">

    @php
        // ambil kata kunci dari query string
        $q = request('q');
    @endphp

    {{-- JUDUL DINAMIS --}}
    <h2 class="text-2xl font-bold text-center mb-4 animate-fade-up">
        @if($q)
            Hasil Pencarian
        @else
            All Produk
        @endif
    </h2>

    {{-- SUB-JUDUL KETIKA ADA PENCARIAN --}}
    @if($q)
        <p class="text-center text-gray-600 mb-8 animate-fade-up">
            Hasil pencarian untuk: <span class="font-semibold">"{{ $q }}"</span>
        </p>
    @else
        {{-- kalau tidak mencari, beri jarak seperti dulu --}}
        <div class="mb-4"></div>
    @endif

    @if($products->isEmpty())
        <p class="text-center text-gray-500 animate-fade-up">
            Belum ada produk.
        </p>
    @else

        {{-- GRID 3 PRODUK KECIL --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-4">
            @foreach ($products as $produk)

                <div
                    class="product-card bg-white shadow-md rounded-3xl p-6 flex flex-col
                           animate-fade-up transition-transform duration-300
                           hover:-translate-y-1 hover:shadow-2xl">

                    {{-- GAMBAR --}}
                    <div class="w-full mb-5 flex justify-center">
                        <div class="bg-gray-50 rounded-3xl border border-gray-200 p-4 w-full">
                            <img src="{{ asset($produk->gambar) }}"
                                 alt="{{ $produk->nama }}"
                                 class="w-full h-48 md:h-56 object-contain rounded-2xl mx-auto
                                        transition-transform duration-300 hover:scale-105">
                        </div>
                    </div>

                    {{-- NAMA --}}
                    <h3 class="font-bold text-lg md:text-xl mb-2 text-gray-900 text-center">
                        {{ $produk->nama }}
                    </h3>

                    {{-- BADGE (LOGIKA TIDAK DIUBAH) --}}
                    @php
                        $label = match($produk->tipe) {
                            'exibox'      => 'Ex iBox',
                            'wifionly'    => 'WiFi Only',
                            'beacukai'    => 'Bea Cukai',
                            'accessories' => 'Accessories',
                            default       => ucfirst($produk->tipe),
                        };
                    @endphp

                    @if(!empty($produk->tipe))
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                     bg-blue-50 text-blue-700 border border-blue-100 mb-3 mx-auto">
                            {{ $label }}
                        </span>
                    @endif

                    {{-- KAPASITAS --}}
                    @if($produk->kapasitas)
                        <p class="text-sm text-gray-700 text-center">
                            Kapasitas: {{ $produk->kapasitas }}
                        </p>
                    @endif

                    {{-- WARNA --}}
                    @if($produk->warna)
                        <p class="text-sm text-gray-700 text-center">
                            Warna: {{ $produk->warna }}
                        </p>
                    @endif

                    {{-- ASAL / KONDISI --}}
                    @if($produk->asal)
                        <p class="text-sm text-gray-700 text-center">
                            Kondisi: {{ $produk->asal }}
                        </p>
                    @endif

                    {{-- HARGA --}}
                    <p class="text-sm md:text-base text-gray-900 font-semibold mt-3 mb-4 text-center">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>

                    {{-- TOMBOL DETAIL --}}
                    <div class="text-center mt-auto">
                        <a href="{{ $produk->tipe === 'accessories'
                                    ? route('accessories.show', $produk->id)
                                    : route('produk.show', $produk->id) }}"
                           class="inline-flex items-center px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-full
                                  hover:bg-blue-700 transition shadow">
                            Lihat rincian
                        </a>
                    </div>

                </div>

            @endforeach
        </div>

    @endif

</section>

{{-- ANIMASI JS: fade + slide + stagger saat scroll --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.product-card');

        if (!cards.length) return;

        // fallback kalau browser lama tidak support IntersectionObserver
        if (!('IntersectionObserver' in window)) {
            cards.forEach(card => {
                card.classList.add('card-visible');
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            });
            return;
        }

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('card-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.18
        });

        cards.forEach((card, index) => {
            // sedikit delay antar card agar terasa stagger
            card.style.transitionDelay = (index * 80) + 'ms';
            observer.observe(card);
        });
    });
</script>

<style>
    /* State awal: sedikit turun + transparan */
    .product-card {
        opacity: 0;
        transform: translateY(18px);
        will-change: transform, opacity;
    }

    /* Saat muncul di viewport */
    .product-card.card-visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

@endsection
