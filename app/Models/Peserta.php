<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'instansi',
        'jenis_penilaian',
        'status',
        'link_berkas',
    ];

    // ============ RELASI ============
    public function penugasanPenilais()
    {
        return $this->hasMany(PenugasanPenilai::class);
    }

    public function penilaiWawancara()
    {
        return $this->hasMany(PenugasanPenilai::class)->where('tipe', 'wawancara');
    }

    public function penilaiTertulis()
    {
        return $this->hasMany(PenugasanPenilai::class)->where('tipe', 'tertulis');
    }

    // ============ HELPER ============
    public function butuhTertulis(): bool
    {
        return $this->jenis_penilaian === 'perpindahan_jabatan';
    }

    public function getLabelJenisPenilaianAttribute(): string
    {
        return $this->jenis_penilaian === 'kenaikan_jenjang'
            ? 'Kenaikan Jenjang'
            : 'Perpindahan Jabatan';
    }

    public function getLabelStatusAttribute(): string
    {
        return match ($this->status) {
            'belum_dinilai'  => 'Belum Dinilai',
            'sedang_dinilai' => 'Sedang Dinilai',
            'selesai'        => 'Selesai',
            default          => '-',
        };
    }
}