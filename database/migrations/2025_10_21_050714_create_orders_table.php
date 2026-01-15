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
            $table->unsignedBigInteger('id_users')->nullable();
            $table->unsignedBigInteger('id_address')->nullable();
            $table->string('no_pesanan')->unique();
            $table->decimal('total_harga', 18, 2);
            $table->string('status')->default('diproses');
            $table->string('action_by')->nullable();
            $table->string('action_by_2')->nullable();
            $table->string('tempat_pesanan');
            $table->string('metode_pembayaran');

            // 🔥 BUKTI PENGIRIMAN
            $table->string('bukti_pengiriman')->nullable();

            $table->timestamps();

            $table->foreign('id_users')
                ->references('id')->on('users')
                ->nullOnDelete();

            $table->foreign('id_address')
                ->references('id')->on('addresses')
                ->nullOnDelete();
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
