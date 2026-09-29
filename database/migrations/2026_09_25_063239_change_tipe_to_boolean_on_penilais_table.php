<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilais', function (Blueprint $table) {
            // Hapus kolom 'tipe' lama
            $table->dropColumn('tipe');
            
            // Tambah kolom boolean baru
            $table->boolean('is_wawancara')->default(false)->after('instansi');
            $table->boolean('is_tertulis')->default(false)->after('is_wawancara');
        });
    }

    public function down(): void
    {
        Schema::table('penilais', function (Blueprint $table) {
            $table->dropColumn(['is_wawancara', 'is_tertulis']);
            $table->enum('tipe', ['wawancara', 'tertulis'])->after('instansi');
        });
    }
};