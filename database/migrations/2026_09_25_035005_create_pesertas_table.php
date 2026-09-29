<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('jabatan');
            $table->string('instansi');
            
            // Jenis penilaian: kenaikan_jenjang / perpindahan_jabatan
            $table->enum('jenis_penilaian', ['kenaikan_jenjang', 'perpindahan_jabatan']);
            
            // Status penilaian
            $table->enum('status', ['belum_dinilai', 'sedang_dinilai', 'selesai'])->default('belum_dinilai');
            
            // Link drive berkas
            $table->string('link_berkas')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};