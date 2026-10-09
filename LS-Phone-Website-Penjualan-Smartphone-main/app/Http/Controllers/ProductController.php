<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Accessory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $qTrim = $q ? trim($q) : null;

        // Pecah kata kunci jadi beberapa kata, supaya "ip 13" tetap bisa kena "iPhone 13"
        $keywords = $qTrim ? preg_split('/\s+/', $qTrim) : [];

        $products = Product::query()
            ->when($qTrim, function ($query) use ($keywords) {
                $query->where(function ($outer) use ($keywords) {
                    foreach ($keywords as $kw) {
                        $kwLike = '%' . $kw . '%';

                        $outer->where(function ($sub) use ($kwLike) {
                            $sub->where('nama', 'like', $kwLike)
                                ->orWhere('kapasitas', 'like', $kwLike)
                                ->orWhere('warna', 'like', $kwLike)
                                ->orWhere('asal', 'like', $kwLike)
                                ->orWhere('tipe', 'like', $kwLike);
                        });
                    }
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $accessories = Accessory::query()
            ->when($qTrim, function ($query) use ($keywords) {
                $query->where(function ($outer) use ($keywords) {
                    foreach ($keywords as $kw) {
                        $kwLike = '%' . $kw . '%';

                        $outer->where(function ($sub) use ($kwLike) {
                            $sub->where('nama', 'like', $kwLike)
                                ->orWhere('jenis', 'like', $kwLike)
                                ->orWhere('keterangan', 'like', $kwLike);
                        });
                    }
                });
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($acc) {
                return (object) [
                    'id'        => $acc->id,
                    'nama'      => $acc->nama,
                    'tipe'      => 'accessories',
                    'kapasitas' => null,
                    'warna'     => null,
                    'asal'      => null,
                    'harga'     => $acc->harga,
                    'gambar'    => $acc->gambar,
                    'created_at'=> $acc->created_at,
                ];
            });

        $merged = $products
            ->concat($accessories)
            ->sortByDesc('created_at')
            ->values();

        return view('allproduk', [
            'products' => $merged,
            'q'        => $q,
        ]);
    }

    public function exibox()
    {
        $products = Product::where('tipe', 'exibox')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('exibox', compact('products'));
    }

    public function wifionly()
    {
        $products = Product::where('tipe', 'wifionly')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('wifionly', compact('products'));
    }

    public function beacukai()
    {
        $products = Product::where('tipe', 'beacukai')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('beacukai', compact('products'));
    }

    /**
     * LIST ACCESSORIES (dari tabel accessories)
     * Route: GET /accessories
     */
    public function accessories()
    {
        $accessories = Accessory::orderBy('created_at', 'desc')->get();

        return view('accessories', compact('accessories'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return view('detail', compact('product'));
        }

        $acc = Accessory::findOrFail($id);

        $product = (object) [
            'nama'              => $acc->nama,
            'gambar'            => $acc->gambar,
            'deskripsi_lengkap' => $acc->keterangan,
            'deskripsi'         => null,
            'tipe'              => 'accessories',
            'kapasitas'         => null,
            'warna'             => null,
            'asal'              => null,
            'stok'              => $acc->stok,
            'harga'             => $acc->harga,
        ];

        return view('detail', compact('product'));
    }

    public function showAccessory($id)
    {
        $acc = Accessory::findOrFail($id);

        $product = (object) [
            'nama'              => $acc->nama,
            'gambar'            => $acc->gambar,
            'deskripsi_lengkap' => $acc->keterangan,
            'deskripsi'         => null,
            'tipe'              => 'accessories',
            'kapasitas'         => null,
            'warna'             => null,
            'asal'              => null,
            'stok'              => $acc->stok,
            'harga'             => $acc->harga,
        ];

        return view('detail', compact('product'));
    }
}
