@extends('layouts.admin')

@section('title', 'Tambah Peserta - LAN RI')

@section('breadcrumb')
    <a href="{{ route('admin.peserta') }}" class="text-gray-400 hover:text-gray-600">Data Peserta</a>
    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
    <span class="text-gray-700 font-medium">Tambah Peserta</span>
@endsection

@section('content')

    {{-- HEADER --}}
    <div class="mb-6 animate-fade-up">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Calon Peserta</h1>
        <p class="mt-1 text-sm text-gray-500">Lengkapi data calon peserta sesuai dengan kategori jabatan dan jenis penilaian yang akan diikuti.</p>
    </div>

    {{-- ✅ TAMPILKAN ERROR VALIDASI GLOBAL --}}
    @if ($errors->any())
        <div class="mb-6 animate-fade-up rounded-lg border border-red-200 bg-red-50 p-4">
            <div class="flex items-start gap-3">
                <svg class="h-5 w-5 flex-shrink-0 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <div>
                    <p class="text-sm font-bold text-red-800">Ada kesalahan pada form:</p>
                    <ul class="mt-1 list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.peserta.store') }}" id="formTambahPeserta">
        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- ============ KIRI: FORM ============ --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- INFORMASI PESERTA --}}
                <div class="animate-fade-up delay-100 rounded-xl bg-white p-6 shadow-sm">
                    <h2 class="mb-5 text-base font-bold text-gray-800">Informasi Peserta</h2>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                        {{-- Nama Peserta --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Peserta <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama" id="inputNama" value="{{ old('nama') }}"
                                   placeholder="Masukkan nama lengkap peserta"
                                   required
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none
                                          @error('nama') border-red-500 @enderror">
                            @error('nama') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- NIP --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">NIP</label>
                            <input type="text" name="nip" value="{{ old('nip') }}"
                                   placeholder="Masukkan NIP (jika ada)"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                        </div>

                        {{-- Jabatan --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Jabatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="jabatan" id="inputJabatan" value="{{ old('jabatan') }}"
                                   placeholder="Masukkan jabatan peserta"
                                   required
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none
                                          @error('jabatan') border-red-500 @enderror">
                            @error('jabatan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Instansi --}}
                        <div class="sm:col-span-2 lg:col-span-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Instansi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="instansi" value="{{ old('instansi') }}"
                                   placeholder="Masukkan instansi peserta"
                                   required
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                          focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none
                                          @error('instansi') border-red-500 @enderror">
                            @error('instansi') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Jenis Penilaian --}}
                        <div class="sm:col-span-2 lg:col-span-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Jenis Penilaian <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis_penilaian" id="selectJenis" required
                                    onchange="togglePenilai()"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none
                                           @error('jenis_penilaian') border-red-500 @enderror">
                                <option value="">-- Pilih jenis penilaian --</option>
                                <option value="kenaikan_jenjang"    {{ old('jenis_penilaian') === 'kenaikan_jenjang' ? 'selected' : '' }}>Kenaikan Jenjang (Hanya Wawancara)</option>
                                <option value="perpindahan_jabatan" {{ old('jenis_penilaian') === 'perpindahan_jabatan' ? 'selected' : '' }}>Perpindahan Jabatan (Wawancara + Tertulis)</option>
                            </select>
                            @error('jenis_penilaian') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Status --}}
                        <div class="sm:col-span-2 lg:col-span-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select name="status" required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none
                                           @error('status') border-red-500 @enderror">
                                <option value="">Pilih status</option>
                                <option value="belum_dinilai"  {{ old('status') === 'belum_dinilai' ? 'selected' : '' }}>Belum Dinilai</option>
                                <option value="sedang_dinilai" {{ old('status') === 'sedang_dinilai' ? 'selected' : '' }}>Sedang Dinilai</option>
                                <option value="selesai"        {{ old('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Link Berkas --}}
                        <div class="sm:col-span-2 lg:col-span-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Link Drive Berkas
                                <span class="text-xs font-normal text-gray-400">(opsional)</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                </span>
                                <input type="url" name="link_berkas" value="{{ old('link_berkas') }}"
                                       placeholder="https://drive.google.com/..."
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 pl-10 text-sm text-gray-700
                                              focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none
                                              @error('link_berkas') border-red-500 @enderror">
                            </div>
                            @error('link_berkas') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            <p class="mt-2 text-xs text-gray-500">Link ini akan ditampilkan pada tampilan penilai untuk melihat berkas peserta.</p>
                        </div>
                    </div>
                </div>

                {{-- PENUGASAN PENILAI --}}
                <div id="sectionPenugasan" class="hidden animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-5 border-b border-gray-100 pb-4">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                            <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-gray-800">Pilih Kelompok Penguji</h2>
                            <p class="text-xs text-gray-500">Tentukan penilai yang akan menilai peserta ini.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                        {{-- WAWANCARA (2 penilai) --}}
                        <div class="rounded-xl border-2 border-blue-200 bg-blue-50/50 p-4">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                                    <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800">Kelompok Wawancara</p>
                                    <p class="text-xs text-gray-500">Pilih 2 penilai wawancara</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                                        Penilai 1 <span class="text-red-500">*</span>
                                    </label>
                                    <select name="penilai_wawancara_1" id="pw1"
                                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700
                                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                                        <option value="">Pilih penilai 1</option>
                                        @foreach ($penilaiWawancara as $p)
                                            <option value="{{ $p->id }}" {{ old('penilai_wawancara_1') == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama }} - {{ $p->jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('penilai_wawancara_1') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                                        Penilai 2 <span class="text-red-500">*</span>
                                    </label>
                                    <select name="penilai_wawancara_2" id="pw2"
                                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700
                                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                                        <option value="">Pilih penilai 2</option>
                                        @foreach ($penilaiWawancara as $p)
                                            <option value="{{ $p->id }}" {{ old('penilai_wawancara_2') == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama }} - {{ $p->jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('penilai_wawancara_2') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- TERTULIS (1 penilai) --}}
                        <div id="sectionTertulis" class="hidden rounded-xl border-2 border-purple-200 bg-purple-50/50 p-4">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                                    <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800">Kelompok Tertulis</p>
                                    <p class="text-xs text-gray-500">Pilih 1 penilai tertulis</p>
                                </div>
                            </div>

                            {{-- ✅ Hanya 1 dropdown --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">
                                    Penilai Tertulis <span class="text-red-500">*</span>
                                </label>
                                <select name="penilai_tertulis_1" id="pt1"
                                        class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700
                                               focus:border-purple-500 focus:ring-2 focus:ring-purple-200 focus:outline-none">
                                    <option value="">Pilih penilai</option>
                                    @foreach ($penilaiTertulis as $p)
                                        <option value="{{ $p->id }}" {{ old('penilai_tertulis_1') == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama }} - {{ $p->jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('penilai_tertulis_1') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                <p class="mt-2 text-xs text-purple-700">
                                    <svg class="inline h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                    </svg>
                                    Penilaian tertulis hanya dilakukan oleh 1 penguji.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ KANAN ============ --}}
            <div class="space-y-6">
                <div class="animate-fade-up delay-200 rounded-xl bg-white p-6 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                            <svg class="h-4 w-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800">Keterangan</p>
                            <ul class="mt-3 space-y-2 text-sm text-gray-600">
                                <li class="flex items-start gap-2">
                                    <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-gray-400 flex-shrink-0"></span>
                                    <strong>Kenaikan Jenjang</strong> → dinilai oleh 2 penilai wawancara.
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-gray-400 flex-shrink-0"></span>
                                    <strong>Perpindahan Jabatan</strong> → dinilai oleh 2 penilai wawancara + <strong>1 penilai tertulis</strong>.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="animate-fade-up delay-300 rounded-xl bg-white p-6 shadow-sm">
                    <h3 class="mb-4 text-base font-bold text-gray-800">Ringkasan</h3>

                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                                <svg class="h-4 w-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.418 0-8 2.686-8 6v2h16v-2c0-3.314-3.582-6-8-6z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500">Nama Peserta</p>
                                <p id="ringkasanNama" class="text-sm font-semibold text-gray-800">-</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-green-100">
                                <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500">Jabatan</p>
                                <p id="ringkasanJabatan" class="text-sm font-semibold text-gray-800">-</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-purple-100">
                                <svg class="h-4 w-4 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500">Jenis Penilaian</p>
                                <p id="ringkasanJenis" class="text-sm font-semibold text-gray-800">-</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-orange-100">
                                <svg class="h-4 w-4 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500">Status</p>
                                <p id="ringkasanStatus" class="text-sm font-semibold text-gray-800">-</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 overflow-hidden rounded-lg">
                        <img src="{{ asset('images/gedung-lanri.png') }}"
                             alt="Gedung LAN RI"
                             class="h-32 w-full object-cover object-center opacity-90">
                    </div>
                </div>
            </div>
        </div>

        {{-- TOMBOL AKSI --}}
        <div class="mt-6 flex items-center justify-end gap-3 animate-fade-up delay-400">
            <a href="{{ route('admin.peserta') }}"
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                </svg>
                Simpan Peserta
            </button>
        </div>
    </form>

@endsection

@push('scripts')
<script>
    function togglePenilai() {
        const jenis = document.getElementById('selectJenis').value;
        const sectionPenugasan = document.getElementById('sectionPenugasan');
        const sectionTertulis = document.getElementById('sectionTertulis');
        const pt1 = document.getElementById('pt1');
        const pw1 = document.getElementById('pw1');
        const pw2 = document.getElementById('pw2');

        if (jenis === '') {
            sectionPenugasan.classList.add('hidden');
            sectionTertulis.classList.add('hidden');
            if (pw1) pw1.required = false;
            if (pw2) pw2.required = false;
            if (pt1) pt1.required = false;
        } else if (jenis === 'kenaikan_jenjang') {
            sectionPenugasan.classList.remove('hidden');
            sectionTertulis.classList.add('hidden');
            if (pw1) pw1.required = true;
            if (pw2) pw2.required = true;
            if (pt1) pt1.required = false;
        } else if (jenis === 'perpindahan_jabatan') {
            sectionPenugasan.classList.remove('hidden');
            sectionTertulis.classList.remove('hidden');
            if (pw1) pw1.required = true;
            if (pw2) pw2.required = true;
            if (pt1) pt1.required = true;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        togglePenilai();

        const inputNama = document.getElementById('inputNama');
        const inputJabatan = document.getElementById('inputJabatan');
        const selectJenis = document.getElementById('selectJenis');
        const selectStatus = document.querySelector('select[name="status"]');

        const ringkasanNama = document.getElementById('ringkasanNama');
        const ringkasanJabatan = document.getElementById('ringkasanJabatan');
        const ringkasanJenis = document.getElementById('ringkasanJenis');
        const ringkasanStatus = document.getElementById('ringkasanStatus');

        function updateRingkasan() {
            ringkasanNama.textContent = inputNama.value || '-';
            ringkasanJabatan.textContent = inputJabatan.value || '-';

            const jenisLabel = {
                'kenaikan_jenjang': 'Kenaikan Jenjang',
                'perpindahan_jabatan': 'Perpindahan Jabatan'
            };
            ringkasanJenis.textContent = jenisLabel[selectJenis.value] || '-';

            const statusLabel = {
                'belum_dinilai': 'Belum Dinilai',
                'sedang_dinilai': 'Sedang Dinilai',
                'selesai': 'Selesai'
            };
            ringkasanStatus.textContent = statusLabel[selectStatus.value] || '-';
        }

        inputNama.addEventListener('input', updateRingkasan);
        inputJabatan.addEventListener('input', updateRingkasan);
        selectJenis.addEventListener('change', updateRingkasan);
        selectStatus.addEventListener('change', updateRingkasan);

        updateRingkasan();
    });
</script>
@endpush