<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginPengujiController;
use App\Models\LoginPenguji;

/*
|--------------------------------------------------------------------------
| Web Routes — 4 Penguji + Admin
|--------------------------------------------------------------------------
*/

// ============ HELPER: DATA PESERTA ============
if (!function_exists('dataPeserta')) {
    function dataPeserta() {
        // [nama, instansi, jabatan, butuh_tertulis]
        // butuh_tertulis = true → Perpindahan Jabatan (butuh wawancara + tertulis)
        return [
            ['Andi Pratama', 'Kota Magelang', 'Analis Kepegawaian', false],
            ['Siti Nurhaliza', 'Kab. Semarang', 'Kepala Sub Bidang', true],
            ['Budi Santoso', 'Pemprov Jawa Tengah', 'Auditor Muda', false],
            ['Rina Oktaviani', 'Kab. Kebumen', 'Perencana Ahli Muda', true],
            ['Dedi Kurniawan', 'Kota Surakarta', 'Penyuluh Sosial', false],
            ['Putri Anggraini', 'Kab. Wonogiri', 'Analis SDM Aparatur', true],
            ['Fahri Ramadhan', 'Kab. Boyolali', 'Kepala Seksi', false],
            ['Nabila Safitri', 'Kab. Klaten', 'Pranata Komputer', true],
            ['Rizky Maulana', 'Kab. Sukoharjo', 'Analis Kebijakan', false],
            ['Lina Marlina', 'Kab. Karanganyar', 'Bendahara Pengeluaran', true],
        ];
    }
}

// ============ HELPER: REKAN PENGUJI ============
if (!function_exists('getRekanPenguji')) {
    function getRekanPenguji($tipePenguji, $currentUserId) {
        // Ambil penguji lain dengan tipe sama (selain diri sendiri)
        return LoginPenguji::where('role', 'penguji')
            ->where('tipe_penguji', $tipePenguji)
            ->where('id', '!=', $currentUserId)
            ->first();
    }
}

// ============ LOGIN ============
Route::get('/login-penguji', [LoginPengujiController::class, 'showLoginForm'])->name('login.penguji');
Route::post('/login-penguji', [LoginPengujiController::class, 'login'])->name('login.penguji.submit');
Route::post('/logout-penguji', [LoginPengujiController::class, 'logout'])->name('logout.penguji');

// ============ DASHBOARD PENGUJI ============
Route::get('/dashboard-penguji', function () {
    $semuaPeserta = dataPeserta();
    $tipePenguji = Session::get('tipe_penguji', 'wawancara');
    $namaPenguji = Session::get('nama_penguji', 'Penguji');
    $userId = Session::get('user_id');

    if ($tipePenguji === 'tertulis') {
        $semuaPeserta = array_filter($semuaPeserta, fn($p) => $p[3] === true);
        $semuaPeserta = array_values($semuaPeserta);
    }

    $sudahDinilai = Session::get('sudah_dinilai_' . $tipePenguji, []);
    $pesertaTerbaru = array_slice($semuaPeserta, 0, 5);

    $rekanPenguji = getRekanPenguji($tipePenguji, $userId);

    return view('dashboard-penguji', compact(
        'pesertaTerbaru', 'sudahDinilai', 'tipePenguji', 'namaPenguji', 'semuaPeserta', 'rekanPenguji'
    ));
})->name('dashboard.penguji');

// ============ PESERTA & PENILAIAN ============
Route::get('/peserta-penilaian', function () {
    $peserta = dataPeserta();
    $tipePenguji = Session::get('tipe_penguji', 'wawancara');
    $namaPenguji = Session::get('nama_penguji', 'Penguji');
    $userId = Session::get('user_id');

    if ($tipePenguji === 'tertulis') {
        $peserta = array_filter($peserta, fn($p) => $p[3] === true);
        $peserta = array_values($peserta);
    }

    $sudahDinilai = Session::get('sudah_dinilai_' . $tipePenguji, []);
    $rekanPenguji = getRekanPenguji($tipePenguji, $userId);

    return view('peserta-penilaian', compact(
        'peserta', 'sudahDinilai', 'tipePenguji', 'namaPenguji', 'rekanPenguji'
    ));
})->name('peserta.penilaian');

// ============ SIMPAN PENILAIAN ============
Route::post('/penilaian/simpan', function (\Illuminate\Http\Request $request) {
    $namaPeserta = $request->input('peserta_nama');
    $tipePenguji = Session::get('tipe_penguji', 'wawancara');

    $sudahDinilai = Session::get('sudah_dinilai_' . $tipePenguji, []);
    if ($namaPeserta && !in_array($namaPeserta, $sudahDinilai)) {
        $sudahDinilai[] = $namaPeserta;
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
    $userId = Session::get('user_id');
    $rekanPenguji = getRekanPenguji($tipePenguji, $userId);

    return view('profil-penguji', compact('tipePenguji', 'namaPenguji', 'rekanPenguji'));
})->name('profil.penguji');

// ============ ADMIN DASHBOARD ============
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// ============ RESET ============
Route::get('/reset-penilaian', function () {
    Session::forget(['sudah_dinilai_wawancara', 'sudah_dinilai_tertulis']);
    return redirect()->route('peserta.penilaian');
})->name('reset.penilaian');

// ============ DEFAULT ============
Route::get('/', function () {
    return redirect()->route('login.penguji');
});