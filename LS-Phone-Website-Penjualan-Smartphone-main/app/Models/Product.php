<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Laravel sudah default ke 'products', jadi sebenarnya ini boleh tidak ditulis,
    // tapi kalau mau eksplisit:
    protected $table = 'products';

    protected $fillable = [
        'nama',
        'slug',
        'kapasitas',
        'warna',
        'asal',
        'gambar',
        'harga',
         'stok', 
        'deskripsi',
        'deskripsi_lengkap',
        'tipe',
    ];
}
