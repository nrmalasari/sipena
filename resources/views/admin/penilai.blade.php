@extends('layouts.admin')

@section('title', 'Data Penilai - LAN RI')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600">Dashboard</a>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Data Penilai</span>
@endsection

@section('content')

    {{-- HEADER --}}
    <div class="mb-6 flex items-start justify-between animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Penilai</h1>
            <p class="mt-1 text-sm text-gray-500">Kelola data penilai untuk sesi wawancara dan tertulis. Setiap peserta akan dinilai oleh 2 penilai.</p>
        </div>
        <a href="{{ route('admin.penilai.tambah') }}"
           class="flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white 
                  shadow-md shadow-blue-600/30 transition hover:bg-blue-700 flex-shrink-0">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Penilai
        </a>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">

        <div class="animate-fade-up delay-100 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Penilai</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['total'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Penilai aktif</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-200 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Penilai Wawancara</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['wawancara'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">2 per peserta</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-300 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-6 w-6 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Penilai Tertulis</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['tertulis'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">2 per peserta</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-400 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pasangan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['total_pasangan'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Pasangan aktif</p>
                </div>
            </div>
        </div>
    </div>

    {{-- SEARCH & FILTER --}}
    <form method="GET" action="{{ route('admin.penilai') }}" class="animate-fade-up delay-200 mb-6">
        <div class="flex flex-col gap-3 lg:flex-row">

            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama penilai, instansi, atau jabatan..."
                       class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-700 
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
            </div>

            <select name="jenis" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none lg:w-56">
                <option value="">Semua Jenis Penilaian</option>
                <option value="wawancara" {{ request('jenis') === 'wawancara' ? 'selected' : '' }}>Wawancara</option>
                <option value="tertulis"  {{ request('jenis') === 'tertulis' ? 'selected' : '' }}>Tertulis</option>
                <option value="keduanya"  {{ request('jenis') === 'keduanya' ? 'selected' : '' }}>Wawancara & Tertulis</option>
            </select>

            <select name="instansi" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none lg:w-48">
                <option value="">Semua Instansi</option>
                @foreach ($daftarInstansi as $inst)
                    <option value="{{ $inst }}" {{ request('instansi') === $inst ? 'selected' : '' }}>{{ $inst }}</option>
                @endforeach
            </select>

            <select name="status" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none lg:w-40">
                <option value="">Semua Status</option>
                <option value="aktif"    {{ request('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ request('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>

            <a href="{{ route('admin.penilai') }}"
               class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50 lg:w-auto">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Reset
            </a>
        </div>
    </form>

    {{-- TABEL PENILAI --}}
    <div class="animate-fade-up delay-300 rounded-xl bg-white shadow-sm">

        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
            <h2 class="text-base font-bold text-gray-800">Daftar Penilai</h2>
            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                Total {{ $penilai->total() }} penilai
            </span>
        </div>

        <div class="overflow-x-auto scrollbar-thin">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50 text-left">
                        <th class="px-6 py-4 font-semibold text-gray-600">No.</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Nama Penilai</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Email / Username</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">NIP</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Jabatan</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Instansi</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Jenis Penilaian</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                        <th class="px-6 py-4 text-center font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($penilai as $i => $p)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-500">
                                {{ ($penilai->currentPage() - 1) * $penilai->perPage() + $i + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                                        <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-800">{{ $p->nama }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-xs">
                                    <p class="text-gray-700 font-medium">{{ $p->email ?: '-' }}</p>
                                    <p class="text-gray-400">{{ $p->username ? '@' . $p->username : '' }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $p->nip ?: '-' }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $p->jabatan ?: '-' }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $p->instansi ?: '-' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1.5 flex-wrap">
                                    @if ($p->is_wawancara)
                                        <span class="rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-semibold text-blue-700">
                                            Wawancara
                                        </span>
                                    @endif
                                    @if ($p->is_tertulis)
                                        <span class="rounded-full bg-purple-100 px-2.5 py-0.5 text-xs font-semibold text-purple-700">
                                            Tertulis
                                        </span>
                                    @endif
                                    @if (!$p->is_wawancara && !$p->is_tertulis)
                                        <span class="text-xs text-gray-400 italic">Belum diatur</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($p->is_active)
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Aktif</span>
                                @else
                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- ✅ TOMBOL MATA (Lihat Detail) --}}
                                    <button type="button"
                                            onclick="bukaDetailPenilai(
                                                {{ $p->id }},
                                                '{{ addslashes($p->nama) }}',
                                                '{{ addslashes($p->email ?? '-') }}',
                                                '{{ addslashes($p->username ?? '-') }}',
                                                '{{ addslashes($p->nip ?? '-') }}',
                                                '{{ addslashes($p->jabatan ?? '-') }}',
                                                '{{ addslashes($p->instansi ?? '-') }}',
                                                '{{ addslashes($p->keterangan ?? '') }}',
                                                {{ $p->is_wawancara ? 'true' : 'false' }},
                                                {{ $p->is_tertulis ? 'true' : 'false' }},
                                                {{ $p->is_active ? 'true' : 'false' }}
                                            )"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 text-blue-600 transition hover:bg-blue-100"
                                            title="Lihat Detail">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                    {{-- TOMBOL EDIT --}}
                                    <a href="{{ route('admin.penilai.edit', $p->id) }}"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-yellow-200 bg-yellow-50 text-yellow-600 transition hover:bg-yellow-100"
                                       title="Edit">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    {{-- TOMBOL HAPUS --}}
                                    <button type="button" 
                                            onclick="konfirmasiHapusPenilai({{ $p->id }}, '{{ addslashes($p->nama) }}')"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100"
                                            title="Hapus">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-12 text-center text-gray-400">
                                <svg class="mx-auto mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Belum ada data penilai
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex flex-col items-center justify-between gap-3 border-t border-gray-200 px-6 py-4 sm:flex-row">
            <p class="text-xs text-gray-500">
                Menampilkan {{ $penilai->firstItem() ?? 0 }} - {{ $penilai->lastItem() ?? 0 }} 
                dari {{ $penilai->total() }} penilai
            </p>

            @if ($penilai->hasPages())
                <div class="flex items-center gap-1">
                    @if ($penilai->onFirstPage())
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 text-gray-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $penilai->previousPageUrl() }}" 
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-600 transition hover:bg-gray-50">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>
                    @endif

                    @foreach ($penilai->links()->elements as $element)
                        @if (is_string($element))
                            <span class="flex h-9 w-9 items-center justify-center text-sm text-gray-400">...</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $penilai->currentPage())
                                    <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-600 bg-blue-600 text-sm font-semibold text-white">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" 
                                       class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($penilai->hasMorePages())
                        <a href="{{ $penilai->nextPageUrl() }}" 
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-600 transition hover:bg-gray-50">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    @else
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 text-gray-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- Form Hidden Hapus --}}
    <form id="formHapusPenilai" method="POST" action="" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    {{-- ============ MODAL DETAIL PENILAI ============ --}}
    <div id="modalDetailPenilai" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
        <div class="w-full max-w-2xl rounded-xl bg-white shadow-xl max-h-[90vh] overflow-y-auto">

            {{-- Header Modal --}}
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 sticky top-0 bg-white z-10">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                        <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 id="detailNama" class="text-lg font-bold text-gray-800">—</h3>
                        <p class="text-xs text-gray-500">Detail Penilai</p>
                    </div>
                </div>
                <button type="button" onclick="tutupModalDetail()" class="text-gray-400 hover:text-gray-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Body Modal --}}
            <div class="p-6 space-y-4">

                {{-- Badge Tipe & Status --}}
                <div class="flex items-center gap-2 flex-wrap">
                    <div id="detailTipeWawancara" class="hidden">
                        <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                            Wawancara
                        </span>
                    </div>
                    <div id="detailTipeTertulis" class="hidden">
                        <span class="inline-block rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">
                            Tertulis
                        </span>
                    </div>
                    <div id="detailStatusAktif" class="hidden">
                        <span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                            Aktif
                        </span>
                    </div>
                    <div id="detailStatusNonaktif" class="hidden">
                        <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                            Nonaktif
                        </span>
                    </div>
                </div>

                {{-- Grid Info --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="rounded-lg bg-gray-50 p-3">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Nama Lengkap</p>
                        <p id="detailNama2" class="text-sm font-semibold text-gray-800 mt-1">—</p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-3">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">NIP</p>
                        <p id="detailNip" class="text-sm font-semibold text-gray-800 mt-1">—</p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-3">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Email</p>
                        <p id="detailEmail" class="text-sm font-semibold text-gray-800 mt-1 break-all">—</p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-3">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Username</p>
                        <p id="detailUsername" class="text-sm font-semibold text-gray-800 mt-1">—</p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-3">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Jabatan</p>
                        <p id="detailJabatan" class="text-sm font-semibold text-gray-800 mt-1">—</p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-3">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Instansi</p>
                        <p id="detailInstansi" class="text-sm font-semibold text-gray-800 mt-1">—</p>
                    </div>
                </div>

                {{-- Keterangan --}}
                <div id="detailKeteranganWrapper" class="hidden">
                    <div class="rounded-lg bg-yellow-50 border border-yellow-200 p-3">
                        <p class="text-[10px] font-semibold text-yellow-700 uppercase tracking-wider mb-1">Keterangan</p>
                        <p id="detailKeterangan" class="text-sm text-gray-700">—</p>
                    </div>
                </div>
            </div>

            {{-- Footer Modal --}}
            <div class="border-t border-gray-200 px-6 py-4 flex items-center justify-end gap-2 sticky bottom-0 bg-white">
                <button type="button" onclick="tutupModalDetail()"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                    Tutup
                </button>
                <a id="detailTombolEdit" href="#"
                   class="flex items-center gap-2 rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-yellow-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    /* ============================================================
       MODAL DETAIL PENILAI
       ============================================================ */
    function bukaDetailPenilai(id, nama, email, username, nip, jabatan, instansi, keterangan, isWawancara, isTertulis, isActive) {
        // Isi data
        document.getElementById('detailNama').textContent    = nama;
        document.getElementById('detailNama2').textContent   = nama;
        document.getElementById('detailEmail').textContent   = email;
        document.getElementById('detailUsername').textContent = username === '-' ? '-' : '@' + username;
        document.getElementById('detailNip').textContent     = nip;
        document.getElementById('detailJabatan').textContent = jabatan;
        document.getElementById('detailInstansi').textContent = instansi;

        // Keterangan (muncul kalau ada isinya)
        const ketWrapper = document.getElementById('detailKeteranganWrapper');
        if (keterangan && keterangan.trim() !== '') {
            document.getElementById('detailKeterangan').textContent = keterangan;
            ketWrapper.classList.remove('hidden');
        } else {
            ketWrapper.classList.add('hidden');
        }

        // Badge Tipe
        document.getElementById('detailTipeWawancara').classList.toggle('hidden', !isWawancara);
        document.getElementById('detailTipeTertulis').classList.toggle('hidden', !isTertulis);

        // Badge Status
        document.getElementById('detailStatusAktif').classList.toggle('hidden', !isActive);
        document.getElementById('detailStatusNonaktif').classList.toggle('hidden', isActive);

        // Link Edit
        document.getElementById('detailTombolEdit').href = `/admin/penilai/${id}/edit`;

        // Tampilkan modal
        document.getElementById('modalDetailPenilai').classList.remove('hidden');
        document.getElementById('modalDetailPenilai').classList.add('flex');
    }

    function tutupModalDetail() {
        document.getElementById('modalDetailPenilai').classList.add('hidden');
        document.getElementById('modalDetailPenilai').classList.remove('flex');
    }

    // Tutup modal kalau klik area luar
    document.getElementById('modalDetailPenilai').addEventListener('click', function(e) {
        if (e.target === this) tutupModalDetail();
    });

    // Tutup modal kalau tekan Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') tutupModalDetail();
    });

    /* ============================================================
       HAPUS PENILAI
       ============================================================ */
    function konfirmasiHapusPenilai(id, nama) {
        Swal.fire({
            title: 'Hapus Penilai?',
            html: `Yakin ingin menghapus <strong>${nama}</strong>?<br><span class="text-sm text-gray-500">Akun login penilai ini juga akan terhapus.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('formHapusPenilai');
                form.action = `/admin/penilai/${id}`;
                form.submit();
            }
        });
    }

    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#2563eb',
            timer: 2500,
            timerProgressBar: true,
            showConfirmButton: false
        });
    @endif
</script>
@endpush