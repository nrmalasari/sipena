<?php

namespace App\Http\Controllers;

use App\Models\LoginPenguji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginPengujiController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login-penguji');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan email ATAU username
        $user = LoginPenguji::where('email', $request->email)
            ->orWhere('username', $request->email)
            ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email/Username tidak ditemukan.',
            ])->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->withInput();
        }

        // Cek status aktif
        if (!$user->is_active) {
            return back()->withErrors([
                'email' => 'Akun Anda tidak aktif. Hubungi admin.',
            ])->withInput();
        }

        // Login berhasil
        Auth::login($user, $request->remember);
        $user->update(['last_login_at' => now()]);

        // Simpan info ke session
        session([
            'user_id'      => $user->id,
            'nama_penguji' => $user->nama,
            'role'         => $user->role,
            'tipe_penguji' => $user->tipe_penguji,
            'kelompok'     => $user->kelompok,
        ]);

        // Redirect berdasarkan role
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard.penguji');
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.penguji');
    }
}