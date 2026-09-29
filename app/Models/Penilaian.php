<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id',
        'penilai_id',
        'tipe',
        'nilai',
        'catatan',
        'status',
    ];

    protected $casts = [
        'nilai' => 'float',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function penilai()
    {
        return $this->belongsTo(Penilai::class);
    }

    public function details()
    {
        return $this->hasMany(PenilaianDetail::class, 'peserta_id', 'peserta_id')
            ->where('penilai_id', $this->penilai_id)
            ->where('tipe', $this->tipe);
    }
}