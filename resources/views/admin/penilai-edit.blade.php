@extends('layouts.admin')

@section('title', 'Edit Penilai - LAN RI')

@section('breadcrumb')
    <a href="{{ route('admin.penilai') }}" class="text-gray-400 hover:text-gray-600">Data Penilai</a>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Edit Penilai</span>
@endsection

@section('content')

    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Edit Data Penilai</h1>
        <p class="mt-1 text-sm text-gray-500">Ubah data penilai & akun login.</p>
    </div>

    <form method="POST" action="{{ route('admin.penilai.update', $penilai->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- KIRI --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- INFORMASI PRIBADI --}}
                <div class="animate-fade-up delay-100 rounded-xl bg-white p-6 shadow-sm">
                    <h2 class="mb-5 text-base font-bold text-gray-800">Informasi Pribadi</h2>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Penilai <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama" value="{{ old('nama', $penilai->nama) }}" required
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            @error('nama') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">NIP</label>
                            <input type="text" name="nip" value="{{ old('nip', $penilai->nip) }}"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                            <input type="text" name="jabatan" value="{{ old('jabatan', $penilai->jabatan) }}"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Instansi</label>
                            <input type="text" name="instansi" value="{{ old('instansi', $penilai->instansi) }}"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                            <textarea name="keterangan" rows="2"
                                      class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                             focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">{{ old('keterangan', $penilai->keterangan) }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- AKUN LOGIN --}}
                <div class="animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm">
                    <div class="flex items-start gap-3 mb-5">
                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                            <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-gray-800">Akun Login</h2>
                            <p class="text-xs text-gray-500">Ubah akun login penilai. Kosongkan password jika tidak ingin diubah.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email', $penilai->email) }}" required
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Username <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="username" value="{{ old('username', $penilai->username) }}" required
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            @error('username') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Password <span class="text-xs text-gray-400">(Kosongkan jika tidak diubah)</span>
                            </label>
                            <input type="text" name="password" value="{{ old('password') }}"
                                   placeholder="Isi untuk ubah password"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                            <p class="mt-1 text-xs text-gray-500">Minimal 6 karakter. Kosongkan kalau tidak diubah.</p>
                            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- TIPE PENILAI --}}
                <div class="animate-fade-up delay-300 rounded-xl bg-white p-6 shadow-sm">
                    <h2 class="mb-5 text-base font-bold text-gray-800">Tipe Penilai</h2>

                    @error('tipe') <p class="mb-3 text-xs text-red-500">{{ $message }}</p> @enderror

                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                        <label class="cursor-pointer">
                            <input type="checkbox" name="is_wawancara" value="1" 
                                   class="peer hidden"
                                   {{ $penilai->is_wawancara ? 'checked' : '' }}>
                            <div class="rounded-xl border-2 border-gray-200 bg-white p-4 transition
                                        peer-checked:border-blue-500 peer-checked:bg-blue-50
                                        hover:border-blue-300">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                                        <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-800">Wawancara</p>
                                        <p class="text-xs text-gray-500">Menilai sesi wawancara</p>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="checkbox" name="is_tertulis" value="1" 
                                   class="peer hidden"
                                   {{ $penilai->is_tertulis ? 'checked' : '' }}>
                            <div class="rounded-xl border-2 border-gray-200 bg-white p-4 transition
                                        peer-checked:border-purple-500 peer-checked:bg-purple-50
                                        hover:border-purple-300">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                                        <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-800">Tertulis</p>
                                        <p class="text-xs text-gray-500">Menilai sesi tertulis</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- STATUS --}}
                <div class="animate-fade-up delay-400 rounded-xl bg-white p-6 shadow-sm">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" 
                               class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                               {{ $penilai->is_active ? 'checked' : '' }}>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Aktif</p>
                            <p class="text-xs text-gray-500">Penilai dapat login & ditugaskan</p>
                        </div>
                    </label>
                </div>
            </div>

            {{-- KANAN: INFO --}}
            <div class="space-y-6">
                <div class="animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                            <svg class="h-4 w-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800">Info</p>
                            <ul class="mt-3 space-y-2 text-sm text-gray-600">
                                <li>• Penilai bisa punya kedua tipe sekaligus.</li>
                                <li>• Jika tidak aktif, penilai tidak bisa login.</li>
                                <li>• Password di-hash, aman.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOMBOL --}}
        <div class="mt-6 flex items-center justify-end gap-3 animate-fade-up delay-400">
            <a href="{{ route('admin.penilai') }}"
               class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-semibold text-gray-600 
                      transition hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Batal
            </a>
            <button type="submit"
                    class="flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white 
                           shadow-md shadow-blue-600/30 transition hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Update Penilai & Akun
            </button>
        </div>
    </form>

@endsection