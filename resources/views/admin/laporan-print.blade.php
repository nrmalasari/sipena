<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Penilaian - LAN RI</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #333;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h1 { font-size: 18px; margin-bottom: 4px; }
        .header h2 { font-size: 14px; font-weight: normal; color: #555; }
        .header p { font-size: 11px; color: #777; margin-top: 4px; }

        .filter-info {
            margin-bottom: 15px;
            padding: 8px;
            background: #f5f5f5;
            border-left: 4px solid #2563eb;
            font-size: 10px;
        }
        .filter-info span { margin-right: 20px; }

        .stat-row {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .stat-box {
            flex: 1;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
        }
        .stat-box .label { font-size: 10px; color: #666; margin-bottom: 4px; }
        .stat-box .value { font-size: 18px; font-weight: bold; }
        .stat-box .sub { font-size: 9px; color: #888; margin-top: 2px; }

        table { width: 100%; border-collapse: collapse; }
        th {
            background: #4472c4;
            color: white;
            padding: 8px 6px;
            text-align: left;
            font-size: 10px;
            border: 1px solid #333;
        }
        th.center { text-align: center; }
        td {
            padding: 6px;
            border: 1px solid #ccc;
            font-size: 10px;
        }
        td.center { text-align: center; }
        tbody tr:nth-child(even) { background: #f9f9f9; }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
        .footer .signature {
            margin-top: 60px;
            display: inline-block;
            text-align: center;
            min-width: 200px;
        }
        .footer .signature .line {
            border-top: 1px solid #333;
            margin-top: 50px;
            padding-top: 4px;
        }

        @media print {
            body { padding: 10px; }
            .no-print { display: none !important; }
            @page { size: A4 landscape; margin: 10mm; }
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="header">
        <h1>LAPORAN HASIL PENILAIAN</h1>
        <h2>Lembaga Administrasi Negara Republik Indonesia (LAN RI)</h2>
        <p>Makarti Bhakti Nagari</p>
    </div>

    {{-- FILTER INFO (tanpa periode) --}}
    @if (($filterJenis ?? null) || ($filterStatus ?? null) || ($filterSearch ?? null))
        <div class="filter-info">
            <strong>Filter:</strong>
            @if (!empty($filterJenis))
                <span>Jenis: {{ $filterJenis === 'kenaikan_jenjang' ? 'Kenaikan Jenjang' : 'Perpindahan Jabatan' }}</span>
            @endif
            @if (!empty($filterStatus))
                <span>Status: {{ $filterStatus === 'lulus' ? 'Lulus' : 'Tidak Lulus' }}</span>
            @endif
            @if (!empty($filterSearch))
                <span>Pencarian: "{{ $filterSearch }}"</span>
            @endif
        </div>
    @endif

    {{-- STAT --}}
    <div class="stat-row">
        <div class="stat-box">
            <div class="label">TOTAL PESERTA</div>
            <div class="value">{{ count($dataLaporan) }}</div>
            <div class="sub">peserta</div>
        </div>
        <div class="stat-box">
            <div class="label">LULUS</div>
            <div class="value">{{ $jumlahLulus }}</div>
            <div class="sub">{{ count($dataLaporan) > 0 ? round(($jumlahLulus / count($dataLaporan)) * 100) : 0 }}%</div>
        </div>
        <div class="stat-box">
            <div class="label">TIDAK LULUS</div>
            <div class="value">{{ $jumlahTidakLulus }}</div>
            <div class="sub">{{ count($dataLaporan) > 0 ? round(($jumlahTidakLulus / count($dataLaporan)) * 100) : 0 }}%</div>
        </div>
        <div class="stat-box">
            <div class="label">RATA-RATA NILAI</div>
            <div class="value">{{ number_format($rataRata, 2, ',', '.') }}</div>
            <div class="sub">skala 100</div>
        </div>
    </div>

    {{-- TABEL --}}
    <table>
        <thead>
            <tr>
                <th class="center" style="width: 30px;">No</th>
                <th style="width: 180px;">Nama Peserta</th>
                <th style="width: 140px;">NIP</th>
                <th style="width: 160px;">Jabatan</th>
                <th style="width: 160px;">Instansi</th>
                <th style="width: 130px;">Jenis Seleksi</th>
                <th class="center" style="width: 70px;">Nilai Akhir</th>
                <th class="center" style="width: 80px;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataLaporan as $i => $d)
                @php $p = $d['peserta']; @endphp
                <tr>
                    <td class="center">{{ $i + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->nip ?? '-' }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>{{ $p->instansi }}</td>
                    <td>{{ $p->label_jenis_penilaian }}</td>
                    <td class="center" style="font-weight:bold;">
                        {{ number_format($d['nilai_akhir'], 2, ',', '.') }}
                    </td>
                    <td class="center">
                        {{ $d['lulus'] ? 'LULUS' : 'TIDAK LULUS' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="center" style="padding: 20px;">
                        Tidak ada data
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        <p>Dicetak pada: {{ now()->translatedFormat('d F Y, H:i') }} WIB</p>

        <div class="signature">
            <p>Jakarta, {{ now()->translatedFormat('d F Y') }}</p>
            <p>Mengetahui,</p>
            <div class="line">Admin LAN RI</div>
        </div>
    </div>

    {{-- TOMBOL (tidak muncul saat print) --}}
    <div class="no-print" style="position: fixed; top: 10px; right: 10px;">
        <button onclick="window.print()"
                style="background:#2563eb;color:white;border:none;padding:10px 20px;border-radius:6px;cursor:pointer;font-weight:bold;">
            🖨️ Cetak / Simpan PDF
        </button>
        <button onclick="window.close()"
                style="background:#6b7280;color:white;border:none;padding:10px 20px;border-radius:6px;cursor:pointer;font-weight:bold;margin-left:8px;">
            Tutup
        </button>
    </div>

</body>
</html>