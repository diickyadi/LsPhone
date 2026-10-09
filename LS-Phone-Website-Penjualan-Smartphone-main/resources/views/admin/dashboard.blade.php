@extends('admin.layout')

@section('content')

<div class="mb-6" data-aos="fade-down">
    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
        Dashboard Admin
    </h1>
    <p class="text-gray-500 mt-1">
        Ringkasan statistik produk LS Phone
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    {{-- EX IBOX --}}
    <div
        class="relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white via-gray-50 to-gray-100
               shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300"
        data-aos="fade-up"
        data-aos-delay="0">

        {{-- garis atas abu-abu --}}
        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-gray-700 via-gray-500 to-gray-300 animate-pulse"></div>

        <div class="p-5">
            <div class="flex items-center justify-between mb-4">
                {{-- badge kategori abu-abu gelap --}}
                <span class="text-xs font-semibold uppercase tracking-wide text-gray-100 bg-gray-900 px-3 py-1 rounded-full shadow-sm">
                    Ex Ibox
                </span>
                <span class="text-[11px] text-gray-400 uppercase tracking-[0.16em]">
                    Kategori
                </span>
            </div>

            <p class="text-sm text-gray-500 mb-1">Total Ex Ibox</p>

            <p class="text-3xl font-extrabold text-gray-900 leading-tight">
                {{ $totalExibox ?? 0 }}
            </p>

            <div class="mt-4 text-xs text-gray-400">
                Data diambil dari seluruh produk dengan tipe
                <span class="font-semibold text-gray-700">exibox</span>.
            </div>
        </div>
    </div>

    {{-- WIFI ONLY --}}
    <div
        class="relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white via-gray-50 to-gray-100
               shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300"
        data-aos="fade-up"
        data-aos-delay="80">

        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-gray-700 via-gray-500 to-gray-300 animate-pulse"></div>

        <div class="p-5">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold uppercase tracking-wide text-gray-100 bg-gray-900 px-3 py-1 rounded-full shadow-sm">
                    Wifi Only
                </span>
                <span class="text-[11px] text-gray-400 uppercase tracking-[0.16em]">
                    Kategori
                </span>
            </div>

            <p class="text-sm text-gray-500 mb-1">Total Wifi Only</p>

            <p class="text-3xl font-extrabold text-gray-900 leading-tight">
                {{ $totalWifiOnly ?? 0 }}
            </p>

            <div class="mt-4 text-xs text-gray-400">
                Data diambil dari seluruh produk dengan tipe
                <span class="font-semibold text-gray-700">wifionly</span>.
            </div>
        </div>
    </div>

    {{-- BEA CUKAI --}}
    <div
        class="relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white via-gray-50 to-gray-100
               shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300"
        data-aos="fade-up"
        data-aos-delay="160">

        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-gray-700 via-gray-500 to-gray-300 animate-pulse"></div>

        <div class="p-5">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold uppercase tracking-wide text-gray-100 bg-gray-900 px-3 py-1 rounded-full shadow-sm">
                    Bea Cukai
                </span>
                <span class="text-[11px] text-gray-400 uppercase tracking-[0.16em]">
                    Kategori
                </span>
            </div>

            <p class="text-sm text-gray-500 mb-1">Total Bea Cukai</p>

            <p class="text-3xl font-extrabold text-gray-900 leading-tight">
                {{ $totalBeacukai ?? 0 }}
            </p>

            <div class="mt-4 text-xs text-gray-400">
                Data berasal dari tipe
                <span class="font-semibold text-gray-700">beacukai</span>.
            </div>
        </div>
    </div>

    {{-- ACCESSORIES --}}
    <div
        class="relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white via-gray-50 to-gray-100
               shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300"
        data-aos="fade-up"
        data-aos-delay="240">

        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-gray-700 via-gray-500 to-gray-300 animate-pulse"></div>

        <div class="p-5">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold uppercase tracking-wide text-gray-100 bg-gray-900 px-3 py-1 rounded-full shadow-sm">
                    Accessories
                </span>
                <span class="text-[11px] text-gray-400 uppercase tracking-[0.16em]">
                    Kategori
                </span>
            </div>

            <p class="text-sm text-gray-500 mb-1">Total Accessories</p>

            <p class="text-3xl font-extrabold text-gray-900 leading-tight">
                {{ $totalAccessories ?? 0 }}
            </p>

            <div class="mt-4 text-xs text-gray-400">
                Data berasal dari semua produk accessories.
            </div>
        </div>
    </div>

</div>

@endsection
