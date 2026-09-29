<?php

namespace Database\Seeders;

use App\Models\Penilai;
use Illuminate\Database\Seeder;

class PenilaiSeeder extends Seeder
{
    public function run(): void
    {
        // ============ PENILAI WAWANCARA + TERTULIS ============
        Penilai::create([
            'nama'         => 'Andi Pratama',
            'nip'          => '198712312010121001',
            'jabatan'      => 'Kepala Sub Bidang',
            'instansi'     => 'Kab. Tana Tidung',
            'is_wawancara' => true,
            'is_tertulis'  => false,
            'keterangan'   => 'Penguji 1',
            'is_active'    => true,
        ]);

        Penilai::create([
            'nama'         => 'Siti Nurhaliza',
            'nip'          => '198905062015032002',
            'jabatan'      => 'Kepala Seksi',
            'instansi'     => 'Kab. Semarang',
            'is_wawancara' => true,
            'is_tertulis'  => false,
            'keterangan'   => 'Penguji 2',
            'is_active'    => true,
        ]);

        Penilai::create([
            'nama'         => 'Budi Santoso',
            'nip'          => '197803201998031004',
            'jabatan'      => 'Auditor Muda',
            'instansi'     => 'Pemerintah Prov. Sulsel',
            'is_wawancara' => false,
            'is_tertulis'  => true,
            'keterangan'   => 'Penguji 1',
            'is_active'    => true,
        ]);

        Penilai::create([
            'nama'         => 'Rina Oktaviani',
            'nip'          => '199002112016052003',
            'jabatan'      => 'Perencana Ahli Muda',
            'instansi'     => 'Kab. Kebumen',
            'is_wawancara' => false,
            'is_tertulis'  => true,
            'keterangan'   => 'Penguji 2',
            'is_active'    => true,
        ]);

        Penilai::create([
            'nama'         => 'Dedi Kurniawan',
            'nip'          => '198611082014091002',
            'jabatan'      => 'Penyuluh Sosial',
            'instansi'     => 'Kota Makassar',
            'is_wawancara' => true,
            'is_tertulis'  => true,    // ← Bisa keduanya!
            'keterangan'   => 'Penguji Multi',
            'is_active'    => true,
        ]);

        Penilai::create([
            'nama'         => 'Nabila Safitri',
            'nip'          => '199507182017042005',
            'jabatan'      => 'Pranata Komputer',
            'instansi'     => 'Kota Parepare',
            'is_wawancara' => true,
            'is_tertulis'  => true,    // ← Bisa keduanya!
            'keterangan'   => 'Penguji Multi',
            'is_active'    => true,
        ]);
    }
}