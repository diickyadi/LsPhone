<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('iphones', function (Blueprint $table) {
        $table->id();
        $table->string('nama');            // nama produk
        $table->string('kategori');       // exibox, beacukai, wifionly, aksesoris
        $table->integer('stok')->default(0);
        $table->unsignedBigInteger('harga');  // simpan angka, contoh 21500000
        $table->string('kapasitas')->nullable(); // 128GB / 256GB
        $table->string('warna')->nullable();
        $table->string('kondisi')->nullable();  // Ex Ibox / Bea Cukai / dll
        $table->string('gambar')->nullable();   // nama file gambar
        $table->timestamps();
    });
}

};
