<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginPengujiController;
use App\Http\Controllers\AdminPesertaController;
use App\Http\Controllers\AdminPenilaiController;
use App\Http\Controllers\PenilaianPengujiController;
use App\Http\Controllers\AdminPenilaianController;
use App\Http\Controllers\AdminLaporanController;
use App\Models\LoginPenguji;
use App\Models\PenugasanPenilai;
use App\Models\Penilaian;

/*
|--------------------------------------------------------------------------
| Web Routes — 4 Penguji + Admin (LENGKAP)
|--------------------------------------------------------------------------
*/

// ============ LOGIN ============
Route::get('/login-penguji', [LoginPengujiController::class, 'showLoginForm'])->name('login.penguji');
Route::post('/login-penguji', [LoginPengujiController::class, 'login'])->name('login.penguji.submit');
Route::post('/logout-penguji', [LoginPengujiController::class, 'logout'])->name('logout.penguji');

// ============ DASHBOARD PENGUJI ============
Route::get('/dashboard-penguji', function () {
    $userId      = Session::get('user_id');
    $penilaiId   = Session::get('penilai_id');
    $tipeSession = Session::get('tipe_penguji', 'wawancara');
    $namaPenguji = Session::get('nama_penguji', 'Penguji');

    if (!$userId) {
        return redirect()->route('login.penguji');
    }

    $isBoth = $tipeSession === 'both';
    $tipePenguji = $isBoth
        ? request()->get('tipe', 'wawancara')
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

    $semuaPeserta = $penugasan->pluck('peserta')->filter()->unique('id')->values();

    $sudahDinilai = [];
    if ($penilaiId) {
        $sudahDinilai = Penilaian::where('penilai_id', $penilaiId)
            ->where('tipe', $tipePenguji)
            ->where('status', 'selesai')
            ->pluck('peserta_id')
            ->toArray();
    }

    $pesertaTerbaru = $semuaPeserta->take(5);

    $rekanPenguji = LoginPenguji::where('role', 'penguji')
        ->where('tipe_penguji', $tipePenguji)
        ->where('id', '!=', $userId)
        ->first();

    return view('dashboard-penguji', compact(
        'pesertaTerbaru', 'sudahDinilai', 'tipePenguji', 'namaPenguji',
        'semuaPeserta', 'rekanPenguji', 'isBoth'
    ));
})->name('dashboard.penguji');

// ============ PESERTA & PENILAIAN (PENGUJI) ============
Route::get('/peserta-penilaian', [PenilaianPengujiController::class, 'index'])
    ->name('peserta.penilaian');

Route::post('/peserta-penilaian/simpan-nilai', [PenilaianPengujiController::class, 'simpanNilai'])
    ->name('peserta.penilaian.simpan-nilai');

Route::post('/peserta-penilaian/simpan-catatan', [PenilaianPengujiController::class, 'simpanCatatan'])
    ->name('peserta.penilaian.simpan-catatan');

Route::post('/peserta-penilaian/live-nilai', [PenilaianPengujiController::class, 'getLiveNilai'])
    ->name('peserta.penilaian.live-nilai');

Route::post('/peserta-penilaian/selesaikan', [PenilaianPengujiController::class, 'selesaikan'])
    ->name('peserta.penilaian.selesaikan');

// ============ PANDUAN PENGUJI ============
Route::get('/panduan-penguji', function () {
    $tipePenguji = Session::get('tipe_penguji', 'wawancara');
    $namaPenguji = Session::get('nama_penguji', 'Penguji');

    if (!Session::get('user_id')) {
        return redirect()->route('login.penguji');
    }

    return view('panduan-penguji', compact('tipePenguji', 'namaPenguji'));
})->name('panduan.penguji');

// ============ SIMPAN PENILAIAN ============
Route::post('/penilaian/simpan', function (Request $request) {
    $pesertaId   = $request->input('peserta_id');
    $tipePenguji = Session::get('tipe_penguji', 'wawancara');

    $sudahDinilai = Session::get('sudah_dinilai_' . $tipePenguji, []);
    if ($pesertaId && !in_array((int) $pesertaId, $sudahDinilai)) {
        $sudahDinilai[] = (int) $pesertaId;
        Session::put('sudah_dinilai_' . $tipePenguji, $sudahDinilai);
    }

    return redirect()->route('penilaian.berhasil');
})->name('penilaian.simpan');

// ============ HALAMAN BERHASIL ============
Route::get('/penilaian-berhasil', function () {
    return view('penilaian-berhasil');
})->name('penilaian.berhasil');

// ============ PROFIL PENGUJI ============
Route::get('/profil-penguji', function () {
    $tipePenguji = Session::get('tipe_penguji', 'wawancara');
    $namaPenguji = Session::get('nama_penguji', 'Penguji');
    $userId      = Session::get('user_id');

    if (!$userId) {
        return redirect()->route('login.penguji');
    }

    $rekanPenguji = LoginPenguji::where('role', 'penguji')
        ->where('tipe_penguji', $tipePenguji)
        ->where('id', '!=', $userId)
        ->first();

    return view('profil-penguji', compact('tipePenguji', 'namaPenguji', 'rekanPenguji'));
})->name('profil.penguji');

// ============ ADMIN ============
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // ============ DATA PESERTA ============
    Route::get('/peserta', [AdminPesertaController::class, 'index'])->name('admin.peserta');
    Route::get('/peserta/tambah', [AdminPesertaController::class, 'create'])->name('admin.peserta.tambah');
    Route::post('/peserta', [AdminPesertaController::class, 'store'])->name('admin.peserta.store');
    Route::get('/peserta/{id}', [AdminPesertaController::class, 'show'])->name('admin.peserta.detail');
    Route::get('/peserta/{id}/edit', [AdminPesertaController::class, 'edit'])->name('admin.peserta.edit');
    Route::put('/peserta/{id}', [AdminPesertaController::class, 'update'])->name('admin.peserta.update');
    Route::delete('/peserta/{id}', [AdminPesertaController::class, 'destroy'])->name('admin.peserta.hapus');

    // ============ DATA PENILAI ============
    Route::get('/penilai', [AdminPenilaiController::class, 'index'])->name('admin.penilai');
    Route::get('/penilai/tambah', [AdminPenilaiController::class, 'create'])->name('admin.penilai.tambah');
    Route::post('/penilai', [AdminPenilaiController::class, 'store'])->name('admin.penilai.store');
    Route::get('/penilai/{id}/edit', [AdminPenilaiController::class, 'edit'])->name('admin.penilai.edit');
    Route::put('/penilai/{id}', [AdminPenilaiController::class, 'update'])->name('admin.penilai.update');
    Route::delete('/penilai/{id}', [AdminPenilaiController::class, 'destroy'])->name('admin.penilai.hapus');

    // ============ PENILAIAN ============
    Route::get('/penilaian', [AdminPenilaianController::class, 'index'])->name('admin.penilaian');
    Route::get('/penilaian/{pesertaId}', [AdminPenilaianController::class, 'show'])->name('admin.penilaian.detail');
    Route::get('/penilaian/{pesertaId}/edit', [AdminPenilaianController::class, 'edit'])->name('admin.penilaian.edit');
    Route::put('/penilaian/{pesertaId}/edit', [AdminPenilaianController::class, 'updateNilai'])->name('admin.penilaian.update-nilai');
    Route::get('/penilaian/{pesertaId}/export-excel', [AdminPenilaianController::class, 'exportExcel'])->name('admin.penilaian.export-excel');
    Route::put('/penilaian/{pesertaId}/override', [AdminPenilaianController::class, 'updateOverride'])->name('admin.penilaian.override');
    Route::delete('/penilaian/{pesertaId}', [AdminPenilaianController::class, 'destroy'])->name('admin.penilaian.hapus');

    // ============ LAPORAN ============
    Route::get('/laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan');
    Route::get('/laporan/export-excel', [AdminLaporanController::class, 'exportExcel'])->name('admin.laporan.export-excel');
    Route::get('/laporan/export-pdf', [AdminLaporanController::class, 'exportPdf'])->name('admin.laporan.export-pdf');

    // ============ PENGATURAN ============
    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('admin.pengaturan');
});

// ============ RESET ============
Route::get('/reset-penilaian', function () {
    Session::forget(['sudah_dinilai_wawancara', 'sudah_dinilai_tertulis']);
    return redirect()->route('peserta.penilaian');
})->name('reset.penilaian');

// ============ DEFAULT ============
Route::get('/', function () {
    return redirect()->route('login.penguji');
});