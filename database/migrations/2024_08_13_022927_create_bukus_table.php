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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategoris_id');
            $table->foreign('kategoris_id')->references('id')->on('kategoris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_buku');
            $table->string('deskripsi_buku');
            $table->integer('harga');
            $table->integer('jumlah_buku');
            $table->string('foto_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
