@extends('layouts.app')

@section('title', 'Peserta & Penilaian - LAN RI')

@section('content')

    {{-- ============ HEADER: JUDUL + BREADCRUMB ============ --}}
    <div class="mb-3 animate-fade-up">
        <nav class="flex items-center gap-2 text-xs text-gray-500">
            <span class="text-gray-700 font-medium">Peserta & Penilaian</span>
        </nav>
    </div>

    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Peserta & Penilaian</h1>
        <p class="mt-1 text-sm text-gray-500">Kelola daftar peserta yang akan Anda nilai.</p>
    </div>

    {{-- ============ BAGIAN 1: DAFTAR PESERTA (TABEL) ============ --}}
    <div id="sectionDaftar" class="animate-fade-up delay-100">

        {{-- FILTER & SEARCH --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" 
                       placeholder="Cari nama peserta..."
                       class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-700 
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
            </div>

            <div class="sm:w-56">
                <select class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                    <option>Semua Status</option>
                    <option>Naik Jenjang</option>
                    <option>Perpindahan Jabatan</option>
                </select>
            </div>
        </div>

        {{-- TABEL PESERTA --}}
        <div class="rounded-xl bg-white shadow-sm">

            <div class="overflow-x-auto scrollbar-thin">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50 text-left">
                            <th class="px-6 py-4 font-semibold text-gray-600">No.</th>
                            <th class="px-6 py-4 font-semibold text-gray-600">Nama Peserta</th>
                            <th class="px-6 py-4 font-semibold text-gray-600">Instansi</th>
                            <th class="px-6 py-4 font-semibold text-gray-600">Jabatan</th>
                            <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                            <th class="px-6 py-4 text-center font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @php
                            $peserta = [
                                ['Andi Pratama', 'Kota Magelang', 'Analis Kepegawaian', 'Naik Jenjang'],
                                ['Siti Nurhaliza', 'Kab. Semarang', 'Kepala Sub Bidang', 'Perpindahan Jabatan'],
                                ['Budi Santoso', 'Pemprov Jawa Tengah', 'Auditor Muda', 'Naik Jenjang'],
                                ['Rina Oktaviani', 'Kab. Kebumen', 'Perencana Ahli Muda', 'Perpindahan Jabatan'],
                                ['Dedi Kurniawan', 'Kota Surakarta', 'Penyuluh Sosial', 'Naik Jenjang'],
                                ['Putri Anggraini', 'Kab. Wonogiri', 'Analis SDM Aparatur', 'Perpindahan Jabatan'],
                                ['Fahri Ramadhan', 'Kab. Boyolali', 'Kepala Seksi', 'Naik Jenjang'],
                                ['Nabila Safitri', 'Kab. Klaten', 'Pranata Komputer', 'Perpindahan Jabatan'],
                                ['Rizky Maulana', 'Kab. Sukoharjo', 'Analis Kebijakan', 'Naik Jenjang'],
                                ['Lina Marlina', 'Kab. Karanganyar', 'Bendahara Pengeluaran', 'Perpindahan Jabatan'],
                            ];
                        @endphp

                        @foreach ($peserta as $i => $p)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-500">{{ $i + 1 }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $p[0] }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $p[1] }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $p[2] }}</td>
                                <td class="px-6 py-4">
                                    @if ($p[3] == 'Naik Jenjang')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Naik Jenjang
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>
                                            Perpindahan Jabatan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button type="button"
                                            onclick="bukaFormPenilaian('{{ $p[0] }}', '{{ $p[1] }}', '{{ $p[2] }}', '{{ $p[3] }}')"
                                            class="rounded-lg bg-blue-600 px-5 py-2 text-xs font-semibold text-white 
                                                   transition hover:bg-blue-700 hover:shadow-md">
                                        Nilai
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-between border-t border-gray-200 px-6 py-4">
                <p class="text-xs text-gray-500">Menampilkan 1–10 dari 20 peserta</p>
                <div class="flex items-center gap-2">
                    <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-400 hover:bg-gray-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-600 bg-blue-50 font-semibold text-blue-600">1</button>
                    <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">2</button>
                    <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">3</button>
                    <button class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ BAGIAN 2: FORM PENILAIAN (HIDDEN DEFAULT) ============ --}}
    <div id="sectionForm" class="hidden animate-fade-up">

        {{-- BREADCRUMB --}}
        <nav class="mb-3 flex items-center gap-2 text-xs text-gray-500">
            <button type="button" onclick="kembaliKeDaftar()" class="hover:text-blue-600">Peserta & Penilaian</button>
            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-700 font-medium">Penilaian Peserta</span>
        </nav>

        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Penilaian Peserta</h1>
            <button type="button" onclick="kembaliKeDaftar()"
                    class="flex items-center gap-2 rounded-lg border border-gray-300 px-4 py-2 text-xs font-semibold text-gray-600 transition hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </button>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('penilaian.simpan') }}" id="formPenilaian">
            @csrf

            {{-- CARD INFO PESERTA & PENGUJI --}}
            <div class="mb-6 grid grid-cols-1 gap-4 lg:grid-cols-3">

                {{-- Info Peserta --}}
                <div class="rounded-xl bg-white p-5 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-slate-100">
                            <svg class="h-9 w-9 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h2 id="infoNamaPeserta" class="text-lg font-bold text-gray-800 truncate">Andi Pratama</h2>
                            <div class="mt-1 flex items-center gap-1.5 text-xs text-gray-500">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                <span>Instansi: <span id="infoInstansi" class="text-gray-700 font-medium">Kota Magelang</span></span>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Jabatan: <span id="infoJabatan">Analis Kepegawaian</span></p>
                            <p class="mt-1 text-xs text-gray-500">Status: 
                                <span id="infoStatus" class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2 py-0.5 text-[10px] font-semibold text-blue-700">
                                    Naik Jenjang
                                </span>
                            </p>
                        </div>
                    </div>
                    <button type="button" class="mt-4 flex w-full items-center justify-center gap-2 rounded-lg border border-blue-500 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Lihat Berkas Peserta
                    </button>
                </div>

                {{-- Nilai Penguji 1 (Anda) --}}
                <div class="rounded-xl bg-white p-5 shadow-sm ring-2 ring-blue-100">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                            <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-800">Penguji 1 (Anda)</p>
                            <p class="text-xs text-gray-500">Dr. Muhammad Aswad, M.Si</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-xs font-semibold text-blue-600 mb-1">Nilai Anda</p>
                        <div class="flex items-baseline gap-2">
                            <span id="nilaiAndaDisplay" class="text-2xl font-bold text-blue-700">78,5</span>
                            <span class="text-sm text-gray-400">/ 100</span>
                        </div>
                    </div>
                </div>

                {{-- Nilai Penguji 2 --}}
                <div class="rounded-xl bg-white p-5 shadow-sm ring-2 ring-green-100">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                            <svg class="h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-800">Penguji 2</p>
                            <p class="text-xs text-gray-500">Dr. Sulaeman Fattah, M.Si</p>
                        </div>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-2 py-0.5 text-[10px] font-semibold text-green-700">
                            <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-green-500"></span>
                            Live
                        </span>
                    </div>
                    <div class="mt-4">
                        <p class="text-xs font-semibold text-green-600 mb-1">Nilai Penguji 2 (real-time)</p>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-bold text-green-700">90</span>
                            <span class="text-sm text-gray-400">/ 100</span>
                        </div>
                        <p class="mt-2 text-[10px] text-gray-400 text-right">Terakhir diperbarui 12 Jun 2025 10:26</p>
                    </div>
                </div>
            </div>

            {{-- FORM PENILAIAN KOMPETENSI --}}
            <div class="rounded-xl bg-white shadow-sm">

                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-base font-bold text-gray-800">Form Penilaian Kompetensi</h2>
                </div>

                <div class="overflow-x-auto scrollbar-thin">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50 text-left">
                                <th class="px-4 py-3 font-semibold text-gray-600">Judul Unit Kompetensi</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Jenis Kompetensi</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Elemen Kompetensi</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600">Nilai Penguji 1<br><span class="text-[10px] font-normal text-gray-400">(Anda)</span></th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600">Nilai Penguji 2<br><span class="text-[10px] font-normal text-gray-400">(Real-time)</span></th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600">Rata-rata</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Catatan Penguji 1</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Catatan Penguji 2</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @php
                                $kompetensi = [
                                    ['Kemampuan Analisis', 'Kompetensi Inti', 'Pengetahuan tentang Bidang Pekerjaan', 70, 80, ''],
                                    ['', '', 'Kemampuan menulis dan publikasi', 80, 82, ''],
                                    ['Kemampuan Politis', 'Kompetensi Inti', 'Konteks Politik (dinamika politik dan budaya birokrasi)', null, null, ''],
                                    ['', '', 'Regulasi dan Legislasi', null, null, ''],
                                    ['', '', 'Komunikasi (CV/wawancara)', null, null, ''],
                                    ['', '', 'Membangun jejaring (Networking)', null, null, ''],
                                    ['', 'Kompetensi Spesialis', 'Presentasi (CV/wawancara)', null, null, ''],
                                    ['', '', 'Konsultasi Publik (CV/wawancara)', null, null, ''],
                                    ['', '', 'Partnership (CV/wawancara)', null, null, ''],
                                    ['Kemampuan Analisis & Politis', 'Kompetensi Dasar', 'Manajemen Diri', 75, 77, ''],
                                    ['', '', 'Membangun Tim', 85, 75, ''],
                                ];
                            @endphp

                            @foreach ($kompetensi as $i => $k)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="px-4 py-3 align-middle">
                                        @if ($k[0])
                                            <span class="font-semibold text-gray-800">{{ $k[0] }}</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 align-middle">
                                        @if ($k[1])
                                            <span class="text-gray-600">{{ $k[1] }}</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 align-middle text-gray-700">{{ $k[2] }}</td>

                                    {{-- Nilai Penguji 1 --}}
                                    <td class="px-4 py-3 text-center align-middle">
                                        <input type="number" 
                                               name="nilai[{{ $i }}]"
                                               class="input-p1 w-16 rounded-lg border border-gray-300 px-2 py-1.5 text-center text-sm font-semibold text-blue-700
                                                      focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none"
                                               value="{{ $k[3] ?? '' }}"
                                               min="0" max="100"
                                               placeholder="—">
                                    </td>

                                    {{-- Nilai Penguji 2 (READ-ONLY) --}}
                                    <td class="px-4 py-3 text-center align-middle">
                                        @if (!is_null($k[4]))
                                            <div class="flex items-center justify-center gap-1.5">
                                                <span class="text-sm font-semibold text-green-700">{{ $k[4] }}</span>
                                                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-1.5 py-0.5 text-[9px] font-semibold text-green-700">
                                                    <span class="h-1 w-1 animate-pulse rounded-full bg-green-500"></span>
                                                    Live
                                                </span>
                                            </div>
                                        @else
                                            <span class="text-gray-300">—</span>
                                        @endif
                                    </td>

                                    {{-- Rata-rata --}}
                                    <td class="px-4 py-3 text-center align-middle">
                                        <span class="rata-rata text-sm font-semibold text-gray-800">
                                            @if (!is_null($k[3]) && !is_null($k[4]))
                                                {{ ($k[3] + $k[4]) / 2 }}
                                            @else
                                                —
                                            @endif
                                        </span>
                                    </td>

                                    {{-- Catatan Penguji 1 --}}
                                    <td class="px-4 py-3 align-middle">
                                        <textarea rows="1" 
                                                  name="catatan[{{ $i }}]"
                                                  placeholder="Tambahkan catatan..."
                                                  class="catatan-p1 w-full min-w-[140px] resize-none rounded-lg border border-gray-300 px-2 py-1.5 text-xs text-gray-700
                                                         focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">{{ $k[5] }}</textarea>
                                    </td>

                                    {{-- Catatan Penguji 2 (READ-ONLY) --}}
                                    <td class="px-4 py-3 align-middle">
                                        <div class="flex items-center gap-1.5 text-xs text-gray-400">
                                            <svg class="h-3.5 w-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                            <span class="italic">Tambahankan catatan...</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- FOOTER: PASSING GRADE + TOMBOL --}}
            <div class="mt-6">

                {{-- Info passing grade --}}
                <div class="mb-4 flex items-start gap-3 rounded-xl bg-blue-50 p-4">
                    <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-700">
                        Passing grade <span class="font-semibold text-blue-600">71.00</span> adalah nilai minimal kelulusan
                    </p>
                </div>

                {{-- Ringkasan --}}
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="flex items-center gap-4 rounded-xl bg-white p-5 shadow-sm">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500">Rata-rata Nilai Keseluruhan</p>
                            <div class="mt-1 flex items-baseline gap-2">
                                <span id="totalRata" class="text-2xl font-bold text-gray-800">0</span>
                                <span class="text-sm text-gray-400">/ 100</span>
                            </div>
                            <div class="mt-2 h-2 w-full overflow-hidden rounded-full bg-gray-200">
                                <div id="totalBar" class="h-full rounded-full bg-gradient-to-r from-blue-400 to-blue-600" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 rounded-xl bg-white p-5 shadow-sm">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500">Status</p>
                            <div class="mt-1">
                                <span id="statusKelulusan" class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500">
                                    Menunggu penilaian
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-6 flex items-center justify-end gap-3">
                    <button type="button" 
                            class="flex items-center gap-2 rounded-lg border border-blue-500 px-6 py-2.5 text-sm font-semibold text-blue-600 transition hover:bg-blue-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Simpan Draft
                    </button>

                    <button type="submit"
                            onclick="return confirm('Yakin selesaikan penilaian? Setelah disimpan, nilai tidak bisa diubah lagi.')"
                            class="flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-blue-600/30 transition hover:bg-blue-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Selesaikan Penilaian
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
<script>
    // ============================================
    // TOGGLE: Sembunyikan Daftar, Tampilkan Form
    // ============================================
    function bukaFormPenilaian(nama, instansi, jabatan, status) {
        // Update info peserta di form
        document.getElementById('infoNamaPeserta').textContent = nama;
        document.getElementById('infoInstansi').textContent = instansi;
        document.getElementById('infoJabatan').textContent = jabatan;

        // Update badge status
        const statusEl = document.getElementById('infoStatus');
        statusEl.textContent = status;
        if (status === 'Naik Jenjang') {
            statusEl.className = 'inline-flex items-center gap-1 rounded-full bg-green-100 px-2 py-0.5 text-[10px] font-semibold text-green-700';
        } else {
            statusEl.className = 'inline-flex items-center gap-1 rounded-full bg-orange-100 px-2 py-0.5 text-[10px] font-semibold text-orange-700';
        }

        // Sembunyikan daftar, tampilkan form
        document.getElementById('sectionDaftar').classList.add('hidden');
        document.getElementById('sectionForm').classList.remove('hidden');

        // Scroll ke atas
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function kembaliKeDaftar() {
        document.getElementById('sectionForm').classList.add('hidden');
        document.getElementById('sectionDaftar').classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // ============================================
    // HITUNG NILAI OTOMATIS
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        const inputP1 = document.querySelectorAll('.input-p1');
        const rataRata = document.querySelectorAll('.rata-rata');
        const totalRata = document.getElementById('totalRata');
        const totalBar = document.getElementById('totalBar');
        const statusKelulusan = document.getElementById('statusKelulusan');

        const nilaiP2 = [80, 82, null, null, null, null, null, null, null, 77, 75];

        function hitungSemua() {
            let total = 0;
            let count = 0;

            inputP1.forEach((input, i) => {
                const v1 = parseFloat(input.value) || 0;
                const v2 = nilaiP2[i];

                if (input.value !== '' && v2 !== null) {
                    const rata = ((v1 + v2) / 2).toFixed(1);
                    rataRata[i].textContent = rata;
                    total += (v1 + v2) / 2;
                    count++;
                } else {
                    rataRata[i].textContent = '—';
                }
            });

            const keseluruhan = count > 0 ? (total / count) : 0;
            const tampil = keseluruhan.toFixed(1).replace('.', ',');

            totalRata.textContent = tampil;
            totalBar.style.width = Math.min(keseluruhan, 100) + '%';

            if (count === 0) {
                statusKelulusan.className = 'inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-500';
                statusKelulusan.innerHTML = 'Menunggu penilaian';
            } else if (keseluruhan >= 71) {
                statusKelulusan.className = 'inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700';
                statusKelulusan.innerHTML = `
                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                    </svg>
                    Memenuhi Passing Grade
                `;
            } else {
                statusKelulusan.className = 'inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700';
                statusKelulusan.innerHTML = `
                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                    </svg>
                    Belum Memenuhi Passing Grade
                `;
            }
        }

        inputP1.forEach(input => {
            input.addEventListener('input', hitungSemua);
        });

        hitungSemua();
    });
</script>
@endpush