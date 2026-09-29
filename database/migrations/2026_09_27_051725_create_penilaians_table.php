<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('pesertas')->onDelete('cascade');
            $table->foreignId('penilai_id')->constrained('penilais')->onDelete('cascade');
            $table->string('tipe');              // 'wawancara' atau 'tertulis'
            $table->decimal('nilai', 5, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->string('status')->default('draft'); // 'draft' atau 'selesai'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};