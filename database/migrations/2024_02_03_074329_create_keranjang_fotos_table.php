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
        Schema::create('keranjang_foto', function (Blueprint $table) {
            $table->id();
            $table->integer('foto_id');
            $table->integer('user_id');
            $table->string('judul_foto');
            $table->date('tanggal_unggah');
            $table->string('lokasi_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_foto');
    }
};
