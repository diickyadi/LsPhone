<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Accessory; // ⬅️ tambahkan ini

class AdminDashboardController extends Controller
{
    public function index()
    {
        // HITUNG TOTAL PRODUK PER TIPE (dari tabel products)
        $totalExibox   = Product::where('tipe', 'exibox')->count();
        $totalWifiOnly = Product::where('tipe', 'wifionly')->count();
        $totalBeacukai = Product::where('tipe', 'beacukai')->count();

        // AKSESORIS: ambil dari tabel accessories, BUKAN dari products
        $totalAccessories = Accessory::count();

        // AMBIL SLIDER TERBARU (misal 10 terakhir)
        $sliders = Slider::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalExibox',
            'totalWifiOnly',
            'totalBeacukai',
            'totalAccessories',
            'sliders'
        ));
    }
}
