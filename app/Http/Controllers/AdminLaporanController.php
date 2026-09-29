<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Penilaian;
use App\Models\NilaiFinal;
use App\Models\PenugasanPenilai;
use App\Models\PenilaianDetail;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    /* =========================================================
       STRUKTUR KENAIKAN JENJANG
       ========================================================= */
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

    /* =========================================================
       STRUKTUR PERPINDAHAN JABATAN
       ========================================================= */
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
                'bobot_tipe_ujian' => 40,
                'jenis_kompetensi' => 'Kompetensi Spesialis',
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
       HITUNG NILAI FINAL PER PESERTA
       ========================================================= */
    private function hitungNilaiFinal(Peserta $peserta): array
    {
        $pesertaId = $peserta->id;
        $isPerpindahanJabatan = $peserta->jenis_penilaian === 'perpindahan_jabatan';

        $strukturMentah = $isPerpindahanJabatan
            ? $this->strukturPerpindahanJabatan()
            : $this->strukturKenaikanJenjang();

        // Penilai wawancara
        $penugasanW = PenugasanPenilai::with('penilai')
            ->where('peserta_id', $pesertaId)
            ->where('tipe', 'wawancara')
            ->orderBy('urutan')->get();

        $p1W = $penugasanW->where('urutan', 1)->first()?->penilai;
        $p2W = $penugasanW->where('urutan', 2)->first()?->penilai;

        $d1W = $p1W ? PenilaianDetail::where('peserta_id', $pesertaId)
            ->where('penilai_id', $p1W->id)->where('tipe', 'wawancara')
            ->get()->keyBy('urutan') : collect();

        $d2W = $p2W ? PenilaianDetail::where('peserta_id', $pesertaId)
            ->where('penilai_id', $p2W->id)->where('tipe', 'wawancara')
            ->get()->keyBy('urutan') : collect();

        // Penilai tertulis
        $d1T = collect();
        $d2T = collect();

        if ($isPerpindahanJabatan) {
            $penugasanT = PenugasanPenilai::with('penilai')
                ->where('peserta_id', $pesertaId)
                ->where('tipe', 'tertulis')
                ->orderBy('urutan')->get();

            $p1T = $penugasanT->where('urutan', 1)->first()?->penilai;
            $p2T = $penugasanT->where('urutan', 2)->first()?->penilai;

            $d1T = $p1T ? PenilaianDetail::where('peserta_id', $pesertaId)
                ->where('penilai_id', $p1T->id)->where('tipe', 'tertulis')
                ->get()->keyBy('urutan') : collect();

            $d2T = $p2T ? PenilaianDetail::where('peserta_id', $pesertaId)
                ->where('penilai_id', $p2T->id)->where('tipe', 'tertulis')
                ->get()->keyBy('urutan') : collect();
        }

        // Hitung
        $totalPerUnit = [];
        foreach ($strukturMentah as $g) {
            $dP1 = $g['tipe_ujian'] === 'Wawancara' ? $d1W : $d1T;
            $dP2 = $g['tipe_ujian'] === 'Wawancara' ? $d2W : $d2T;

            $nilaiRataArr = [];
            foreach ($g['elemen_urutan'] as $urutan) {
                $n1 = $this->getNilaiElemen($dP1, $urutan);
                $n2 = $this->getNilaiElemen($dP2, $urutan);

                if ($n1 !== null && $n2 !== null) $nilaiRataArr[] = ($n1 + $n2) / 2;
                elseif ($n1 !== null) $nilaiRataArr[] = $n1;
                elseif ($n2 !== null) $nilaiRataArr[] = $n2;
            }

            $rataRataJenis = count($nilaiRataArr) > 0
                ? array_sum($nilaiRataArr) / count($nilaiRataArr)
                : null;

            $nilaiFinal = $rataRataJenis !== null
                ? $rataRataJenis * ($g['bobot_kompetensi'] / 100) * ($g['bobot_tipe_ujian'] / 100)
                : null;

            $unit = $g['judul_unit'];
            if (!isset($totalPerUnit[$unit])) $totalPerUnit[$unit] = 0;
            if ($nilaiFinal !== null) $totalPerUnit[$unit] += $nilaiFinal;
        }

        $totalSemua = array_sum($totalPerUnit);
        $jumlahUnit = count($totalPerUnit);
        $nilaiFinalAkhir = $jumlahUnit > 0 ? $totalSemua / $jumlahUnit : 0;

        $passingGrade = 71.00;
        $lulus = $nilaiFinalAkhir >= $passingGrade;

        return [
            'nilai_final' => round($nilaiFinalAkhir, 2),
            'lulus'       => $lulus,
        ];
    }

    /* =========================================================
       LIST LAPORAN
       ========================================================= */
    public function index(Request $request)
    {
        $query = Peserta::query();

        // Filter by jenis
        if ($request->filled('jenis')) {
            $query->where('jenis_penilaian', $request->jenis);
        }

        // Search
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                  ->orWhere('nip', 'like', "%{$s}%")
                  ->orWhere('jabatan', 'like', "%{$s}%");
            });
        }

        $pesertaList = $query->orderBy('nama')->get();

        // Hitung nilai & status untuk tiap peserta
        $dataLaporan = [];
        $totalNilai = 0;
        $jumlahLulus = 0;
        $jumlahTidakLulus = 0;

        foreach ($pesertaList as $p) {
            $hitung = $this->hitungNilaiFinal($p);
            $nilai = $hitung['nilai_final'];
            $lulus = $hitung['lulus'];

            // Filter status (setelah hitung)
            if ($request->filled('status')) {
                if ($request->status === 'lulus' && !$lulus) continue;
                if ($request->status === 'tidak_lulus' && $lulus) continue;
            }

            $dataLaporan[] = [
                'peserta'     => $p,
                'nilai_akhir' => $nilai,
                'lulus'       => $lulus,
            ];

            $totalNilai += $nilai;
            if ($lulus) $jumlahLulus++;
            else $jumlahTidakLulus++;
        }

        // Statistik global (semua peserta)
        $allPeserta = Peserta::all();
        $totalNilaiGlobal = 0;
        $jumlahLulusGlobal = 0;
        $jumlahTidakLulusGlobal = 0;
        foreach ($allPeserta as $p) {
            $h = $this->hitungNilaiFinal($p);
            $totalNilaiGlobal += $h['nilai_final'];
            if ($h['lulus']) $jumlahLulusGlobal++;
            else $jumlahTidakLulusGlobal++;
        }

        $totalPeserta = Peserta::count();
        $rataRata = $totalPeserta > 0 ? round($totalNilaiGlobal / $totalPeserta, 2) : 0;

        $statistik = [
            'total'        => $totalPeserta,
            'lulus'        => $jumlahLulusGlobal,
            'tidak_lulus'  => $jumlahTidakLulusGlobal,
            'rata_rata'    => $rataRata,
        ];

        return view('admin.laporan', compact('dataLaporan', 'statistik'));
    }

    /* =========================================================
       EXPORT EXCEL
       ========================================================= */
    public function exportExcel(Request $request)
    {
        $query = Peserta::query();

        if ($request->filled('jenis')) $query->where('jenis_penilaian', $request->jenis);
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                  ->orWhere('nip', 'like', "%{$s}%")
                  ->orWhere('jabatan', 'like', "%{$s}%");
            });
        }

        $pesertaList = $query->orderBy('nama')->get();

        $filename = 'Laporan_Penilaian_' . date('Y-m-d_His') . '.xls';
        header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        echo "\xEF\xBB\xBF";

        echo '<table border="1" cellpadding="4" cellspacing="0" style="font-family:Arial,sans-serif;font-size:11px;">';

        // Header info
        echo '<tr><td colspan="8" style="font-weight:bold;font-size:14px;text-align:center;">LAPORAN HASIL PENILAIAN</td></tr>';
        echo '<tr><td colspan="8" style="font-weight:bold;text-align:center;">LAN RI - MAKARTI BHAKTI NAGARI</td></tr>';
        echo '<tr><td colspan="8" style="text-align:center;">Tanggal Cetak: ' . now()->format('d F Y H:i') . '</td></tr>';
        echo '<tr><td colspan="8"></td></tr>';

        // Header tabel
        echo '<tr style="background:#4472C4;color:white;font-weight:bold;text-align:center;">';
        echo '<td>No</td>';
        echo '<td>Nama Peserta</td>';
        echo '<td>NIP</td>';
        echo '<td>Jabatan</td>';
        echo '<td>Instansi</td>';
        echo '<td>Jenis Seleksi</td>';
        echo '<td>Nilai Akhir</td>';
        echo '<td>Status</td>';
        echo '</tr>';

        $no = 1;
        $totalNilai = 0;
        $count = 0;
        $lulus = 0;

        foreach ($pesertaList as $p) {
            $hitung = $this->hitungNilaiFinal($p);
            $nilai = $hitung['nilai_final'];
            $status = $hitung['lulus'] ? 'LULUS' : 'TIDAK LULUS';

            // Filter status (post)
            if ($request->filled('status')) {
                if ($request->status === 'lulus' && !$hitung['lulus']) continue;
                if ($request->status === 'tidak_lulus' && $hitung['lulus']) continue;
            }

            echo '<tr>';
            echo '<td style="text-align:center;">' . $no++ . '</td>';
            echo '<td>' . $p->nama . '</td>';
            echo '<td>' . ($p->nip ?? '-') . '</td>';
            echo '<td>' . $p->jabatan . '</td>';
            echo '<td>' . $p->instansi . '</td>';
            echo '<td>' . $p->label_jenis_penilaian . '</td>';
            echo '<td style="text-align:center;font-weight:bold;">' . number_format($nilai, 2, ',', '.') . '</td>';
            echo '<td style="text-align:center;">' . $status . '</td>';
            echo '</tr>';

            $totalNilai += $nilai;
            $count++;
            if ($hitung['lulus']) $lulus++;
        }

        $rataRata = $count > 0 ? $totalNilai / $count : 0;

        echo '<tr style="background:#f0f0f0;font-weight:bold;">';
        echo '<td colspan="6" style="text-align:right;">TOTAL</td>';
        echo '<td style="text-align:center;">' . number_format($totalNilai, 2, ',', '.') . '</td>';
        echo '<td style="text-align:center;">' . $lulus . ' Lulus / ' . ($count - $lulus) . ' Tidak</td>';
        echo '</tr>';

        echo '<tr style="background:#f0f0f0;font-weight:bold;">';
        echo '<td colspan="6" style="text-align:right;">RATA-RATA</td>';
        echo '<td style="text-align:center;">' . number_format($rataRata, 2, ',', '.') . '</td>';
        echo '<td></td>';
        echo '</tr>';

        echo '<tr><td colspan="8"></td></tr>';
        echo '<tr><td colspan="8" style="font-style:italic;">Passing grade 71,00 adalah nilai minimal kelulusan</td></tr>';
        echo '</table>';

        exit;
    }

    /* =========================================================
       EXPORT PDF (via print view)
       ========================================================= */
    public function exportPdf(Request $request)
    {
        $query = Peserta::query();

        if ($request->filled('jenis')) $query->where('jenis_penilaian', $request->jenis);
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                  ->orWhere('nip', 'like', "%{$s}%")
                  ->orWhere('jabatan', 'like', "%{$s}%");
            });
        }

        $pesertaList = $query->orderBy('nama')->get();

        $dataLaporan = [];
        $totalNilai = 0;
        $jumlahLulus = 0;
        $jumlahTidakLulus = 0;

        foreach ($pesertaList as $p) {
            $hitung = $this->hitungNilaiFinal($p);

            if ($request->filled('status')) {
                if ($request->status === 'lulus' && !$hitung['lulus']) continue;
                if ($request->status === 'tidak_lulus' && $hitung['lulus']) continue;
            }

            $dataLaporan[] = [
                'peserta'     => $p,
                'nilai_akhir' => $hitung['nilai_final'],
                'lulus'       => $hitung['lulus'],
            ];

            $totalNilai += $hitung['nilai_final'];
            if ($hitung['lulus']) $jumlahLulus++;
            else $jumlahTidakLulus++;
        }

        $rataRata = count($dataLaporan) > 0
            ? $totalNilai / count($dataLaporan)
            : 0;

        return view('admin.laporan-print', [
            'dataLaporan'      => $dataLaporan,
            'totalNilai'       => $totalNilai,
            'jumlahLulus'      => $jumlahLulus,
            'jumlahTidakLulus' => $jumlahTidakLulus,
            'rataRata'         => $rataRata,
            'filterJenis'      => $request->jenis,
            'filterStatus'     => $request->status,
            'filterSearch'     => $request->search,
        ]);
    }
}