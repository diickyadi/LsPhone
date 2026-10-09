@extends('layouts.app')

@section('content')

{{-- ANIMASI & ZOOM FOTO --}}
<style>
    /* Fade Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeLeft {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeRight {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .animate-fade { animation: fadeIn .6s ease forwards; }
    .animate-left { animation: fadeLeft .7s ease forwards; }
    .animate-right { animation: fadeRight .7s ease forwards; }

    /* ZOOM FOTO PRODUK (LOGIKA TIDAK DIUBAH) */
    .image-zoom-container {
        overflow: hidden;
        border-radius: 1.5rem;
    }

    .image-zoom-container img {
        transition: transform .4s ease;
        cursor: zoom-in;
    }

    .image-zoom-container:hover img {
        transform: scale(1.6);
    }
</style>

<section class="max-w-6xl mx-auto px-6 py-14 animate-fade">

    <!-- JUDUL PRODUK -->
    <h1 class="text-3xl md:text-4xl font-bold text-center mb-10 animate-fade">
        {{ $product->nama }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

        <!-- FOTO PRODUK -->
        <div class="w-full animate-left">
            <div class="image-zoom-container bg-white rounded-3xl shadow-lg p-4 hover:shadow-2xl transition-all duration-300">
                <img src="{{ asset($product->gambar) }}"
                     alt="{{ $product->nama }}"
                     class="w-full max-h-[520px] object-contain rounded-2xl">
            </div>
        </div>

        <!-- INFORMASI PRODUK -->
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 animate-right transition-all duration-300 hover:shadow-xl">

            <h2 class="text-xl font-bold mb-4 animate-fade">
                Deskripsi Produk
            </h2>

            {{-- Deskripsi lengkap --}}
            @if(!empty($product->deskripsi_lengkap))
                <div class="bg-gray-50 rounded-2xl p-4 mb-4 shadow-sm animate-fade">
                    <p class="text-gray-800 leading-relaxed text-sm whitespace-pre-line">
                        {{ $product->deskripsi_lengkap }}
                    </p>
                </div>

            {{-- Deskripsi singkat --}}
            @elseif(!empty($product->deskripsi))
                <div class="bg-gray-50 rounded-2xl p-4 mb-4 shadow-sm animate-fade">
                    <p class="text-gray-800 leading-relaxed text-sm whitespace-pre-line">
                        {{ $product->deskripsi }}
                    </p>
                </div>

            {{-- Fallback --}}
            @else
                <div class="bg-gray-50 rounded-2xl p-4 mb-4 shadow-sm animate-fade">
                    <p class="text-gray-600 text-sm">
                        Belum ada deskripsi untuk produk ini.  
                        Silakan hubungi admin untuk menanyakan detail unit.
                    </p>
                </div>
            @endif

            <!-- DETAIL PRODUK -->
            <div class="mt-6 animate-fade">
                <h3 class="font-semibold mb-2">Informasi Produk</h3>
                <ul class="text-sm text-gray-700 space-y-1">
                    <li><strong>Tipe:</strong> {{ $product->tipe }}</li>

                    @if($product->kapasitas)
                        <li><strong>Kapasitas:</strong> {{ $product->kapasitas }}</li>
                    @endif

                    @if($product->warna)
                        <li><strong>Warna:</strong> {{ $product->warna }}</li>
                    @endif

                    @if($product->asal)
                        <li><strong>Kondisi:</strong> {{ $product->asal }}</li>
                    @endif

                    <li><strong>Stok:</strong> {{ $product->stok }}</li>
                </ul>
            </div>

            <!-- HARGA + WA -->
            <div class="mt-8 border-t pt-6 animate-fade">

                <p class="text-2xl font-bold mb-4">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </p>

                <a href="https://wa.me/6285974050825?text={{ urlencode('Halo LS Phone, saya tertarik dengan ' . $product->nama . ' (' . ($product->kapasitas ?? '-') . ', ' . ($product->warna ?? '-') . ')') }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-md transition-all hover:scale-105 hover:shadow-lg">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 32 32">
                        <path d="M16.01 5C10.49 5 6 9.49 6 15.01c0 2.29.75 4.41 2.03 6.14L7 27l6.05-1.97A9.95 9.95 0 0 0 16.01 25C21.53 25 26 20.51 26 15S21.53 5 16.01 5Zm5.23 13.98c-.22.62-1.13 1.14-1.57 1.17-.4.03-.9.03-1.45-.09-.33-.07-.75-.24-1.3-.47-2.28-1-3.75-3.33-3.86-3.49-.11-.16-.92-1.22-.92-2.33 0-1.11.58-1.65.79-1.87.21-.22.46-.27.61-.27h.44c.14 0 .33-.05.52.4.19.46.65 1.6.71 1.72.06.11.1.25.02.41-.08.16-.12.25-.24.38-.11.13-.24.29-.35.39-.12.1-.24.21-.11.42.13.21.58.95 1.25 1.54.86.77 1.58 1.01 1.8 1.12.22.11.35.09.48-.06.13-.16.55-.64.7-.86.16-.22.3-.18.5-.11.2.07 1.29.61 1.51.72.22.11.36.16.41.25.05.09.05.51-.17 1.13Z"/>
                    </svg>

                    Tanyakan via WhatsApp
                </a>

            </div>

        </div>
    </div>
</section>

@endsection
