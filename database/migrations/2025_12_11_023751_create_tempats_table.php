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
        Schema::create('tempats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat');
            $table->string('lokasi');
            $table->string('kapasitas');
            $table->enum('kategori', ['ruangan', 'aula']);
            $table->enum('status', ['tersedia', 'Tidak Tersedia']);
            $table->string('gambar');
        });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempats');
    }
};
