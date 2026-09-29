<?php

namespace App\Http\Controllers;

use App\Models\Penilai;
use App\Models\LoginPenguji;
use App\Models\PenugasanPenilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminPenilaiController extends Controller
{
    /**
     * LIST PENILAI
     */
    public function index(Request $request)
    {
        $query = Penilai::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('jabatan', 'like', "%{$search}%")
                  ->orWhere('instansi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jenis')) {
            if ($request->jenis === 'wawancara') {
                $query->where('is_wawancara', true);
            } elseif ($request->jenis === 'tertulis') {
                $query->where('is_tertulis', true);
            } elseif ($request->jenis === 'keduanya') {
                $query->where('is_wawancara', true)->where('is_tertulis', true);
            }
        }

        if ($request->filled('instansi')) {
            $query->where('instansi', $request->instansi);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'aktif');
        }

        $penilai = $query->latest()->paginate(10)->withQueryString();

        $statistik = [
            'total'          => Penilai::count(),
            'wawancara'      => Penilai::where('is_wawancara', true)->count(),
            'tertulis'       => Penilai::where('is_tertulis', true)->count(),
            'total_pasangan' => PenugasanPenilai::count(),
        ];

        $daftarInstansi = Penilai::select('instansi')
            ->whereNotNull('instansi')
            ->distinct()
            ->pluck('instansi');

        return view('admin.penilai', compact('penilai', 'statistik', 'daftarInstansi'));
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        return view('admin.penilai-tambah');
    }

    /**
     * SIMPAN PENILAI BARU + AKUN LOGIN
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'email'        => 'required|email|unique:login_pengujis,email',
            'username'     => 'required|string|max:50|unique:login_pengujis,username',
            'password'     => 'required|string|min:6',
            'nip'          => 'nullable|string|max:50',
            'jabatan'      => 'nullable|string|max:255',
            'instansi'     => 'nullable|string|max:255',
            'is_wawancara' => 'nullable|boolean',
            'is_tertulis'  => 'nullable|boolean',
            'keterangan'   => 'nullable|string',
            'is_active'    => 'nullable|boolean',
        ], [
            'email.unique'    => 'Email sudah terdaftar.',
            'username.unique' => 'Username sudah terdaftar.',
            'password.min'    => 'Password minimal 6 karakter.',
        ]);

        if (!$request->is_wawancara && !$request->is_tertulis) {
            return back()->withErrors([
                'tipe' => 'Pilih minimal satu tipe: Wawancara atau Tertulis.'
            ])->withInput();
        }

        $tipePengujiLogin = 'none';
        if ($request->is_wawancara && !$request->is_tertulis) $tipePengujiLogin = 'wawancara';
        if (!$request->is_wawancara && $request->is_tertulis) $tipePengujiLogin = 'tertulis';
        if ($request->is_wawancara && $request->is_tertulis)  $tipePengujiLogin = 'wawancara';

        DB::transaction(function () use ($request, $validated, $tipePengujiLogin) {
            // Hash password sekali
            $hashedPassword = Hash::make($validated['password']);

            // 1. Buat akun login
            $loginPenguji = LoginPenguji::create([
                'nama'         => $validated['nama'],
                'email'        => $validated['email'],
                'username'     => $validated['username'],
                'password'     => $hashedPassword,
                'role'         => 'penguji',
                'tipe_penguji' => $tipePengujiLogin,
                'nip'          => $validated['nip'] ?? null,
                'jabatan'      => $validated['jabatan'] ?? null,
                'instansi'     => $validated['instansi'] ?? null,
                'is_active'    => $request->has('is_active') ? 1 : 0,
            ]);

            // 2. Buat data penilai
            Penilai::create([
                'login_penguji_id' => $loginPenguji->id,
                'nama'             => $validated['nama'],
                'email'            => $validated['email'],
                'username'         => $validated['username'],
                'password'         => $hashedPassword,
                'nip'              => $validated['nip'] ?? null,
                'jabatan'          => $validated['jabatan'] ?? null,
                'instansi'         => $validated['instansi'] ?? null,
                'is_wawancara'     => $request->has('is_wawancara') ? 1 : 0,
                'is_tertulis'      => $request->has('is_tertulis') ? 1 : 0,
                'keterangan'       => $validated['keterangan'] ?? null,
                'is_active'        => $request->has('is_active') ? 1 : 0,
            ]);
        });

        return redirect()->route('admin.penilai')
            ->with('success', 'Penilai + akun login berhasil dibuat.');
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $penilai = Penilai::findOrFail($id);
        return view('admin.penilai-edit', compact('penilai'));
    }

    /**
     * UPDATE PENILAI + AKUN LOGIN
     */
    public function update(Request $request, $id)
    {
        $penilai = Penilai::findOrFail($id);

        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'email'        => 'required|email|unique:login_pengujis,email,' . $penilai->login_penguji_id,
            'username'     => 'required|string|max:50|unique:login_pengujis,username,' . $penilai->login_penguji_id,
            'password'     => 'nullable|string|min:6',
            'nip'          => 'nullable|string|max:50',
            'jabatan'      => 'nullable|string|max:255',
            'instansi'     => 'nullable|string|max:255',
            'is_wawancara' => 'nullable|boolean',
            'is_tertulis'  => 'nullable|boolean',
            'keterangan'   => 'nullable|string',
            'is_active'    => 'nullable|boolean',
        ], [
            'email.unique'    => 'Email sudah dipakai.',
            'username.unique' => 'Username sudah dipakai.',
        ]);

        if (!$request->is_wawancara && !$request->is_tertulis) {
            return back()->withErrors([
                'tipe' => 'Pilih minimal satu tipe: Wawancara atau Tertulis.'
            ])->withInput();
        }

        $tipePengujiLogin = 'none';
        if ($request->is_wawancara && !$request->is_tertulis) $tipePengujiLogin = 'wawancara';
        if (!$request->is_wawancara && $request->is_tertulis) $tipePengujiLogin = 'tertulis';
        if ($request->is_wawancara && $request->is_tertulis)  $tipePengujiLogin = 'wawancara';

        DB::transaction(function () use ($request, $validated, $penilai, $tipePengujiLogin) {
            // Update akun login
            if ($penilai->login_penguji_id) {
                $loginPenguji = LoginPenguji::find($penilai->login_penguji_id);
                if ($loginPenguji) {
                    $dataLogin = [
                        'nama'         => $validated['nama'],
                        'email'        => $validated['email'],
                        'username'     => $validated['username'],
                        'tipe_penguji' => $tipePengujiLogin,
                        'nip'          => $validated['nip'] ?? null,
                        'jabatan'      => $validated['jabatan'] ?? null,
                        'instansi'     => $validated['instansi'] ?? null,
                        'is_active'    => $request->has('is_active') ? 1 : 0,
                    ];
                    if ($request->filled('password')) {
                        $dataLogin['password'] = Hash::make($validated['password']);
                    }
                    $loginPenguji->update($dataLogin);
                }
            }

            // Update data penilai
            $dataPenilai = [
                'nama'         => $validated['nama'],
                'email'        => $validated['email'],
                'username'     => $validated['username'],
                'nip'          => $validated['nip'] ?? null,
                'jabatan'      => $validated['jabatan'] ?? null,
                'instansi'     => $validated['instansi'] ?? null,
                'is_wawancara' => $request->has('is_wawancara') ? 1 : 0,
                'is_tertulis'  => $request->has('is_tertulis') ? 1 : 0,
                'keterangan'   => $validated['keterangan'] ?? null,
                'is_active'    => $request->has('is_active') ? 1 : 0,
            ];
            if ($request->filled('password')) {
                $dataPenilai['password'] = Hash::make($validated['password']);
            }
            $penilai->update($dataPenilai);
        });

        return redirect()->route('admin.penilai')
            ->with('success', 'Data penilai + akun login berhasil diperbarui.');
    }

    /**
     * HAPUS PENILAI + AKUN LOGIN
     */
    public function destroy($id)
    {
        $penilai = Penilai::findOrFail($id);

        DB::transaction(function () use ($penilai) {
            if ($penilai->login_penguji_id) {
                LoginPenguji::where('id', $penilai->login_penguji_id)->delete();
            }
            $penilai->delete();
        });

        return redirect()->route('admin.penilai')
            ->with('success', 'Penilai & akun login berhasil dihapus.');
    }
}