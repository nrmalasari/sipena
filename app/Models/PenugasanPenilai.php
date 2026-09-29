<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanPenilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id',
        'penilai_id',
        'login_penguji_id',
        'tipe',
        'urutan',
    ];

    // ============ RELASI ============

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    public function penilai()
    {
        return $this->belongsTo(Penilai::class, 'penilai_id');
    }

    public function loginPenguji()
    {
        return $this->belongsTo(LoginPenguji::class, 'login_penguji_id');
    }
}