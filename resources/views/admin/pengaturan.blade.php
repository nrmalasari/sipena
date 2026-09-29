@extends('layouts.admin')

@section('title', 'Pengaturan - LAN RI')

@section('breadcrumb')
    <span class="text-gray-400">Dashboard</span>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Pengaturan</span>
@endsection

@section('content')

    {{-- HEADER --}}
    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Pengaturan</h1>
        <p class="mt-1 text-sm text-gray-500">Kelola pengaturan sistem dan profil admin.</p>
    </div>

    @if (session('success'))
        <div class="mb-6 animate-fade-up rounded-lg border border-green-200 bg-green-50 p-4">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                </svg>
                <p class="text-sm font-semibold text-green-800">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 animate-fade-up rounded-lg border border-red-200 bg-red-50 p-4">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <p class="text-sm font-semibold text-red-800">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    {{-- GRID 2 KOLOM --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- ============ KOLOM KIRI: MENU PENGATURAN ============ --}}
        <div class="lg:col-span-1 animate-fade-up delay-100">
            <div class="rounded-xl bg-white shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-5 py-4">
                    <h2 class="text-sm font-bold text-gray-800">Menu Pengaturan</h2>
                </div>

                <nav class="p-2">
                    {{-- Profil --}}
                    <button type="button"
                            onclick="switchTab('profil')"
                            data-tab="profil"
                            class="tab-button flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left transition
                                   bg-blue-50 text-blue-700 font-semibold">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="text-sm">Profil Admin</span>
                    </button>

                    {{-- Sistem --}}
                    <button type="button"
                            onclick="switchTab('sistem')"
                            data-tab="sistem"
                            class="tab-button flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left transition
                                   text-gray-600 hover:bg-gray-50">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm">Pengaturan Sistem</span>
                    </button>

                    {{-- Kriteria --}}
                    <button type="button"
                            onclick="switchTab('kriteria')"
                            data-tab="kriteria"
                            class="tab-button flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left transition
                                   text-gray-600 hover:bg-gray-50">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                        <span class="text-sm">Kriteria Penilaian</span>
                    </button>

                    {{-- Akun --}}
                    <button type="button"
                            onclick="switchTab('akun')"
                            data-tab="akun"
                            class="tab-button flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left transition
                                   text-gray-600 hover:bg-gray-50">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                        </svg>
                        <span class="text-sm">Akun & Keamanan</span>
                    </button>

                    {{-- Backup --}}
                    <button type="button"
                            onclick="switchTab('backup')"
                            data-tab="backup"
                            class="tab-button flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left transition
                                   text-gray-600 hover:bg-gray-50">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 7v10c0 2 1.5 3 3 3h10c1.5 0 3-1 3-3V7c0-2-1.5-3-3-3H7c-1.5 0-3 1-3 3z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 11v6m-3-3h6"/>
                        </svg>
                        <span class="text-sm">Backup & Restore</span>
                    </button>
                </nav>
            </div>
        </div>

        {{-- ============ KOLOM KANAN: KONTEN TAB ============ --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- ==================== TAB: PROFIL ==================== --}}
            <div id="tab-profil" class="tab-content animate-fade-up delay-100">
                <form method="POST" action="#" class="rounded-xl bg-white shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-base font-bold text-gray-800">Profil Admin</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Informasi akun administrator sistem</p>
                    </div>

                    <div class="p-6 space-y-5">

                        {{-- Avatar --}}
                        <div class="flex items-center gap-5">
                            <div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                                <svg class="h-10 w-10 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-bold text-gray-800">
                                    {{ session('nama_penguji', 'Administrator') }}
                                </p>
                                <p class="text-sm text-gray-500">Administrator Sistem</p>
                                <span class="mt-1 inline-block rounded-full bg-blue-100 px-3 py-0.5 text-xs font-semibold text-blue-700">
                                    Super Admin
                                </span>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        {{-- Grid Info --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama"
                                       value="{{ session('nama_penguji', 'Administrator') }}"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Username <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="username" value="admin"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" value="admin@lanri.go.id"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    NIP
                                </label>
                                <input type="text" name="nip" value="197512312000121001"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Instansi
                                </label>
                                <input type="text" name="instansi" value="LAN RI"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-6 py-4 flex items-center justify-end gap-3">
                        <button type="reset"
                                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                            Reset
                        </button>
                        <button type="submit"
                                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            {{-- ==================== TAB: SISTEM ==================== --}}
            <div id="tab-sistem" class="tab-content hidden animate-fade-up delay-100">
                <form method="POST" action="#" class="rounded-xl bg-white shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-base font-bold text-gray-800">Pengaturan Sistem</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Konfigurasi umum aplikasi</p>
                    </div>

                    <div class="p-6 space-y-5">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Aplikasi
                            </label>
                            <input type="text" name="app_name" value="SIPENA - LAN RI"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Instansi
                            </label>
                            <input type="text" name="nama_instansi"
                                   value="Lembaga Administrasi Negara Republik Indonesia"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Passing Grade
                                </label>
                                <input type="number" name="passing_grade" value="71.00"
                                       step="0.01" min="0" max="100"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                                <p class="mt-1 text-xs text-gray-500">Nilai minimal kelulusan peserta</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Jumlah Penilai per Peserta
                                </label>
                                <input type="number" name="jumlah_penilai" value="2"
                                       min="1" max="5"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                                <p class="mt-1 text-xs text-gray-500">Default 2 penilai</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Zona Waktu
                            </label>
                            <select name="timezone"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                                <option value="Asia/Jakarta" selected>WIB (Asia/Jakarta) - UTC+7</option>
                                <option value="Asia/Makassar">WITA (Asia/Makassar) - UTC+8</option>
                                <option value="Asia/Jayapura">WIT (Asia/Jayapura) - UTC+9</option>
                            </select>
                        </div>

                        {{-- Toggle Switches --}}
                        <div class="space-y-3 pt-2">
                            <label class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 cursor-pointer hover:bg-gray-50">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Mode Maintenance</p>
                                    <p class="text-xs text-gray-500">Hanya admin yang bisa akses sistem</p>
                                </div>
                                <input type="checkbox" name="maintenance_mode" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </label>

                            <label class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 cursor-pointer hover:bg-gray-50">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Live Sync Penilaian</p>
                                    <p class="text-xs text-gray-500">Sinkronisasi real-time antar penilai</p>
                                </div>
                                <input type="checkbox" name="live_sync" checked class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </label>

                            <label class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 cursor-pointer hover:bg-gray-50">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Auto-Save Nilai</p>
                                    <p class="text-xs text-gray-500">Simpan nilai otomatis saat diisi</p>
                                </div>
                                <input type="checkbox" name="auto_save" checked class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </label>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-6 py-4 flex items-center justify-end gap-3">
                        <button type="reset"
                                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                            Reset
                        </button>
                        <button type="submit"
                                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>

            {{-- ==================== TAB: KRITERIA ==================== --}}
            <div id="tab-kriteria" class="tab-content hidden animate-fade-up delay-100">
                <div class="rounded-xl bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-base font-bold text-gray-800">Kriteria Penilaian</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Bobot untuk setiap jenis kompetensi</p>
                    </div>

                    <div class="p-6 space-y-6">

                        {{-- Kenaikan Jenjang --}}
                        <div>
                            <div class="mb-3 flex items-center gap-2">
                                <span class="inline-block h-3 w-3 rounded-full bg-blue-600"></span>
                                <h3 class="text-sm font-bold text-gray-800">Kenaikan Jenjang</h3>
                                <span class="rounded-full bg-blue-100 px-2 py-0.5 text-[10px] font-semibold text-blue-700">
                                    Hanya Wawancara
                                </span>
                            </div>

                            <div class="overflow-x-auto rounded-lg border border-gray-200">
                                <table class="w-full text-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-600">Judul Unit</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-600">Jenis Kompetensi</th>
                                            <th class="px-4 py-3 text-center font-semibold text-gray-600">Bobot Tipe Ujian</th>
                                            <th class="px-4 py-3 text-center font-semibold text-gray-600">Bobot Kompetensi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Analisis</td>
                                            <td class="px-4 py-2.5">Kompetensi Inti</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">100%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">75%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Analisis</td>
                                            <td class="px-4 py-2.5">Kompetensi Dasar</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">100%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">25%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Politis</td>
                                            <td class="px-4 py-2.5">Kompetensi Inti+Spesialis</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">100%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">75%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Politis</td>
                                            <td class="px-4 py-2.5">Kompetensi Dasar</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">100%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">25%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Perpindahan Jabatan --}}
                        <div>
                            <div class="mb-3 flex items-center gap-2">
                                <span class="inline-block h-3 w-3 rounded-full bg-purple-600"></span>
                                <h3 class="text-sm font-bold text-gray-800">Perpindahan Jabatan</h3>
                                <span class="rounded-full bg-purple-100 px-2 py-0.5 text-[10px] font-semibold text-purple-700">
                                    Wawancara + Tertulis
                                </span>
                            </div>

                            <div class="overflow-x-auto rounded-lg border border-gray-200">
                                <table class="w-full text-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-600">Judul Unit</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-600">Tipe Ujian</th>
                                            <th class="px-4 py-3 text-left font-semibold text-gray-600">Jenis Kompetensi</th>
                                            <th class="px-4 py-3 text-center font-semibold text-gray-600">Bobot Tipe Ujian</th>
                                            <th class="px-4 py-3 text-center font-semibold text-gray-600">Bobot Kompetensi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Analisis</td>
                                            <td class="px-4 py-2.5"><span class="rounded-full bg-blue-100 px-2 py-0.5 text-[10px] font-semibold text-blue-700">Wawancara</span></td>
                                            <td class="px-4 py-2.5">Kompetensi Inti</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">60%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">55%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Analisis</td>
                                            <td class="px-4 py-2.5"><span class="rounded-full bg-blue-100 px-2 py-0.5 text-[10px] font-semibold text-blue-700">Wawancara</span></td>
                                            <td class="px-4 py-2.5">Kompetensi Dasar</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">60%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">5%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Analisis</td>
                                            <td class="px-4 py-2.5"><span class="rounded-full bg-purple-100 px-2 py-0.5 text-[10px] font-semibold text-purple-700">Tertulis</span></td>
                                            <td class="px-4 py-2.5">Kompetensi Inti</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-purple-700">40%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">55%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Analisis</td>
                                            <td class="px-4 py-2.5"><span class="rounded-full bg-purple-100 px-2 py-0.5 text-[10px] font-semibold text-purple-700">Tertulis</span></td>
                                            <td class="px-4 py-2.5">Kompetensi Spesialis</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-purple-700">40%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">55%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Politis</td>
                                            <td class="px-4 py-2.5"><span class="rounded-full bg-blue-100 px-2 py-0.5 text-[10px] font-semibold text-blue-700">Wawancara</span></td>
                                            <td class="px-4 py-2.5">Kompetensi Inti+Spesialis</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">60%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">55%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Politis</td>
                                            <td class="px-4 py-2.5"><span class="rounded-full bg-blue-100 px-2 py-0.5 text-[10px] font-semibold text-blue-700">Wawancara</span></td>
                                            <td class="px-4 py-2.5">Kompetensi Dasar</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-blue-700">60%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">5%</td>
                                        </tr>
                                        <tr class="border-t border-gray-100">
                                            <td class="px-4 py-2.5">Kemampuan Politis</td>
                                            <td class="px-4 py-2.5"><span class="rounded-full bg-purple-100 px-2 py-0.5 text-[10px] font-semibold text-purple-700">Tertulis</span></td>
                                            <td class="px-4 py-2.5">Kompetensi Inti</td>
                                            <td class="px-4 py-2.5 text-center font-semibold text-purple-700">40%</td>
                                            <td class="px-4 py-2.5 text-center font-semibold">55%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Info Box --}}
                        <div class="rounded-lg bg-yellow-50 border border-yellow-200 p-4 flex items-start gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-yellow-600 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-bold text-yellow-800">Info</p>
                                <p class="text-xs text-yellow-700 mt-1">
                                    Bobot kriteria di atas bersifat <strong>read-only</strong>. Untuk mengubah bobot, hubungi developer sistem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ==================== TAB: AKUN ==================== --}}
            <div id="tab-akun" class="tab-content hidden animate-fade-up delay-100">
                <form method="POST" action="#" class="rounded-xl bg-white shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-base font-bold text-gray-800">Akun & Keamanan</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Ubah password dan pengaturan keamanan</p>
                    </div>

                    <div class="p-6 space-y-5">

                        {{-- Password Lama --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Password Lama <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="current_password"
                                   placeholder="Masukkan password lama"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>

                        <hr class="border-gray-100">

                        {{-- Password Baru --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Password Baru <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="new_password" id="newPassword"
                                   placeholder="Minimal 8 karakter"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            <p class="mt-1 text-xs text-gray-500">Minimal 8 karakter, kombinasi huruf & angka</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Konfirmasi Password Baru <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="new_password_confirmation" id="confirmPassword"
                                   placeholder="Ulangi password baru"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            <p id="passwordMatch" class="mt-1 text-xs hidden"></p>
                        </div>

                        <hr class="border-gray-100">

                        {{-- Two-Factor Toggle --}}
                        <div class="space-y-3">
                            <p class="text-sm font-bold text-gray-800">Keamanan Tambahan</p>

                            <label class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 cursor-pointer hover:bg-gray-50">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Notifikasi Login</p>
                                    <p class="text-xs text-gray-500">Kirim email saat ada login baru</p>
                                </div>
                                <input type="checkbox" name="notif_login" checked class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </label>

                            <label class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 cursor-pointer hover:bg-gray-50">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Two-Factor Authentication</p>
                                    <p class="text-xs text-gray-500">Verifikasi ganda saat login</p>
                                </div>
                                <input type="checkbox" name="two_factor" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </label>
                        </div>

                        {{-- Info Sesi Aktif --}}
                        <div class="rounded-lg bg-blue-50 border border-blue-200 p-4">
                            <div class="flex items-start gap-3">
                                <svg class="h-5 w-5 flex-shrink-0 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                                <div>
                                    <p class="text-sm font-bold text-blue-800">Sesi Aktif</p>
                                    <p class="text-xs text-blue-700 mt-1">
                                        Login terakhir: <strong>{{ now()->translatedFormat('d F Y, H:i') }} WIB</strong>
                                    </p>
                                    <p class="text-xs text-blue-700">
                                        IP Address: <strong>127.0.0.1</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-6 py-4 flex items-center justify-end gap-3">
                        <button type="reset"
                                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                            Reset
                        </button>
                        <button type="submit"
                                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>

            {{-- ==================== TAB: BACKUP ==================== --}}
            <div id="tab-backup" class="tab-content hidden animate-fade-up delay-100 space-y-6">

                {{-- Backup Card --}}
                <div class="rounded-xl bg-white shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-base font-bold text-gray-800">Backup Database</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Simpan salinan data sistem</p>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 7v10c0 2 1.5 3 3 3h10c1.5 0 3-1 3-3V7c0-2-1.5-3-3-3H7c-1.5 0-3 1-3 3z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11v6m-3-3h6"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-gray-800">Backup Manual</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    Simpan seluruh data (peserta, penilai, penilaian) dalam satu file.
                                </p>
                                <button type="button" onclick="konfirmasiBackup()"
                                        class="mt-3 inline-flex items-center gap-2 rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-700">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Buat Backup Sekarang
                                </button>
                            </div>
                        </div>

                        <div class="mt-5 rounded-lg bg-gray-50 p-4">
                            <p class="text-xs text-gray-500">
                                <strong class="text-gray-700">Terakhir backup:</strong>
                                Belum ada backup
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Restore Card --}}
                <div class="rounded-xl bg-white shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-base font-bold text-gray-800">Restore Database</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Kembalikan data dari file backup</p>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                                <svg class="h-6 w-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-gray-800">Restore dari Backup</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    Upload file backup (.sql atau .zip) untuk mengembalikan data.
                                </p>

                                <div class="mt-3 rounded-lg border-2 border-dashed border-gray-300 p-4 text-center">
                                    <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    <p class="mt-2 text-xs text-gray-500">
                                        Drag & drop file backup atau
                                        <button type="button" class="font-semibold text-blue-600 hover:underline">
                                            pilih file
                                        </button>
                                    </p>
                                    <p class="text-[10px] text-gray-400 mt-1">Format: .sql, .zip (max 50MB)</p>
                                </div>

                                <button type="button" onclick="konfirmasiRestore()"
                                        class="mt-3 inline-flex items-center gap-2 rounded-lg border border-orange-300 bg-orange-50 px-4 py-2 text-sm font-semibold text-orange-700 transition hover:bg-orange-100">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Restore Sekarang
                                </button>
                            </div>
                        </div>

                        {{-- Warning --}}
                        <div class="mt-5 rounded-lg bg-red-50 border border-red-200 p-4 flex items-start gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 text-red-600 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-bold text-red-800">Peringatan</p>
                                <p class="text-xs text-red-700 mt-1">
                                    Restore akan <strong>menimpa semua data</strong> yang ada saat ini. Pastikan Anda sudah backup terlebih dahulu!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    /* ============================================================
       SWITCH TAB
       ============================================================ */
    function switchTab(tabName) {
        // Sembunyikan semua tab content
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.add('hidden');
        });

        // Tampilkan tab yang dipilih
        const target = document.getElementById('tab-' + tabName);
        if (target) target.classList.remove('hidden');

        // Update style tab buttons
        document.querySelectorAll('.tab-button').forEach(btn => {
            const isActive = btn.dataset.tab === tabName;

            if (isActive) {
                btn.className = 'tab-button flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left transition bg-blue-50 text-blue-700 font-semibold';
            } else {
                btn.className = 'tab-button flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left transition text-gray-600 hover:bg-gray-50';
            }
        });

        // Simpan ke URL (biar refresh ga reset)
        const url = new URL(window.location);
        url.searchParams.set('tab', tabName);
        window.history.replaceState({}, '', url);
    }

    /* ============================================================
       KONFIRMASI BACKUP
       ============================================================ */
    function konfirmasiBackup() {
        Swal.fire({
            title: 'Buat Backup Database?',
            text: 'Proses ini akan menyimpan salinan seluruh data sistem.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#16a34a',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Buat Backup',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'info',
                    title: 'Fitur Belum Tersedia',
                    text: 'Fitur backup sedang dalam pengembangan.',
                    confirmButtonColor: '#2563eb'
                });
            }
        });
    }

    /* ============================================================
       KONFIRMASI RESTORE
       ============================================================ */
    function konfirmasiRestore() {
        Swal.fire({
            title: 'Restore Database?',
            html: 'Anda akan menimpa <strong>semua data saat ini</strong>.<br><span class="text-sm text-red-500">Pastikan Anda sudah backup terlebih dahulu!</span>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Restore',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'info',
                    title: 'Fitur Belum Tersedia',
                    text: 'Fitur restore sedang dalam pengembangan.',
                    confirmButtonColor: '#2563eb'
                });
            }
        });
    }

    /* ============================================================
       VALIDASI PASSWORD MATCH
       ============================================================ */
    document.addEventListener('DOMContentLoaded', function() {
        const newPwd = document.getElementById('newPassword');
        const confirmPwd = document.getElementById('confirmPassword');
        const matchMsg = document.getElementById('passwordMatch');

        if (newPwd && confirmPwd && matchMsg) {
            function checkMatch() {
                const v1 = newPwd.value;
                const v2 = confirmPwd.value;

                if (v2 === '') {
                    matchMsg.classList.add('hidden');
                    return;
                }

                if (v1 === v2) {
                    matchMsg.textContent = '✓ Password cocok';
                    matchMsg.className = 'mt-1 text-xs text-green-600 font-semibold';
                } else {
                    matchMsg.textContent = '✗ Password tidak cocok';
                    matchMsg.className = 'mt-1 text-xs text-red-600 font-semibold';
                }
                matchMsg.classList.remove('hidden');
            }

            newPwd.addEventListener('input', checkMatch);
            confirmPwd.addEventListener('input', checkMatch);
        }

        // Auto-open tab dari URL param
        const urlParams = new URLSearchParams(window.location.search);
        const activeTab = urlParams.get('tab');
        if (activeTab && document.getElementById('tab-' + activeTab)) {
            switchTab(activeTab);
        }
    });
</script>
@endpush