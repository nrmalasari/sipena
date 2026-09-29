<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penugasan_penilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('pesertas')->onDelete('cascade');
            $table->foreignId('penilai_id')->constrained('penilais')->onDelete('cascade');
            
            // Jenis penugasan: wawancara / tertulis
            $table->enum('tipe', ['wawancara', 'tertulis']);
            
            // Urutan penilai: 1 atau 2
            $table->integer('urutan')->default(1);
            
            $table->timestamps();
            
            // Satu peserta + tipe + urutan hanya boleh punya 1 penilai
            $table->unique(['peserta_id', 'tipe', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penugasan_penilais');
    }
};