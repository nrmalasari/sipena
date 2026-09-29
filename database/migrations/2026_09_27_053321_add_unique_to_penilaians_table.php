<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            // Hapus duplikat dulu (kalau ada)
            // (jalankan manual kalau perlu)
            
            $table->unique(['peserta_id', 'penilai_id', 'tipe'], 'unique_penilaian');
        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropUnique('unique_penilaian');
        });
    }
};