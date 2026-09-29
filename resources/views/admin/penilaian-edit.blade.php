@extends('layouts.admin')

@section('title', 'Edit Penilaian - LAN RI')

@section('breadcrumb')
    <a href="{{ route('admin.penilaian') }}" class="text-gray-400 hover:text-gray-600">Penilaian</a>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <a href="{{ route('admin.penilaian.detail', $peserta->id) }}" class="text-gray-400 hover:text-gray-600">Detail</a>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Edit Nilai</span>
@endsection

@section('content')

    {{-- HEADER --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Nilai Penguji</h1>
            <p class="mt-1 text-sm text-gray-500">
                Ubah nilai per elemen kompetensi yang diinput penguji. Sistem otomatis menghitung ulang rata-rata & nilai final.
            </p>
        </div>
        <div class="flex items-center gap-2 self-start">
            <a href="{{ route('admin.penilaian.detail', $peserta->id) }}"
               class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- INFO PESERTA --}}
    <div class="mb-6 rounded-xl bg-white p-5 shadow-sm animate-fade-up delay-100 border-l-4 border-orange-400">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                    <svg class="h-8 w-8 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-bold text-gray-800">{{ $peserta->nama }}</p>
                    <p class="text-xs text-gray-500">{{ $peserta->nip ?? '-' }} • {{ $peserta->instansi }}</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                <div>
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Jabatan</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $peserta->jabatan }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Jenis</p>
                    <span class="inline-block rounded-full {{ $peserta->jenis_penilaian === 'kenaikan_jenjang' ? 'bg-purple-100 text-purple-700' : 'bg-orange-100 text-orange-700' }} px-3 py-1 text-xs font-semibold">
                        {{ $peserta->label_jenis_penilaian }}
                    </span>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Status</p>
                    @if ($peserta->status === 'selesai')
                        <span class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">✓ Selesai</span>
                    @elseif ($peserta->status === 'sedang_dinilai')
                        <span class="inline-block rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">⏳ Sedang Dinilai</span>
                    @else
                        <span class="inline-block rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">Belum Dinilai</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- WARNING --}}
    <div class="mb-6 rounded-xl bg-amber-50 border-2 border-amber-300 p-4 animate-fade-up delay-150">
        <div class="flex items-start gap-3">
            <svg class="h-5 w-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <div class="text-xs text-amber-800">
                <p class="font-bold">Perhatian!</p>
                <p class="mt-1">Anda sedang mengedit nilai yang diinput penguji. Perubahan akan <strong>langsung mempengaruhi</strong> nilai rata-rata, nilai final, dan status kelulusan peserta. Kosongkan field untuk <strong>menghapus</strong> nilai.</p>
            </div>
        </div>
    </div>

    {{-- FORM EDIT --}}
    <form method="POST" action="{{ route('admin.penilaian.update-nilai', $peserta->id) }}" id="formEditNilai">
        @csrf
        @method('PUT')

        @php
            $byUnit = [];
            foreach ($struktur as $g) {
                $byUnit[$g['judul_unit']][] = $g;
            }
        @endphp

        @foreach ($byUnit as $unit => $groups)
            <div class="mb-6 rounded-xl bg-white shadow-sm overflow-hidden animate-fade-up">
                <div class="border-b border-gray-200 bg-purple-50 px-5 py-4">
                    <h2 class="text-base font-bold text-purple-800">{{ $unit }}</h2>
                    <p class="text-xs text-purple-600 mt-0.5">
                        Bobot Unit: {{ $bobotUnit[$unit] ?? 50 }}% — Total Nilai Unit Saat Ini:
                        <span class="font-bold">{{ number_format($totalPerUnit[$unit] ?? 0, 2, ',', '.') }}</span>
                    </p>
                </div>

                <div class="overflow-x-auto scrollbar-thin">
                    <table class="w-full text-xs border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-3 py-3 text-left font-semibold text-gray-600 border-r border-gray-200">Tipe Ujian</th>
                                <th class="px-3 py-3 text-left font-semibold text-gray-600 border-r border-gray-200">Jenis Kompetensi</th>
                                <th class="px-3 py-3 text-left font-semibold text-gray-600 border-r border-gray-200">Elemen Kompetensi</th>
                                <th class="px-3 py-3 text-center font-semibold text-gray-600 border-r border-gray-200 w-24">Nilai P1</th>
                                <th class="px-3 py-3 text-center font-semibold text-gray-600 border-r border-gray-200 w-24">Nilai P2</th>
                                <th class="px-3 py-3 text-center font-semibold text-gray-600 w-28">Rata-rata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $g)
                                @php
                                    $jumlahElemen = count($g['elemen']);
                                    $isWawancara = $g['tipe_ujian'] === 'Wawancara';

                                    if ($isWawancara) {
                                        $p1 = $penugasanWawancara->where('urutan', 1)->first();
                                        $p2 = $penugasanWawancara->where('urutan', 2)->first();
                                    } else {
                                        $p1 = $penugasanTertulis->where('urutan', 1)->first();
                                        $p2 = $penugasanTertulis->where('urutan', 2)->first();
                                    }
                                @endphp

                                @foreach ($g['elemen'] as $idx => $e)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        @if ($idx === 0)
                                            <td rowspan="{{ $jumlahElemen }}" class="px-3 py-3 font-semibold text-gray-700 border-r border-gray-200 align-middle text-center">
                                                <div class="{{ $isWawancara ? 'text-blue-700' : 'text-purple-700' }}">
                                                    {{ $g['tipe_ujian'] }}
                                                </div>
                                                <div class="text-[10px] text-gray-500">({{ $g['bobot_tipe_ujian'] }}%)</div>
                                            </td>
                                            <td rowspan="{{ $jumlahElemen }}" class="px-3 py-3 font-semibold text-gray-700 border-r border-gray-200 align-middle text-center">
                                                <div>{{ $g['jenis_kompetensi'] }}</div>
                                                <div class="text-[10px] text-gray-500">({{ $g['bobot_kompetensi'] }}%)</div>
                                            </td>
                                        @endif

                                        <td class="px-3 py-3 text-gray-700 border-r border-gray-200">
                                            {{ $e['nama_elemen'] }}
                                        </td>

                                        {{-- NILAI P1 --}}
                                        <td class="px-2 py-2 text-center border-r border-gray-200">
                                            @if ($p1)
                                                <input type="number"
                                                       name="nilai[{{ $p1->penilai_id }}][{{ $isWawancara ? 'wawancara' : 'tertulis' }}][{{ $e['urutan'] }}]"
                                                       value="{{ $e['nilai_p1'] !== null ? number_format($e['nilai_p1'], 2, '.', '') : '' }}"
                                                       step="0.01" min="0" max="100"
                                                       class="input-nilai-p1 w-20 rounded-lg border border-blue-300 bg-blue-50/40 px-2 py-1.5 text-center text-sm font-bold text-blue-700
                                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none"
                                                       placeholder="—">
                                                <p class="text-[9px] text-blue-600 mt-0.5 truncate max-w-[100px] mx-auto">
                                                    {{ $p1->penilai->nama ?? '-' }}
                                                </p>
                                            @else
                                                <span class="text-gray-400 italic text-[10px]">—</span>
                                            @endif
                                        </td>

                                        {{-- NILAI P2 --}}
                                        <td class="px-2 py-2 text-center border-r border-gray-200">
                                            @if ($p2)
                                                <input type="number"
                                                       name="nilai[{{ $p2->penilai_id }}][{{ $isWawancara ? 'wawancara' : 'tertulis' }}][{{ $e['urutan'] }}]"
                                                       value="{{ $e['nilai_p2'] !== null ? number_format($e['nilai_p2'], 2, '.', '') : '' }}"
                                                       step="0.01" min="0" max="100"
                                                       class="input-nilai-p2 w-20 rounded-lg border border-green-300 bg-green-50/40 px-2 py-1.5 text-center text-sm font-bold text-green-700
                                                              focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none"
                                                       placeholder="—">
                                                <p class="text-[9px] text-green-600 mt-0.5 truncate max-w-[100px] mx-auto">
                                                    {{ $p2->penilai->nama ?? '-' }}
                                                </p>
                                            @else
                                                <span class="text-gray-400 italic text-[10px]">—</span>
                                            @endif
                                        </td>

                                        {{-- RATA-RATA --}}
                                        <td class="px-2 py-2 text-center">
                                            <span class="rata-rata-edit inline-block rounded-lg bg-gray-100 px-2 py-1.5 text-sm font-bold text-gray-800 w-20">
                                                {{ $e['rata_rata_elemen'] !== null ? number_format($e['rata_rata_elemen'], 2, ',', '.') : '—' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        {{-- EDIT CATATAN PENGUJI --}}
        <div class="mb-6 rounded-xl bg-white shadow-sm border-2 border-amber-300 overflow-hidden animate-fade-up">
            <div class="border-b border-amber-200 bg-amber-50 px-5 py-4">
                <h2 class="text-base font-bold text-gray-800">Edit Catatan Penguji</h2>
                <p class="text-xs text-gray-500 mt-0.5">Anda juga bisa mengedit catatan yang diinput penguji.</p>
            </div>

            <div class="p-5 space-y-4">
                @foreach ($penugasanWawancara as $pw)
                    @php
                        $penilaian = \App\Models\Penilaian::where('peserta_id', $peserta->id)
                            ->where('penilai_id', $pw->penilai_id)
                            ->where('tipe', 'wawancara')
                            ->first();
                    @endphp
                    <div>
                        <label class="block text-xs font-bold text-blue-700 mb-1">
                            {{ $pw->penilai->nama ?? '-' }}
                            <span class="ml-2 rounded bg-blue-100 px-2 py-0.5 text-[10px] font-bold uppercase">Wawancara P{{ $pw->urutan }}</span>
                        </label>
                        <textarea name="catatan[{{ $pw->penilai_id }}][wawancara]"
                                  rows="3"
                                  class="w-full rounded-lg border border-blue-300 px-3 py-2 text-sm text-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none"
                                  placeholder="Catatan penguji wawancara...">{{ $penilaian?->catatan ?? '' }}</textarea>
                    </div>
                @endforeach

                @foreach ($penugasanTertulis as $pt)
                    @php
                        $penilaian = \App\Models\Penilaian::where('peserta_id', $peserta->id)
                            ->where('penilai_id', $pt->penilai_id)
                            ->where('tipe', 'tertulis')
                            ->first();
                    @endphp
                    <div>
                        <label class="block text-xs font-bold text-purple-700 mb-1">
                            {{ $pt->penilai->nama ?? '-' }}
                            <span class="ml-2 rounded bg-purple-100 px-2 py-0.5 text-[10px] font-bold uppercase">Tertulis P{{ $pt->urutan }}</span>
                        </label>
                        <textarea name="catatan[{{ $pt->penilai_id }}][tertulis]"
                                  rows="3"
                                  class="w-full rounded-lg border border-purple-300 px-3 py-2 text-sm text-gray-700 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 focus:outline-none"
                                  placeholder="Catatan penguji tertulis...">{{ $penilaian?->catatan ?? '' }}</textarea>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- TOMBOL AKSI --}}
        <div class="mb-6 flex items-center justify-end gap-3 animate-fade-up">
            <a href="{{ route('admin.penilaian.detail', $peserta->id) }}"
               class="rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
                Batal
            </a>
            <button type="button"
                    onclick="konfirmasiSimpan()"
                    class="flex items-center gap-2 rounded-lg bg-orange-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md shadow-orange-600/30 transition hover:bg-orange-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>

    {{-- INFO --}}
    <div class="rounded-lg bg-yellow-50 border border-yellow-200 p-3 text-xs text-gray-700">
        <strong>💡 Tips:</strong> Kosongkan field nilai untuk <strong>menghapus</strong> nilai elemen tersebut. Perubahan akan otomatis menghitung ulang rata-rata & nilai final.
    </div>

@endsection

@push('scripts')
<script>
    function hitungRataRataEdit(row) {
        const p1 = row.querySelector('.input-nilai-p1');
        const p2 = row.querySelector('.input-nilai-p2');
        const elRata = row.querySelector('.rata-rata-edit');

        const v1 = p1 && p1.value !== '' ? parseFloat(p1.value) : null;
        const v2 = p2 && p2.value !== '' ? parseFloat(p2.value) : null;

        let hasil = null;
        if (v1 !== null && v2 !== null) hasil = (v1 + v2) / 2;
        else if (v1 !== null) hasil = v1;
        else if (v2 !== null) hasil = v2;

        if (hasil !== null) {
            elRata.textContent = hasil.toFixed(2).replace('.', ',');
        } else {
            elRata.textContent = '—';
        }
    }

    document.querySelectorAll('tr').forEach(row => {
        const inputs = row.querySelectorAll('.input-nilai-p1, .input-nilai-p2');
        inputs.forEach(inp => {
            inp.addEventListener('input', () => hitungRataRataEdit(row));
        });
    });

    function konfirmasiSimpan() {
        Swal.fire({
            title: 'Simpan Perubahan?',
            html: `Anda akan menyimpan perubahan nilai untuk <strong>{{ $peserta->nama }}</strong>.<br><span class="text-sm text-gray-500">Nilai rata-rata & nilai final akan dihitung ulang otomatis.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ea580c',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formEditNilai').submit();
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