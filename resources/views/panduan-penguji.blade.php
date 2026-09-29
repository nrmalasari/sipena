@extends('layouts.app')

@section('title', 'Panduan Penguji - LAN RI')

@section('content')

    {{-- HEADER --}}
    <div class="mb-3 animate-fade-up">
        <nav class="flex items-center gap-2 text-xs text-gray-500">
            <span class="text-gray-700 font-medium">Panduan Penguji</span>
        </nav>
    </div>

    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Panduan Penguji</h1>
        <p class="mt-1 text-sm text-gray-500">
            Petunjuk penggunaan aplikasi penilaian untuk penguji {{ ucfirst($tipePenguji) }}.
        </p>
    </div>

    {{-- KONTEN PANDUAN --}}
    <div class="space-y-4 animate-fade-up delay-100">

        {{-- Section 1: Login --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">1</div>
                <h2 class="text-base font-bold text-gray-800">Login Aplikasi</h2>
            </div>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>Buka halaman <strong>login penguji</strong>.</li>
                <li>Masukkan <strong>username</strong> dan <strong>password</strong> yang telah diberikan admin.</li>
                <li>Klik tombol <strong>Login</strong> untuk masuk ke dashboard.</li>
            </ul>
        </div>

        {{-- Section 2: Dashboard --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">2</div>
                <h2 class="text-base font-bold text-gray-800">Dashboard</h2>
            </div>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>Dashboard menampilkan <strong>statistik peserta</strong> yang ditugaskan kepada Anda.</li>
                <li>Lihat daftar peserta yang <strong>belum dinilai</strong> dan yang <strong>sudah dinilai</strong>.</li>
            </ul>
        </div>

        {{-- Section 3: Penilaian --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">3</div>
                <h2 class="text-base font-bold text-gray-800">Melakukan Penilaian</h2>
            </div>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>Buka menu <strong>Peserta & Penilaian</strong> di sidebar.</li>
                <li>Pilih peserta yang akan dinilai, klik tombol <strong>Nilai</strong>.</li>
                <li>Isi <strong>nilai</strong> untuk setiap elemen kompetensi (0–100).</li>
                <li>Sistem otomatis menyimpan nilai (autosave) setiap kali Anda mengetik.</li>
                <li>Nilai P2 (rekan penguji) akan muncul otomatis secara <strong>live</strong>.</li>
            </ul>
        </div>

        {{-- Section 4: Catatan Wajib --}}
        <div class="rounded-xl bg-white p-6 shadow-sm border-2 border-amber-200">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-100 text-amber-700 font-bold">4</div>
                <h2 class="text-base font-bold text-gray-800">Mengisi Catatan (Wajib)</h2>
            </div>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li><strong>Catatan wajib diisi</strong> sebelum Anda menyelesaikan penilaian.</li>
                <li>Tulis catatan pada kolom <strong>Catatan Anda</strong> di bawah tabel penilaian.</li>
                <li>Catatan dari rekan penguji akan muncul di kotak <strong>Catatan Semua Penguji</strong>.</li>
            </ul>
        </div>

        {{-- Section 5: Selesaikan --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">5</div>
                <h2 class="text-base font-bold text-gray-800">Menyelesaikan Penilaian</h2>
            </div>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>Setelah semua nilai dan catatan terisi, klik tombol <strong>Selesaikan Penilaian</strong>.</li>
                <li>Konfirmasi untuk menyimpan penilaian akhir.</li>
                <li>Anda masih bisa <strong>mengupdate</strong> penilaian selama status peserta belum selesai penuh.</li>
            </ul>
        </div>

        {{-- Section 6: Logout --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">6</div>
                <h2 class="text-base font-bold text-gray-800">Keluar Aplikasi</h2>
            </div>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>Klik tombol <strong>Keluar</strong> di bagian bawah sidebar.</li>
                <li>Konfirmasi untuk keluar dari sesi login.</li>
            </ul>
        </div>

    </div>

    {{-- BANTUAN --}}
    <div class="mt-6 rounded-xl bg-blue-50 border border-blue-200 p-5 animate-fade-up delay-200">
        <div class="flex items-start gap-3">
            <svg class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <p class="text-sm font-semibold text-blue-800">Butuh bantuan?</p>
                <p class="text-xs text-blue-700 mt-1">
                    Jika mengalami kendala, silakan hubungi admin penilaian LAN RI.
                </p>
            </div>
        </div>
    </div>

@endsection