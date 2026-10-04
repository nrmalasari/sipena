@extends('layouts.admin')

@section('title', 'Dashboard Admin - LAN RI')

@section('breadcrumb')
    <span class="text-gray-700 font-medium">Dashboard</span>
@endsection

@section('content')

    {{-- ============ HEADER ============ --}}
    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Selamat datang, Admin!</h1>
        <p class="mt-1 text-sm text-gray-500">Kelola data peserta, penilai, dan proses penilaian dengan mudah dan terintegrasi.</p>
    </div>

    {{-- ============ STAT CARDS (4 kolom) ============ --}}
    @php
        $totalPeserta       = \App\Models\Peserta::count();
        $totalPenilai       = \App\Models\Penilai::count();
        $kenaikanJenjang    = \App\Models\Peserta::where('jenis_penilaian', 'kenaikan_jenjang')->count();
        $perpindahanJabatan = \App\Models\Peserta::where('jenis_penilaian', 'perpindahan_jabatan')->count();
    @endphp

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">

        {{-- Total Peserta --}}
        <div class="animate-fade-up delay-100 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500">Total Peserta</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalPeserta }}</p>
                    <a href="{{ route('admin.peserta') }}" class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:underline">
                        Lihat Semua
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Total Penilai --}}
        <div class="animate-fade-up delay-200 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500">Total Penilai</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalPenilai }}</p>
                    <a href="{{ route('admin.penilai') }}" class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-green-600 hover:underline">
                        Lihat Semua
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Kenaikan Jenjang --}}
        <div class="animate-fade-up delay-300 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-6 w-6 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500">Kenaikan Jenjang</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $kenaikanJenjang }}</p>
                    <a href="{{ route('admin.peserta') }}?jenis=kenaikan_jenjang" class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-orange-600 hover:underline">
                        Lihat Semua
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Perpindahan Jabatan --}}
        <div class="animate-fade-up delay-400 rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                    <svg class="h-6 w-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-500">Perpindahan Jabatan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $perpindahanJabatan }}</p>
                    <a href="{{ route('admin.peserta') }}?jenis=perpindahan_jabatan" class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-purple-600 hover:underline">
                        Lihat Semua
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ AKSI CEPAT ============ --}}
    <div class="animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm mb-6">
        <h2 class="text-base font-bold text-gray-800 mb-4">Aksi Cepat</h2>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-5">

            {{-- Tambah Peserta --}}
            <a href="{{ route('admin.peserta.tambah') }}" 
               class="group flex items-start gap-3 rounded-lg border border-blue-100 bg-blue-50 p-4 transition hover:bg-blue-100 hover:border-blue-300">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-800">Tambah Peserta</p>
                    <p class="mt-0.5 text-xs text-gray-500">Daftarkan calon peserta baru</p>
                </div>
                <svg class="h-4 w-4 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            {{-- Tambah Penilai --}}
            <a href="{{ route('admin.penilai.tambah') }}" 
               class="group flex items-start gap-3 rounded-lg border border-green-100 bg-green-50 p-4 transition hover:bg-green-100 hover:border-green-300">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-800">Tambah Penilai</p>
                    <p class="mt-0.5 text-xs text-gray-500">Tambahkan penilai baru</p>
                </div>
                <svg class="h-4 w-4 text-gray-400 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            {{-- Lihat Semua Peserta --}}
            <a href="{{ route('admin.peserta') }}" 
               class="group flex items-start gap-3 rounded-lg border border-purple-100 bg-purple-50 p-4 transition hover:bg-purple-100 hover:border-purple-300">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                    <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-800">Lihat Semua Peserta</p>
                    <p class="mt-0.5 text-xs text-gray-500">Kelola data peserta</p>
                </div>
                <svg class="h-4 w-4 text-gray-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            {{-- Lihat Semua Penilai --}}
            <a href="{{ route('admin.penilai') }}" 
               class="group flex items-start gap-3 rounded-lg border border-orange-100 bg-orange-50 p-4 transition hover:bg-orange-100 hover:border-orange-300">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-5 w-5 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-800">Lihat Semua Penilai</p>
                    <p class="mt-0.5 text-xs text-gray-500">Kelola data penilai</p>
                </div>
                <svg class="h-4 w-4 text-gray-400 group-hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            {{-- Laporan Penilaian --}}
            <a href="{{ route('admin.laporan') }}" 
               class="group flex items-start gap-3 rounded-lg border border-teal-100 bg-teal-50 p-4 transition hover:bg-teal-100 hover:border-teal-300">
                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-teal-100">
                    <svg class="h-5 w-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-800">Laporan Penilaian</p>
                    <p class="mt-0.5 text-xs text-gray-500">Lihat hasil dan rekap penilaian</p>
                </div>
                <svg class="h-4 w-4 text-gray-400 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    {{-- ============ PESERTA TERBARU ============ --}}
    <div class="animate-fade-up delay-300 rounded-xl bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-gray-800">Peserta Terbaru</h2>
                <p class="mt-0.5 text-xs text-gray-500">Daftar peserta yang baru ditambahkan</p>
            </div>
            <a href="{{ route('admin.peserta') }}" class="flex items-center gap-1 text-sm font-semibold text-blue-600 hover:underline">
                Lihat Semua Peserta
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="overflow-x-auto scrollbar-thin">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50 text-left">
                        <th class="px-4 py-3 font-semibold text-gray-600 w-12">No.</th>
                        <th class="px-4 py-3 font-semibold text-gray-600 min-w-[180px]">Nama Peserta</th>
                        <th class="px-4 py-3 font-semibold text-gray-600 min-w-[150px]">Jabatan</th>
                        <th class="px-4 py-3 font-semibold text-gray-600 min-w-[150px]">Jenis Penilaian</th>
                        <th class="px-4 py-3 font-semibold text-gray-600 min-w-[110px]">Status</th>
                        <th class="px-4 py-3 text-center font-semibold text-gray-600 w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php
                        $pesertaTerbaru = \App\Models\Peserta::latest()->take(5)->get();
                    @endphp

                    @forelse ($pesertaTerbaru as $i => $p)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-500">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $p->nama }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $p->jabatan }}</td>
                            <td class="px-4 py-3">
                                @if ($p->jenis_penilaian === 'kenaikan_jenjang')
                                    <span class="inline-block whitespace-nowrap rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                        Kenaikan Jenjang
                                    </span>
                                @else
                                    <span class="inline-block whitespace-nowrap rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">
                                        Perpindahan Jabatan
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($p->status === 'belum_dinilai')
                                    <span class="inline-block whitespace-nowrap rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">Belum Dinilai</span>
                                @elseif ($p->status === 'sedang_dinilai')
                                    <span class="inline-block whitespace-nowrap rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">Sedang Dinilai</span>
                                @else
                                    <span class="inline-block whitespace-nowrap rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">Selesai</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
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
                                            onclick="konfirmasiHapusDashboard({{ $p->id }}, '{{ $p->nama }}')"
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
                            <td colspan="6" class="px-4 py-12 text-center text-gray-400">
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

        <div class="mt-4 flex items-center justify-between">
            <p class="text-xs text-gray-500">Menampilkan 1 - 5 dari {{ $totalPeserta }} peserta</p>
            <a href="{{ route('admin.peserta') }}" class="flex items-center gap-1 text-xs font-semibold text-blue-600 hover:underline">
                Lihat semua peserta
                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    {{-- Form Hidden untuk Hapus --}}
    <form id="formHapusDashboard" method="POST" action="" class="hidden">
        @csrf
        @method('DELETE')
    </form>

@endsection

@push('scripts')
<script>
    // ============ SWEETALERT: KONFIRMASI HAPUS ============
    function konfirmasiHapusDashboard(id, nama) {
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
                const form = document.getElementById('formHapusDashboard');
                form.action = `/admin/peserta/${id}`;
                form.submit();
            }
        });
    }

    // ============ SWEETALERT: NOTIFIKASI SUKSES ============
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