<?php

namespace App\Http\Controllers;

use App\Models\LoginPenguji;
use App\Models\Penilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginPengujiController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-penguji');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email atau username
        $user = LoginPenguji::where('email', $request->email)
            ->orWhere('username', $request->email)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email/username atau password salah.'])->withInput();
        }

        if (!$user->is_active) {
            return back()->withErrors(['email' => 'Akun Anda tidak aktif.'])->withInput();
        }

        // Cari data penilai yang terkait
        $penilai = Penilai::where('login_penguji_id', $user->id)->first();

        // ============================================================
        // TENTUKAN TIPE PENGUJI
        // ============================================================
        // Kalau penilai punya KEDUA tipe (wawancara + tertulis),
        // simpan sebagai 'both' supaya bisa pilih di halaman berikutnya.
        // Kalau cuma satu, simpan tipe itu.
        // ============================================================
        $tipePenguji = $user->tipe_penguji;

        if ($penilai && $penilai->is_wawancara && $penilai->is_tertulis) {
            $tipePenguji = 'both';
        } elseif ($penilai) {
            if ($penilai->is_wawancara) $tipePenguji = 'wawancara';
            elseif ($penilai->is_tertulis) $tipePenguji = 'tertulis';
        }

        // ============================================================
        // SIMPAN SESSION
        // ============================================================
        session([
            'user_id'      => $user->id,
            'nama_penguji' => $user->nama,
            'role'         => $user->role,
            'tipe_penguji' => $tipePenguji,   // 'wawancara' / 'tertulis' / 'both'
            'penilai_id'   => $penilai?->id,
            'is_wawancara' => $penilai?->is_wawancara ?? false,
            'is_tertulis'  => $penilai?->is_tertulis ?? false,
        ]);

        // Admin → dashboard admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Penguji → dashboard penguji
        return redirect()->route('dashboard.penguji');
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('login.penguji');
    }
}