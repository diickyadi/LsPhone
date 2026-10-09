<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - LS Phone</title>

    <!-- Google Font Lato & Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 font-sans text-gray-900">

<div class="flex">

    <aside class="w-64 bg-gradient-to-b from-[#000000] to-[#000000] text-white min-h-screen flex flex-col items-center pt-10 shadow-xl transition-transform duration-500 ease-out">
        <div class="bg-white p-4 rounded-2xl mb-6 shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <img src="{{ asset('images/logo.png') }}" alt="LS Phone Logo" class="h-20 transition-transform duration-300 ease-out hover:scale-105">
        </div>

        <div class="text-[14px] font-heading mb-8 tracking-wide text-center opacity-90">
            Admin LSphone
        </div>

        <a href="{{ route('admin.dashboard') }}" class="w-52 py-3 rounded-full mb-5 shadow text-center text-[15px] font-semibold flex items-center justify-center transition-all duration-200 ease-out hover:-translate-x-1 {{ request()->routeIs('admin.dashboard') ? 'bg-white text-black' : 'bg-white/30 hover:bg-white/40' }}">
            Dashboard
        </a>

        <a href="{{ route('admin.about.edit') }}" class="w-52 py-3 rounded-full mb-5 shadow text-center text-[15px] font-semibold flex items-center justify-center transition-all duration-200 ease-out hover:-translate-x-1 {{ request()->routeIs('admin.about.*') ? 'bg-white text-black' : 'bg-white/30 hover:bg-white/40' }}">
            Kelola Tentang Kami
        </a>

        <a href="{{ route('admin.iphone.index') }}" class="w-52 py-3 rounded-full mb-5 shadow text-center text-[15px] font-semibold flex items-center justify-center transition-all duration-200 ease-out hover:-translate-x-1 {{ request()->routeIs('admin.iphone.*') ? 'bg-white text-black' : 'bg-white/30 hover:bg-white/40' }}">
            Kelola Data iPhone
        </a>

        <a href="{{ route('admin.accessories.index') }}" class="w-52 py-3 rounded-full mb-5 shadow text-center text-[15px] font-semibold flex items-center justify-center transition-all duration-200 ease-out hover:-translate-x-1 {{ request()->routeIs('admin.accessories.*') ? 'bg-white text-black' : 'bg-white/30 hover:bg-white/40' }}">
            Kelola Data Accessories
        </a>

        <a href="{{ route('admin.testimoni.index') }}" class="w-52 py-3 rounded-full mb-5 shadow text-center text-[15px] font-semibold flex items-center justify-center transition-all duration-200 ease-out hover:-translate-x-1 {{ request()->routeIs('admin.testimoni.*') ? 'bg-white text-black' : 'bg-white/30 hover:bg-white/40' }}">
            Kelola Testimoni
        </a>

        <a href="{{ route('admin.slider.index') }}" class="w-52 py-3 rounded-full mb-5 shadow text-center text-[15px] font-semibold flex items-center justify-center transition-all duration-200 ease-out hover:-translate-x-1 {{ request()->routeIs('admin.slider.*') ? 'bg-white text-black' : 'bg-white/30 hover:bg-white/40' }}">
            Kelola Slider
        </a>

        <div class="flex-1"></div>

        <form action="{{ route('admin.logout') }}" method="POST" class="mb-10">
            @csrf
            <button class="w-44 py-2 bg-red-600 hover:bg-red-700 text-white rounded-full shadow font-semibold transition-all duration-200 hover:-translate-y-0.5">
                Logout
            </button>
        </form>
    </aside>

    <main class="flex-1 p-10 opacity-0 translate-y-2 transition-all duration-300 ease-out" onload="this.classList.remove('opacity-0','translate-y-2')">
        @yield('content')
    </main>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const main = document.querySelector("main");
        if (main) {
            setTimeout(() => {
                main.classList.remove("opacity-0", "translate-y-2");
            }, 30);
        }
    });
</script>

</body>
</html>
