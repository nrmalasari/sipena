@extends('layouts.admin')

@section('title', 'Penilaian - LAN RI')

@section('breadcrumb')
    <span class="text-gray-400">Dashboard</span>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Penilaian</span>
@endsection

@section('content')

    {{-- HEADER --}}
    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Penilaian Peserta</h1>
        <p class="mt-1 text-sm text-gray-500">Kelola, lihat, dan verifikasi hasil penilaian calon peserta.</p>
    </div>

    {{-- STAT CARDS --}}
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
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Sudah Dinilai</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['sudah_dinilai'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Peserta</p>
                </div>
            </div>
        </div>

        <div class="animate-fade-up delay-300 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-6 w-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Menunggu Penilaian</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['menunggu'] }}</p>
                    <p class="mt-1 text-xs text-gray-400">Peserta</p>
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
                    <p class="text-sm font-medium text-gray-500">Nilai Rata-rata</p>
                    <p class="text-3xl font-bold text-gray-800">{{ number_format($statistik['nilai_final'], 2, ',', '.') }}</p>
                    <p class="mt-1 text-xs text-gray-400">Rata-rata nilai</p>
                </div>
            </div>
        </div>
    </div>

    {{-- SEARCH & FILTER --}}
    <form method="GET" action="{{ route('admin.penilaian') }}" class="animate-fade-up delay-200 mb-6">
        <div class="flex flex-col gap-3 lg:flex-row">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama peserta..."
                       class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-700
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
            </div>

            <select name="jenis" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 lg:w-56">
                <option value="">Semua Jenis Ujian</option>
                <option value="kenaikan_jenjang"    {{ request('jenis') === 'kenaikan_jenjang' ? 'selected' : '' }}>Kenaikan Jenjang</option>
                <option value="perpindahan_jabatan" {{ request('jenis') === 'perpindahan_jabatan' ? 'selected' : '' }}>Perpindahan Jabatan</option>
            </select>

            <select name="status" class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 lg:w-48">
                <option value="">Semua Status</option>
                <option value="belum_dinilai"  {{ request('status') === 'belum_dinilai' ? 'selected' : '' }}>Belum Dinilai</option>
                <option value="sedang_dinilai" {{ request('status') === 'sedang_dinilai' ? 'selected' : '' }}>Sedang Dinilai</option>
                <option value="selesai"        {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            <button type="submit" class="flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Filter
            </button>

            <a href="{{ route('admin.penilaian') }}"
               class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                Reset
            </a>
        </div>
    </form>

    {{-- TABEL --}}
    <div class="animate-fade-up delay-300 rounded-xl bg-white shadow-sm">

        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
            <h2 class="text-base font-bold text-gray-800">Daftar Penilaian</h2>
            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                Total {{ $pesertaList->total() }} peserta
            </span>
        </div>

        <div class="overflow-x-auto scrollbar-thin">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50 text-left">
                        <th class="px-4 py-4 font-semibold text-gray-600">No.</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Nama Peserta</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Jenis Seleksi</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Status</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Wawancara</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Tertulis</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Rata-rata</th>
                        <th class="px-4 py-4 font-semibold text-gray-600">Penilai</th>
                        <th class="px-4 py-4 text-center font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($pesertaList as $i => $p)
                        @php
                            $penugasanW = \App\Models\PenugasanPenilai::with('penilai')
                                ->where('peserta_id', $p->id)
                                ->where('tipe', 'wawancara')
                                ->orderBy('urutan')
                                ->get();

                            $penugasanT = \App\Models\PenugasanPenilai::with('penilai')
                                ->where('peserta_id', $p->id)
                                ->where('tipe', 'tertulis')
                                ->orderBy('urutan')
                                ->get();
                        @endphp
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-4 text-gray-500">
                                {{ ($pesertaList->currentPage() - 1) * $pesertaList->perPage() + $i + 1 }}
                            </td>
                            <td class="px-4 py-4 font-semibold text-gray-800">{{ $p->nama }}</td>

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
                                @if ($p->status === 'selesai')
                                    <span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Selesai</span>
                                @elseif ($p->status === 'sedang_dinilai')
                                    <span class="inline-block rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">Sedang Dinilai</span>
                                @else
                                    <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">Belum Dinilai</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-center font-semibold text-gray-800">
                                {{ $p->nilai_wawancara !== null ? number_format($p->nilai_wawancara, 2, ',', '.') : '—' }}
                            </td>
                            <td class="px-4 py-4 text-center font-semibold text-gray-800">
                                {{ $p->nilai_tertulis !== null ? number_format($p->nilai_tertulis, 2, ',', '.') : '—' }}
                            </td>
                            <td class="px-4 py-4 text-center font-semibold text-gray-800">
                                {{ $p->rata_rata !== null ? number_format($p->rata_rata, 2, ',', '.') : '—' }}
                            </td>
                            <td class="px-4 py-4">
                                <div class="space-y-2 min-w-[200px]">
                                    @if ($penugasanW->count() > 0)
                                        <div class="rounded-lg border border-blue-200 bg-blue-50/60 px-2 py-1.5">
                                            <p class="text-[9px] font-bold text-blue-700 uppercase mb-0.5">Wawancara</p>
                                            @foreach ($penugasanW as $pw)
                                                @if ($pw->penilai)
                                                    <p class="text-[10px] text-gray-700 truncate">
                                                        <span class="font-semibold text-blue-700">{{ $pw->urutan }}.</span>
                                                        {{ $pw->penilai->nama }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($penugasanT->count() > 0)
                                        <div class="rounded-lg border border-purple-200 bg-purple-50/60 px-2 py-1.5">
                                            <p class="text-[9px] font-bold text-purple-700 uppercase mb-0.5">Tertulis</p>
                                            @foreach ($penugasanT as $pt)
                                                @if ($pt->penilai)
                                                    <p class="text-[10px] text-gray-700 truncate">
                                                        <span class="font-semibold text-purple-700">{{ $pt->urutan }}.</span>
                                                        {{ $pt->penilai->nama }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($penugasanW->count() == 0 && $penugasanT->count() == 0)
                                        <span class="text-xs text-gray-400 italic">Belum ada penilai</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- ✅ TOMBOL LIHAT (BIRU) --}}
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

                                    {{-- ✅✅✅ TOMBOL EDIT (ORANYE) — mengarah ke halaman edit ✅✅✅ --}}
                                    <a href="{{ route('admin.penilaian.edit', $p->id) }}"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-orange-200 bg-orange-50 text-orange-600 transition hover:bg-orange-100"
                                       title="Edit Nilai Penguji">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    {{-- ✅ TOMBOL HAPUS (MERAH) --}}
                                    <button type="button"
                                            onclick="konfirmasiHapusPenilaian({{ $p->id }}, '{{ addslashes($p->nama) }}')"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100"
                                            title="Hapus Penilaian">
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
                                Belum ada data penilaian
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="flex flex-col items-center justify-between gap-3 border-t border-gray-200 px-6 py-4 sm:flex-row">
            <p class="text-xs text-gray-500">
                Menampilkan {{ $pesertaList->firstItem() ?? 0 }} - {{ $pesertaList->lastItem() ?? 0 }}
                dari {{ $pesertaList->total() }} peserta
            </p>

            @if ($pesertaList->hasPages())
                <div class="flex items-center gap-1">
                    @if ($pesertaList->onFirstPage())
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 text-gray-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $pesertaList->previousPageUrl() }}"
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-gray-600 transition hover:bg-gray-50">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>
                    @endif

                    @foreach ($pesertaList->links()->elements as $element)
                        @if (is_string($element))
                            <span class="flex h-9 w-9 items-center justify-center text-sm text-gray-400">...</span>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $pesertaList->currentPage())
                                    <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-600 bg-blue-600 text-sm font-semibold text-white">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                       class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($pesertaList->hasMorePages())
                        <a href="{{ $pesertaList->nextPageUrl() }}"
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

    {{-- Form hapus --}}
    <form id="formHapusPenilaian" method="POST" action="" class="hidden">
        @csrf
        @method('DELETE')
    </form>

@endsection

@push('scripts')
<script>
    function konfirmasiHapusPenilaian(id, nama) {
        Swal.fire({
            title: 'Hapus Penilaian?',
            html: `Yakin ingin menghapus semua penilaian untuk <strong>${nama}</strong>?<br><span class="text-sm text-gray-500">Nilai yang dihapus tidak dapat dikembalikan.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('formHapusPenilaian');
                form.action = `/admin/penilaian/${id}`;
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