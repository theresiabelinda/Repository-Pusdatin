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
        Schema::create('berita', function (Blueprint $table) {
        $table->bigIncrements('id_berita'); // pakai bigIncrements agar konsisten
        $table->string('no_surat');
        $table->date('tanggal_surat');
        $table->string('perihal');
        $table->string('penerima');
        $table->string('file');

        // Perbaikan: harus unsignedBigInteger agar cocok dengan tipe foreign key
        $table->unsignedBigInteger('id_kategori');
        $table->unsignedBigInteger('id_periode');

        $table->timestamps();

        // Foreign key definitions
        $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        $table->foreign('id_periode')->references('id_periode')->on('periode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
