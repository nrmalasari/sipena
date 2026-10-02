<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Penilai;
use App\Models\PenugasanPenilai;
use App\Models\Penilaian;
use App\Models\PenilaianDetail;
use App\Models\NilaiFinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPenilaianController extends Controller
{
    /* ============================================================
       STRUKTUR KENAIKAN JENJANG
       ============================================================ */
    private function strukturKenaikanJenjang(): array
    {
        return [
            [
                'judul_unit'       => 'Kemampuan Analisis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 100,
                'jenis_kompetensi' => 'Kompetensi Inti',
                'bobot_kompetensi' => 75,
                'elemen_urutan'    => [0, 1],
                'elemen_nama'      => [
                    'Pengetahuan tentang Bidang Pekerjaan',
                    'Kemampuan menulis dan publikasi',
                ],
            ],
            [
                'judul_unit'       => 'Kemampuan Analisis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 100,
                'jenis_kompetensi' => 'Kompetensi Dasar',
                'bobot_kompetensi' => 25,
                'elemen_urutan'    => [9, 10],
                'elemen_nama'      => ['Manajemen Diri', 'Membangun Tim'],
            ],
            [
                'judul_unit'       => 'Kemampuan Politis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 100,
                'jenis_kompetensi' => 'Kompetensi Inti+Spesialis',
                'bobot_kompetensi' => 75,
                'elemen_urutan'    => [2, 3, 4, 5, 6, 7, 8],
                'elemen_nama'      => [
                    'Konteks Politik (dinamika politik dan budaya birokrasi)',
                    'Regulasi dan Legislasi',
                    'Komunikasi (CV/wawancara)',
                    'Membangun jejaring (Networking)',
                    'Presentasi (CV/wawancara)',
                    'Konsultasi Publik (CV/wawancara)',
                    'Partnership (CV/wawancara)',
                ],
            ],
            [
                'judul_unit'       => 'Kemampuan Politis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 100,
                'jenis_kompetensi' => 'Kompetensi Dasar',
                'bobot_kompetensi' => 25,
                'elemen_urutan'    => [9, 10],
                'elemen_nama'      => ['Manajemen Diri', 'Membangun Tim'],
            ],
        ];
    }

    /* ============================================================
       STRUKTUR PERPINDAHAN JABATAN
       ============================================================ */
    private function strukturPerpindahanJabatan(): array
    {
        return [
            [
                'judul_unit'       => 'Kemampuan Analisis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 60,
                'jenis_kompetensi' => 'Kompetensi Inti',
                'bobot_kompetensi' => 55,
                'elemen_urutan'    => [0, 1],
                'elemen_nama'      => [
                    'Pengetahuan tentang Bidang Pekerjaan',
                    'Kemampuan menulis dan publikasi',
                ],
            ],
            [
                'judul_unit'       => 'Kemampuan Analisis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 60,
                'jenis_kompetensi' => 'Kompetensi Dasar',
                'bobot_kompetensi' => 5,
                'elemen_urutan'    => [9, 10],
                'elemen_nama'      => ['Manajemen Diri', 'Membangun Tim'],
            ],
            [
                'judul_unit'       => 'Kemampuan Analisis',
                'tipe_ujian'       => 'Tertulis',
                'bobot_tipe_ujian' => 40,
                'jenis_kompetensi' => 'Kompetensi Inti',
                'bobot_kompetensi' => 55,
                'elemen_urutan'    => [0, 1, 2],
                'elemen_nama'      => [
                    'Pengetahuan tentang substansi Kebijakan Publik',
                    'Metode Riset',
                    'Teknik dan Analisis Kebijakan',
                ],
            ],
            [
                'judul_unit'       => 'Kemampuan Analisis',
                'tipe_ujian'       => 'Tertulis',
                'jenis_kompetensi' => 'Kompetensi Spesialis',
                'bobot_tipe_ujian' => 40,
                'bobot_kompetensi' => 55,
                'elemen_urutan'    => [3],
                'elemen_nama'      => ['Penyusunan Saran Kebijakan'],
            ],
            [
                'judul_unit'       => 'Kemampuan Politis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 60,
                'jenis_kompetensi' => 'Kompetensi Inti+Spesialis',
                'bobot_kompetensi' => 55,
                'elemen_urutan'    => [2, 3, 4, 5, 6, 7, 8],
                'elemen_nama'      => [
                    'Konteks Politik (dinamika politik dan budaya birokrasi)',
                    'Regulasi dan Legislasi',
                    'Komunikasi (CV/wawancara)',
                    'Membangun jejaring (Networking)',
                    'Presentasi (CV/wawancara)',
                    'Konsultasi Publik (CV/wawancara)',
                    'Partnership (CV/wawancara)',
                ],
            ],
            [
                'judul_unit'       => 'Kemampuan Politis',
                'tipe_ujian'       => 'Wawancara',
                'bobot_tipe_ujian' => 60,
                'jenis_kompetensi' => 'Kompetensi Dasar',
                'bobot_kompetensi' => 5,
                'elemen_urutan'    => [9, 10],
                'elemen_nama'      => ['Manajemen Diri', 'Membangun Tim'],
            ],
            [
                'judul_unit'       => 'Kemampuan Politis',
                'tipe_ujian'       => 'Tertulis',
                'bobot_tipe_ujian' => 40,
                'jenis_kompetensi' => 'Kompetensi Inti',
                'bobot_kompetensi' => 55,
                'elemen_urutan'    => [4],
                'elemen_nama'      => ['Regulasi dan Legislasi'],
            ],
        ];
    }

    private function bobotUnit(): array
    {
        return [
            'Kemampuan Analisis' => 50,
            'Kemampuan Politis'  => 50,
        ];
    }

    private function getNilaiElemen($detailCollection, int $urutan): ?float
    {
        if (!$detailCollection || !isset($detailCollection[$urutan])) {
            return null;
        }
        $nilai = $detailCollection[$urutan]->nilai ?? null;
        return $nilai !== null ? (float) $nilai : null;
    }

    /* =========================================================
       AUTO-SYNC STATUS PESERTA
       ========================================================= */
    private function syncStatusPeserta($pesertaId): void
    {
        $peserta = Peserta::find($pesertaId);
        if (!$peserta) return;

        $semuaPenugasan = PenugasanPenilai::where('peserta_id', $pesertaId)->get();

        if ($semuaPenugasan->isEmpty()) {
            if ($peserta->status !== 'belum_dinilai') {
                $peserta->update(['status' => 'belum_dinilai']);
            }
            return;
        }

        $totalPenugasan = $semuaPenugasan->count();
        $selesaiCount = 0;

        foreach ($semuaPenugasan as $penugasan) {
            $sudahSelesai = Penilaian::where('peserta_id', $pesertaId)
                ->where('penilai_id', $penugasan->penilai_id)
                ->where('tipe', $penugasan->tipe)
                ->where('status', 'selesai')
                ->exists();

            if ($sudahSelesai) $selesaiCount++;
        }

        if ($selesaiCount === 0) {
            $statusBaru = 'belum_dinilai';
        } elseif ($selesaiCount >= $totalPenugasan) {
            $statusBaru = 'selesai';
        } else {
            $statusBaru = 'sedang_dinilai';
        }

        if ($peserta->status !== $statusBaru) {
            $peserta->update(['status' => $statusBaru]);
        }
    }

    /* =========================================================
       LIST PENILAIAN
       ========================================================= */
    public function index(Request $request)
    {
        Peserta::chunk(100, function ($pesertas) {
            foreach ($pesertas as $p) {
                $this->syncStatusPeserta($p->id);
            }
        });

        $query = Peserta::with(['penugasanPenilais.penilai']);

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                  ->orWhere('jabatan', 'like', "%{$s}%");
            });
        }
        if ($request->filled('jenis'))  $query->where('jenis_penilaian', $request->jenis);
        if ($request->filled('status')) $query->where('status', $request->status);

        $pesertaList = $query->latest()->paginate(10)->withQueryString();

        foreach ($pesertaList as $p) {
            $p->nilai_wawancara = Penilaian::where('peserta_id', $p->id)
                ->where('tipe', 'wawancara')->whereNotNull('nilai')->avg('nilai');

            $p->nilai_tertulis = Penilaian::where('peserta_id', $p->id)
                ->where('tipe', 'tertulis')->whereNotNull('nilai')->avg('nilai');

            $p->rata_rata = null;
            if ($p->nilai_wawancara !== null && $p->nilai_tertulis !== null) {
                $p->rata_rata = ($p->nilai_wawancara + $p->nilai_tertulis) / 2;
            } elseif ($p->nilai_wawancara !== null) {
                $p->rata_rata = $p->nilai_wawancara;
            } elseif ($p->nilai_tertulis !== null) {
                $p->rata_rata = $p->nilai_tertulis;
            }

            $hitung = $this->hitungPenilaian($p->id, $p);
            $p->nilai_final = $hitung['nilaiFinalAkhir'];
            $p->lulus = $hitung['lulus'];
        }

        $statistik = [
            'total'         => Peserta::count(),
            'sudah_dinilai' => Peserta::where('status', 'selesai')->count(),
            'menunggu'      => Peserta::where('status', 'belum_dinilai')->count(),
            'nilai_final'   => 0,
        ];

        $nilaiFinalList = $pesertaList->pluck('nilai_final')->filter(fn ($v) => $v > 0);
        if ($nilaiFinalList->count() > 0) {
            $statistik['nilai_final'] = round($nilaiFinalList->avg(), 2);
        }

        return view('admin.penilaian', compact('pesertaList', 'statistik'));
    }

    /* =========================================================
       DETAIL PENILAIAN
       ========================================================= */
    public function show($pesertaId, Request $request)
    {
        $this->syncStatusPeserta($pesertaId);

        $peserta = Peserta::with(['penugasanPenilais.penilai'])->findOrFail($pesertaId);

        $data = $this->hitungPenilaian($pesertaId, $peserta);

        $this->simpanNilaiFinalKeDb($pesertaId, $data);

        $semuaCatatan = Penilaian::where('peserta_id', $pesertaId)
            ->whereNotNull('catatan')
            ->where('catatan', '!=', '')
            ->with('penilai')
            ->orderBy('tipe')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.penilaian-detail', array_merge(
            ['peserta' => $peserta, 'semuaCatatan' => $semuaCatatan],
            $data
        ));
    }

    /* =========================================================
       FORM EDIT NILAI PENGUJI
       ========================================================= */
    public function edit($pesertaId)
    {
        $this->syncStatusPeserta($pesertaId);
        $peserta = Peserta::with(['penugasanPenilais.penilai'])->findOrFail($pesertaId);

        $data = $this->hitungPenilaian($pesertaId, $peserta);

        // ✅ AMBIL SEMUA PENUGASAN (tanpa orderBy urutan — supaya aman kalau urutan NULL)
        $penugasanWawancara = PenugasanPenilai::with('penilai')
            ->where('peserta_id', $pesertaId)
            ->where('tipe', 'wawancara')
            ->get()
            ->values(); // reset index

        $penugasanTertulis = PenugasanPenilai::with('penilai')
            ->where('peserta_id', $pesertaId)
            ->where('tipe', 'tertulis')
            ->get()
            ->values();

        $nilaiMentah = PenilaianDetail::where('peserta_id', $pesertaId)
            ->get()
            ->groupBy('penilai_id');

        return view('admin.penilaian-edit', array_merge(
            [
                'peserta'            => $peserta,
                'penugasanWawancara' => $penugasanWawancara,
                'penugasanTertulis'  => $penugasanTertulis,
                'nilaiMentah'        => $nilaiMentah,
            ],
            $data
        ));
    }

    /* =========================================================
       SIMPAN UPDATE NILAI PENGUJI
       ========================================================= */
    public function updateNilai(Request $request, $pesertaId)
    {
        $peserta = Peserta::findOrFail($pesertaId);

        $request->validate([
            'nilai'       => 'nullable|array',
            'nilai.*.*'   => 'nullable|numeric|min:0|max:100',
            'catatan'     => 'nullable|array',
            'catatan.*.*' => 'nullable|string',
        ]);

        $nilaiInput   = $request->input('nilai', []);
        $catatanInput = $request->input('catatan', []);

        DB::transaction(function () use ($pesertaId, $nilaiInput, $catatanInput) {

            foreach ($nilaiInput as $penilaiId => $perTipe) {
                foreach ($perTipe as $tipe => $perUrutan) {
                    foreach ($perUrutan as $urutan => $nilai) {

                        if ($nilai === null || $nilai === '') {
                            PenilaianDetail::where('peserta_id', $pesertaId)
                                ->where('penilai_id', $penilaiId)
                                ->where('tipe', $tipe)
                                ->where('urutan', $urutan)
                                ->delete();
                            continue;
                        }

                        PenilaianDetail::updateOrCreate(
                            [
                                'peserta_id' => $pesertaId,
                                'penilai_id' => $penilaiId,
                                'tipe'       => $tipe,
                                'urutan'     => $urutan,
                            ],
                            ['nilai' => (float) $nilai]
                        );
                    }

                    $avg = PenilaianDetail::where('peserta_id', $pesertaId)
                        ->where('penilai_id', $penilaiId)
                        ->where('tipe', $tipe)
                        ->whereNotNull('nilai')
                        ->avg('nilai');

                    Penilaian::updateOrCreate(
                        [
                            'peserta_id' => $pesertaId,
                            'penilai_id' => $penilaiId,
                            'tipe'       => $tipe,
                        ],
                        ['nilai' => $avg]
                    );
                }
            }

            foreach ($catatanInput as $penilaiId => $perTipe) {
                foreach ($perTipe as $tipe => $catatan) {
                    Penilaian::updateOrCreate(
                        [
                            'peserta_id' => $pesertaId,
                            'penilai_id' => $penilaiId,
                            'tipe'       => $tipe,
                        ],
                        ['catatan' => $catatan ?? null]
                    );
                }
            }
        });

        $this->syncStatusPeserta($pesertaId);

        return redirect()
            ->route('admin.penilaian.detail', $pesertaId)
            ->with('success', 'Nilai penguji berhasil diperbarui.');
    }

    /* =========================================================
       EXPORT EXCEL
       ========================================================= */
    public function exportExcel($pesertaId, Request $request)
    {
        $peserta = Peserta::findOrFail($pesertaId);
        $data    = $this->hitungPenilaian($pesertaId, $peserta);

        $filename = 'Penilaian_' . str_replace(' ', '_', $peserta->nama) . '_' . date('Y-m-d') . '.xls';

        header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        echo "\xEF\xBB\xBF";

        echo '<table border="1" cellpadding="4" cellspacing="0" style="font-family:Arial,sans-serif;font-size:11px;">';
        echo '<tr><td colspan="8" style="font-weight:bold;font-size:14px;">FORM PENILAIAN ' . strtoupper($peserta->label_jenis_penilaian) . '</td></tr>';
        echo '<tr><td colspan="8">Nama: ' . $peserta->nama . '</td></tr>';
        echo '<tr><td colspan="8">Jabatan: ' . $peserta->jabatan . '</td></tr>';
        echo '<tr><td colspan="8">Instansi: ' . $peserta->instansi . '</td></tr>';
        echo '<tr><td colspan="8"></td></tr>';

        echo '<tr style="background:#f0f0f0;font-weight:bold;">';
        echo '<td>Judul Unit Kompetensi</td>';
        echo '<td>Tipe Ujian</td>';
        echo '<td>Jenis Kompetensi</td>';
        echo '<td>Elemen Kompetensi</td>';
        echo '<td>Nilai P1</td>';
        echo '<td>Nilai P2</td>';
        echo '<td>Rata-rata</td>';
        echo '<td>Nilai Final</td>';
        echo '</tr>';

        $byUnit = [];
        foreach ($data['struktur'] as $g) {
            $byUnit[$g['judul_unit']][] = $g;
        }

        foreach ($byUnit as $unit => $groups) {
            $totalUnit = $data['totalPerUnit'][$unit] ?? 0;
            $bobotUnit = $data['bobotUnit'][$unit] ?? 50;

            echo '<tr style="background:#e0e0e0;font-weight:bold;">';
            echo '<td colspan="7">' . $unit . ' (' . $bobotUnit . '%)</td>';
            echo '<td style="text-align:right;">' . number_format($totalUnit, 2, ',', '.') . '</td>';
            echo '</tr>';

            foreach ($groups as $g) {
                $jumlah = count($g['elemen']);
                $keyGrup = $unit . '|' . $g['jenis_kompetensi'];
                $rataRataJenis = $g['rata_rata_jenis'];
                $nilaiFinalJenis = $g['nilai_final'];

                foreach ($g['elemen'] as $idx => $e) {
                    echo '<tr>';
                    if ($idx === 0) {
                        echo '<td rowspan="' . ($jumlah + 1) . '">' . $unit . '</td>';
                        echo '<td rowspan="' . ($jumlah + 1) . '">' . $g['tipe_ujian'] . ' (' . $g['bobot_tipe_ujian'] . '%)</td>';
                        echo '<td rowspan="' . ($jumlah + 1) . '">' . $g['jenis_kompetensi'] . ' (' . $g['bobot_kompetensi'] . '%)</td>';
                    }
                    echo '<td>' . $e['nama_elemen'] . '</td>';
                    echo '<td style="text-align:center;">' . ($e['nilai_p1'] !== null ? number_format($e['nilai_p1'], 2, ',', '.') : '0,00') . '</td>';
                    echo '<td style="text-align:center;">' . ($e['nilai_p2'] !== null ? number_format($e['nilai_p2'], 2, ',', '.') : '0,00') . '</td>';
                    echo '<td style="text-align:center;">' . ($e['rata_rata_elemen'] !== null ? number_format($e['rata_rata_elemen'], 2, ',', '.') : '0,00') . '</td>';

                    if ($idx === 0) {
                        echo '<td rowspan="' . ($jumlah + 1) . '" style="text-align:center;font-weight:bold;">' . ($nilaiFinalJenis !== null ? number_format($nilaiFinalJenis, 2, ',', '.') : '0,00') . '</td>';
                    }
                    echo '</tr>';
                }

                echo '<tr style="background:#f9f9f9;font-weight:bold;">';
                echo '<td colspan="4" style="text-align:right;">Rata-rata ' . $g['jenis_kompetensi'] . ':</td>';
                echo '<td colspan="2" style="text-align:center;">' . $jumlah . ' elemen</td>';
                echo '<td style="text-align:center;">' . number_format($rataRataJenis ?? 0, 2, ',', '.') . '</td>';
                echo '<td style="text-align:center;">' . number_format($nilaiFinalJenis ?? 0, 2, ',', '.') . '</td>';
                echo '</tr>';
            }
        }

        echo '<tr style="background:#dbeafe;font-weight:bold;font-size:13px;">';
        echo '<td colspan="6" style="text-align:right;">NILAI FINAL (Total Unit ÷ ' . $data['jumlahUnit'] . ')</td>';
        echo '<td colspan="2" style="text-align:center;">' . number_format($data['nilaiFinalAkhir'], 2, ',', '.') . '</td>';
        echo '</tr>';

        echo '<tr><td colspan="8"></td></tr>';
        echo '<tr><td colspan="8" style="font-style:italic;">Passing grade 71,00 adalah nilai minimal kelulusan</td></tr>';
        echo '</table>';

        exit;
    }

    /* =========================================================
       SIMPAN NILAI FINAL KE DB
       ========================================================= */
    private function simpanNilaiFinalKeDb($pesertaId, array $data): void
    {
        foreach ($data['struktur'] as $g) {
            if ($g['rata_rata_jenis'] === null && $g['nilai_final'] === null) {
                continue;
            }

            NilaiFinal::updateOrCreate(
                [
                    'peserta_id'       => $pesertaId,
                    'tipe'             => $g['tipe_ujian'] === 'Wawancara' ? 'wawancara' : 'tertulis',
                    'judul_unit'       => $g['judul_unit'],
                    'jenis_kompetensi' => $g['jenis_kompetensi'],
                ],
                [
                    'rata_rata_override'   => $g['rata_rata_jenis'],
                    'nilai_final_override' => $g['nilai_final'],
                ]
            );
        }
    }

    /* =========================================================
       HITUNG SEMUA NILAI
       ========================================================= */
    private function hitungPenilaian($pesertaId, Peserta $peserta): array
    {
        $isPerpindahanJabatan = $peserta->jenis_penilaian === 'perpindahan_jabatan';

        $strukturMentah = $isPerpindahanJabatan
            ? $this->strukturPerpindahanJabatan()
            : $this->strukturKenaikanJenjang();

        // ==========================================================
        // ✅ AMBIL PENUGASAN — TANPA orderBy urutan (biar aman)
        // ==========================================================
        $penugasanWawancara = PenugasanPenilai::with('penilai')
            ->where('peserta_id', $pesertaId)
            ->where('tipe', 'wawancara')
            ->get()
            ->values();

        // ✅ P1 & P2 = element ke-0 dan ke-1 (bukan where urutan)
        $penugasanW1 = $penugasanWawancara->get(0);
        $penugasanW2 = $penugasanWawancara->get(1);

        $p1Wawancara = $penugasanW1?->penilai;
        $p2Wawancara = $penugasanW2?->penilai;

        $detailP1Wawancara = $p1Wawancara
            ? PenilaianDetail::where('peserta_id', $pesertaId)
                ->where('penilai_id', $p1Wawancara->id)
                ->where('tipe', 'wawancara')
                ->get()->keyBy('urutan')
            : collect();

        $detailP2Wawancara = $p2Wawancara
            ? PenilaianDetail::where('peserta_id', $pesertaId)
                ->where('penilai_id', $p2Wawancara->id)
                ->where('tipe', 'wawancara')
                ->get()->keyBy('urutan')
            : collect();

        // Penilai tertulis
        $detailP1Tertulis = collect();
        $detailP2Tertulis = collect();
        $p1Tertulis = null;
        $p2Tertulis = null;

        if ($isPerpindahanJabatan) {
            $penugasanTertulis = PenugasanPenilai::with('penilai')
                ->where('peserta_id', $pesertaId)
                ->where('tipe', 'tertulis')
                ->get()
                ->values();

            $penugasanT1 = $penugasanTertulis->get(0);
            $penugasanT2 = $penugasanTertulis->get(1);

            $p1Tertulis = $penugasanT1?->penilai;
            $p2Tertulis = $penugasanT2?->penilai;

            $detailP1Tertulis = $p1Tertulis
                ? PenilaianDetail::where('peserta_id', $pesertaId)
                    ->where('penilai_id', $p1Tertulis->id)
                    ->where('tipe', 'tertulis')
                    ->get()->keyBy('urutan')
                : collect();

            $detailP2Tertulis = $p2Tertulis
                ? PenilaianDetail::where('peserta_id', $pesertaId)
                    ->where('penilai_id', $p2Tertulis->id)
                    ->where('tipe', 'tertulis')
                    ->get()->keyBy('urutan')
                : collect();
        }

        // ==========================================================
        // ✅ BANGUN STRUKTUR + HITUNG RATA-RATA PER JENIS
        // ==========================================================
        $struktur = [];
        foreach ($strukturMentah as $g) {
            $dP1 = $g['tipe_ujian'] === 'Wawancara' ? $detailP1Wawancara : $detailP1Tertulis;
            $dP2 = $g['tipe_ujian'] === 'Wawancara' ? $detailP2Wawancara : $detailP2Tertulis;

            $elemenData = [];
            $nilaiRataArr = [];

            foreach ($g['elemen_urutan'] as $i => $urutan) {
                $nilaiP1 = $this->getNilaiElemen($dP1, $urutan);
                $nilaiP2 = $this->getNilaiElemen($dP2, $urutan);

                $rataRataElemen = null;
                if ($nilaiP1 !== null && $nilaiP2 !== null) {
                    $rataRataElemen = ($nilaiP1 + $nilaiP2) / 2;
                } elseif ($nilaiP1 !== null) {
                    $rataRataElemen = $nilaiP1;
                } elseif ($nilaiP2 !== null) {
                    $rataRataElemen = $nilaiP2;
                }

                if ($rataRataElemen !== null) {
                    $nilaiRataArr[] = $rataRataElemen;
                }

                $elemenData[] = [
                    'urutan'           => $urutan,
                    'nama_elemen'      => $g['elemen_nama'][$i] ?? '-',
                    'nilai_p1'         => $nilaiP1,
                    'nilai_p2'         => $nilaiP2,
                    'rata_rata_elemen' => $rataRataElemen,
                ];
            }

            $rataRataJenis = count($nilaiRataArr) > 0
                ? array_sum($nilaiRataArr) / count($nilaiRataArr)
                : null;

            $struktur[] = [
                'judul_unit'       => $g['judul_unit'],
                'tipe_ujian'       => $g['tipe_ujian'],
                'bobot_tipe_ujian' => $g['bobot_tipe_ujian'],
                'jenis_kompetensi' => $g['jenis_kompetensi'],
                'bobot_kompetensi' => $g['bobot_kompetensi'],
                'elemen'           => $elemenData,
                'jumlah_elemen'    => count($nilaiRataArr),
                'rata_rata_jenis'  => $rataRataJenis,
                'nilai_final'      => null,
            ];
        }

        // ==========================================================
        // ✅ HITUNG NILAI FINAL
        // - WAWANCARA: rata-rata × bobot_kompetensi (per jenis)
        // - TERTULIS: rata-rata gabungan × bobot_tipe_ujian (per unit)
        // ==========================================================
        $groupByUnitTipe = [];
        foreach ($struktur as $idx => $g) {
            $key = $g['judul_unit'] . '|' . $g['tipe_ujian'];
            $groupByUnitTipe[$key][] = $idx;
        }

        foreach ($groupByUnitTipe as $key => $indexes) {
            $tipeUjian = $struktur[$indexes[0]]['tipe_ujian'];

            if ($tipeUjian === 'Wawancara') {
                foreach ($indexes as $idx) {
                    $g = $struktur[$idx];
                    $struktur[$idx]['nilai_final'] = $g['rata_rata_jenis'] !== null
                        ? $g['rata_rata_jenis'] * ($g['bobot_kompetensi'] / 100)
                        : null;
                }
            } else {
                $totalNilai = 0;
                $totalElemen = 0;
                foreach ($indexes as $idx) {
                    foreach ($struktur[$idx]['elemen'] as $e) {
                        if ($e['rata_rata_elemen'] !== null) {
                            $totalNilai += $e['rata_rata_elemen'];
                            $totalElemen++;
                        }
                    }
                }

                $rataRataGabungan = $totalElemen > 0 ? $totalNilai / $totalElemen : null;
                $bobotTipe = $struktur[$indexes[0]]['bobot_tipe_ujian'];

                $nilaiFinalTertulis = $rataRataGabungan !== null
                    ? $rataRataGabungan * ($bobotTipe / 100)
                    : null;

                foreach ($indexes as $idx) {
                    $struktur[$idx]['nilai_final'] = $nilaiFinalTertulis;
                }
            }
        }

        // ==========================================================
        // ✅ TOTAL PER UNIT
        // - WAWANCARA → tambahkan SETIAP grup
        // - TERTULIS  → tambahkan HANYA SEKALI per unit
        // ==========================================================
        $totalPerUnit = [];
        $tertulisSudahDihitung = [];

        foreach ($struktur as $g) {
            $unit = $g['judul_unit'];
            $tipe = $g['tipe_ujian'];

            if (!isset($totalPerUnit[$unit])) $totalPerUnit[$unit] = 0;

            if ($tipe === 'Tertulis') {
                if (in_array($unit, $tertulisSudahDihitung)) {
                    continue;
                }
                if ($g['nilai_final'] !== null) {
                    $totalPerUnit[$unit] += $g['nilai_final'];
                    $tertulisSudahDihitung[] = $unit;
                }
            } else {
                if ($g['nilai_final'] !== null) {
                    $totalPerUnit[$unit] += $g['nilai_final'];
                }
            }
        }

        $overrides = NilaiFinal::where('peserta_id', $pesertaId)
            ->get()
            ->keyBy(fn ($n) => $n->judul_unit . '|' . $n->jenis_kompetensi);

        $totalSemuaUnit = array_sum($totalPerUnit);
        $jumlahUnit = count($totalPerUnit);
        $nilaiFinalAkhir = $jumlahUnit > 0 ? $totalSemuaUnit / $jumlahUnit : 0;

        $passingGrade = 71.00;
        $lulus = $nilaiFinalAkhir >= $passingGrade;

        $bobotUnit = $this->bobotUnit();

        $semuaRataJenis = [];
        foreach ($struktur as $g) {
            if ($g['rata_rata_jenis'] !== null) {
                $semuaRataJenis[] = $g['rata_rata_jenis'];
            }
        }
        $nilaiRataRata = count($semuaRataJenis) > 0
            ? array_sum($semuaRataJenis) / count($semuaRataJenis)
            : 0;

        $grafikData = [];
        foreach ($bobotUnit as $unit => $bobot) {
            $totalUnit = $totalPerUnit[$unit] ?? 0;
            $grafikData[] = [
                'label' => $unit,
                'bobot' => $bobot,
                'nilai' => round($totalUnit, 2),
            ];
        }

        return [
            'p1'              => $p1Wawancara,
            'p2'              => $p2Wawancara,
            'p1Tertulis'      => $p1Tertulis,
            'p2Tertulis'      => $p2Tertulis,
            'struktur'        => $struktur,
            'totalPerUnit'    => $totalPerUnit,
            'totalSemuaUnit'  => $totalSemuaUnit,
            'jumlahUnit'      => $jumlahUnit,
            'nilaiFinalAkhir' => $nilaiFinalAkhir,
            'passingGrade'    => $passingGrade,
            'lulus'           => $lulus,
            'overrides'       => $overrides,
            'bobotUnit'       => $bobotUnit,
            'nilaiRataRata'   => $nilaiRataRata,
            'grafikData'      => $grafikData,
            'isPerpindahan'   => $isPerpindahanJabatan,
        ];
    }

    /* =========================================================
       UPDATE OVERRIDE
       ========================================================= */
    public function updateOverride(Request $request, $pesertaId)
    {
        $validated = $request->validate([
            'tipe'                 => 'nullable|in:wawancara,tertulis',
            'judul_unit'           => 'required|string',
            'jenis_kompetensi'     => 'required|string',
            'rata_rata_override'   => 'nullable|numeric|min:0|max:100',
            'nilai_final_override' => 'nullable|numeric|min:0|max:100',
            'catatan_admin'        => 'nullable|string',
        ]);

        NilaiFinal::updateOrCreate(
            [
                'peserta_id'       => $pesertaId,
                'tipe'             => $validated['tipe'] ?? 'wawancara',
                'judul_unit'       => $validated['judul_unit'],
                'jenis_kompetensi' => $validated['jenis_kompetensi'],
            ],
            [
                'rata_rata_override'   => $validated['rata_rata_override'],
                'nilai_final_override' => $validated['nilai_final_override'],
                'catatan_admin'        => $validated['catatan_admin'] ?? null,
            ]
        );

        return back()->with('success', 'Nilai berhasil di-update.');
    }

    /* =========================================================
       HAPUS
       ========================================================= */
    public function destroy($pesertaId, Request $request)
    {
        DB::transaction(function () use ($pesertaId) {
            PenilaianDetail::where('peserta_id', $pesertaId)->delete();
            Penilaian::where('peserta_id', $pesertaId)->delete();
            NilaiFinal::where('peserta_id', $pesertaId)->delete();

            $peserta = Peserta::find($pesertaId);
            if ($peserta) $peserta->update(['status' => 'belum_dinilai']);
        });

        return redirect()->route('admin.penilaian')
            ->with('success', 'Semua penilaian peserta berhasil dihapus.');
    }
}