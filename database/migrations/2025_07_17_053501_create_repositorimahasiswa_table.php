<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repositorimahasiswa', function (Blueprint $table) {
        $table->bigIncrements('id');

        // Relasi ke tabel kategori
        $table->unsignedBigInteger('id_kategori');

        $table->string('judul');
        $table->text('abstrak');
        $table->string('penulis');
        $table->year('tahun');

        // File per bab
        $table->string('file_cover')->nullable();
        $table->string('file_pengesahan')->nullable();
        $table->string('file_abstrakdandaftarisi')->nullable();
        $table->string('file_bab1')->nullable();
        $table->string('file_bab2')->nullable();
        $table->string('file_bab3')->nullable();
        $table->string('file_bab4')->nullable();
        $table->string('file_bab5')->nullable();
        $table->string('file_lampiran')->nullable();

        $table->timestamps();

        // FOREIGN KEY
        $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repositori_mahasiswa');
    }
};
