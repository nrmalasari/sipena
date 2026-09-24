<?php

namespace Database\Seeders;

use App\Models\LoginPenguji;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginPengujiSeeder extends Seeder
{
    public function run(): void
    {
        // ============ ADMIN ============
        LoginPenguji::create([
            'nama'         => 'Administrator LAN RI',
            'email'        => 'admin@lanri.go.id',
            'username'     => 'admin',
            'password'     => Hash::make('password'),
            'role'         => 'admin',
            'tipe_penguji' => 'none',
            'jabatan'      => 'Administrator Sistem',
            'instansi'     => 'LAN RI',
        ]);

        // ============ PENGUJI WAWANCARA (2 ORANG) ============
        LoginPenguji::create([
            'nama'         => 'Dr. Muhammad Aswad, M.Si',
            'email'        => 'aswad@lanri.go.id',
            'username'     => 'aswad',
            'password'     => Hash::make('password'),
            'role'         => 'penguji',
            'tipe_penguji' => 'wawancara',
            'nip'          => '19780512 200312 1 002',
            'no_hp'        => '0812 3456 7890',
            'jabatan'      => 'LAN RI Pusjar SKMP Makassar',
            'instansi'     => 'LAN RI Pusjar SKMP Makassar',
            'kelompok'     => 'Kelompok 1',
        ]);

        LoginPenguji::create([
            'nama'         => 'Dr. Siti Rahmawati, M.Si',
            'email'        => 'siti@lanri.go.id',
            'username'     => 'siti',
            'password'     => Hash::make('password'),
            'role'         => 'penguji',
            'tipe_penguji' => 'wawancara',
            'nip'          => '19820517 200801 2 001',
            'no_hp'        => '0812 1111 2222',
            'jabatan'      => 'LAN RI Pusjar SKMP Makassar',
            'instansi'     => 'LAN RI Pusjar SKMP Makassar',
            'kelompok'     => 'Kelompok 1',
        ]);

        // ============ PENGUJI TERTULIS (2 ORANG) ============
        LoginPenguji::create([
            'nama'         => 'Dr. Sulaeman Fattah, M.Si',
            'email'        => 'sulaeman.tertulis@lanri.go.id',
            'username'     => 'sulaeman',
            'password'     => Hash::make('password'),
            'role'         => 'penguji',
            'tipe_penguji' => 'tertulis',
            'nip'          => '19800315 200501 1 003',
            'no_hp'        => '0813 9876 5432',
            'jabatan'      => 'LAN RI Pusjar SKMP Makassar',
            'instansi'     => 'LAN RI Pusjar SKMP Makassar',
            'kelompok'     => 'Kelompok 1',
        ]);

        LoginPenguji::create([
            'nama'         => 'Dr. Ahmad Yusuf, M.Si',
            'email'        => 'ahmad.tertulis@lanri.go.id',
            'username'     => 'ahmad',
            'password'     => Hash::make('password'),
            'role'         => 'penguji',
            'tipe_penguji' => 'tertulis',
            'nip'          => '19790720 200312 1 004',
            'no_hp'        => '0813 4444 5555',
            'jabatan'      => 'LAN RI Pusjar SKMP Makassar',
            'instansi'     => 'LAN RI Pusjar SKMP Makassar',
            'kelompok'     => 'Kelompok 1',
        ]);
    }
}