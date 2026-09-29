@extends('layouts.admin')

@section('title', 'Laporan Hasil Penilaian - LAN RI')

@section('breadcrumb')
    <span class="text-gray-400">Dashboard</span>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Laporan</span>
@endsection

@section('content')

    {{-- ============ HEADER ============ --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Laporan Hasil Penilaian</h1>
            <p class="mt-1 text-sm text-gray-500">
                Lihat dan unduh laporan hasil penilaian calon peserta berdasarkan kategori dan jenis kompetensi.
            </p>
        </div>
        <div class="flex items-center gap-2 self-start">
            <a href="{{ route('admin.laporan.export-excel', request()->query()) }}"
               class="flex items-center gap-2 rounded-lg border border-blue-600 bg-white px-4 py-2 text-sm font-semibold text-blue-600 transition hover:bg-blue-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export Excel
            </a>
            <a href="{{ route('admin.laporan.export-pdf', request()->query()) }}" target="_blank"
               class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
                Export PDF
            </a>
        </div>
    </div>

    {{-- ============ FILTER CARD ============ --}}
    <form method="GET" action="{{ route('admin.laporan') }}" class="mb-6 animate-fade-up delay-100">
        <div class="grid grid-cols-1 gap-3 lg:grid-cols-3 bg-white p-4 rounded-xl shadow-sm">

            {{-- Jenis --}}
            <div class="flex items-start gap-3">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                    <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Jenis Seleksi</label>
                    <select name="jenis"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        <option value="">Semua Jenis</option>
                        <option value="kenaikan_jenjang"    {{ request('jenis') === 'kenaikan_jenjang' ? 'selected' : '' }}>Kenaikan Jenjang</option>
                        <option value="perpindahan_jabatan" {{ request('jenis') === 'perpindahan_jabatan' ? 'selected' : '' }}>Perpindahan Jabatan</option>
                    </select>
                </div>
            </div>

            {{-- Status --}}
            <div class="flex items-start gap-3">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-5 w-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Status</label>
                    <select name="status"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        <option value="">Semua Status</option>
                        <option value="lulus"       {{ request('status') === 'lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="tidak_lulus" {{ request('status') === 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                    </select>
                </div>
            </div>

            {{-- Search --}}
            <div class="flex items-start gap-3">
                <div class="flex-1 min-w-0">
                    <label class="block text-xs font-semibold text-gray-500 mb-1">&nbsp;</label>
                    <div class="flex gap-2">
                        <div class="relative flex-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="Cari nama peserta, NIP, atau jabatan..."
                                   class="w-full rounded-lg border border-gray-300 bg-white py-2 pl-9 pr-3 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>
                        <button type="submit"
                                class="flex items-center gap-1 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- ============ STAT CARDS ============ --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">

        <div class="animate-fade-up delay-200 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Peserta</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['total'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Peserta terdaftar</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-300 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Peserta Lulus</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['lulus'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">
                        {{ $statistik['total'] > 0 ? round(($statistik['lulus'] / $statistik['total']) * 100) : 0 }}% dari total
                    </p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-400 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-6 w-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Peserta Tidak Lulus</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['tidak_lulus'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">
                        {{ $statistik['total'] > 0 ? round(($statistik['tidak_lulus'] / $statistik['total']) * 100) : 0 }}% dari total
                    </p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-400 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                    <svg class="h-6 w-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Rata-rata Nilai Akhir</p>
                    <p class="text-3xl font-bold text-gray-800">{{ number_format($statistik['rata_rata'], 2, ',', '.') }}</p>
                    <p class="mt-1 text-xs text-gray-400">Skala 100</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ TABEL LAPORAN ============ --}}
    <div class="animate-fade-up delay-400 rounded-xl bg-white shadow-sm">

        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
            <h2 class="text-base font-bold text-gray-800">Daftar Laporan Peserta</h2>
            <button type="button" onclick="window.print()"
                    class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-xs font-semibold text-gray-700 transition hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                Cetak Laporan
            </button>
        </div>

        <div class="overflow-x-auto scrollbar-thin">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50 text-left">
                        <th class="px-4 py-4 font-semibold text-gray-600">No.</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Nama Peserta</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">NIP</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Jabatan</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Jenis Seleksi</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Nilai Akhir</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Status</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($dataLaporan as $i => $d)
                        @php $p = $d['peserta']; @endphp
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-4 text-gray-500">{{ $i + 1 }}</td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                                        <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-800">{{ $p->nama }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-gray-600">{{ $p->nip ?? '-' }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $p->jabatan }}</td>
                            <td class="px-4 py-4">
                                @if ($p->jenis_penilaian === 'kenaikan_jenjang')
                                    <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                        Kenaikan Jenjang
                                    </span>
                                @else
                                    <span class="inline-block rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">
                                        Perpindahan Jabatan
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-center font-bold text-gray-800">
                                {{ number_format($d['nilai_akhir'], 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 text-center">
                                @if ($d['lulus'])
                                    <span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Lulus
                                    </span>
                                @else
                                    <span class="inline-block rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">
                                        Tidak Lulus
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.penilaian.detail', $p->id) }}"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 text-blue-600 transition hover:bg-blue-100"
                                       title="Lihat Detail">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.penilaian.export-excel', $p->id) }}"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-green-200 bg-green-50 text-green-600 transition hover:bg-green-100"
                                       title="Download Excel">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-gray-400">
                                <svg class="mx-auto mb-3 h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Belum ada data laporan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between border-t border-gray-200 px-6 py-4">
            <p class="text-xs text-gray-500">
                Menampilkan {{ count($dataLaporan) }} peserta
            </p>
        </div>
    </div>

@endsection

@push('styles')
<style>
    @media print {
        aside, header, nav, .no-print, button, a[href*="export"] {
            display: none !important;
        }
        body { background: white !important; }
        main { margin-left: 0 !important; padding: 0 !important; }
        .animate-fade-up { animation: none !important; opacity: 1 !important; }
    }
</style>
@endpush