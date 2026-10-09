<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iphone extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'stok',
        'harga',
        'kapasitas',
        'warna',
        'kondisi',
        'gambar',
    ];
}
