@extends('layouts.app')

@section('title', 'Profil Penguji - LAN RI')

@section('content')

    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Profil</h1>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-5">

        {{-- INFO PRIBADI --}}
        <div class="lg:col-span-3">
            <div class="rounded-xl bg-white p-6 shadow-sm animate-fade-up delay-100">
                <div class="flex items-center gap-5 border-b border-gray-100 pb-6">
                    <div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                        <svg class="h-11 w-11 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $namaPenguji }}</h2>
                        <p class="mt-0.5 text-sm text-gray-500">Penguji {{ ucfirst($tipePenguji) }}</p>
                    </div>
                </div>

                <div class="mt-6 space-y-4">
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">Role</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">Penguji</p>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">Tipe Penguji</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">{{ ucfirst($tipePenguji) }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <p class="text-sm text-gray-500">Kelompok</p>
                        <p class="col-span-2 text-sm font-medium text-gray-800">{{ session('kelompok', '-') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- INFO TUGAS --}}
        <div class="lg:col-span-2">
            <div class="rounded-xl bg-white p-6 shadow-sm animate-fade-up delay-200">
                <h3 class="text-base font-bold text-gray-800 border-b border-gray-100 pb-4">Informasi Tugas</h3>

                {{-- Rekan Penguji --}}
                <div class="mt-5">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Rekan Penguji</p>
                    @if ($rekanPenguji)
                        <div class="mt-2 flex items-center gap-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100">
                                <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $rekanPenguji->nama }}</p>
                                <p class="text-xs text-gray-500">Penguji {{ ucfirst($rekanPenguji->tipe_penguji) }}</p>
                            </div>
                        </div>
                    @else
                        <p class="mt-2 text-xs text-gray-400 italic">Belum ada rekan penguji</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection