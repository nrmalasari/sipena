<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('login_penguji_id')->nullable()->constrained('login_pengujis')->onDelete('set null');
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('instansi')->nullable();
            
            // Tipe penilai: wawancara / tertulis
            $table->enum('tipe', ['wawancara', 'tertulis']);
            
            // Keterangan tambahan
            $table->text('keterangan')->nullable();
            
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilais');
    }
};