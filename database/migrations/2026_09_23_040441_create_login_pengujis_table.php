<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('login_pengujis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            
            // ROLE UTAMA: penguji atau admin
            $table->enum('role', ['penguji', 'admin'])->default('penguji');
            
            // TIPE PENGUJI: wawancara, tertulis, atau none (khusus admin)
            $table->enum('tipe_penguji', ['wawancara', 'tertulis', 'none'])->default('none');
            
            // Data tambahan
            $table->string('nip')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('kelompok')->nullable();
            
            // Status & tracking
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_pengujis');
    }
};