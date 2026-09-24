<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LoginPenguji extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'login_pengujis';

    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'role',
        'tipe_penguji',
        'nip',
        'no_hp',
        'jabatan',
        'instansi',
        'kelompok',
        'is_active',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active'     => 'boolean',
        'last_login_at' => 'datetime',
    ];

    // ============ HELPER METHODS ============

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPenguji(): bool
    {
        return $this->role === 'penguji';
    }

    public function isPengujiWawancara(): bool
    {
        return $this->role === 'penguji' && $this->tipe_penguji === 'wawancara';
    }

    public function isPengujiTertulis(): bool
    {
        return $this->role === 'penguji' && $this->tipe_penguji === 'tertulis';
    }
}