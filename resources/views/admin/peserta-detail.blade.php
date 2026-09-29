@extends('layouts.admin')

@section('title', 'Detail Peserta - LAN RI')

@section('breadcrumb')
    <a href="{{ route('admin.peserta') }}" class="text-gray-400 hover:text-gray-600">Data Peserta</a>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Detail Peserta</span>
@endsection

@section('content')

    {{-- HEADER --}}
    <div class="mb-6 flex items-start justify-between animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Detail Peserta</h1>
            <p class="mt-1 text-sm text-gray-500">Informasi lengkap peserta dan penilai yang ditugaskan.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.peserta') }}"
               class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
            <a href="{{ route('admin.peserta.edit', $peserta->id) }}"
               class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Peserta
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- KIRI --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- CARD INFO PESERTA --}}
            <div class="animate-fade-up delay-100 rounded-xl bg-white p-6 shadow-sm">
                <div class="flex items-start gap-5 border-b border-gray-100 pb-6">
                    <div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                        <svg class="h-10 w-10 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2 class="text-xl font-bold text-gray-800">{{ $peserta->nama }}</h2>
                        <p class="mt-1 text-sm text-gray-500">{{ $peserta->jabatan }}</p>
                        <p class="text-sm text-gray-500">{{ $peserta->instansi }}</p>

                        <div class="mt-3 flex flex-wrap items-center gap-2">
                            @if ($peserta->jenis_penilaian === 'kenaikan_jenjang')
                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                    Kenaikan Jenjang
                                </span>
                            @else
                                <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">
                                    Perpindahan Jabatan
                                </span>
                            @endif

                            @if ($peserta->status === 'belum_dinilai')
                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">Belum Dinilai</span>
                            @elseif ($peserta->status === 'sedang_dinilai')
                                <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">Sedang Dinilai</span>
                            @else
                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Selesai</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Nama Peserta</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->nama }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">NIP</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->nip ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Jabatan</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->jabatan }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Instansi</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->instansi }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Jenis Penilaian</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->label_jenis_penilaian }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->label_status }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Link Berkas</p>
                        @if ($peserta->link_berkas)
                            <a href="{{ $peserta->link_berkas }}" target="_blank"
                               class="mt-1 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:underline">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                Buka Berkas Peserta
                            </a>
                        @else
                            <p class="mt-1 text-sm text-gray-400 italic">Belum ada link berkas</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Dibuat</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Update Terakhir</p>
                        <p class="mt-1 text-sm font-semibold text-gray-800">{{ $peserta->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            {{-- CARD PENILAI WAWANCARA --}}
            <div class="animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm">
                <div class="flex items-center gap-3 border-b border-gray-100 pb-4 mb-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100">
                        <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-800">Penilai Wawancara</h3>
                        <p class="text-xs text-gray-500">2 penilai yang ditugaskan</p>
                    </div>
                </div>

                @if ($penugasanWawancara->count() > 0)
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        @foreach ($penugasanWawancara as $pw)
                            @if ($pw->penilai)
                                <div class="rounded-lg border-2 border-blue-200 bg-blue-50/50 p-4">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-bold text-white">
                                            Penilai {{ $pw->urutan }}
                                        </span>
                                        @if ($pw->penilai->is_active)
                                            <span class="rounded-full bg-green-100 px-2 py-0.5 text-[10px] font-semibold text-green-700">Aktif</span>
                                        @else
                                            <span class="rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-700">Nonaktif</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-200">
                                            <svg class="h-6 w-6 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-bold text-gray-800 truncate">{{ $pw->penilai->nama }}</p>
                                            <p class="text-xs text-gray-500 truncate">{{ $pw->penilai->jabatan }}</p>
                                            <p class="text-xs text-gray-500 truncate">{{ $pw->penilai->instansi }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-3 border-t border-blue-200 pt-3 space-y-1">
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="text-gray-500">NIP:</span>
                                            <span class="font-semibold text-gray-700">{{ $pw->penilai->nip ?: '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="rounded-lg border-2 border-dashed border-gray-200 p-8 text-center">
                        <p class="text-sm text-gray-500">Belum ada penilai wawancara yang ditugaskan</p>
                    </div>
                @endif
            </div>

            {{-- CARD PENILAI TERTULIS (Kondisional) --}}
            @if ($peserta->jenis_penilaian === 'perpindahan_jabatan')
                <div class="animate-fade-up delay-300 rounded-xl bg-white p-6 shadow-sm">
                    <div class="flex items-center gap-3 border-b border-gray-100 pb-4 mb-5">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-100">
                            <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-gray-800">Penilai Tertulis</h3>
                            <p class="text-xs text-gray-500">2 penilai yang ditugaskan</p>
                        </div>
                    </div>

                    @if ($penugasanTertulis->count() > 0)
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @foreach ($penugasanTertulis as $pt)
                                @if ($pt->penilai)
                                    <div class="rounded-lg border-2 border-purple-200 bg-purple-50/50 p-4">
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="rounded-full bg-purple-600 px-3 py-1 text-xs font-bold text-white">
                                                Penilai {{ $pt->urutan }}
                                            </span>
                                            @if ($pt->penilai->is_active)
                                                <span class="rounded-full bg-green-100 px-2 py-0.5 text-[10px] font-semibold text-green-700">Aktif</span>
                                            @else
                                                <span class="rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold text-red-700">Nonaktif</span>
                                            @endif
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-purple-200">
                                                <svg class="h-6 w-6 text-purple-700" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                                                </svg>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-bold text-gray-800 truncate">{{ $pt->penilai->nama }}</p>
                                                <p class="text-xs text-gray-500 truncate">{{ $pt->penilai->jabatan }}</p>
                                                <p class="text-xs text-gray-500 truncate">{{ $pt->penilai->instansi }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 border-t border-purple-200 pt-3 space-y-1">
                                            <div class="flex items-center justify-between text-xs">
                                                <span class="text-gray-500">NIP:</span>
                                                <span class="font-semibold text-gray-700">{{ $pt->penilai->nip ?: '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="rounded-lg border-2 border-dashed border-gray-200 p-8 text-center">
                            <p class="text-sm text-gray-500">Belum ada penilai tertulis yang ditugaskan</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        {{-- KANAN --}}
        <div class="space-y-6">

            {{-- STATUS CARD --}}
            <div class="animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-base font-bold text-gray-800 mb-4">Status Penilaian</h3>

                @if ($peserta->status === 'belum_dinilai')
                    <div class="rounded-lg bg-gray-50 border border-gray-200 p-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200">
                                <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Belum Dinilai</p>
                                <p class="text-xs text-gray-500">Belum mulai dinilai</p>
                            </div>
                        </div>
                    </div>
                @elseif ($peserta->status === 'sedang_dinilai')
                    <div class="rounded-lg bg-orange-50 border border-orange-200 p-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-200">
                                <svg class="h-5 w-5 text-orange-700 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-orange-800">Sedang Dinilai</p>
                                <p class="text-xs text-orange-600">Sedang berlangsung</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="rounded-lg bg-green-50 border border-green-200 p-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-200">
                                <svg class="h-5 w-5 text-green-700" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-green-800">Selesai</p>
                                <p class="text-xs text-green-600">Penilaian telah selesai</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- RINGKASAN PENILAI --}}
            <div class="animate-fade-up delay-300 rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-base font-bold text-gray-800 mb-4">Ringkasan Penilai</h3>

                <div class="space-y-3">
                    <div class="flex items-center justify-between rounded-lg bg-blue-50 px-4 py-3">
                        <div class="flex items-center gap-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-200">
                                <svg class="h-4 w-4 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-700">Wawancara</span>
                        </div>
                        <span class="text-lg font-bold text-blue-700">{{ $penugasanWawancara->count() }}</span>
                    </div>

                    @if ($peserta->jenis_penilaian === 'perpindahan_jabatan')
                        <div class="flex items-center justify-between rounded-lg bg-purple-50 px-4 py-3">
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-purple-200">
                                    <svg class="h-4 w-4 text-purple-700" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Tertulis</span>
                            </div>
                            <span class="text-lg font-bold text-purple-700">{{ $penugasanTertulis->count() }}</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- TOMBOL AKSI --}}
            <div class="animate-fade-up delay-400 rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-base font-bold text-gray-800 mb-4">Aksi</h3>

                <div class="space-y-2">
                    <a href="{{ route('admin.peserta.edit', $peserta->id) }}"
                       class="flex items-center gap-2 rounded-lg border border-blue-200 bg-blue-50 px-4 py-2.5 text-sm font-semibold text-blue-600 transition hover:bg-blue-100">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Data Peserta
                    </a>

                    <button type="button" 
                            onclick="konfirmasiHapusDetail({{ $peserta->id }}, '{{ $peserta->nama }}')"
                            class="flex w-full items-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus Peserta
                    </button>
                </div>
            </div>
        </div>
    </div>

    <form id="formHapusDetail" method="POST" action="" class="hidden">
        @csrf
        @method('DELETE')
    </form>

@endsection

@push('scripts')
<script>
    function konfirmasiHapusDetail(id, nama) {
        Swal.fire({
            title: 'Hapus Peserta?',
            html: `Yakin ingin menghapus <strong>${nama}</strong>?<br><span class="text-sm text-gray-500">Data yang dihapus tidak dapat dikembalikan.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('formHapusDetail');
                form.action = `/admin/peserta/${id}`;
                form.submit();
            }
        });
    }
</script>
@endpush