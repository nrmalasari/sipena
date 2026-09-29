@extends('layouts.app')

@section('title', 'Peserta & Penilaian - LAN RI')

@section('content')

    {{-- ============ HEADER ============ --}}
    <div class="mb-3 animate-fade-up">
        <nav class="flex items-center gap-2 text-xs text-gray-500">
            <span class="text-gray-700 font-medium">Peserta & Penilaian</span>
        </nav>
    </div>

    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Peserta & Penilaian</h1>
        <p class="mt-1 text-sm text-gray-500">
            Login sebagai:
            @if ($isBoth)
                <span class="font-semibold text-blue-600">Penguji Wawancara & Tertulis</span>
            @else
                <span class="font-semibold {{ $tipePenguji === 'tertulis' ? 'text-purple-600' : 'text-blue-600' }}">
                    Penguji {{ ucfirst($tipePenguji) }}
                </span>
            @endif
        </p>
    </div>

    {{-- ============ TAB PILIH TIPE ============ --}}
    @if ($isBoth)
        <div class="mb-6 flex gap-2 border-b-2 border-gray-200 animate-fade-up">
            <a href="{{ route('peserta.penilaian', ['tipe' => 'wawancara']) }}"
               class="flex items-center gap-2 px-6 py-3 text-sm font-semibold border-b-2 transition
                      {{ $tipePenguji === 'wawancara' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Wawancara
            </a>
            <a href="{{ route('peserta.penilaian', ['tipe' => 'tertulis']) }}"
               class="flex items-center gap-2 px-6 py-3 text-sm font-semibold border-b-2 transition
                      {{ $tipePenguji === 'tertulis' ? 'border-purple-600 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Tertulis
            </a>
        </div>
    @endif

    {{-- ============ DAFTAR PESERTA ============ --}}
    <div id="sectionDaftar" class="animate-fade-up delay-100">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" id="searchPeserta" placeholder="Cari nama peserta..."
                       class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-700
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
            </div>
        </div>

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
                    <tbody class="text-gray-700" id="tbodyPeserta">
                        @forelse ($peserta as $i => $p)
                            @php $isSudahDinilai = in_array($p->id, $sudahDinilai); @endphp
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-500">{{ $i + 1 }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $p->nama }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $p->instansi }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $p->jabatan }}</td>
                                <td class="px-6 py-4">
                                    @if ($isSudahDinilai)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                            </svg>
                                            Sudah Dinilai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                            Belum Dinilai
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button type="button"
                                            onclick="bukaFormPenilaian(
                                                {{ $p->id }},
                                                '{{ addslashes($p->nama) }}',
                                                '{{ addslashes($p->instansi) }}',
                                                '{{ addslashes($p->jabatan) }}',
                                                '{{ $p->link_berkas ?? '' }}',
                                                {{ $isSudahDinilai ? 'true' : 'false' }},
                                                '{{ $tipePenguji }}'
                                            )"
                                            class="inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-5 py-1.5 text-xs font-semibold text-white
                                                   transition hover:bg-blue-700 hover:shadow-md">
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        {{ $isSudahDinilai ? 'Lihat' : 'Nilai' }}
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                    Belum ada peserta yang ditugaskan untuk Anda
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between border-t border-gray-200 px-6 py-4">
                <p class="text-xs text-gray-500">Total: {{ $peserta->count() }} peserta</p>
            </div>
        </div>
    </div>

    {{-- ============ FORM PENILAIAN ============ --}}
    <div id="sectionForm" class="hidden animate-fade-up">

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

        <div id="bannerSudahDinilai" class="mb-6 hidden">
            <div class="flex items-start gap-3 rounded-xl bg-green-50 border border-green-200 p-4">
                <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-green-500 text-white">
                    <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-green-800">Penilaian sudah diselesaikan</p>
                    <p class="text-xs text-green-700 mt-0.5">Anda hanya dapat melihat penilaian.</p>
                </div>
            </div>
        </div>

        <input type="hidden" id="inputPesertaId" value="">
        <input type="hidden" id="inputTipe" value="{{ $tipePenguji }}">

        {{-- ============ CARD INFO PESERTA ============ --}}
        <div class="mb-6 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-slate-100">
                    <svg class="h-9 w-9 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h2 id="infoNamaPeserta" class="text-lg font-bold text-gray-800 truncate">—</h2>
                    <p class="mt-1 text-xs text-gray-500">Instansi: <span id="infoInstansi" class="text-gray-700 font-medium">—</span></p>
                    <p class="mt-1 text-xs text-gray-500">Jabatan: <span id="infoJabatan">—</span></p>
                </div>
                <button type="button" id="btnLihatBerkas" onclick="bukaBerkasPeserta()" disabled
                        class="flex items-center gap-2 rounded-lg border border-blue-500 px-4 py-2 text-xs font-semibold text-blue-600
                               transition hover:bg-blue-50 disabled:cursor-not-allowed disabled:border-gray-300 disabled:bg-gray-50 disabled:text-gray-400 flex-shrink-0">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span id="btnLihatBerkasText">Lihat Berkas</span>
                </button>
            </div>
        </div>

        {{-- INDIKATOR AUTO-SAVE --}}
        <div class="mb-4 flex items-center justify-between">
            <div id="autosaveIndicator" class="hidden inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                <svg class="h-3.5 w-3.5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Menyimpan...
            </div>
            <div id="autosaveSuccess" class="hidden inline-flex items-center gap-2 rounded-full bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700">
                <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                </svg>
                Tersimpan
            </div>
            <div class="ml-auto flex items-center gap-2 text-xs text-gray-500">
                <span class="h-2 w-2 animate-pulse rounded-full bg-green-500"></span>
                <span>Live sync aktif — diperbarui <span id="lastUpdate">-</span></span>
            </div>
        </div>

        {{-- ================= TABEL WAWANCARA ================= --}}
        @if ($tipePenguji === 'wawancara')
            <div class="mb-6 rounded-xl bg-white shadow-sm">
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Form Penilaian Ujian Wawancara</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Bobot: 60% dari total nilai</p>
                    </div>
                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">Wawancara</span>
                </div>

                <div class="overflow-x-auto scrollbar-thin">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50 text-left">
                                <th class="px-4 py-3 font-semibold text-gray-600">Judul Unit</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Jenis</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Elemen Kompetensi</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600">Nilai P1 (Anda)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600">Nilai P2 (Live)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600">Rata-rata</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @php
                                $wawancara = [
                                    ['Kemampuan Analisis', 'Kompetensi Inti', 'Pengetahuan tentang Bidang Pekerjaan'],
                                    ['', '', 'Kemampuan menulis dan publikasi'],
                                    ['Kemampuan Politis', 'Kompetensi Inti', 'Konteks Politik'],
                                    ['', '', 'Regulasi dan Legislasi'],
                                    ['', '', 'Komunikasi'],
                                    ['', '', 'Membangun jejaring'],
                                    ['', 'Kompetensi Spesialis', 'Presentasi'],
                                    ['', '', 'Konsultasi Publik'],
                                    ['', '', 'Partnership'],
                                    ['Kemampuan Analisis & Politis', 'Kompetensi Dasar', 'Manajemen Diri'],
                                    ['', '', 'Membangun Tim'],
                                ];
                            @endphp

                            @foreach ($wawancara as $i => $k)
                                <tr class="border-b border-gray-100 hover:bg-gray-50" data-urutan="{{ $i }}">
                                    <td class="px-4 py-3">
                                        @if ($k[0])<span class="font-semibold text-gray-800">{{ $k[0] }}</span>@endif
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($k[1])<span class="text-gray-600">{{ $k[1] }}</span>@endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">{{ $k[2] }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="number"
                                               data-urutan="{{ $i }}"
                                               class="input-nilai w-16 rounded-lg border border-gray-300 px-2 py-1.5 text-center text-sm font-semibold text-blue-700
                                                      focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none"
                                               min="0" max="100" placeholder="—">
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="nilai-p2 text-sm font-semibold text-green-700" data-urutan="{{ $i }}">—</span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="rata-rata text-sm font-semibold text-gray-800" data-urutan="{{ $i }}">—</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- ================= TABEL TERTULIS ================= --}}
        @if ($tipePenguji === 'tertulis')
            <div class="mb-6 rounded-xl bg-white shadow-sm">
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Form Penilaian Ujian Tertulis</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Bobot: 40% dari total nilai</p>
                    </div>
                    <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">Tertulis</span>
                </div>

                <div class="overflow-x-auto scrollbar-thin">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50 text-left">
                                <th class="px-4 py-3 font-semibold text-gray-600">Judul Unit</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Jenis</th>
                                <th class="px-4 py-3 font-semibold text-gray-600">Elemen Kompetensi</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600">Nilai Anda</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @php
                                $tertulis = [
                                    ['Kemampuan Analisis', 'Kompetensi Inti', 'Pengetahuan tentang substansi Kebijakan Publik'],
                                    ['', '', 'Metode Riset'],
                                    ['', '', 'Teknik dan Analisis Kebijakan'],
                                    ['', 'Kompetensi Spesialis', 'Penyusunan Saran Kebijakan'],
                                    ['Kemampuan Politis', 'Kompetensi Inti', 'Regulasi dan Legislasi'],
                                ];
                            @endphp

                            @foreach ($tertulis as $i => $k)
                                <tr class="border-b border-gray-100 hover:bg-gray-50" data-urutan="{{ $i }}">
                                    <td class="px-4 py-3">
                                        @if ($k[0])<span class="font-semibold text-gray-800">{{ $k[0] }}</span>@endif
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($k[1])<span class="text-gray-600">{{ $k[1] }}</span>@endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">{{ $k[2] }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="number"
                                               data-urutan="{{ $i }}"
                                               class="input-nilai w-16 rounded-lg border border-gray-300 px-2 py-1.5 text-center text-sm font-semibold text-purple-700
                                                      focus:border-purple-500 focus:ring-2 focus:ring-purple-200 focus:outline-none"
                                               min="0" max="100" placeholder="—">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- ================= CATATAN (WAJIB) ================= --}}
        <div class="mt-6">
            <div class="rounded-xl bg-white p-6 shadow-sm border-2 border-amber-200">
                <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-100">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-amber-100">
                        <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">
                            Catatan Penilaian
                            <span class="text-red-500">*</span>
                        </h2>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Catatan <strong>wajib diisi</strong> sebelum menyimpan penilaian.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 {{ $tipePenguji === 'wawancara' ? 'lg:grid-cols-2' : '' }} gap-4">
                    {{-- Catatan Anda --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-2">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-2.5 py-0.5 text-[10px] font-bold text-blue-700 uppercase">
                                Catatan Anda
                            </span>
                        </label>
                        <textarea id="catatanAnda" rows="6"
                                  placeholder="Tulis catatan penilaian Anda di sini... (WAJIB DIISI)"
                                  class="w-full rounded-lg border-2 border-amber-300 px-3 py-2.5 text-sm text-gray-700
                                         focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none
                                         resize-none"></textarea>
                        <p id="catatanError" class="mt-2 text-xs text-red-500 hidden">
                            ⚠️ Catatan wajib diisi sebelum menyimpan penilaian.
                        </p>
                    </div>

                    {{-- Catatan Rekan (hanya wawancara) --}}
                    @if ($tipePenguji === 'wawancara')
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-2.5 py-0.5 text-[10px] font-bold text-green-700 uppercase">
                                    Catatan Rekan Penguji
                                </span>
                            </label>
                            <div id="catatanRekan"
                                 class="w-full min-h-[144px] rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-gray-700">
                                <p class="text-xs text-gray-400 italic">Menunggu data dari rekan penguji...</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-6 flex items-center justify-end gap-3">
                <button type="button" onclick="kembaliKeDaftar()"
                        class="flex items-center gap-2 rounded-lg border border-gray-300 px-6 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                    Batal
                </button>

                {{-- ✅ TOMBOL DINAMIS: Ganti teks & warna sesuai sudah/belum ada data di DB --}}
                <button type="button" id="btnSelesaikan" onclick="konfirmasiSelesaikan()"
                        class="flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-blue-600/30 transition hover:bg-blue-700">
                    <svg id="btnSelesaikanIcon" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span id="btnSelesaikanText">Selesaikan Penilaian</span>
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    let pesertaAktif = { id: null, nama: '', instansi: '', jabatan: '', linkBerkas: '', tipe: 'wawancara' };
    let pollingInterval = null;
    const saveTimers = {};
    let catatanTimer = null;
    let nilaiAsliDariServer = {};

    // ✅ Flag: apakah peserta ini SUDAH ADA DATA di DB
    // Di-set true HANYA dari response server (loadLiveNilai)
    // BUKAN dari autosave lokal
    let sudahAdaDataDiDb = false;

    // ✅ Icon SVG untuk state tombol
    const ICON_SAVE = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>';
    const ICON_UPDATE = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>';

    /**
     * ✅ Update tampilan tombol:
     * - Kalau BELUM ada data di DB → "Selesaikan Penilaian" (biru)
     * - Kalau SUDAH ada data di DB → "Update Penilaian" (hijau)
     */
    function updateTampilanTombol() {
        const btn = document.getElementById('btnSelesaikan');
        const btnText = document.getElementById('btnSelesaikanText');
        const btnIcon = document.getElementById('btnSelesaikanIcon');

        if (!btn || !btnText || !btnIcon) return;

        if (sudahAdaDataDiDb) {
            // ✅ SUDAH ada data di DB → tombol "Update Penilaian" (hijau)
            btnText.textContent = 'Update Penilaian';
            btnIcon.innerHTML = ICON_UPDATE;
            btn.className = 'flex items-center gap-2 rounded-lg bg-green-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-green-600/30 transition hover:bg-green-700';
        } else {
            // ✅ BELUM ada data di DB → tombol "Selesaikan Penilaian" (biru)
            btnText.textContent = 'Selesaikan Penilaian';
            btnIcon.innerHTML = ICON_SAVE;
            btn.className = 'flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-blue-600/30 transition hover:bg-blue-700';
        }
    }

    function bukaFormPenilaian(id, nama, instansi, jabatan, linkBerkas, sudahDinilai, tipe) {
        pesertaAktif = { id, nama, instansi, jabatan, linkBerkas, tipe: tipe || '{{ $tipePenguji }}' };
        nilaiAsliDariServer = {};

        // ✅ RESET flag — akan di-set ulang dari loadLiveNilai()
        sudahAdaDataDiDb = false;

        document.getElementById('infoNamaPeserta').textContent = nama;
        document.getElementById('infoInstansi').textContent = instansi;
        document.getElementById('infoJabatan').textContent = jabatan;
        document.getElementById('inputPesertaId').value = id;
        document.getElementById('inputTipe').value = pesertaAktif.tipe;

        const btnBerkas = document.getElementById('btnLihatBerkas');
        const btnBerkasText = document.getElementById('btnLihatBerkasText');
        if (linkBerkas && linkBerkas.trim() !== '') {
            btnBerkas.disabled = false;
            btnBerkasText.textContent = 'Lihat Berkas Peserta';
        } else {
            btnBerkas.disabled = true;
            btnBerkasText.textContent = 'Berkas tidak tersedia';
        }

        const banner = document.getElementById('bannerSudahDinilai');
        if (sudahDinilai) banner.classList.remove('hidden');
        else banner.classList.add('hidden');

        document.querySelectorAll('.input-nilai').forEach(inp => inp.value = '');
        document.querySelectorAll('.nilai-p2').forEach(el => el.textContent = '—');
        document.querySelectorAll('.rata-rata').forEach(el => el.textContent = '—');

        const catatanAnda = document.getElementById('catatanAnda');
        if (catatanAnda) catatanAnda.value = '';

        const catatanError = document.getElementById('catatanError');
        if (catatanError) catatanError.classList.add('hidden');

        const catatanRekan = document.getElementById('catatanRekan');
        if (catatanRekan) {
            catatanRekan.innerHTML = '<p class="text-xs text-gray-400 italic">Menunggu data dari rekan penguji...</p>';
        }

        // ✅ Set tombol ke state awal (belum tahu) — akan di-update oleh loadLiveNilai()
        updateTampilanTombol();

        document.getElementById('sectionDaftar').classList.add('hidden');
        document.getElementById('sectionForm').classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });

        // Load data dari server
        loadLiveNilai();
        startPolling();
    }

    function bukaBerkasPeserta() {
        if (!pesertaAktif.linkBerkas || pesertaAktif.linkBerkas.trim() === '') {
            Swal.fire({
                icon: 'info',
                title: 'Berkas Tidak Tersedia',
                text: 'Peserta ini belum memiliki link berkas.',
                confirmButtonColor: '#2563eb'
            });
            return;
        }
        window.open(pesertaAktif.linkBerkas, '_blank', 'noopener,noreferrer');
    }

    function autoSave(urutan) {
        clearTimeout(saveTimers[urutan]);
        saveTimers[urutan] = setTimeout(() => {
            const inputNilai = document.querySelector(`.input-nilai[data-urutan="${urutan}"]`);
            const nilai = inputNilai.value !== '' ? parseFloat(inputNilai.value) : null;

            document.getElementById('autosaveIndicator').classList.remove('hidden');
            document.getElementById('autosaveSuccess').classList.add('hidden');

            fetch('{{ route('peserta.penilaian.simpan-nilai') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    peserta_id: pesertaAktif.id,
                    urutan: urutan,
                    nilai: nilai,
                    tipe: pesertaAktif.tipe,
                    tipe_aktif: pesertaAktif.tipe
                })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('autosaveIndicator').classList.add('hidden');
                if (data.ok) {
                    document.getElementById('autosaveSuccess').classList.remove('hidden');
                    document.getElementById('lastUpdate').textContent = new Date().toLocaleTimeString('id-ID');

                    nilaiAsliDariServer[urutan] = nilai;

                    // ✅ JANGAN ubah sudahAdaDataDiDb di sini!
                    // Flag hanya boleh di-set dari loadLiveNilai() (response server)
                    // supaya konsisten dengan state DB.

                    setTimeout(() => {
                        document.getElementById('autosaveSuccess').classList.add('hidden');
                    }, 1500);
                }
            })
            .catch(err => {
                console.error('Save error:', err);
                document.getElementById('autosaveIndicator').classList.add('hidden');
            });
        }, 600);
    }

    function autoSaveCatatan() {
        clearTimeout(catatanTimer);
        catatanTimer = setTimeout(() => {
            const catatanValue = document.getElementById('catatanAnda').value.trim();

            document.getElementById('autosaveIndicator').classList.remove('hidden');
            document.getElementById('autosaveSuccess').classList.add('hidden');

            fetch('{{ route('peserta.penilaian.simpan-catatan') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    peserta_id: pesertaAktif.id,
                    catatan: catatanValue,
                    tipe: pesertaAktif.tipe,
                    tipe_aktif: pesertaAktif.tipe
                })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('autosaveIndicator').classList.add('hidden');
                if (data.ok) {
                    document.getElementById('autosaveSuccess').classList.remove('hidden');
                    document.getElementById('lastUpdate').textContent = new Date().toLocaleTimeString('id-ID');

                    if (catatanValue !== '') {
                        document.getElementById('catatanError').classList.add('hidden');
                    }

                    // ✅ JANGAN ubah sudahAdaDataDiDb di sini juga!
                    // Biarkan loadLiveNilai() yang menentukan.

                    setTimeout(() => {
                        document.getElementById('autosaveSuccess').classList.add('hidden');
                    }, 1500);
                }
            })
            .catch(err => {
                console.error('Save catatan error:', err);
                document.getElementById('autosaveIndicator').classList.add('hidden');
            });
        }, 800);
    }

    function loadLiveNilai() {
        if (!pesertaAktif.id) return;

        fetch('{{ route('peserta.penilaian.live-nilai') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                peserta_id: pesertaAktif.id,
                tipe: pesertaAktif.tipe,
                tipe_aktif: pesertaAktif.tipe
            })
        })
        .then(res => res.json())
        .then(data => {
            if (!data.ok) return;

            // ✅ CEK APAKAH DI DB SUDAH ADA DATA
            // Kriteria: minimal ada 1 nilai yang tersimpan ATAU catatan tidak kosong
            const adaNilaiDiServer = data.nilai_saya
                && Object.keys(data.nilai_saya).length > 0
                && Object.values(data.nilai_saya).some(v => v.nilai !== null && v.nilai !== undefined);

            const adaCatatanDiServer = data.catatan_saya
                && data.catatan_saya.trim() !== '';

            // ✅ Set flag & update tombol berdasarkan state DB
            const stateDb = adaNilaiDiServer || adaCatatanDiServer;
            if (sudahAdaDataDiDb !== stateDb) {
                sudahAdaDataDiDb = stateDb;
                updateTampilanTombol();
            }

            // Isi nilai sendiri
            Object.entries(data.nilai_saya || {}).forEach(([urutan, val]) => {
                const inputNilai = document.querySelector(`.input-nilai[data-urutan="${urutan}"]`);
                if (!inputNilai) return;
                if (document.activeElement === inputNilai) return;
                if (nilaiAsliDariServer[urutan] !== undefined && nilaiAsliDariServer[urutan] == val.nilai) return;

                const newVal = val.nilai ?? '';
                if (inputNilai.value !== newVal) {
                    inputNilai.value = newVal;
                    nilaiAsliDariServer[urutan] = val.nilai;
                }
            });

            // Isi catatan sendiri
            const catatanAnda = document.getElementById('catatanAnda');
            if (catatanAnda && document.activeElement !== catatanAnda && catatanAnda.value === '') {
                catatanAnda.value = data.catatan_saya ?? '';
            }

            // Isi nilai P2 (LIVE)
            const rekan = data.rekan;
            if (rekan && rekan.nilai) {
                Object.entries(rekan.nilai).forEach(([urutan, val]) => {
                    const elNilai = document.querySelector(`.nilai-p2[data-urutan="${urutan}"]`);
                    if (elNilai) elNilai.textContent = val.nilai ?? '—';
                });
            } else {
                document.querySelectorAll('.nilai-p2').forEach(el => el.textContent = '—');
            }

            // Isi catatan rekan
            const catatanRekan = document.getElementById('catatanRekan');
            if (catatanRekan) {
                if (rekan && rekan.catatan && rekan.catatan.trim() !== '') {
                    catatanRekan.innerHTML = `<p class="text-sm text-gray-700 whitespace-pre-line">${rekan.catatan}</p>`;
                } else {
                    catatanRekan.innerHTML = '<p class="text-xs text-gray-400 italic">Rekan belum mengisi catatan.</p>';
                }
            }

            const lastUpdate = document.getElementById('lastUpdate');
            if (lastUpdate) lastUpdate.textContent = data.updated_at || '-';

            hitungRataRata();
        })
        .catch(err => console.error('Load live error:', err));
    }

    function startPolling() {
        stopPolling();
        pollingInterval = setInterval(loadLiveNilai, 3000);
    }

    function stopPolling() {
        if (pollingInterval) {
            clearInterval(pollingInterval);
            pollingInterval = null;
        }
    }

    function hitungRataRata() {
        document.querySelectorAll('.input-nilai').forEach((input) => {
            const urutan = input.dataset.urutan;
            const v1 = parseFloat(input.value);
            const elP2 = document.querySelector(`.nilai-p2[data-urutan="${urutan}"]`);
            const elRata = document.querySelector(`.rata-rata[data-urutan="${urutan}"]`);

            const v2 = elP2 && elP2.textContent !== '—' ? parseFloat(elP2.textContent) : null;

            if (!isNaN(v1) && v2 !== null && !isNaN(v2)) {
                const rata = (v1 + v2) / 2;
                if (elRata) elRata.textContent = rata.toFixed(1).replace('.', ',');
            } else if (!isNaN(v1)) {
                if (elRata) elRata.textContent = v1.toFixed(1).replace('.', ',');
            } else {
                if (elRata) elRata.textContent = '—';
            }
        });
    }

    function kembaliKeDaftar() {
        stopPolling();
        document.getElementById('sectionForm').classList.add('hidden');
        document.getElementById('sectionDaftar').classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function konfirmasiSelesaikan() {
        const catatanValue = document.getElementById('catatanAnda').value.trim();
        const catatanError = document.getElementById('catatanError');

        if (catatanValue === '') {
            catatanError.classList.remove('hidden');
            document.getElementById('catatanAnda').focus();
            document.getElementById('catatanAnda').scrollIntoView({ behavior: 'smooth', block: 'center' });

            Swal.fire({
                icon: 'warning',
                title: 'Catatan Wajib Diisi',
                text: 'Anda harus mengisi catatan penilaian sebelum menyimpan.',
                confirmButtonColor: '#f59e0b'
            });
            return;
        }

        catatanError.classList.add('hidden');

        // ✅ Text konfirmasi menyesuaikan state DB
        const isUpdate = sudahAdaDataDiDb;
        const titleConfirm = isUpdate ? 'Update Penilaian?' : 'Selesaikan Penilaian?';
        const textConfirm = isUpdate
            ? 'Penilaian akan diperbarui. Pastikan semua nilai sudah benar.'
            : 'Setelah disimpan, nilai tidak dapat diubah lagi.';
        const confirmText = isUpdate ? 'Ya, Update' : 'Ya, Selesaikan';
        const confirmColor = isUpdate ? '#16a34a' : '#2563eb';

        Swal.fire({
            title: titleConfirm,
            text: textConfirm,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: confirmColor,
            cancelButtonColor: '#9ca3af',
            confirmButtonText: confirmText,
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('{{ route('peserta.penilaian.selesaikan') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        peserta_id: pesertaAktif.id,
                        tipe: pesertaAktif.tipe,
                        tipe_aktif: pesertaAktif.tipe
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.ok) {
                        window.location.href = '{{ route('penilaian.berhasil') }}';
                    } else {
                        Swal.fire('Gagal', data.msg || 'Terjadi kesalahan', 'error');
                    }
                })
                .catch(() => Swal.fire('Gagal', 'Terjadi kesalahan jaringan', 'error'));
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.input-nilai').forEach(inp => {
            inp.addEventListener('input', function() {
                hitungRataRata();
                autoSave(this.dataset.urutan);
            });
        });

        const catatanAnda = document.getElementById('catatanAnda');
        if (catatanAnda) {
            catatanAnda.addEventListener('input', function() {
                autoSaveCatatan();
                if (this.value.trim() !== '') {
                    document.getElementById('catatanError').classList.add('hidden');
                }
            });
        }

        const searchInput = document.getElementById('searchPeserta');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const q = this.value.toLowerCase();
                document.querySelectorAll('#tbodyPeserta tr').forEach(tr => {
                    const nama = tr.cells[1]?.textContent.toLowerCase() ?? '';
                    tr.style.display = nama.includes(q) ? '' : 'none';
                });
            });
        }

        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                stopPolling();
            } else if (!document.getElementById('sectionForm').classList.contains('hidden')) {
                startPolling();
            }
        });
    });
</script>
@endpush