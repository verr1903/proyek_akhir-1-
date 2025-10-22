<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori');
            $table->text('detail')->nullable();
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->integer('stok_s')->default(0);
            $table->integer('stok_m')->default(0);
            $table->integer('stok_l')->default(0);
            $table->integer('stok_xl')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
