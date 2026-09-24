@extends('layouts.app')
@section('title', 'Penilaian Berhasil - LAN RI')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="rounded-2xl bg-white p-10 shadow-sm text-center animate-fade-up">

        <div class="mb-6 flex justify-center">
            <div class="flex h-24 w-24 items-center justify-center rounded-full bg-green-100">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-500 shadow-lg shadow-green-500/40">
                    <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-gray-800">Penilaian Berhasil Disimpan!</h1>
        <p class="mt-2 text-sm text-gray-500">Terima kasih, penilaian Anda telah berhasil disimpan.</p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('peserta.penilaian') }}"
               class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-blue-600 py-3 text-sm font-semibold text-white shadow-md shadow-blue-600/30 transition hover:bg-blue-700">
                Kembali ke Daftar Peserta
            </a>
            <a href="{{ route('dashboard.penguji') }}"
               class="flex flex-1 items-center justify-center gap-2 rounded-lg border border-blue-500 py-3 text-sm font-semibold text-blue-600 transition hover:bg-blue-50">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>
@endsection