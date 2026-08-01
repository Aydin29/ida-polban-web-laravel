<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .email-wrapper {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 3px solid #10b981;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .header h2 {
            color: #10b981;
            margin: 0;
        }
        .content {
            margin: 20px 0;
        }
        .info-box {
            background: #f0fdf4;
            border-left: 4px solid #10b981;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }
        .info-box label {
            font-weight: bold;
            color: #065f46;
            display: block;
            margin-bottom: 5px;
        }
        .info-box p {
            margin: 0;
            color: #1f2937;
        }
        .action-box {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .action-button {
            display: inline-block;
            background: #10b981;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .footer {
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-wrapper">
            <div class="header">
                <h2>📋 Pendaftaran Anggota Baru</h2>
            </div>

            <div class="content">
                <p>Halo Admin,</p>
                <p>Ada pendaftaran anggota baru di Organisasi POLBAN. Silahkan lihat detail di bawah:</p>

                <div class="info-box">
                    <label>Nama Lengkap</label>
                    <p>{{ $pendaftaran->nama_lengkap }}</p>
                </div>

                <div class="info-box">
                    <label>Nama Panggilan</label>
                    <p>{{ $pendaftaran->nama_panggilan }}</p>
                </div>

                <div class="info-box">
                    <label>Tempat Lahir</label>
                    <p>{{ $pendaftaran->tempat_lahir }}</p>
                </div>

                <div class="info-box">
                    <label>Tanggal Lahir</label>
                    <p>{{ $pendaftaran->tanggal_lahir ? $pendaftaran->tanggal_lahir->format('d M Y') : '-' }}</p>
                </div>

                <div class="info-box">
                    <label>Nomor HP</label>
                    <p>{{ $pendaftaran->nomor_hp }}</p>
                </div>

                <div class="info-box">
                    <label>Instagram</label>
                    <p>{{ $pendaftaran->instagram }}</p>
                </div>

                <div class="info-box">
                    <label>Asal Sekolah</label>
                    <p>{{ $pendaftaran->asal_sekolah }}</p>
                </div>

                <div class="info-box">
                    <label>Jurusan</label>
                    <p>{{ $pendaftaran->jurusan }}</p>
                </div>

<div class="info-box">
                    <label>Program Studi</label>
                    <p>{{ $pendaftaran->program_studi }}</p>
                </div>

                <div class="info-box">
                    <label>Angkatan</label>
                    <p>{{ $pendaftaran->angkatan ?: '-' }}</p>
                </div>

                <div class="info-box">
                    <label>Alamat Rumah</label>
                    <p>{{ $pendaftaran->alamat_rumah ?: '-' }}</p>
                </div>

                <div class="info-box">
                    <label>Tanggal Pendaftaran</label>
                    <p>{{ $pendaftaran->created_at->format('d M Y H:i') }}</p>
                </div>

                @if($pendaftaran->bukti_file)
                    <div class="info-box" style="border-left-color:#8b5cf6;">
                        <label>Bukti File Penerimaan</label>
                        <p>
                            <a href="{{ asset('storage/' . $pendaftaran->bukti_file) }}" target="_blank" style="color:#10b981;font-weight:600;">
                                📎 Lihat / Download Bukti File
                            </a>
                        </p>
                        <p style="font-size:11px;color:#6b7280;margin-top:4px;">{{ basename($pendaftaran->bukti_file) }}</p>
                    </div>
                @endif

                <div class="action-box">
                    <p>Silahkan buka dashboard admin untuk melihat detail lengkap dan melakukan verifikasi.</p>
                    <a href="{{ route('admin.pendaftaran.index') }}" class="action-button">Lihat di Dashboard</a>
                </div>
            </div>

            <div class="footer">
                <p>&copy; Created By 2023 IDAKOM POLBAN. Email ini dikirim otomatis.</p>
            </div>
        </div>
    </div>
</body>
</html>
