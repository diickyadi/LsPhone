<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Slider;
use App\Models\AboutSection;

class HomeController extends Controller
{
    public function index()
    {
        // PRODUK UNGGULAN (3 produk terbaru)
        $featured = Product::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // TESTIMONI (semua)
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();

        // SLIDER
        $sliders = Slider::orderBy('created_at', 'asc')->get();

        // TENTANG KAMI (ambil 1 data saja)
        $about = AboutSection::first();  // ⬅️ WAJIB supaya home.blade bisa baca data

        // KIRIM KE HOME
        return view('home', compact(
            'featured',
            'testimonials',
            'sliders',
            'about'   // ⬅️ TAMBAHKAN INI
        ));
    }
}
