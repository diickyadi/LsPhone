<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $table = 'accessories';

    protected $fillable = [
        'nama',
        'jenis',
        'keterangan',
        'harga',
        'stok',
        'gambar',
    ];
}
