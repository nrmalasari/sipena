<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaian_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('pesertas')->onDelete('cascade');
            $table->foreignId('penilai_id')->constrained('penilais')->onDelete('cascade');
            $table->string('tipe');                // 'wawancara' / 'tertulis'
            $table->integer('urutan');             // 0, 1, 2, ...
            $table->decimal('nilai', 5, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            // 1 peserta + 1 penilai + 1 tipe + 1 urutan = 1 baris (unik)
            $table->unique(['peserta_id', 'penilai_id', 'tipe', 'urutan'], 'unique_detail');
            $table->index(['peserta_id', 'tipe'], 'idx_peserta_tipe');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian_details');
    }
};