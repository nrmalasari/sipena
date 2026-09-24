<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Versi Tampilan (Tanpa Database)
|--------------------------------------------------------------------------
*/

// ============ LOGIN ============
Route::get('/login-penguji', function () {
    return view('auth.login-penguji');
})->name('login.penguji');

// Login dummy — setelah login, redirect ke DASHBOARD
Route::post('/login-penguji', function () {
    return redirect()->route('dashboard.penguji');
})->name('login.penguji.submit');

// ============ DASHBOARD ============
Route::get('/dashboard-penguji', function () {
    return view('dashboard-penguji');
})->name('dashboard.penguji');

// ============ PESERTA & PENILAIAN ============
Route::get('/peserta-penilaian', function () {
    return view('peserta-penilaian');
})->name('peserta.penilaian');

// ============ SIMPAN PENILAIAN ============
Route::post('/penilaian/simpan', function () {
    return redirect()->route('penilaian.berhasil');
})->name('penilaian.simpan');

// ============ HALAMAN BERHASIL ============
Route::get('/penilaian-berhasil', function () {
    return view('penilaian-berhasil');
})->name('penilaian.berhasil');

// ============ LOGOUT ============
Route::post('/logout-penguji', function () {
    return redirect()->route('login.penguji');
})->name('logout.penguji');

// ============ DEFAULT ============
Route::get('/', function () {
    return redirect()->route('login.penguji');
});

// ============ PROFIL PENGUJI ============
Route::get('/profil-penguji', function () {
    return view('profil-penguji');
})->name('profil.penguji');

// ============ LOGOUT ============
Route::post('/logout-penguji', function () {
    return redirect()->route('login.penguji');
})->name('logout.penguji');