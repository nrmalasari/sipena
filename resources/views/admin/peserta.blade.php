@extends('layouts.admin')

@section('title', 'Data Peserta - LAN RI')

@section('breadcrumb')
    <span class="text-gray-400">Dashboard</span>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Data Peserta</span>
@endsection

@section('content')

    {{-- ============ HEADER ============ --}}
    <div class="mb-6 flex items-start justify-between animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Kelola Data Peserta</h1>
            <p class="mt-1 text-sm text-gray-500">
                Tambah, ubah, atau hapus data calon peserta sesuai kebutuhan. Setiap peserta akan dinilai oleh 2 penilai untuk metode yang sesuai dengan kategori jabatan.
            </p>
        </div>
        <a href="{{ route('admin.peserta.tambah') }}"
           class="flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white
                  shadow-md shadow-blue-600/30 transition hover:bg-blue-700 flex-shrink-0">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Peserta
        </a>
    </div>

    {{-- ============ STAT CARDS ============ --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">

        <div class="animate-fade-up delay-100 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Peserta</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['total'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Peserta terdaftar</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-200 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Kenaikan Jenjang</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['kenaikan_jenjang'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Peserta</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-300 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-6 w-6 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Perpindahan Jabatan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['perpindahan_jabatan'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Peserta</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-400 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Menunggu Penilaian</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['belum_dinilai'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Peserta</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ SEARCH & FILTER ============ --}}
    <form method="GET" action="{{ route('admin.peserta') }}" id="formFilter" class="animate-fade-up delay-200 mb-6">
        <div class="flex flex-col gap-3 lg:flex-row">

            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama peserta, jabatan, atau instansi..."
                       class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-700
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
            </div>

            {{-- ✅ Status --}}
            <select name="status"
                    onchange="document.getElementById('formFilter').submit()"
                    class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none lg:w-44">
                <option value="">Semua Status</option>
                <option value="belum_dinilai"  {{ request('status') === 'belum_dinilai' ? 'selected' : '' }}>Belum Dinilai</option>
                <option value="sedang_dinilai" {{ request('status') === 'sedang_dinilai' ? 'selected' : '' }}>Sedang Dinilai</option>
                <option value="selesai"        {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            {{-- ✅ Jenis --}}
            <select name="jenis"
                    onchange="document.getElementById('formFilter').submit()"
                    class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none lg:w-44">
                <option value="">Semua Jenis</option>
                <option value="kenaikan_jenjang"    {{ request('jenis') === 'kenaikan_jenjang' ? 'selected' : '' }}>Kenaikan Jenjang</option>
                <option value="perpindahan_jabatan" {{ request('jenis') === 'perpindahan_jabatan' ? 'selected' : '' }}>Perpindahan Jabatan</option>
            </select>

            {{-- ✅ Instansi --}}
            <select name="instansi"
                    onchange="document.getElementById('formFilter').submit()"
                    class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700
                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none lg:w-44">
                <option value="">Semua Instansi</option>
                @foreach ($daftarInstansi as $inst)
                    <option value="{{ $inst }}" {{ request('instansi') === $inst ? 'selected' : '' }}>
                        {{ $inst }}
                    </option>
                @endforeach
            </select>

            {{-- Tombol Filter --}}
            <button type="submit"
                    class="flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Filter
            </button>

            {{-- Tombol Reset --}}
            <a href="{{ route('admin.peserta') }}"
               class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50 lg:w-auto">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Reset
            </a>
        </div>
    </form>

    {{-- ============ TABEL PESERTA ============ --}}
    <div class="animate-fade-up delay-300 rounded-xl bg-white shadow-sm">

        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
            <h2 class="text-base font-bold text-gray-800">Daftar Peserta</h2>
            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                Total {{ $peserta->total() }} peserta
            </span>
        </div>

        <div class="overflow-x-auto scrollbar-thin">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50 text-left">
                        <th class="px-4 py-4 font-semibold text-gray-600 w-12">No.</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Peserta</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Instansi</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Jenis Penilaian</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Status</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Link Berkas</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($peserta as $i => $p)
                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 align-top">

                            {{-- NO --}}
                            <td class="px-4 py-4 text-gray-500 font-medium">
                                {{ ($peserta->currentPage() - 1) * $peserta->perPage() + $i + 1 }}
                            </td>

                            {{-- PESERTA + DAFTAR PENILAI --}}
                            <td class="px-4 py-4 min-w-[280px]">
                                <div class="font-semibold text-gray-800">{{ $p->nama }}</div>
                                <div class="text-xs text-gray-500">{{ $p->jabatan }}</div>

                                @php
                                    $penilaiWawancara = $p->penugasanPenilais
                                        ->where('tipe', 'wawancara')
                                        ->sortBy('urutan')
                                        ->values();
                                @endphp

                                @if ($penilaiWawancara->count() > 0)
                                    <div class="mt-3 rounded-lg border border-blue-200 bg-blue-50/60 px-3 py-2">
                                        <div class="flex items-center gap-1.5 mb-1.5">
                                            <svg class="h-3.5 w-3.5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="text-[11px] font-bold uppercase tracking-wider text-blue-700">
                                                Penilai Wawancara
                                            </span>
                                        </div>
                                        <ol class="space-y-0.5">
                                            @foreach ($penilaiWawancara as $idx => $pw)
                                                @if ($pw->penilai)
                                                    <li class="flex items-start gap-1.5 text-xs text-gray-700">
                                                        <span class="font-semibold text-blue-700 flex-shrink-0">{{ $idx + 1 }}.</span>
                                                        <span class="font-medium">{{ $pw->penilai->nama }}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                @else
                                    <div class="mt-3 rounded-lg border border-dashed border-gray-300 bg-gray-50 px-3 py-2">
                                        <p class="text-[11px] text-gray-400 italic">Belum ada penilai wawancara</p>
                                    </div>
                                @endif

                                @if ($p->jenis_penilaian === 'perpindahan_jabatan')
                                    @php
                                        $penilaiTertulis = $p->penugasanPenilais
                                            ->where('tipe', 'tertulis')
                                            ->sortBy('urutan')
                                            ->values();
                                    @endphp

                                    @if ($penilaiTertulis->count() > 0)
                                        <div class="mt-2 rounded-lg border border-purple-200 bg-purple-50/60 px-3 py-2">
                                            <div class="flex items-center gap-1.5 mb-1.5">
                                                <svg class="h-3.5 w-3.5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                <span class="text-[11px] font-bold uppercase tracking-wider text-purple-700">
                                                    Penilai Tertulis
                                                </span>
                                            </div>
                                            <ol class="space-y-0.5">
                                                @foreach ($penilaiTertulis as $idx => $pt)
                                                    @if ($pt->penilai)
                                                        <li class="flex items-start gap-1.5 text-xs text-gray-700">
                                                            <span class="font-semibold text-purple-700 flex-shrink-0">{{ $idx + 1 }}.</span>
                                                            <span class="font-medium">{{ $pt->penilai->nama }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        </div>
                                    @else
                                        <div class="mt-2 rounded-lg border border-dashed border-gray-300 bg-gray-50 px-3 py-2">
                                            <p class="text-[11px] text-gray-400 italic">Belum ada penilai tertulis</p>
                                        </div>
                                    @endif
                                @endif
                            </td>

                            <td class="px-4 py-4 text-gray-600">{{ $p->instansi }}</td>

                            <td class="px-4 py-4">
                                @if ($p->jenis_penilaian === 'kenaikan_jenjang')
                                    <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 whitespace-nowrap">
                                        Kenaikan Jenjang
                                    </span>
                                @else
                                    <span class="inline-block rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700 whitespace-nowrap">
                                        Perpindahan Jabatan
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-4">
                                @if ($p->status === 'belum_dinilai')
                                    <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 whitespace-nowrap">Belum Dinilai</span>
                                @elseif ($p->status === 'sedang_dinilai')
                                    <span class="inline-block rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700 whitespace-nowrap">Sedang Dinilai</span>
                                @else
                                    <span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700 whitespace-nowrap">Selesai</span>
                                @endif
                            </td>

                            <td class="px-4 py-4">
                                @if ($p->link_berkas)
                                    <a href="{{ $p->link_berkas }}" target="_blank"
                                       class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:underline whitespace-nowrap">
                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                        </svg>
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-xs text-gray-400">—</span>
                                @endif
                            </td>

                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.peserta.detail', $p->id) }}"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 text-blue-600 transition hover:bg-blue-100"
                                       title="Lihat Detail">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>

                                    <a href="{{ route('admin.peserta.edit', $p->id) }}"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-yellow-200 bg-yellow-50 text-yellow-600 transition hover:bg-yellow-100"
                                       title="Edit">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    <button type="button"
                                            onclick="konfirmasiHapus({{ $p->id }}, '{{ $p->nama }}')"
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
                            <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                                <svg class="mx-auto mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Belum ada data peserta
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer: Info + Pagination --}}
        <div class="flex flex-col items-center justify-between gap-3 border-t border-gray-200 px-6 py-4 sm:flex-row">
            <p class="text-xs text-gray-500">
                Menampilkan {{ $peserta->firstItem() ?? 0 }} - {{ $peserta->lastItem() ?? 0 }}
                dari {{ $peserta->total() }} peserta
            </p>

            @if ($peserta->hasPages())
                <div class="flex items-center gap-1">
                    @if ($peserta->onFirstPage())
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 text-gray-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $peserta->previousPageUrl() }}"
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-600 transition hover:bg-gray-50">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>
                    @endif

                    @foreach ($peserta->links()->elements as $element)
                        @if (is_string($element))
                            <span class="flex h-9 w-9 items-center justify-center text-sm text-gray-400">...</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $peserta->currentPage())
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

                    @if ($peserta->hasMorePages())
                        <a href="{{ $peserta->nextPageUrl() }}"
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

    {{-- Form Hidden untuk Hapus --}}
    <form id="formHapusPeserta" method="POST" action="" class="hidden">
        @csrf
        @method('DELETE')
    </form>

@endsection

@push('scripts')
<script>
    function konfirmasiHapus(id, nama) {
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
                const form = document.getElementById('formHapusPeserta');
                form.action = `/admin/peserta/${id}`;
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