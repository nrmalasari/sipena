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
        // ✅ Hapus kolom 'kelompok' dari tabel 'pesertas'
        Schema::table('pesertas', function (Blueprint $table) {
            if (Schema::hasColumn('pesertas', 'kelompok')) {
                $table->dropColumn('kelompok');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback: kembalikan kolom 'kelompok' (nullable)
        Schema::table('pesertas', function (Blueprint $table) {
            if (!Schema::hasColumn('pesertas', 'kelompok')) {
                $table->string('kelompok', 100)->nullable()->after('instansi');
            }
        });
    }
};