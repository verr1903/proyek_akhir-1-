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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users'); 
            $table->string('nama_penerima');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('nomor_hp');
            $table->string('jalan');
            $table->timestamps();

            // Foreign Key relasi ke users
            $table->foreign('id_users')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
