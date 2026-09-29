<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilais', function (Blueprint $table) {
            $table->string('email')->nullable()->after('nama');
            $table->string('username')->nullable()->after('email');
            $table->string('password')->nullable()->after('username');
        });
    }

    public function down(): void
    {
        Schema::table('penilais', function (Blueprint $table) {
            $table->dropColumn(['email', 'username', 'password']);
        });
    }
};