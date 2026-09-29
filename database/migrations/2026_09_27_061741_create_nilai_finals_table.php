<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_finals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('pesertas')->onDelete('cascade');
            $table->string('tipe');                    // 'wawancara' / 'tertulis'
            $table->string('judul_unit');              // 'Kemampuan Analisis'
            $table->string('jenis_kompetensi');        // 'Kompetensi Inti'
            $table->decimal('rata_rata_override', 5, 2)->nullable();
            $table->decimal('nilai_final_override', 5, 2)->nullable();
            $table->text('catatan_admin')->nullable();
            $table->timestamps();

            $table->unique(
                ['peserta_id', 'tipe', 'judul_unit', 'jenis_kompetensi'],
                'unique_nilai_final'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_finals');
    }
};