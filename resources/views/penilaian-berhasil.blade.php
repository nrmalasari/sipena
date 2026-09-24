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

        <div class="mt-6 flex items-center justify-center gap-2 rounded-lg bg-blue-50 px-4 py-3">
            <svg class="h-4 w-4 text-blue-600 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
            <p class="text-sm text-blue-700">
                Mengalihkan ke daftar peserta dalam <span id="countdown" class="font-bold">3</span> detik...
            </p>
        </div>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('peserta.penilaian') }}"
               class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-blue-600 py-3 text-sm font-semibold text-white shadow-md shadow-blue-600/30 transition hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Kembali ke Daftar Peserta
            </a>
            <a href="{{ route('dashboard.penguji') }}"
               class="flex flex-1 items-center justify-center gap-2 rounded-lg border border-blue-500 py-3 text-sm font-semibold text-blue-600 transition hover:bg-blue-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let detik = 3;
        const countdown = document.getElementById('countdown');

        const interval = setInterval(function() {
            detik--;
            if (countdown) countdown.textContent = detik;

            if (detik <= 0) {
                clearInterval(interval);
                window.location.href = "{{ route('peserta.penilaian') }}";
            }
        }, 1000);
    });
</script>
@endpush
@endsection