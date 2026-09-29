<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'login_penguji_id',
        'nama',
        'email',
        'username',
        'password',
        'nip',
        'jabatan',
        'instansi',
        'is_wawancara',
        'is_tertulis',
        'keterangan',
        'is_active',
    ];

    protected $casts = [
        'is_wawancara' => 'boolean',
        'is_tertulis'  => 'boolean',
        'is_active'    => 'boolean',
    ];

    protected $hidden = [
        'password',
    ];

    public function loginPenguji()
    {
        return $this->belongsTo(LoginPenguji::class, 'login_penguji_id');
    }

    public function penugasanPenilais()
    {
        return $this->hasMany(PenugasanPenilai::class);
    }

    public function isKeduanya(): bool
    {
        return $this->is_wawancara && $this->is_tertulis;
    }

    public function getLabelTipeAttribute(): string
    {
        if ($this->is_wawancara && $this->is_tertulis) return 'Wawancara & Tertulis';
        if ($this->is_wawancara) return 'Wawancara';
        if ($this->is_tertulis)  return 'Tertulis';
        return '-';
    }
}