{{-- resources/views/exibox.blade.php --}}
@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-14">

    {{-- JUDUL --}}
    <h2 class="text-2xl font-bold text-center mb-12 animate-fade-up">
        Katalog iPhone Ex iBox
    </h2>

    @if($products->isEmpty())

        <p class="text-center text-gray-500 animate-fade-up">
            Belum ada produk Ex iBox.
        </p>

    @else

        {{-- GRID PRODUK KECIL (SEMUA PRODUK) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-4">
            @foreach($products as $produk)
                <div
                    class="bg-white shadow-md rounded-3xl p-6 md:p-8 flex flex-col
                           animate-fade-up transition-transform duration-300 hover:-translate-y-1 hover:shadow-2xl
                           js-product-card">

                    {{-- GAMBAR --}}
                    <div class="w-full mb-5 flex justify-center">
                        <div class="bg-gray-50 rounded-3xl border border-gray-200 p-4 w-full">
                            <img src="{{ asset($produk->gambar) }}"
                                 class="w-full h-48 md:h-56 object-contain rounded-2xl mx-auto
                                        transition-transform duration-300 hover:scale-105"
                                 alt="{{ $produk->nama }}">
                        </div>
                    </div>

                    {{-- NAMA --}}
                    <h3 class="font-bold text-lg md:text-xl mb-2 text-gray-900 text-center">
                        {{ $produk->nama }}
                    </h3>

                    {{-- BADGE (TIDAK DIUBAH) --}}
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                 bg-blue-50 text-blue-700 border border-blue-100 mb-2 mx-auto">
                        Ex iBox
                    </span>

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
                    @else
                        <p class="text-sm text-gray-700 text-center">
                            Kondisi: Second Ex iBox
                        </p>
                    @endif

                    {{-- HARGA --}}
                    <p class="text-sm md:text-base text-gray-900 font-semibold mt-3 mb-4 text-center">
                        Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>

                    {{-- TOMBOL DETAIL --}}
                    <div class="text-center mt-auto">
                        <a href="{{ route('produk.show', $produk) }}"
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

{{-- ANIMASI JS UNTUK CARD PRODUK – EFEK "MELAYANG MASUK" --}}
<style>
    .js-product-card {
        opacity: 0;
        transform: translateY(28px) scale(0.97);
        transition:
            opacity 0.55s ease-out,
            transform 0.55s cubic-bezier(0.22, 0.61, 0.36, 1),
            box-shadow 0.35s ease-out;
        will-change: opacity, transform;
    }

    .js-product-card.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
        box-shadow:
            0 18px 40px rgba(15, 23, 42, 0.09),
            0 2px 8px rgba(15, 23, 42, 0.04);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.js-product-card');

        if (!cards.length) return;

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const index = Array.from(cards).indexOf(el);

                        // Delay per card biar "melayang" satu-satu
                        el.style.transitionDelay = (index * 90) + 'ms';
                        el.classList.add('is-visible');

                        observer.unobserve(el);
                    }
                });
            }, {
                threshold: 0.18
            });

            cards.forEach((card) => observer.observe(card));
        } else {
            // Fallback browser lama → langsung tampil
            cards.forEach((card, index) => {
                card.style.transitionDelay = (index * 90) + 'ms';
                card.classList.add('is-visible');
            });
        }
    });
</script>

@endsection
