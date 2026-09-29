<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Penilai;
use App\Models\PenugasanPenilai;
use Illuminate\Http\Request;

class AdminPesertaController extends Controller
{
    /**
     * LIST PESERTA
     */
    public function index(Request $request)
    {
        // ✅ Eager loading: penugasan penilai + relasi penilai
        $query = Peserta::with(['penugasanPenilais.penilai']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('jabatan', 'like', "%{$search}%")
                  ->orWhere('instansi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status'))   $query->where('status', $request->status);
        if ($request->filled('jenis'))    $query->where('jenis_penilaian', $request->jenis);
        if ($request->filled('instansi')) $query->where('instansi', $request->instansi);

        $peserta = $query->latest()->paginate(10)->withQueryString();

        $statistik = [
            'total'               => Peserta::count(),
            'kenaikan_jenjang'    => Peserta::where('jenis_penilaian', 'kenaikan_jenjang')->count(),
            'perpindahan_jabatan' => Peserta::where('jenis_penilaian', 'perpindahan_jabatan')->count(),
            'belum_dinilai'       => Peserta::where('status', 'belum_dinilai')->count(),
        ];

        $daftarInstansi = Peserta::select('instansi')->distinct()->pluck('instansi');

        return view('admin.peserta', compact('peserta', 'statistik', 'daftarInstansi'));
    }

    /**
     * FORM TAMBAH PESERTA
     */
    public function create()
    {
        $penilaiWawancara = Penilai::where('is_active', true)->where('is_wawancara', true)->get();
        $penilaiTertulis  = Penilai::where('is_active', true)->where('is_tertulis', true)->get();

        return view('admin.peserta-tambah', compact('penilaiWawancara', 'penilaiTertulis'));
    }

    /**
     * SIMPAN PESERTA BARU
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'nip'             => 'nullable|string|max:50',
            'jabatan'         => 'required|string|max:255',
            'instansi'        => 'required|string|max:255',
            'jenis_penilaian' => 'required|in:kenaikan_jenjang,perpindahan_jabatan',
            'status'          => 'required|in:belum_dinilai,sedang_dinilai,selesai',
            'link_berkas'     => 'nullable|url',
        ]);

        // ============================================================
        // VALIDASI KONDISIONAL
        // ============================================================
        // WAWANCARA: butuh 2 penilai (P1 & P2)
        // TERTULIS : butuh 1 penilai (P1 saja)
        // ============================================================
        $rules = [
            'penilai_wawancara_1' => 'required|exists:penilais,id',
            'penilai_wawancara_2' => 'required|exists:penilais,id|different:penilai_wawancara_1',
        ];

        if ($validated['jenis_penilaian'] === 'perpindahan_jabatan') {
            // ✅ TERTULIS: hanya 1 penilai
            $rules['penilai_tertulis_1'] = 'required|exists:penilais,id';
        }

        $request->validate($rules, [
            'penilai_wawancara_1.required'  => 'Penilai wawancara 1 wajib dipilih.',
            'penilai_wawancara_2.required'  => 'Penilai wawancara 2 wajib dipilih.',
            'penilai_wawancara_2.different' => 'Penilai wawancara 1 dan 2 harus berbeda.',
            'penilai_tertulis_1.required'   => 'Penilai tertulis wajib dipilih.',
        ]);

        $peserta = Peserta::create($validated);

        // ============================================================
        // PENUGASAN PENILAI WAWANCARA (2 orang)
        // ============================================================
        if ($request->filled('penilai_wawancara_1')) {
            $penilai = Penilai::find($request->penilai_wawancara_1);
            PenugasanPenilai::create([
                'peserta_id'       => $peserta->id,
                'penilai_id'       => $request->penilai_wawancara_1,
                'login_penguji_id' => $penilai->login_penguji_id ?? null,
                'tipe'             => 'wawancara',
                'urutan'           => 1,
            ]);
        }
        if ($request->filled('penilai_wawancara_2')) {
            $penilai = Penilai::find($request->penilai_wawancara_2);
            PenugasanPenilai::create([
                'peserta_id'       => $peserta->id,
                'penilai_id'       => $request->penilai_wawancara_2,
                'login_penguji_id' => $penilai->login_penguji_id ?? null,
                'tipe'             => 'wawancara',
                'urutan'           => 2,
            ]);
        }

        // ============================================================
        // PENUGASAN PENILAI TERTULIS (1 orang saja)
        // ============================================================
        if ($validated['jenis_penilaian'] === 'perpindahan_jabatan') {
            if ($request->filled('penilai_tertulis_1')) {
                $penilai = Penilai::find($request->penilai_tertulis_1);
                PenugasanPenilai::create([
                    'peserta_id'       => $peserta->id,
                    'penilai_id'       => $request->penilai_tertulis_1,
                    'login_penguji_id' => $penilai->login_penguji_id ?? null,
                    'tipe'             => 'tertulis',
                    'urutan'           => 1,   // ✅ hanya urutan 1
                ]);
            }
        }

        return redirect()->route('admin.peserta')
            ->with('success', 'Peserta berhasil ditambahkan.');
    }

    /**
     * DETAIL PESERTA
     */
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);

        $penugasanWawancara = PenugasanPenilai::with('penilai')
            ->where('peserta_id', $id)
            ->where('tipe', 'wawancara')
            ->orderBy('urutan')
            ->get();

        $penugasanTertulis = PenugasanPenilai::with('penilai')
            ->where('peserta_id', $id)
            ->where('tipe', 'tertulis')
            ->orderBy('urutan')
            ->get();

        return view('admin.peserta-detail', compact(
            'peserta', 'penugasanWawancara', 'penugasanTertulis'
        ));
    }

    /**
     * FORM EDIT PESERTA
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $penilaiWawancara = Penilai::where('is_active', true)->where('is_wawancara', true)->get();
        $penilaiTertulis  = Penilai::where('is_active', true)->where('is_tertulis', true)->get();

        $penugasanWawancara = PenugasanPenilai::where('peserta_id', $id)
            ->where('tipe', 'wawancara')->pluck('penilai_id', 'urutan')->toArray();
        $penugasanTertulis = PenugasanPenilai::where('peserta_id', $id)
            ->where('tipe', 'tertulis')->pluck('penilai_id', 'urutan')->toArray();

        return view('admin.peserta-edit', compact(
            'peserta', 'penilaiWawancara', 'penilaiTertulis', 'penugasanWawancara', 'penugasanTertulis'
        ));
    }

    /**
     * UPDATE PESERTA
     */
    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'nip'             => 'nullable|string|max:50',
            'jabatan'         => 'required|string|max:255',
            'instansi'        => 'required|string|max:255',
            'jenis_penilaian' => 'required|in:kenaikan_jenjang,perpindahan_jabatan',
            'status'          => 'required|in:belum_dinilai,sedang_dinilai,selesai',
            'link_berkas'     => 'nullable|url',
        ]);

        // Validasi: Wawancara 2 penilai, Tertulis 1 penilai
        $rules = [
            'penilai_wawancara_1' => 'required|exists:penilais,id',
            'penilai_wawancara_2' => 'required|exists:penilais,id|different:penilai_wawancara_1',
        ];
        if ($validated['jenis_penilaian'] === 'perpindahan_jabatan') {
            $rules['penilai_tertulis_1'] = 'required|exists:penilais,id';
        }
        $request->validate($rules);

        $peserta->update($validated);

        // Hapus penugasan lama, buat baru
        PenugasanPenilai::where('peserta_id', $id)->delete();

        // Wawancara (2)
        if ($request->filled('penilai_wawancara_1')) {
            $penilai = Penilai::find($request->penilai_wawancara_1);
            PenugasanPenilai::create([
                'peserta_id'       => $id,
                'penilai_id'       => $request->penilai_wawancara_1,
                'login_penguji_id' => $penilai->login_penguji_id ?? null,
                'tipe'             => 'wawancara',
                'urutan'           => 1,
            ]);
        }
        if ($request->filled('penilai_wawancara_2')) {
            $penilai = Penilai::find($request->penilai_wawancara_2);
            PenugasanPenilai::create([
                'peserta_id'       => $id,
                'penilai_id'       => $request->penilai_wawancara_2,
                'login_penguji_id' => $penilai->login_penguji_id ?? null,
                'tipe'             => 'wawancara',
                'urutan'           => 2,
            ]);
        }

        // Tertulis (1 saja)
        if ($validated['jenis_penilaian'] === 'perpindahan_jabatan') {
            if ($request->filled('penilai_tertulis_1')) {
                $penilai = Penilai::find($request->penilai_tertulis_1);
                PenugasanPenilai::create([
                    'peserta_id'       => $id,
                    'penilai_id'       => $request->penilai_tertulis_1,
                    'login_penguji_id' => $penilai->login_penguji_id ?? null,
                    'tipe'             => 'tertulis',
                    'urutan'           => 1,
                ]);
            }
        }

        return redirect()->route('admin.peserta')
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    /**
     * HAPUS PESERTA
     */
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('admin.peserta')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}