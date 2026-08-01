<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Anggota{{ $periode ? ' Periode '.$periode : '' }}{{ $angkatan ? ' Angkatan '.$angkatan : '' }}</title>
    <style>
        @page {
            size: A4 {{ $isLandscape ? 'landscape' : 'portrait' }};
            margin: 20mm;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .page {
            padding: 20px;
        }
        .header {
            position: relative;
            min-height: 90px;
            margin-bottom: 24px;
            border-bottom: 3px solid #10b981;
            padding-bottom: 12px;
        }
        .header-logo {
            position: absolute;
            left: 24px;
            top: 0;
            width: 100px;
        }
        .header-logo img {
            width: 100%;
            height: auto;
            display: block;
        }
        .header-text {
            margin-left: 140px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .header-title {
            margin: 0 0 5px;
            font-size: 18px;
            color: #065f46;
            font-weight: 700;
        }
        .header-subtitle {
            margin: 0 0 4px;
            font-size: 14px;
            color: #333;
            font-weight: 600;
        }
        .header p {
            margin: 0;
            font-size: 11px;
            color: #666;
        }
        table {
            width: {{ $isLandscape ? 'calc(100% + 20px)' : '100%' }};
            margin-left: {{ $isLandscape ? '-10px' : '0' }};
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: auto;
            overflow-wrap: normal;
            word-break: normal;
        }
        table thead th,
        table tbody td {
            white-space: normal;
            overflow-wrap: normal;
            word-break: normal;
        }
        table thead th {
            background: #10b981;
            color: white;
            padding: 12px 10px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            border: 1px solid #d1d5db;
            vertical-align: middle;
            line-height: 1.3;
        }
        table tbody td {
            padding: 10px 10px;
            border: 1px solid #e5e7eb;
            font-size: 10px;
            vertical-align: top;
            line-height: 1.35;
        }
        .col-no {
            width: 30px;
            text-align: center;
        }
        .col-name {
            width: 15%;
        }
        .col-nickname {
            width: 11%;
        }
        .col-jabatan {
            width: 11%;
        }
        .col-divisi {
            width: 10%;
        }
        .col-prodi {
            width: 13%;
        }
        .col-alamat {
            width: 18%;
        }
        .col-sekolah {
            width: 11%;
        }
        .col-hp {
            width: 10%;
            white-space: nowrap;
        }
        @if(! $showJabatanDivisi)
        .col-name { width: 20%; }
        .col-nickname { width: 14%; }
        .col-prodi { width: 22%; }
        .col-alamat { width: 22%; }
        .col-sekolah { width: 12%; }
        .col-hp { width: 10%; }
        @endif
        table tbody tr:nth-child(even) {
            background: #f8fafc;
        }
        table tbody tr:hover {
            background: #dcfce7;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            font-size: 10px;
            color: #9ca3af;
        }
        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
        }
        .badge-internal {
            background: #d1fae5;
            color: #065f46;
        }
        .badge-eksternal {
            background: #dbeafe;
            color: #1e40af;
        }
        .badge-pimpinan {
            background: #fef3c7;
            color: #92400e;
        }
        .badge-sekretaris {
            background: #ede9fe;
            color: #5b21b6;
        }
        .badge-bendahara {
            background: #fce7f3;
            color: #9d174d;
        }
        .page-break {
            page-break-after: always;
        }
        .summary {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
            gap: 10px;
        }
        .summary-item {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }
        .summary-item .number {
            font-size: 18px;
            font-weight: 700;
            color: #10b981;
        }
        .summary-item .label {
            font-size: 10px;
            color: #6b7280;
            margin-top: 2px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-logo">
            <img src="{{ public_path('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN">
        </div>
        <div class="header-text">
            <h1 class="header-title">IKA DARMA AYU KOMISARIAT POLBAN</h1>
            <h2 class="header-subtitle">Rekap Data Anggota</h2>
            @if($periode)
                <p>Periode: <strong>{{ $periode }}</strong></p>
            @endif
            @if($angkatan)
                <p>Tahun Angkatan Masuk: <strong>{{ $angkatan }}</strong></p>
            @endif
            <p>Dicetak pada: {{ now()->format('d M Y H:i') }}</p>
        </div>
    </div>

    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">
            <div class="number">{{ $anggotas->count() }}</div>
            <div class="label">Total Anggota</div>
        </div>
        <div class="summary-item">
            <div class="number">{{ $anggotas->where('jabatan', 'LIKE', '%Ketua%')->count() }}</div>
            <div class="label">Ketua</div>
        </div>
        <div class="summary-item">
            <div class="number">{{ $anggotas->where('jabatan', 'LIKE', '%Sekretaris%')->count() }}</div>
            <div class="label">Sekretaris</div>
        </div>
        <div class="summary-item">
            <div class="number">{{ $anggotas->where('jabatan', 'LIKE', '%Bendahara%')->count() }}</div>
            <div class="label">Bendahara</div>
        </div>
        <div class="summary-item">
            <div class="number">{{ $anggotas->where('jabatan', 'LIKE', '%Anggota%')->count() }}</div>
            <div class="label">Anggota</div>
        </div>
    </div>

    <!-- Table Data -->
    <table>
        <thead>
            <tr>
                <th class="col-no">No</th>
                <th class="col-name">Nama Lengkap</th>
                <th class="col-nickname">Nama Panggilan</th>
                @if($showJabatanDivisi)
                    <th class="col-jabatan">Jabatan</th>
                    <th class="col-divisi">Divisi</th>
                @endif
                <th class="col-prodi">Program Studi</th>
                <th class="col-alamat">Alamat Rumah</th>
                <th class="col-sekolah">Asal Sekolah</th>
                <th class="col-hp">No. HP</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggotas as $index => $anggota)
                <tr>
                    <td style="text-align:center;">{{ $index + 1 }}</td>
                    <td><strong>{{ $anggota->nama_lengkap }}</strong></td>
                    <td>{{ $anggota->nama_panggilan ?: '-' }}</td>
                    @if($showJabatanDivisi)
                        <td>{{ $anggota->jabatan ?: '-' }}</td>
                        <td>
                            @php
                                $badgeClass = 'badge-internal';
                                if (str_contains($anggota->divisi ?? '', 'Pimpinan')) $badgeClass = 'badge-pimpinan';
                                elseif (str_contains($anggota->divisi ?? '', 'Sekretaris')) $badgeClass = 'badge-sekretaris';
                                elseif (str_contains($anggota->divisi ?? '', 'Bendahara')) $badgeClass = 'badge-bendahara';
                                elseif (str_contains($anggota->divisi ?? '', 'Eksternal')) $badgeClass = 'badge-eksternal';
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ $anggota->divisi ?: '-' }}</span>
                        </td>
                    @endif
                    <td>{{ $anggota->program_studi ?: '-' }}</td>
                    <td>{{ $anggota->alamat_rumah ?: '-' }}</td>
                    <td>{{ $anggota->asal_sekolah ?: '-' }}</td>
                    <td>{{ $anggota->nomor_hp ?: '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align:center;padding:30px;color:#9ca3af;">
                        Tidak ada data anggota{{ $periode ? ' untuk periode '.$periode : '' }}{{ $angkatan ? ' angkatan '.$angkatan : '' }}.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($anggotas->count() > 0)
        <div style="margin-top:30px;padding:15px;border:1px solid #e5e7eb;border-radius:8px;font-size:10px;color:#6b7280;">
            <p style="margin:0 0 4px;"><strong>Keterangan:</strong></p>
            <p style="margin:0;">Data ini dicetak secara otomatis dari sistem IDAKOM POLBAN. Jumlah anggota: {{ $anggotas->count() }} orang.</p>
        </div>
    @endif
    <div class="footer">
        <p>&copy; Created By 2023 IDAKOM POLBAN - Dokumen ini dicetak otomatis dari sistem.</p>
    </div>
</body>
</html>
