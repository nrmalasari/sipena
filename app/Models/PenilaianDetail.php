<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id',
        'penilai_id',
        'tipe',
        'urutan',
        'nilai',
        'catatan',
    ];

    protected $casts = [
        'nilai'  => 'float',
        'urutan' => 'integer',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function penilai()
    {
        return $this->belongsTo(Penilai::class);
    }
}