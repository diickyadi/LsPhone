@extends('layouts.app')

@section('content')

<div id="preloader"
     class="fixed inset-0 bg-white flex items-center justify-center z-[9999] transition-opacity duration-500">
    <div class="w-12 h-12 border-4 border-gray-300 border-t-blue-600 rounded-full animate-spin"></div>
</div>

<div class="w-full bg-black" data-aos="fade-in">
    <div class="max-w-7xl mx-auto">
        <div class="relative w-full h-[300px] sm:h-[380px] md:h-[420px] overflow-hidden">
            @if(isset($sliders) && $sliders->isNotEmpty())
                <div id="carousel" class="flex h-full transition-transform duration-700 ease-in-out">
                    @foreach($sliders as $s)
                        <div class="w-full h-full flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset($s->gambar) }}"
                                 alt="Slide {{ $loop->iteration }}"
                                 class="parallax-img max-w-full max-h-full object-contain">
                        </div>
                    @endforeach
                </div>

                <div class="absolute bottom-3 sm:bottom-4 left-1/2 -translate-x-1/2 flex space-x-2 
                            bg-white/60 sm:bg-white/80 px-4 py-1 rounded-full shadow-md">
                    @foreach($sliders as $index => $s)
                        <button class="w-2.5 h-2.5 rounded-full transition
                            {{ $index === 0 ? 'bg-gray-700' : 'bg-gray-400' }}"
                            data-slide="{{ $index }}"></button>
                    @endforeach
                </div>
            @else
                <div id="carousel" class="flex h-full transition-transform duration-700 ease-in-out">
                    <img src="{{ asset('images/slide4.jpg') }}"
                         class="parallax-img max-w-full max-h-full object-contain">
                </div>
            @endif
        </div>
    </div>
</div>


<section class="max-w-7xl mx-auto px-6 py-14" data-aos="fade-up">
    <h2 class="text-2xl font-heading font-bold text-center mb-10">Produk Terbaru</h2>

    @if($featured->isEmpty())
        <p class="text-center text-gray-500">Belum ada produk Terbaru.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-center">
            @foreach($featured as $p)
                <a href="{{ route('produk.show', $p->id) }}"
                   data-aos="zoom-in"
                   class="bg-white shadow rounded-3xl p-6 hover:shadow-2xl hover:scale-[1.03] 
                          transition-all duration-500 block">

                    <img src="{{ asset($p->gambar) }}"
                         class="mx-auto w-44 h-44 object-contain mb-3"
                         alt="{{ $p->nama }}">

                    <h3 class="font-heading font-semibold text-lg">{{ $p->nama }}</h3>

                    @if($p->kapasitas)
                        <p class="text-gray-600 text-sm">Kapasitas: {{ $p->kapasitas }}</p>
                    @endif
                    @if($p->warna)
                        <p class="text-gray-600 text-sm">Warna: {{ $p->warna }}</p>
                    @endif
                    @if($p->asal)
                        <p class="text-gray-600 text-sm">Kondisi: {{ $p->asal }}</p>
                    @endif

                    <p class="font-bold mt-2">
                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                    </p>
                </a>
            @endforeach
        </div>
    @endif
</section>


<section id="tentang" class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl md:text-3xl font-heading font-bold text-center mb-10">Tentang Kami</h2>

        <div class="grid md:grid-cols-2 gap-10 items-stretch">
            <div class="bg-white rounded-3xl shadow-md p-6 md:p-8 flex items-center justify-center"
                 data-aos="slide-left">
                <div class="rounded-3xl overflow-hidden border bg-gray-50 w-full max-w-md">
                    <img src="{{ asset($about->foto ?? 'images/tim.png') }}"
                         class="w-full h-80 md:h-96 object-cover"
                         alt="">
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-md p-6 md:p-8 flex flex-col justify-center"
                 data-aos="slide-right">

                <h3 class="font-heading font-semibold text-lg md:text-xl mb-4 text-gray-900">
                    {{ $about->subjudul ?? 'Kenapa memilih LS Phone?' }}
                </h3>

                @php
                    $poinList = collect([
                        $about->poin1,$about->poin2,$about->poin3,
                        $about->poin4,$about->poin5,$about->poin6,
                        $about->poin7,$about->poin8
                    ])->filter();
                @endphp

                <ol class="list-decimal list-inside space-y-2 text-gray-800 text-[15px] leading-relaxed">
                    @forelse($poinList as $p)
                        <li>{{ $p }}</li>
                    @empty
                        <li>Harga lebih terjangkau - cocok untuk budget hemat.</li>
                        <li>Kualitas terjamin - dicek &amp; dites lengkap.</li>
                        <li>Garansi toko - belanja aman &amp; nyaman.</li>
                        <li>Pilihan lengkap sesuai kebutuhan.</li>
                        <li>Aksesoris lengkap &amp; berkualitas.</li>
                        <li>Transaksi aman - bisa COD/marketplace.</li>
                        <li>Unit siap pakai - langsung dipakai.</li>
                        <li>IMEI terdaftar resmi Kemenperin.</li>
                    @endforelse
                </ol>

            </div>
        </div>
    </div>
</section>


<section id="testimoni" class="max-w-7xl mx-auto px-6 py-14 text-center relative" data-aos="fade-up">
    <h2 class="text-2xl font-heading font-bold mb-10">Produk Terjual</h2>

    @if(!$testimonials->isEmpty())
        <div class="relative overflow-hidden">
            <div id="testiCarousel" class="flex transition-transform duration-700 ease-in-out">
                @foreach($testimonials->chunk(3) as $chunk)
                    <div class="w-full flex-shrink-0 grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach($chunk as $t)
                            <img src="{{ asset($t->foto) }}"
                                 class="w-full h-[360px] sm:h-[420px] object-cover rounded-2xl shadow"
                                 data-aos="zoom-in">
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Tombol geser disembunyikan --}}
        <button id="prevTesti"
                class="hidden absolute top-1/2 left-2 sm:-left-16 -translate-y-1/2 bg-black/70 text-white p-3 rounded-full hover:bg-black transition z-20">
            ❮
        </button>

        <button id="nextTesti"
                class="hidden absolute top-1/2 right-2 sm:-right-16 -translate-y-1/2 bg-black/70 text-white p-3 rounded-full hover:bg-black transition z-20">
            ❯
        </button>
    @endif
</section>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById('preloader');
    setTimeout(() => loader.classList.add('hidden'), 750);
});

// HERO SLIDER
const carousel = document.getElementById('carousel');
const dots = document.querySelectorAll('[data-slide]');
if (carousel && dots.length) {
    let index = 0;
    const showSlide = i => {
        carousel.style.transform = `translateX(-${i * 100}%)`;
        dots.forEach((d, x) => d.classList.toggle('bg-gray-700', x === i));
    };
    dots.forEach((dot, i) => dot.onclick = () => showSlide(index = i));
    setInterval(() => showSlide(index = (index + 1) % dots.length), 4000);
    showSlide(0);
}

// TESTIMONI SLIDER
const testiCarousel = document.getElementById('testiCarousel');
const nextBtn = document.getElementById('nextTesti');
const prevBtn = document.getElementById('prevTesti');
if (testiCarousel && nextBtn && prevBtn) {
    let i = 0;
    const total = testiCarousel.children.length;
    const update = () => testiCarousel.style.transform = `translateX(-${i * 100}%)`;
    nextBtn.onclick = () => update(i = (i + 1) % total);
    prevBtn.onclick = () => update(i = (i - 1 + total) % total);
    setInterval(() => update(i = (i + 1) % total), 5000);
}

// PARALLAX
document.addEventListener("mousemove", e =>
    document.querySelectorAll(".parallax-img")
        .forEach(img => {
            img.style.transform =
                `translateX(${(e.clientX - innerWidth / 2) * 0.01}px)`;
        })
);
</script>

@endsection
