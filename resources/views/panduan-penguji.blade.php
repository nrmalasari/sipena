@extends('layouts.app')

@section('title', 'Pedoman Penguji - LAN RI')

@section('content')

    {{-- HEADER --}}
    <div class="mb-3 animate-fade-up">
        <nav class="flex items-center gap-2 text-xs text-gray-500">
            <span class="text-gray-700 font-medium">Pedoman Penguji</span>
        </nav>
    </div>

    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between animate-fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Pedoman Penguji</h1>
            <p class="mt-1 text-sm text-gray-500">
                Materi Penyamaan Persepsi Penguji Uji Kompetensi JFAK — Pusjar SKMP, 6 & 7 Oktober 2026.
            </p>
        </div>
        <a href="{{ asset('pedoman/pedoman-penguji-jfak.pdf') }}"
           download="Pedoman-Penguji-JFAK.pdf"
           target="_blank"
           class="flex items-center gap-2 self-start rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-md shadow-red-600/30 transition hover:bg-red-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Download PDF
        </a>
    </div>

    {{-- KONTEN PEDOMAN --}}
    <div class="space-y-4 animate-fade-up delay-100">

        {{-- Section 1: Dasar Hukum --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">1</div>
                <h2 class="text-base font-bold text-gray-800">Dasar Hukum JFAK</h2>
            </div>
            <ol class="space-y-2 text-sm text-gray-700 list-decimal list-inside">
                <li>UU No. 20 Th. 2023 tentang Aparatur Sipil Negara</li>
                <li>PerMenPAN dan RB Nomor 1 tahun 2023 tentang Jabatan Fungsional</li>
                <li>Peraturan BKN No. 3 Tahun 2023 tentang Angka Kredit, Kenaikan Pangkat dan Jenjang Jabatan Fungsional</li>
                <li>PerMenPAN dan RB Nomor 18 tahun 2024 tentang Jabatan Fungsional di Bidang Pengembangan Kapasitas dan Pembelajaran ASN</li>
                <li>Perkalan No. 31 Tahun 2014 tentang Standar Kompetensi JFAK</li>
                <li>Perkalan No. 32 Tahun 2014 tentang Pedoman Penyusunan Formasi JFAK</li>
                <li>Perkalan No. 33 Tahun 2015 tentang Pedoman Penyelenggaraan Pelatihan JFAK</li>
                <li>Peraturan LAN No. 28 Tahun 2017 tentang Pedoman Penulisan KTI bagi Analis Kebijakan</li>
                <li>Peraturan LAN No. 5 Tahun 2024 tentang Akreditasi Penyelenggaraan Uji Kompetensi JF Analis Kebijakan</li>
                <li>Peraturan LAN Nomor 1 Tahun 2026 tentang Uji Kompetensi Jabatan Fungsional di Bidang Pengembangan Kapasitas dan Pembelajaran ASN</li>
                <li>Peraturan LAN Nomor 2 Tahun 2026 tentang Perubahan Atas Peraturan LAN Nomor 1 Tahun 2026 tentang Uji Kompetensi JF Bidang PKP ASN</li>
                <li>Keputusan Kepala LAN Nomor 441/K.1/HKM.02.2/2026 tentang Pedoman Tata Cara Substitusi Sertifikat Kompetensi LSP dengan Uji Kompetensi JF di Bidang PKP ASN</li>
                <li>Keputusan Kepala LAN Nomor 483/K.1/HKM.02.2/2026 tentang Standar Kualitas Hasil Kerja dan Pedoman Penilaian Kualitas Hasil Kerja Pejabat Fungsional Bidang PKP ASN</li>
            </ol>
        </div>

        {{-- Section 2: Tugas dan Ruang Lingkup JFAK --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">2</div>
                <h2 class="text-base font-bold text-gray-800">Tugas dan Ruang Lingkup JFAK</h2>
            </div>
            <p class="text-sm text-gray-700 italic mb-3">
                "Melaksanakan kegiatan analisis dan advokasi kebijakan pada seluruh tahapan kebijakan"
            </p>
            <p class="text-sm text-gray-700 mb-3">
                Tugas dilaksanakan berdasarkan ruang lingkup kegiatan yang meliputi <strong>agenda setting</strong>,
                <strong>formulasi</strong>, <strong>implementasi</strong>, dan <strong>evaluasi kebijakan</strong>.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Ahli Pertama</p>
                    <p class="text-[11px] text-gray-700">Kompleksitas <strong>rendah</strong></p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Ahli Muda</p>
                    <p class="text-[11px] text-gray-700">Kompleksitas <strong>sedang</strong></p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Ahli Madya</p>
                    <p class="text-[11px] text-gray-700">Kompleksitas <strong>tinggi</strong></p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Ahli Utama</p>
                    <p class="text-[11px] text-gray-700">Kompleksitas <strong>sangat tinggi</strong></p>
                </div>
            </div>
        </div>

        {{-- Section 3: Kompleksitas Hasil Kerja --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">3</div>
                <h2 class="text-base font-bold text-gray-800">Kompleksitas Hasil Kerja</h2>
            </div>
            <p class="text-xs text-gray-600 mb-3">Kompleksitas hasil kerja dapat dilihat dari:</p>
            <ul class="space-y-2 text-sm text-gray-700">
                <li><strong>1. Masalah</strong> — Tingkat kesulitan, urgensi, dan dampak masalah yang dihadapi.</li>
                <li><strong>2. Lingkungan</strong> — Kondisi eksternal yang mempengaruhi, termasuk dinamika sosial, ekonomi, politik, dan regulasi.</li>
                <li><strong>3. Aktor</strong> — Jumlah, peran, kepentingan, dan pengaruh para pihak yang terlibat dalam isu yang dihadapi.</li>
                <li><strong>4. Metodologi</strong> — Pendekatan, alat, dan/atau kerangka analisis yang digunakan untuk menjawab masalah.</li>
                <li><strong>5. Data dan Bukti yang Digunakan</strong> — Ketersediaan, kualitas, keandalan, dan keberagaman data serta bukti yang digunakan.</li>
            </ul>
            <p class="mt-3 text-xs italic text-gray-600">
                Semakin tinggi tingkat kompleksitas, semakin besar nilai dan dampak hasil kerja.
            </p>
        </div>

        {{-- Section 4: Peran JFAK dalam Tahapan Kebijakan --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">4</div>
                <h2 class="text-base font-bold text-gray-800">Peran JFAK dalam Tahapan Kebijakan</h2>
            </div>
            <p class="text-sm text-gray-700 mb-3">
                Analisis kebijakan tidak hanya dilakukan pada tahap formulasi kebijakan. Peran analisis kebijakan
                muncul di setiap tahap siklus kebijakan:
            </p>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>Identifikasi masalah — penyediaan informasi valid tentang masalah</li>
                <li>Formulasi kebijakan — penyusunan alternatif untuk penyelesaian masalah</li>
                <li>Implementasi kebijakan — penyediaan informasi status pelaksanaan kebijakan dan permasalahannya</li>
                <li>Evaluasi kebijakan — capaian kebijakan terkait aspek evaluatif</li>
            </ul>
        </div>

        {{-- Section 5: Tugas Lain dari JFAK --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">5</div>
                <h2 class="text-base font-bold text-gray-800">Tugas Lain dari JFAK: Advokasi Kebijakan</h2>
            </div>
            <p class="text-sm text-gray-700 font-semibold mb-2">
                Tindakan mempengaruhi atau mendukung sesuatu atau seseorang yang berkaitan dengan kebijakan publik
                seperti regulasi dan kebijakan pemerintah.
            </p>
            <div class="rounded-lg bg-amber-50 border-l-4 border-amber-400 p-4">
                <p class="text-xs text-gray-700 italic">
                    "Advokasi kebijakan adalah proses dialog persuasif, negosiasi dan mediasi kepada para pemimpin,
                    pembuat kebijakan dan para pemangku kepentingan agar bisa menerima gagasan, konsep, rekomendasi
                    ataupun rancangan-rancangan kebijakan, agar selanjutnya pemimpin atau pengambil kebijakan
                    mengambil keputusan untuk tindaklanjutnya."
                </p>
            </div>
        </div>

        {{-- Section 6: Kompetensi Analis Kebijakan --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">6</div>
                <h2 class="text-base font-bold text-gray-800">Kompetensi Analis Kebijakan</h2>
            </div>
            <p class="text-xs text-gray-500 mb-3">Berdasarkan Perkalan No. 31 Tahun 2014 tentang Standar Kompetensi JFAK</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Kemampuan Analisis --}}
                <div class="rounded-lg border border-blue-200 bg-blue-50/50 p-4">
                    <p class="text-sm font-bold text-blue-800 mb-2">Kemampuan Analisis</p>
                    <p class="text-xs font-semibold text-gray-700 mb-1">Kompetensi Inti</p>
                    <ul class="text-xs text-gray-700 list-decimal list-inside mb-2">
                        <li>Pengetahuan tentang substansi kebijakan Publik</li>
                        <li>Metode riset</li>
                        <li>Teknik dan Analisis kebijakan</li>
                        <li>Kemampuan menulis dan publikasi</li>
                        <li>Pengetahuan tentang Bidang Pekerjaan</li>
                    </ul>
                    <p class="text-xs font-semibold text-gray-700 mb-1">Kompetensi Spesialis</p>
                    <ul class="text-xs text-gray-700 list-decimal list-inside">
                        <li>Penyusunan Saran Kebijakan</li>
                    </ul>
                </div>

                {{-- Kemampuan Politis --}}
                <div class="rounded-lg border border-green-200 bg-green-50/50 p-4">
                    <p class="text-sm font-bold text-green-800 mb-2">Kemampuan Politis</p>
                    <p class="text-xs font-semibold text-gray-700 mb-1">Kompetensi Inti</p>
                    <ul class="text-xs text-gray-700 list-decimal list-inside mb-2">
                        <li>Konteks Politik (dinamika politik dan budaya birokrasi)</li>
                        <li>Regulasi dan Legislasi</li>
                        <li>Komunikasi</li>
                        <li>Membangun jejaring (Networking)</li>
                        <li>Presentasi</li>
                    </ul>
                    <p class="text-xs font-semibold text-gray-700 mb-1">Kompetensi Spesialis</p>
                    <ul class="text-xs text-gray-700 list-decimal list-inside">
                        <li>Konsultasi Publik</li>
                        <li>Partnership</li>
                    </ul>
                </div>

                {{-- Kompetensi Dasar --}}
                <div class="rounded-lg border border-amber-200 bg-amber-50/50 p-4 md:col-span-2">
                    <p class="text-sm font-bold text-amber-800 mb-2">Kompetensi Dasar</p>
                    <ul class="text-xs text-gray-700 list-decimal list-inside">
                        <li>Manajemen Diri</li>
                        <li>Membangun Tim</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Section 7: Alur Uji Kompetensi JFAK --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">7</div>
                <h2 class="text-base font-bold text-gray-800">Alur Uji Kompetensi JFAK</h2>
            </div>
            <ol class="space-y-2 text-sm text-gray-700 list-decimal list-inside">
                <li>Seleksi Internal Kementerian/Lembaga/Pemda (Pengajuan Calon ke Atasan, Persetujuan Atasan, Verifikasi Internal)</li>
                <li>Pengiriman Surat Usulan Calon AK ke LAN oleh PIC bagian kepegawaian instansi pengusul, ke tautan <strong>s.id/DataUsulanUjikomJFAK</strong></li>
                <li>Seleksi Administrasi (Verifikasi Data Usulan dan Kelengkapan Berkas Administratif) oleh LAN</li>
                <li>Perpindahan Jabatan, Kenaikan Jenjang, Promosi</li>
                <li>Uji Kompetensi</li>
                <li>Sidang Kelulusan Uji Kompetensi</li>
                <li>Pengiriman Surat Rekomendasi atau Tidak Direkomendasikan</li>
                <li>Pengangkatan AK oleh Kementerian/Lembaga/Pemda</li>
            </ol>
            <div class="mt-3 rounded-lg bg-yellow-50 border border-yellow-200 p-3">
                <p class="text-xs text-gray-700">
                    <strong>Catatan:</strong> Recruitmen CPNS sejak 2017 dapat diangkat tanpa melalui Pelatihan CAK dan Ujikom.
                </p>
            </div>
        </div>

        {{-- Section 8: Prinsip Penyelenggaraan Uji Kompetensi --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">8</div>
                <h2 class="text-base font-bold text-gray-800">Prinsip Penyelenggaraan Uji Kompetensi</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Objektif</p>
                    <p class="text-[11px] text-gray-700">Dilakukan secara benar, jelas, dan menilai kompetensi sesuai dengan kondisi yang sebenarnya.</p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Adil</p>
                    <p class="text-[11px] text-gray-700">Dilakukan dengan tidak diskriminatif dan sesuai dengan prosedur.</p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Transparan</p>
                    <p class="text-[11px] text-gray-700">Dilakukan secara terbuka dan dapat diakses oleh pihak terkait.</p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3">
                    <p class="text-xs font-bold text-blue-800 mb-1">Akuntabel</p>
                    <p class="text-[11px] text-gray-700">Dilakukan dengan baik sesuai dengan peraturan perundang-undangan dan dapat dipertanggungjawabkan.</p>
                </div>
            </div>
        </div>

        {{-- Section 9: Rencana Pelaksanaan --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">9</div>
                <h2 class="text-base font-bold text-gray-800">Rencana Pelaksanaan</h2>
            </div>
            <p class="text-sm text-gray-700 mb-3">
                UP STANKOM dilaksanakan pada <strong>Selasa s.d. Kamis, 6 & 7 Oktober 2026</strong>, bertempat di
                <strong>Kantor LAN RI, Jl. Veteran No. 10 Jakarta Pusat 10110</strong>.
            </p>
            <div class="overflow-x-auto scrollbar-thin">
                <table class="w-full text-xs border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Hari/Tanggal</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Agenda</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Waktu (WITA)</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600">Tempat</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200 font-semibold" rowspan="4">Selasa<br>6 Oktober 2026</td>
                            <td class="px-3 py-2 border-r border-gray-200">Sambutan Kepala Pusjar SKMP</td>
                            <td class="px-3 py-2 border-r border-gray-200">08.00 - 08.30</td>
                            <td class="px-3 py-2" rowspan="4">Ruang Siagian, Lantai 2 Kantor Pusjar SKMP LAN RI</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Pembekalan</td>
                            <td class="px-3 py-2 border-r border-gray-200">08.30 - 09.00</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Uji Kompetensi Tertulis (Bagi Perpindahan Jabatan)</td>
                            <td class="px-3 py-2 border-r border-gray-200">09.00 - 13.00</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Uji Wawancara (Bagi Kenaikan Jenjang)</td>
                            <td class="px-3 py-2 border-r border-gray-200">09.00 - 16.00</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200 font-semibold">Rabu<br>7 Oktober 2026</td>
                            <td class="px-3 py-2 border-r border-gray-200">Uji Kompetensi Wawancara (Bagi seluruh Peserta Hari Kedua)</td>
                            <td class="px-3 py-2 border-r border-gray-200">09.00 - selesai</td>
                            <td class="px-3 py-2">Ruang Prajudi, Lantai 3 Kantor Pusjar SKMP LAN RI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Section 10: Penilaian Uji Kompetensi --}}
        <div class="rounded-xl bg-white p-6 shadow-sm border-2 border-blue-200">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">10</div>
                <h2 class="text-base font-bold text-gray-800">Penilaian Uji Kompetensi</h2>
            </div>

            <p class="text-sm font-bold text-gray-800 mb-2">A. Perpindahan Jabatan — Uji Tertulis & Uji Wawancara</p>
            <div class="overflow-x-auto scrollbar-thin mb-4">
                <table class="w-full text-xs border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Kemampuan</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Jenis Kompetensi</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Elemen Kompetensi</th>
                            <th class="px-3 py-2 text-center font-semibold text-gray-600 border-r border-gray-200">Nilai</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200 font-semibold" rowspan="4">Kemampuan Analisis</td>
                            <td class="px-3 py-2 border-r border-gray-200" rowspan="3">Kompetensi Inti</td>
                            <td class="px-3 py-2 border-r border-gray-200">Pengetahuan tentang substansi Kebijakan Publik</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Metode Riset</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Teknik dan Analisis Kebijakan</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Kompetensi Spesialis</td>
                            <td class="px-3 py-2 border-r border-gray-200">Penyusunan Saran Kebijakan</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200 font-semibold">Kemampuan Politis</td>
                            <td class="px-3 py-2 border-r border-gray-200">Kompetensi Inti</td>
                            <td class="px-3 py-2 border-r border-gray-200">Regulasi dan Legislasi</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-sm font-bold text-gray-800 mb-2 mt-6">B. Kenaikan Jenjang — Uji Wawancara</p>
            <div class="overflow-x-auto scrollbar-thin">
                <table class="w-full text-xs border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Kemampuan</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Jenis Kompetensi</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Elemen Kompetensi</th>
                            <th class="px-3 py-2 text-center font-semibold text-gray-600 border-r border-gray-200">Nilai</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200 font-semibold" rowspan="2">Kemampuan Analisis</td>
                            <td class="px-3 py-2 border-r border-gray-200" rowspan="2">Kompetensi Inti</td>
                            <td class="px-3 py-2 border-r border-gray-200">Pengetahuan tentang Bidang Pekerjaan</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Kemampuan Menulis dan Publikasi</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200 font-semibold" rowspan="7">Kemampuan Politis</td>
                            <td class="px-3 py-2 border-r border-gray-200" rowspan="5">Kompetensi Inti</td>
                            <td class="px-3 py-2 border-r border-gray-200">Konteks Politik (Dinamika Politik dan Budaya Birokrasi)</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Regulasi dan Legislasi</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Komunikasi (CV/wawancara)</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Membangun Jejaring (Networking)</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Presentasi (CV/wawancara)</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200" rowspan="2">Kompetensi Spesialis</td>
                            <td class="px-3 py-2 border-r border-gray-200">Konsultasi Publik (CV/wawancara)</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">Partnership (CV/wawancara)</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200 font-semibold">Kemampuan Analisis dan Politis</td>
                            <td class="px-3 py-2 border-r border-gray-200">Kompetensi Dasar</td>
                            <td class="px-3 py-2 border-r border-gray-200">Manajemen Diri<br>Membangun Tim</td>
                            <td class="px-3 py-2 border-r border-gray-200 text-center text-gray-400">—</td>
                            <td class="px-3 py-2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Section 11: Persyaratan Lulus --}}
        <div class="rounded-xl bg-white p-6 shadow-sm border-2 border-green-200">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-700 font-bold">11</div>
                <h2 class="text-base font-bold text-gray-800">Persyaratan Lulus Uji Kompetensi</h2>
            </div>
            <div class="space-y-3">
                <div class="rounded-lg bg-green-50 border-l-4 border-green-400 p-3">
                    <p class="text-sm text-gray-800">
                        Peserta yang memperoleh nilai Uji Kompetensi <strong>≥ 71,00</strong> dinyatakan <strong>telah memiliki Kompetensi</strong>.
                    </p>
                </div>
                <div class="rounded-lg bg-red-50 border-l-4 border-red-400 p-3">
                    <p class="text-sm text-gray-800">
                        Peserta yang memperoleh nilai Uji Kompetensi <strong>&lt; 71,00</strong> dinyatakan <strong>belum kompeten</strong>.
                    </p>
                </div>
                <div class="rounded-lg bg-yellow-50 border-l-4 border-yellow-400 p-3">
                    <p class="text-sm text-gray-800">
                        Peserta <strong>Perpindahan Jabatan</strong> yang belum kompeten → diberi kesempatan
                        <strong>Uji Kompetensi ulang 1 (satu) kali</strong>.
                    </p>
                </div>
                <div class="rounded-lg bg-yellow-50 border-l-4 border-yellow-400 p-3">
                    <p class="text-sm text-gray-800">
                        Peserta <strong>Kenaikan Jenjang</strong> yang belum kompeten → diberi kesempatan
                        <strong>Uji Kompetensi ulang</strong> sampai batas usia pengusulan Uji Kompetensi.
                    </p>
                </div>
            </div>
        </div>

        {{-- Section 12: Rekomendasi Kelulusan --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">12</div>
                <h2 class="text-base font-bold text-gray-800">Rekomendasi Kelulusan Uji Kompetensi</h2>
            </div>
            <ol class="space-y-2 text-sm text-gray-700 list-decimal list-inside">
                <li>Peserta yang telah memiliki Kompetensi memenuhi persyaratan lulus Uji Kompetensi dan berhak memperoleh <strong>Sertifikat Kompetensi dan surat rekomendasi</strong>.</li>
                <li>Sertifikat Kompetensi berlaku selama <strong>2 (dua) tahun</strong> terhitung sejak tanggal ditetapkan.</li>
                <li>Jangka waktu tersebut dapat <strong>diperpanjang paling lama 1 (satu) tahun</strong> sepanjang memenuhi kriteria:
                    <ul class="list-disc list-inside ml-4 mt-1">
                        <li>Terdapat perubahan struktur organisasi dan tata kerja di lingkungan Instansi Pengguna; atau</li>
                        <li>Terdapat penugasan lain di luar bidang tugas JF Bidang PKP ASN yang akan diduduki.</li>
                    </ul>
                </li>
                <li>Apabila masa perpanjangan habis, maka Sertifikat Kompetensi dinyatakan tidak berlaku dan Peserta diusulkan untuk <strong>Uji Kompetensi ulang</strong>.</li>
            </ol>
        </div>

        {{-- Section 13: Komposisi Peserta --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700 font-bold">13</div>
                <h2 class="text-base font-bold text-gray-800">Komposisi Peserta Berdasarkan Jenjang</h2>
            </div>
            <div class="overflow-x-auto scrollbar-thin">
                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">No</th>
                            <th class="px-3 py-2 text-left font-semibold text-gray-600 border-r border-gray-200">Jenjang Jabatan</th>
                            <th class="px-3 py-2 text-center font-semibold text-gray-600 border-r border-gray-200">Perpindahan</th>
                            <th class="px-3 py-2 text-center font-semibold text-gray-600 border-r border-gray-200">Kenaikan Jenjang</th>
                            <th class="px-3 py-2 text-center font-semibold text-gray-600">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">1</td>
                            <td class="px-3 py-2 border-r border-gray-200">Ahli Madya</td>
                            <td class="px-3 py-2 text-center border-r border-gray-200">3</td>
                            <td class="px-3 py-2 text-center border-r border-gray-200">—</td>
                            <td class="px-3 py-2 text-center font-semibold">3</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">2</td>
                            <td class="px-3 py-2 border-r border-gray-200">Ahli Muda</td>
                            <td class="px-3 py-2 text-center border-r border-gray-200">3</td>
                            <td class="px-3 py-2 text-center border-r border-gray-200">6</td>
                            <td class="px-3 py-2 text-center font-semibold">9</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="px-3 py-2 border-r border-gray-200">3</td>
                            <td class="px-3 py-2 border-r border-gray-200">Ahli Pertama</td>
                            <td class="px-3 py-2 text-center border-r border-gray-200">20</td>
                            <td class="px-3 py-2 text-center border-r border-gray-200">—</td>
                            <td class="px-3 py-2 text-center font-semibold">20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- DOWNLOAD PDF (bawah) --}}
    <div class="mt-6 flex justify-center animate-fade-up delay-200">
        <a href="{{ asset('pedoman/pedoman-penguji-jfak.pdf') }}"
           download="Pedoman-Penguji-JFAK.pdf"
           target="_blank"
           class="flex items-center gap-2 rounded-lg bg-red-600 px-6 py-3 text-sm font-semibold text-white shadow-md shadow-red-600/30 transition hover:bg-red-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Download Pedoman (PDF)
        </a>
    </div>

    {{-- BANTUAN --}}
    <div class="mt-6 rounded-xl bg-blue-50 border border-blue-200 p-5 animate-fade-up delay-200">
        <div class="flex items-start gap-3">
            <svg class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <p class="text-sm font-semibold text-blue-800">Butuh bantuan?</p>
                <p class="text-xs text-blue-700 mt-1">
                    Jika mengalami kendala, silakan hubungi admin penilaian LAN RI — Pusjar SKMP.
                </p>
            </div>
        </div>
    </div>

@endsection