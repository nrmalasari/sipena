<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penugasan_penilais', function (Blueprint $table) {
            $table->foreignId('login_penguji_id')->nullable()->after('penilai_id')
                  ->constrained('login_pengujis')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('penugasan_penilais', function (Blueprint $table) {
            $table->dropForeign(['login_penguji_id']);
            $table->dropColumn('login_penguji_id');
        });
    }
};