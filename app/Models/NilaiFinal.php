<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiFinal extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id',
        'tipe',
        'judul_unit',
        'jenis_kompetensi',
        'rata_rata_override',
        'nilai_final_override',
        'catatan_admin',
    ];

    protected $casts = [
        'rata_rata_override'  => 'float',
        'nilai_final_override' => 'float',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}