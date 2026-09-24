@extends('layouts.app')

@section('title', 'Dashboard Penguji - LAN RI')

@section('content')

    {{-- JUDUL --}}
    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Selamat datang, Penguji!</h1>
        <p class="mt-1 text-sm text-gray-500">Berikut adalah ringkasan proses penilaian hari ini.</p>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 mb-6">
        <div class="animate-fade-up delay-100 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Peserta</p>
                    <p class="text-3xl font-bold text-gray-800">20</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-200 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Sudah Dinilai</p>
                    <p class="text-3xl font-bold text-gray-800">12</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-300 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-6 w-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Belum Dinilai</p>
                    <p class="text-3xl font-bold text-gray-800">8</p>
                </div>
            </div>
        </div>
    </div>

    {{-- PROGRES --}}
    <div class="animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm mb-6">
        <div class="flex items-center justify-between">
            <h3 class="text-base font-bold text-gray-800">Progres Penilaian</h3>
            <span class="text-lg font-bold text-gray-800">60%</span>
        </div>
        <div class="mt-4 h-3 w-full overflow-hidden rounded-full bg-gray-200">
            <div class="h-full rounded-full bg-gradient-to-r from-blue-400 to-blue-600" style="width: 60%"></div>
        </div>
    </div>

    {{-- PENGUMUMAN --}}
    <div class="animate-fade-up delay-300 flex items-start gap-4 rounded-xl bg-blue-50 p-5 mb-6">
        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
            </svg>
        </div>
        <div class="flex-1">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-gray-800">Pengumuman</h3>
                <div class="text-right">
                    <p class="text-xs text-blue-600 font-semibold">Terakhir diperbarui</p>
                    <p class="text-xs text-gray-500">12 Jun 2025 10:24</p>
                </div>
            </div>
            <p class="mt-2 text-sm text-gray-600">
                Penilaian dilakukan secara bersamaan oleh 2 penguji. Pastikan Anda selalu memperbarui nilai agar dapat dilihat secara real-time oleh penguji lainnya.
            </p>
        </div>
    </div>

    {{-- TABEL PESERTA (HANYA 5 TERBARU) --}}
    <div class="animate-fade-up delay-400 rounded-xl bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h3 class="text-base font-bold text-gray-800">Peserta Terbaru</h3>
                <p class="text-xs text-gray-500 mt-0.5">5 peserta terakhir yang ditambahkan</p>
            </div>
            <a href="#" class="flex items-center gap-1 text-sm font-semibold text-blue-600 hover:underline">
                Lihat Semua Peserta
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="overflow-x-auto scrollbar-thin">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50 text-left">
                        <th class="px-4 py-3 font-semibold text-gray-600">No.</th>
                        <th class="px-4 py-3 font-semibold text-gray-600">Nama Peserta</th>
                        <th class="px-4 py-3 font-semibold text-gray-600">Instansi</th>
                        <th class="px-4 py-3 font-semibold text-gray-600">Jabatan</th>
                        <th class="px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="px-4 py-3 font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php
                        // Hanya 5 peserta terbaru untuk dashboard
                        $pesertaTerbaru = [
                            ['Andi Pratama', 'Kota Magelang', 'Analis Kepegawaian', 'Naik Jenjang'],
                            ['Siti Nurhaliza', 'Kab. Semarang', 'Kepala Sub Bidang', 'Perpindahan Jabatan'],
                            ['Budi Santoso', 'Pemprov Jawa Tengah', 'Auditor Muda', 'Naik Jenjang'],
                            ['Rina Oktaviani', 'Kab. Kebumen', 'Perencana Ahli Muda', 'Perpindahan Jabatan'],
                            ['Dedi Kurniawan', 'Kota Surakarta', 'Penyuluh Sosial', 'Naik Jenjang'],
                        ];
                    @endphp

                    @foreach ($pesertaTerbaru as $i => $p)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-medium">{{ $p[0] }}</td>
                            <td class="px-4 py-3">{{ $p[1] }}</td>
                            <td class="px-4 py-3">{{ $p[2] }}</td>
                            <td class="px-4 py-3">
                                @if ($p[3] == 'Naik Jenjang')
                                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">Naik Jenjang</span>
                                @else
                                    <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">Perpindahan Jabatan</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <button class="rounded-lg bg-blue-600 px-4 py-1.5 text-xs font-semibold text-white hover:bg-blue-700">
                                    Nilai
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Info + tombol lihat semua --}}
        <div class="mt-4 flex items-center justify-between">
            <p class="text-xs text-gray-500">Menampilkan 5 dari 20 peserta</p>
            <a href="#" class="flex items-center gap-1 text-xs font-semibold text-blue-600 hover:underline">
                Lihat semua peserta
                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

@endsection