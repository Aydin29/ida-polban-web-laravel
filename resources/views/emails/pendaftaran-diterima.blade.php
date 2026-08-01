<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Diterima</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f5f5f5; }
        .email-wrapper { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .header { border-bottom: 3px solid #10b981; padding-bottom: 20px; margin-bottom: 20px; }
        .header h2 { color: #10b981; margin: 0; }
        .content { margin: 20px 0; }
        .info-box { background: #f0fdf4; border-left: 4px solid #10b981; padding: 15px; margin: 15px 0; border-radius: 4px; }
        .footer { border-top: 1px solid #e5e7eb; padding-top: 20px; margin-top: 30px; text-align: center; font-size: 12px; color: #6b7280; }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-wrapper">
            <div class="header">
                <h2>🎉 Selamat! Pendaftaran Anda Diterima</h2>
            </div>
            <div class="content">
                <p>Halo <strong>{{ $pendaftaran->nama_lengkap }}</strong>,</p>
                <p>Selamat, pendaftaran Anda sebagai anggota IDAKOM POLBAN telah diterima.</p>
                <div class="info-box">
                    <p><strong>Periode:</strong> {{ $periode }}</p>
                    <p><strong>Status:</strong> Diterima</p>
                </div>
                <p>Tim IDAKOM POLBAN akan segera menghubungi Anda lebih lanjut melalui kontak yang telah Anda daftarkan.</p>
                <p>Terima kasih telah bergabung dan semoga harimu menyenangkan.</p>
            </div>
            <div class="footer">
                <p>&copy; Managed By 2023 IDAKOM POLBAN. Email ini dikirim otomatis.</p>
            </div>
        </div>
    </div>
</body>
</html>
