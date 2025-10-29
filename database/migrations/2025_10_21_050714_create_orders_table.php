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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_address');
            $table->unsignedBigInteger('id_discount')->nullable(); // Diskon opsional
            $table->string('status')->default('diproses');
            $table->string('action_by')->nullable();
            $table->string('action_by_2')->nullable();
            $table->string('tempat_pesanan');
            $table->string('metode_pembayaran');
            $table->timestamps();

            // Relasi foreign key
            $table->foreign('id_users')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_product')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('id_address')
                ->references('id')
                ->on('addresses')
                ->onDelete('cascade');

            $table->foreign('id_discount')
                ->references('id')
                ->on('discounts')
                ->onDelete('set null'); // Jika diskon dihapus, tetap simpan pesanan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
