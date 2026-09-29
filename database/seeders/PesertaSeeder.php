<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    public function run(): void
    {
        $pesertas = [
            ['Andi Pratama', '198712312010121001', 'Kabag. Tata Usaha', 'Dinas Pendidikan', 'Kelompok 1', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/berkas-andi'],
            ['Siti Nurhaliza', '198905062015032002', 'Kasub. Perencanaan', 'Dinas Kesehatan', 'Kelompok 1', 'perpindahan_jabatan', 'sedang_dinilai', 'https://drive.google.com/berkas-siti'],
            ['Budi Santoso', '197803201998031004', 'Auditor Muda', 'Inspektorat', 'Kelompok 2', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/berkas-budi'],
            ['Rina Oktaviani', '199002112016052003', 'Perencana Ahli Muda', 'Bappeda', 'Kelompok 2', 'perpindahan_jabatan', 'selesai', 'https://drive.google.com/berkas-rina'],
            ['Dedi Kurniawan', '198611082014091002', 'Penyuluh Sosial', 'Dinas Sosial', 'Kelompok 1', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/berkas-dedi'],
            ['Nabila Safitri', '199507182017042005', 'Pranata Komputer', 'Dinas Kominfo', 'Kelompok 2', 'perpindahan_jabatan', 'sedang_dinilai', 'https://drive.google.com/berkas-nabila'],
            ['Fahri Ramadhan', '199203152015011003', 'Kepala Seksi', 'Dinas Perhubungan', 'Kelompok 1', 'kenaikan_jenjang', 'belum_dinilai', 'https://drive.google.com/berkas-fahri'],
            ['Lina Marlina', '198801202012032004', 'Bendahara Pengeluaran', 'Badan Keuangan', 'Kelompok 2', 'perpindahan_jabatan', 'belum_dinilai', 'https://drive.google.com/berkas-lina'],
        ];

        foreach ($pesertas as $p) {
            Peserta::create([
                'nama'            => $p[0],
                'nip'             => $p[1],
                'jabatan'         => $p[2],
                'instansi'        => $p[3],
                'kelompok'        => $p[4],
                'jenis_penilaian' => $p[5],
                'status'          => $p[6],
                'link_berkas'     => $p[7],
            ]);
        }
    }
}