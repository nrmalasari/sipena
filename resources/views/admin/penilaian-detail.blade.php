@extends('layouts.admin')

@section('title', 'Detail Penilaian - LAN RI')

@section('breadcrumb')
    <a href="{{ route('admin.penilaian') }}" class="text-gray-400 hover:text-gray-600">Penilaian</a>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Detail Penilaian</span>
@endsection

@section('content')

    {{-- ============ HEADER ============ --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Detail Penilaian Peserta</h1>
            <p class="mt-1 text-sm text-gray-500">
                Lihat hasil penilaian dari kedua penilai untuk semua jenis kompetensi.
            </p>
        </div>
        <div class="flex items-center gap-2 self-start">
            <a href="{{ route('admin.penilaian') }}"
               class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>

            {{-- ✅ TOMBOL EDIT NILAI --}}
            <a href="{{ route('admin.penilaian.edit', $peserta->id) }}"
               class="flex items-center gap-2 rounded-lg bg-orange-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-orange-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Nilai
            </a>

            <a href="{{ route('admin.penilaian.export-excel', $peserta->id) }}"
               class="flex items-center gap-2 rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export Excel
            </a>
        </div>
    </div>

    {{-- ============ INFO PESERTA ============ --}}
    <div class="mb-6 rounded-xl bg-white p-5 shadow-sm animate-fade-up delay-100">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-bold text-gray-800">{{ $peserta->nama }}</p>
                    <p class="text-xs text-gray-500">{{ $peserta->nip ?? '-' }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 flex-1">
                <div>
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Jabatan</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $peserta->jabatan }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Instansi</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $peserta->instansi }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Jenis Penilaian</p>
                    <span class="inline-block rounded-full {{ $peserta->jenis_penilaian === 'kenaikan_jenjang' ? 'bg-purple-100 text-purple-700' : 'bg-orange-100 text-orange-700' }} px-3 py-1 text-xs font-semibold">
                        {{ $peserta->label_jenis_penilaian }}
                    </span>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Status</p>
                    @if ($peserta->status === 'selesai')
                        <span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                            ✓ Selesai
                        </span>
                    @elseif ($peserta->status === 'sedang_dinilai')
                        <span class="inline-block rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">
                            ⏳ Sedang Dinilai
                        </span>
                    @else
                        <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                            Belum Dinilai
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ============ 3 SUMMARY CARDS ============ --}}
    <div class="mb-6 grid grid-cols-1 gap-4 lg:grid-cols-3 animate-fade-up delay-200">
        {{-- Card: Nilai Rata-rata --}}
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Nilai Rata-rata</p>
                    <p class="text-3xl font-bold text-gray-800">{{ number_format($nilaiRataRata, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>

        {{-- Card: Info Penilai --}}
        <div class="rounded-xl bg-white p-5 shadow-sm lg:col-span-2">
            <p class="text-xs font-medium text-gray-500 mb-3">Penilai yang Ditugaskan</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                {{-- Wawancara --}}
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-[10px] font-bold text-blue-700 uppercase mb-2">Wawancara (2 Penilai)</p>
                    <div class="space-y-1">
                        <p class="text-xs text-gray-700">
                            <span class="font-semibold text-blue-700">P1:</span>
                            {{ $p1->nama ?? 'Belum ditugaskan' }}
                        </p>
                        <p class="text-xs text-gray-700">
                            <span class="font-semibold text-blue-700">P2:</span>
                            {{ $p2->nama ?? 'Belum ditugaskan' }}
                        </p>
                    </div>
                </div>

                {{-- Tertulis --}}
                @if ($isPerpindahan)
                    <div class="rounded-lg bg-purple-50 p-3">
                        <p class="text-[10px] font-bold text-purple-700 uppercase mb-2">Tertulis (1 Penilai)</p>
                        <div class="space-y-1">
                            <p class="text-xs text-gray-700">
                                <span class="font-semibold text-purple-700">P1:</span>
                                {{ $p1Tertulis->nama ?? 'Belum ditugaskan' }}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="rounded-lg bg-gray-50 p-3 flex items-center justify-center">
                        <p class="text-xs text-gray-400 italic">Tidak ada penilaian tertulis</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ============ TABEL RINCIAN (TANPA KOLOM CATATAN) ============ --}}
    <div class="mb-6 animate-fade-up delay-300">
        <div class="rounded-xl bg-white shadow-sm overflow-hidden">
            <div class="border-b border-gray-200 px-5 py-4">
                <h2 class="text-base font-bold text-gray-800">Rincian Penilaian Kompetensi</h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Jenis: <span class="font-semibold">{{ $peserta->label_jenis_penilaian }}</span>
                </p>
            </div>

            <div class="overflow-x-auto scrollbar-thin">
                <table class="w-full text-xs border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-2 py-3 text-left font-semibold text-gray-600 border-r border-gray-200">Judul Unit Kompetensi</th>
                            <th class="px-2 py-3 text-left font-semibold text-gray-600 border-r border-gray-200">Jenis Kompetensi</th>
                            <th class="px-2 py-3 text-left font-semibold text-gray-600 border-r border-gray-200">Elemen Kompetensi</th>
                            <th class="px-2 py-3 text-center font-semibold text-gray-600 border-r border-gray-200">Rata-rata</th>
                            <th class="px-2 py-3 text-center font-semibold text-gray-600">Nilai Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $byUnit = [];
                            foreach ($struktur as $g) {
                                $byUnit[$g['judul_unit']][] = $g;
                            }
                        @endphp

                        @foreach ($byUnit as $unit => $groups)
                            @php
                                $totalUnit = $totalPerUnit[$unit] ?? 0;
                                $bobotUnitHeader = $bobotUnit[$unit] ?? 50;
                            @endphp

                            {{-- HEADER UNIT --}}
                            <tr class="bg-purple-100 border-b-2 border-purple-300">
                                <td colspan="4" class="px-3 py-3 font-bold text-purple-800 text-sm text-center">
                                    {{ $unit }} ({{ $bobotUnitHeader }}%)
                                </td>
                                <td class="px-3 py-3 text-center font-bold text-purple-800 text-base">
                                    {{ number_format($totalUnit, 2, ',', '.') }}
                                </td>
                            </tr>

                            @foreach ($groups as $g)
                                @php
                                    $jumlahElemen = count($g['elemen']);
                                    $keyGrup = $unit . '|' . $g['jenis_kompetensi'];
                                    $override = $overrides[$keyGrup] ?? null;
                                    $rataRataJenis = $override?->rata_rata_override ?? $g['rata_rata_jenis'];
                                    $nilaiFinalJenis = $override?->nilai_final_override ?? $g['nilai_final'];
                                @endphp

                                @foreach ($g['elemen'] as $idx => $e)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        @if ($idx === 0)
                                            <td rowspan="{{ $jumlahElemen }}" class="px-2 py-3 font-semibold text-gray-700 border-r border-gray-200 align-middle text-center">
                                                <div>{{ $g['tipe_ujian'] }}</div>
                                                <div class="text-[10px] text-gray-500">({{ $g['bobot_tipe_ujian'] }}%)</div>
                                            </td>
                                            <td rowspan="{{ $jumlahElemen }}" class="px-2 py-3 font-semibold text-gray-700 border-r border-gray-200 align-middle text-center">
                                                <div>{{ $g['jenis_kompetensi'] }}</div>
                                                <div class="text-[10px] text-gray-500">({{ $g['bobot_kompetensi'] }}%)</div>
                                            </td>
                                        @endif

                                        <td class="px-2 py-3 text-gray-700 border-r border-gray-200">
                                            {{ $e['nama_elemen'] }}
                                        </td>
                                        <td class="px-2 py-3 text-center font-semibold text-gray-800 border-r border-gray-200">
                                            {{ $e['rata_rata_elemen'] !== null ? number_format($e['rata_rata_elemen'], 2, ',', '.') : '0,00' }}
                                        </td>

                                        @if ($idx === 0)
                                            <td rowspan="{{ $jumlahElemen }}" class="px-2 py-3 text-center align-middle bg-purple-50">
                                                <span class="font-bold text-purple-700 text-sm">
                                                    {{ $nilaiFinalJenis !== null ? number_format($nilaiFinalJenis, 2, ',', '.') : '0,00' }}
                                                </span>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach

                                {{-- BARIS RATA-RATA JENIS --}}
                                <tr class="bg-yellow-50 border-b border-yellow-200">
                                    <td colspan="2" class="px-2 py-2 text-right text-[10px] font-bold text-gray-600">
                                        Rata-rata
                                    </td>
                                    <td class="px-2 py-2 text-[10px] text-gray-500 text-center">
                                        ({{ $g['jumlah_elemen'] }} elemen)
                                    </td>
                                    <td class="px-2 py-2 text-center font-bold text-gray-800 border-r border-gray-200">
                                        {{ $rataRataJenis !== null ? number_format($rataRataJenis, 2, ',', '.') : '0,00' }}
                                    </td>
                                    <td class="px-2 py-2 text-[10px] text-gray-500 text-center">
                                        {{ $g['bobot_kompetensi'] }}% × {{ $g['bobot_tipe_ujian'] }}% = <span class="font-bold text-purple-700">{{ $nilaiFinalJenis !== null ? number_format($nilaiFinalJenis, 2, ',', '.') : '0,00' }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ============ KOTAK KHUSUS CATATAN PENGUJI (1 KOTAK) ============ --}}
    <div class="mb-6 animate-fade-up delay-400">
        <div class="rounded-xl bg-white shadow-sm border-2 border-amber-300 overflow-hidden">
            {{-- Header --}}
            <div class="flex items-center justify-between border-b border-amber-200 bg-amber-50 px-5 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-amber-100">
                        <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Catatan Penguji</h2>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Catatan dari seluruh penguji (Wawancara & Tertulis) — bersifat wajib.
                        </p>
                    </div>
                </div>
                <span class="rounded-full bg-amber-200 px-3 py-1 text-xs font-bold text-amber-800">
                    {{ $semuaCatatan->count() }} Catatan
                </span>
            </div>

            {{-- Body --}}
            <div class="p-5">
                @if ($semuaCatatan->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($semuaCatatan as $cp)
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 hover:shadow-md transition">
                                {{-- Header: Nama + Tipe --}}
                                <div class="flex items-center justify-between mb-2 pb-2 border-b border-gray-200">
                                    <div class="flex items-center gap-2">
                                        <div class="flex h-7 w-7 items-center justify-center rounded-full bg-blue-100 text-blue-700 text-[10px] font-bold">
                                            {{ strtoupper(substr($cp->penilai->nama ?? 'P', 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-gray-800">
                                                {{ $cp->penilai->nama ?? 'Penilai' }}
                                            </p>
                                            <p class="text-[10px] text-gray-500">
                                                {{ $cp->updated_at ? $cp->updated_at->format('d M Y, H:i') : '-' }}
                                            </p>
                                        </div>
                                    </div>
                                    <span class="rounded-full px-2.5 py-0.5 text-[10px] font-bold uppercase
                                        {{ $cp->tipe === 'wawancara' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                        {{ $cp->tipe }}
                                    </span>
                                </div>

                                {{-- Isi Catatan --}}
                                <p class="text-xs text-gray-700 whitespace-pre-line leading-relaxed">
                                    {{ $cp->catatan }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-10 text-center">
                        <svg class="h-12 w-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                        <p class="text-sm text-gray-400 italic">Belum ada catatan dari penguji</p>
                        <p class="text-xs text-gray-400 mt-1">Catatan akan muncul setelah penguji mengisi form penilaian.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ============ GRAFIK (FULL WIDTH) ============ --}}
    <div class="mb-6 animate-fade-up delay-500">
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <h3 class="text-sm font-bold text-gray-800 mb-4">Grafik Nilai Kompetensi</h3>
            <div class="relative" style="height: 320px;">
                <canvas id="grafikRadar"></canvas>
            </div>
        </div>
    </div>

    {{-- ============ CATATAN INFO ============ --}}
    <div class="mb-4 rounded-xl bg-white p-5 shadow-sm">
        <h3 class="text-sm font-bold text-gray-800 mb-3">Keterangan Perhitungan</h3>
        <ul class="space-y-2 text-xs text-gray-600">
            <li>• Nilai = rata-rata 2 penilai per kompetensi (Wawancara)</li>
            <li>• Nilai = nilai 1 penilai (Tertulis)</li>
            <li>• Nilai Final = Rata-rata × Bobot Kompetensi × Bobot Tipe Ujian</li>
            <li>• <strong>Keterangan</strong> per unit = jumlah Nilai Final semua jenis</li>
            <li>• <strong>Catatan Penguji</strong> bersifat wajib & ditampilkan di kotak khusus di atas</li>
        </ul>
    </div>

    {{-- CATATAN KAKI --}}
    <div class="mt-4 rounded-lg bg-yellow-50 border border-yellow-200 p-3 text-xs text-gray-700">
        <strong>Passing grade 71,00</strong> adalah nilai minimal kelulusan
    </div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('grafikRadar');
        if (!ctx) return;

        const grafikData = @json($grafikData);
        const nilaiFinalAkhir = {{ $nilaiFinalAkhir }};

        const labels = grafikData.map(d => d.label + '\n(' + d.bobot + '%)');
        const nilaiPerUnit = grafikData.map(d => d.nilai);

        let finalLabels = labels;
        let finalData = nilaiPerUnit;

        if (labels.length < 3) {
            finalLabels = [...labels, 'Rata-rata'];
            finalData = [...nilaiPerUnit, nilaiFinalAkhir];
        }

        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: finalLabels,
                datasets: [{
                    label: 'Nilai Final per Unit',
                    data: finalData,
                    borderColor: 'rgb(147, 51, 234)',
                    backgroundColor: 'rgba(147, 51, 234, 0.25)',
                    pointBackgroundColor: 'rgb(147, 51, 234)',
                    borderWidth: 2.5,
                    pointRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 100,
                        ticks: { stepSize: 25, font: { size: 10 }, color: '#6b7280', backdropColor: 'transparent' },
                        grid: { color: 'rgba(0,0,0,0.1)' },
                        angleLines: { color: 'rgba(0,0,0,0.1)' },
                        pointLabels: { font: { size: 11, weight: '700' }, color: '#374151' }
                    }
                }
            }
        });
    });
</script>
@endpush