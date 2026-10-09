<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LS Phone</title>

    {{-- Google Font LATO --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ===========================================================
           SHADOW PREMIUM UNTUK ICON
        =========================================================== */
        .icon-wrapper {
            box-shadow:
                0 3px 6px rgba(0,0,0,0.18),
                0 8px 20px rgba(0,0,0,0.12);
            transition: box-shadow 0.25s ease, transform 0.25s ease;
            backdrop-filter: blur(2px);
        }

        .icon-wrapper:hover {
            box-shadow:
                0 4px 10px rgba(0,0,0,0.28),
                0 12px 28px rgba(0,0,0,0.16);
            transform: translateY(-3px) scale(1.04);
        }

        .icon-wrapper img {
            image-rendering: high-quality;
            image-rendering: crisp-edges;
        }
    </style>

</head>

<body class="bg-white text-gray-900 font-sans flex flex-col min-h-screen">

<!-- HEADER -->
<header class="border-b bg-white" data-aos="fade-down">
    <div class="max-w-7xl mx-auto px-6 pt-6 pb-4">

        <!-- BARIS 1 -->
        <div class="flex items-center justify-between gap-6">

            <!-- LOGO -->
            <div class="flex items-center" data-aos="zoom-in">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" class="h-30" alt="LS Phone Logo">
                </a>
            </div>

            <!-- SEARCH -->
            <form action="{{ route('allproduk') }}" method="GET" class="flex-1 flex justify-center" data-aos="fade-up">
                <div class="w-full max-w-2xl flex items-center gap-3 border border-black rounded-full px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                    <input
                        type="search"
                        name="q"
                        value="{{ request('q') }}"
                        class="w-full outline-none text-sm"
                        placeholder="Cari Produk..."
                        autocomplete="off">
                </div>
            </form>

            <!-- MENU -->
            <nav class="hidden md:flex items-center gap-12 text-sm font-semibold" data-aos="zoom-in">
                <a href="{{ url('/#tentang') }}" class="hover:text-gray-500">TENTANG KAMI</a>
                <a href="https://wa.me/6285974058025?text=Halo%20LS%20Phone%2C%20saya%20ingin%20bertanya"
                   target="_blank" class="hover:text-gray-500">HUBUNGI KAMI</a>
            </nav>
        </div>

        <!-- BARIS 2 -->
        <nav class="mt-12 flex flex-wrap justify-center gap-30 text-lg font-semibold" data-aos="fade-up">
            <a href="{{ url('/') }}" class="hover:text-gray-500">HOME</a>
            <a href="{{ url('/allproduk') }}" class="hover:text-gray-500">ALL PRODUK</a>
            <a href="{{ url('/exibox') }}" class="hover:text-gray-500">EX IBOX</a>
            <a href="{{ url('/beacukai') }}" class="hover:text-gray-500">BEACUKAI</a>
            <a href="{{ url('/wifionly') }}" class="hover:text-gray-500">WIFI ONLY</a>
            <a href="{{ url('/accessories') }}" class="hover:text-gray-500">ACCESSORIES</a>
        </nav>

    </div>
</header>


<main class="flex-1">
    @yield('content')
</main>


<!-- ===========================================================
     FOOTER (SUDAH DIPERBAIKI)
=========================================================== -->
<footer class="bg-black text-white mt-16 flex-shrink-0" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-10">

            <!-- KONTAK -->
            <div class="space-y-8" data-aos="fade-right">

               
            <!-- EMAIL -->
<a href="mailto:lsphone@gmail.com" class="flex items-center gap-4 hover:opacity-80 transition">
    <img src="{{ asset('icons/email1.png') }}" class="w-10 h-10 rounded" alt="Email Icon">

    <div class="grid grid-cols-[170px_auto] gap-3">
        <p>Email</p>
        <p>: lsphone@gmail.com</p>
    </div>
</a>

<!-- WHATSAPP -->
<a href="https://wa.me/6285974058025" target="_blank"
   class="flex items-center gap-4 hover:opacity-80 transition">
    <img src="{{ asset('icons/wa1.png') }}" class="w-10 h-10 rounded-full" alt="WhatsApp Icon">

    <div class="grid grid-cols-[170px_auto] gap-3">
        <p>Whatsapp</p>
        <p>: 0859-7405-8025</p>
    </div>
</a>

<!-- JAM -->
<div class="flex items-center gap-4">
    <img src="{{ asset('icons/jam1.png') }}" class="w-10 h-10 rounded-full" alt="Clock Icon">

    <div class="grid grid-cols-[170px_auto] gap-3">
        <p>Jam operasional</p>
        <p>: 09.00 - 21.00</p>
    </div>
</div>


            </div>

            <!-- SOSIAL MEDIA -->
            <div class="flex items-center gap-7 self-start md:self-center" data-aos="fade-left">

                <a href="https://instagram.com/lsphone_idn" target="_blank"
                   class="icon-wrapper flex items-center justify-center w-10 h-10 border border-white rounded-full">
                    <img src="{{ asset('icons/ig1.png') }}" class="w-6 h-6 object-contain" alt="Instagram">
                </a>

                <a href="https://wa.me/6285974058025?text=Halo%20LS%20Phone%2C%20saya%20ingin%20bertanya"
                   target="_blank"
                   class="icon-wrapper flex items-center justify-center w-10 h-10 border border-white rounded-full">
                    <img src="{{ asset('icons/wa1.png') }}" class="w-6 h-6 object-contain" alt="WhatsApp">
                </a>

                <a href="https://www.tiktok.com/@lsphone_idn" target="_blank"
                   class="icon-wrapper flex items-center justify-center w-10 h-10 border border-white rounded-full">
                    <img src="{{ asset('icons/tiktok1.png') }}" class="w-6 h-6 object-contain" alt="TikTok">
                </a>

                <a href="mailto:lsphone@gmail.com"
                   class="icon-wrapper flex items-center justify-center w-10 h-10 border border-white rounded-full">
                    <img src="{{ asset('icons/email1.png') }}" class="w-6 h-6 object-contain" alt="Email">
                </a>

            </div>
        </div>

        <!-- DESKRIPSI -->
        <p class="text-center text-lg mt-12">
            LSphone adalah toko yang fokus pada penjualan iphone second & berbagai macam aksesoris pelengkap, dan produk lainnya.
        </p>    

        <!-- GARIS -->
        <div class="border-t-2 border-gray-600 mt-2 mb-3"></div>

        <!-- COPYRIGHT -->
        <p class="text-center text-xs text-gray-300">
            © {{ date('Y') }} LS Phone. All Rights Reserved.
        </p>

    </div>
</footer>


{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 900,
        once: true
    });
</script>

</body>
</html>
