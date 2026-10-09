<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('tipe')
              ->default('allproduk')  // contoh default
              ->after('slug');        // taruh setelah slug
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('tipe');
    });
}

};
