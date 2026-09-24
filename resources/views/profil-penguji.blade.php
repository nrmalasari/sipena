@extends('layouts.app')

@section('title', 'Profil Penguji - LAN RI')

@section('content')

    {{-- JUDUL --}}
    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Profil</h1>
    </div>

    {{-- GRID UTAMA --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-5">

        {{-- ============ KOLOM KIRI: INFO PRIBADI (3/5) ============ --}}
        <div class="lg:col-span-3">
            <div class="rounded-xl bg-white p-6 shadow-sm animate-fade-up delay-100">

                {{-- HEADER: AVATAR + NAMA --}}
                <div class="flex items-center gap-5 border-b border-gray-100 pb-6">
                    <div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                        <svg class="h-11 w-11 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Dr. Muhammad Aswad, M.Si</h2>
                        <p class="mt-0.5 text-sm text-gray-500">Penguji 1</p>
                    </div>
                </div>

                {{-- DETAIL INFO --}}
                <div class="mt-6 space-y-4">

                    {{-- Email --}}
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">aswad@lanri.go.id</p>
                    </div>

                    {{-- No. HP --}}
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">No. HP</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">0812 3456 7890</p>
                    </div>

                    {{-- NIP --}}
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">NIP</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">19780512 200312 1 002</p>
                    </div>

                    {{-- Jabatan --}}
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">Jabatan</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">LAN RI Pusjar SKMP Makassar</p>
                    </div>

                    {{-- Instansi --}}
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">Instansi</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">LAN RI Pusjar SKMP Makassar</p>
                    </div>

                    {{-- Role --}}
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">Role</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">Penguji</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============ KOLOM KANAN: INFORMASI TUGAS (2/5) ============ --}}
        <div class="lg:col-span-2">
            <div class="rounded-xl bg-white p-6 shadow-sm animate-fade-up delay-200">

                <h3 class="text-base font-bold text-gray-800 border-b border-gray-100 pb-4">Informasi Tugas</h3>

                {{-- Kelompok Penguji --}}
                <div class="mt-5">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Kelompok Penguji</p>
                    <p class="mt-1 text-sm font-semibold text-gray-800">Kelompok 1</p>
                </div>

                {{-- Daftar Peserta --}}
                <div class="mt-5">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Daftar Peserta</p>
                    <ul class="mt-2 space-y-1.5">
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Andi Pratama
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Siti Nurhaliza
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Budi Santoso
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Rina Oktaviani
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                            Dedi Kurniawan
                        </li>
                        <li class="flex items-center gap-2 text-sm text-gray-500 italic">
                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                            + 15 peserta lainnya
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection