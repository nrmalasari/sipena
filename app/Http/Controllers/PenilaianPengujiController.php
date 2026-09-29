<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Penilai;
use App\Models\PenugasanPenilai;
use App\Models\Penilaian;
use App\Models\PenilaianDetail;
use Illuminate\Http\Request;

class PenilaianPengujiController extends Controller
{
    /**
     * ============================================================
     * HALAMAN DAFTAR PESERTA
     * ============================================================
     */
    public function index(Request $request)
    {
        $userId      = session('user_id');
        $penilaiId   = session('penilai_id');
        $tipeSession = session('tipe_penguji', 'wawancara');
        $namaPenguji = session('nama_penguji', 'Penguji');

        if (!$userId) return redirect()->route('login.penguji');

        $isBoth = $tipeSession === 'both';
        $tipePenguji = $isBoth
            ? $request->get('tipe', 'wawancara')
            : $tipeSession;

        if ($isBoth && !in_array($tipePenguji, ['wawancara', 'tertulis'])) {
            $tipePenguji = 'wawancara';
        }

        $penugasan = PenugasanPenilai::with(['peserta', 'penilai'])
            ->where(function ($q) use ($userId, $penilaiId) {
                $q->where('login_penguji_id', $userId);
                if ($penilaiId) $q->orWhere('penilai_id', $penilaiId);
            })
            ->where('tipe', $tipePenguji)
            ->get();

        $peserta = $penugasan->pluck('peserta')->filter()->unique('id')->values();

        if ($request->filled('search')) {
            $s = $request->search;
            $peserta = $peserta->filter(fn ($p) => stripos($p->nama, $s) !== false)->values();
        }

        $sudahDinilai = [];
        if ($penilaiId) {
            $sudahDinilai = Penilaian::where('penilai_id', $penilaiId)
                ->where('tipe', $tipePenguji)
                ->where('status', 'selesai')
                ->pluck('peserta_id')
                ->toArray();
        }

        return view('peserta-penilaian', compact(
            'peserta', 'sudahDinilai', 'tipePenguji', 'namaPenguji', 'isBoth'
        ));
    }

    /**
     * ============================================================
     * ✅ HALAMAN DAFTAR CATATAN PENGUJI
     * ============================================================
     */
    public function catatanPenguji(Request $request)
    {
        $userId      = session('user_id');
        $penilaiId   = session('penilai_id');
        $tipeSession = session('tipe_penguji', 'wawancara');
        $namaPenguji = session('nama_penguji', 'Penguji');

        if (!$userId) return redirect()->route('login.penguji');

        $isBoth = $tipeSession === 'both';
        $tipePenguji = $isBoth
            ? $request->get('tipe', 'wawancara')
            : $tipeSession;

        if ($isBoth && !in_array($tipePenguji, ['wawancara', 'tertulis'])) {
            $tipePenguji = 'wawancara';
        }

        $catatanList = collect();
        if ($penilaiId) {
            $catatanList = Penilaian::with(['peserta'])
                ->where('penilai_id', $penilaiId)
                ->where('tipe', $tipePenguji)
                ->whereNotNull('catatan')
                ->where('catatan', '!=', '')
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        return view('catatan-penguji', compact(
            'catatanList', 'tipePenguji', 'namaPenguji', 'isBoth'
        ));
    }

    /**
     * ============================================================
     * ✅ DETAIL CATATAN PENGUJI PER PESERTA
     * ============================================================
     */
    public function catatanPengujiDetail(Request $request, $pesertaId)
    {
        $penilaiId   = session('penilai_id');
        $tipeSession = session('tipe_penguji', 'wawancara');

        if (!$penilaiId) return redirect()->route('login.penguji');

        $isBoth = $tipeSession === 'both';
        $tipePenguji = $isBoth
            ? $request->get('tipe', 'wawancara')
            : $tipeSession;

        $peserta = Peserta::findOrFail($pesertaId);

        // Catatan penguji ini untuk peserta tsb
        $catatanSaya = Penilaian::where('peserta_id', $pesertaId)
            ->where('penilai_id', $penilaiId)
            ->where('tipe', $tipePenguji)
            ->first();

        // Semua catatan (Wawancara + Tertulis) untuk peserta tsb
        $semuaCatatan = Penilaian::with('penilai')
            ->where('peserta_id', $pesertaId)
            ->whereNotNull('catatan')
            ->where('catatan', '!=', '')
            ->orderBy('tipe')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('catatan-penguji-detail', compact(
            'peserta', 'catatanSaya', 'semuaCatatan', 'tipePenguji'
        ));
    }

    /**
     * ============================================================
     * AJAX: SIMPAN NILAI (per elemen)
     * ============================================================
     */
    public function simpanNilai(Request $request)
    {
        $penilaiId = session('penilai_id');

        if (!$penilaiId) {
            return response()->json(['ok' => false, 'msg' => 'Belum login'], 401);
        }

        $tipePenguji = $request->input('tipe_aktif', session('tipe_penguji', 'wawancara'));
        if ($tipePenguji === 'both') $tipePenguji = 'wawancara';

        $validated = $request->validate([
            'peserta_id' => 'required|exists:pesertas,id',
            'urutan'     => 'required|integer|min:0',
            'nilai'      => 'nullable|numeric|min:0|max:100',
        ]);

        PenilaianDetail::updateOrCreate(
            [
                'peserta_id' => $validated['peserta_id'],
                'penilai_id' => $penilaiId,
                'tipe'       => $tipePenguji,
                'urutan'     => $validated['urutan'],
            ],
            [
                'nilai' => $validated['nilai'],
            ]
        );

        $this->recalcTotal($penilaiId, $validated['peserta_id'], $tipePenguji);
        $this->updateStatusPeserta($validated['peserta_id']);

        return response()->json(['ok' => true]);
    }

    /**
     * ============================================================
     * AJAX: SIMPAN CATATAN UMUM
     * ============================================================
     */
    public function simpanCatatan(Request $request)
    {
        $penilaiId = session('penilai_id');

        if (!$penilaiId) {
            return response()->json(['ok' => false, 'msg' => 'Belum login'], 401);
        }

        $tipePenguji = $request->input('tipe_aktif', session('tipe_penguji', 'wawancara'));
        if ($tipePenguji === 'both') $tipePenguji = 'wawancara';

        $validated = $request->validate([
            'peserta_id' => 'required|exists:pesertas,id',
            'catatan'    => 'nullable|string',
        ]);

        Penilaian::updateOrCreate(
            [
                'peserta_id' => $validated['peserta_id'],
                'penilai_id' => $penilaiId,
                'tipe'       => $tipePenguji,
            ],
            [
                'catatan' => $validated['catatan'] ?? null,
            ]
        );

        return response()->json(['ok' => true]);
    }

    /**
     * ============================================================
     * AJAX: LIVE NILAI + CATATAN
     * ============================================================
     */
    public function getLiveNilai(Request $request)
    {
        $penilaiId = session('penilai_id');
        if (!$penilaiId) {
            return response()->json(['ok' => false, 'msg' => 'Belum login'], 401);
        }

        $tipePenguji = $request->input('tipe_aktif', session('tipe_penguji', 'wawancara'));
        if ($tipePenguji === 'both') $tipePenguji = 'wawancara';

        $pesertaId = $request->peserta_id;
        if (!$pesertaId) {
            return response()->json(['ok' => false, 'msg' => 'peserta_id wajib'], 422);
        }

        $catatanSaya = Penilaian::where('peserta_id', $pesertaId)
            ->where('penilai_id', $penilaiId)
            ->where('tipe', $tipePenguji)
            ->value('catatan');

        $rekan = null;
        $nilaiRekan = [];
        $totalRekan = null;
        $catatanRekan = null;

        if ($tipePenguji === 'wawancara') {
            $rekanPenugasan = PenugasanPenilai::with('penilai')
                ->where('peserta_id', $pesertaId)
                ->where('tipe', 'wawancara')
                ->where('penilai_id', '!=', $penilaiId)
                ->first();

            $rekan = $rekanPenugasan?->penilai;

            if ($rekan) {
                $nilaiRekanRaw = PenilaianDetail::where('peserta_id', $pesertaId)
                    ->where('penilai_id', $rekan->id)
                    ->where('tipe', 'wawancara')
                    ->orderBy('urutan')
                    ->get();

                foreach ($nilaiRekanRaw as $d) {
                    $nilaiRekan[$d->urutan] = ['nilai' => $d->nilai];
                }

                $penilaianRekan = Penilaian::where('peserta_id', $pesertaId)
                    ->where('penilai_id', $rekan->id)
                    ->where('tipe', 'wawancara')
                    ->first();

                $totalRekan = $penilaianRekan?->nilai;
                $catatanRekan = $penilaianRekan?->catatan;
            }
        }

        $nilaiSayaRaw = PenilaianDetail::where('peserta_id', $pesertaId)
            ->where('penilai_id', $penilaiId)
            ->where('tipe', $tipePenguji)
            ->orderBy('urutan')
            ->get();

        $nilaiSaya = [];
        foreach ($nilaiSayaRaw as $d) {
            $nilaiSaya[$d->urutan] = ['nilai' => $d->nilai];
        }

        return response()->json([
            'ok'           => true,
            'nilai_saya'   => $nilaiSaya,
            'catatan_saya' => $catatanSaya,
            'rekan'        => $rekan ? [
                'id'      => $rekan->id,
                'nama'    => $rekan->nama,
                'jabatan' => $rekan->jabatan,
                'nilai'   => $nilaiRekan,
                'total'   => $totalRekan,
                'catatan' => $catatanRekan,
            ] : null,
            'tipe'         => $tipePenguji,
            'updated_at'   => now()->format('H:i:s'),
        ]);
    }

    /**
     * ============================================================
     * AJAX: SELESAIKAN (VALIDASI CATATAN WAJIB)
     * ============================================================
     */
    public function selesaikan(Request $request)
    {
        $penilaiId = session('penilai_id');
        if (!$penilaiId) {
            return response()->json(['ok' => false, 'msg' => 'Belum login'], 401);
        }

        $tipePenguji = $request->input('tipe_aktif', session('tipe_penguji', 'wawancara'));
        if ($tipePenguji === 'both') $tipePenguji = 'wawancara';

        $pesertaId = $request->peserta_id;
        if (!$pesertaId) {
            return response()->json(['ok' => false, 'msg' => 'peserta_id wajib'], 422);
        }

        $penilaian = Penilaian::where('peserta_id', $pesertaId)
            ->where('penilai_id', $penilaiId)
            ->where('tipe', $tipePenguji)
            ->first();

        if (!$penilaian || !$penilaian->catatan || trim($penilaian->catatan) === '') {
            return response()->json([
                'ok' => false,
                'msg' => 'Catatan wajib diisi sebelum menyelesaikan penilaian.',
            ], 422);
        }

        $this->recalcTotal($penilaiId, $pesertaId, $tipePenguji);

        Penilaian::updateOrCreate(
            [
                'peserta_id' => $pesertaId,
                'penilai_id' => $penilaiId,
                'tipe'       => $tipePenguji,
            ],
            ['status' => 'selesai']
        );

        $this->updateStatusPeserta($pesertaId);

        return response()->json(['ok' => true]);
    }

    /**
     * Helper: recalc nilai rata-rata penilai
     */
    private function recalcTotal($penilaiId, $pesertaId, $tipe)
    {
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

    /**
     * Helper: auto-update status peserta
     */
    private function updateStatusPeserta($pesertaId)
    {
        $peserta = Peserta::find($pesertaId);
        if (!$peserta) return;

        $semuaPenugasan = PenugasanPenilai::where('peserta_id', $pesertaId)->get();

        if ($semuaPenugasan->isEmpty()) {
            $peserta->update(['status' => 'belum_dinilai']);
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
            $status = 'belum_dinilai';
        } elseif ($selesaiCount >= $totalPenugasan) {
            $status = 'selesai';
        } else {
            $status = 'sedang_dinilai';
        }

        $peserta->update(['status' => $status]);
    }
}