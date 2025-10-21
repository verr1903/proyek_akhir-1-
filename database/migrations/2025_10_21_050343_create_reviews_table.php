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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_product'); 
            $table->string('komentar');
            $table->integer('bintang');
            $table->timestamps();

            // Relasi ke users
            $table->foreign('id_users')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            // Relasi ke products
            $table->foreign('id_product')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
