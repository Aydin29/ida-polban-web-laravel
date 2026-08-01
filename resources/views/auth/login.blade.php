<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - IDAKOM POLBAN</title>
    <link rel="icon" type="image/png" href="{{ asset('LOGOIDAHD.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(16, 185, 129, 0.12), transparent 28%),
                radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.08), transparent 24%),
                #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
            position: relative;
            overflow: hidden;
        }

        /* Background decorative elements */
        body::before {
            content: '';
            position: absolute;
            top: -150px;
            right: -150px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Floating shapes */
        .shape {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.4;
        }

        .shape-1 {
            width: 72px;
            height: 72px;
            background: rgba(16, 185, 129, 0.22);
            top: 12%;
            left: 8%;
            animation: float 6s ease-in-out infinite;
        }

        .shape-2 {
            width: 52px;
            height: 52px;
            background: rgba(59, 130, 246, 0.16);
            bottom: 14%;
            right: 10%;
            animation: float 8s ease-in-out infinite;
        }

        .shape-3 {
            width: 30px;
            height: 30px;
            background: rgba(245, 158, 11, 0.18);
            top: 36%;
            right: 22%;
            animation: float 5s ease-in-out infinite 1s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        .login-container {
            display: flex;
            width: 100%;
            max-width: 880px;
            background: #ffffff;
            border-radius: 22px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
            overflow: hidden;
            position: relative;
            z-index: 1;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left Panel - Branding */
        .brand-panel {
            width: 40%;
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            padding: 44px 34px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .brand-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(ellipse at 20% 50%, rgba(255,255,255,0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(255,255,255,0.06) 0%, transparent 50%);
            pointer-events: none;
        }

        .brand-panel .brand-icon {
            width: 110px;
            height: 110px;
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(10px);
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            padding: 14px;
        }

        .brand-panel .brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .brand-panel h2 {
            color: #fff;
            font-size: 23px;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            line-height: 1.3;
        }

        .brand-panel h2 span {
            color: #fde68a;
        }

        .brand-panel p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            line-height: 1.6;
            position: relative;
        }

        .brand-panel .features {
            margin-top: 28px;
            position: relative;
        }

        .brand-panel .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
        }

        .brand-panel .feature-item i {
            width: 28px;
            height: 28px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            flex-shrink: 0;
        }

        /* Right Panel - Form */
        .form-panel {
            width: 60%;
            padding: 44px 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-panel .form-header {
            margin-bottom: 28px;
        }

        .form-panel .form-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
        }

        .form-panel .form-header h1 i {
            color: #10b981;
            margin-right: 8px;
        }

        .form-panel .form-header p {
            color: #6b7280;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .form-group label i {
            color: #10b981;
            margin-right: 6px;
            width: 16px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            color: #111827;
            background: #f9fafb;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-wrapper input:focus {
            border-color: #10b981;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-wrapper input::placeholder {
            color: #9ca3af;
        }

        .input-wrapper .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .input-wrapper:focus-within .input-icon {
            color: #10b981;
        }

        .input-wrapper .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s ease;
            background: none;
            border: none;
            padding: 4px;
        }

        .input-wrapper .toggle-password:hover {
            color: #374151;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #059669, #10b981);
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.35);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .form-footer {
            text-align: center;
            margin-top: 22px;
        }

        .form-footer a {
            color: #6b7280;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #10b981;
        }

        .form-footer a i {
            margin-right: 6px;
        }

        .watermark {
            position: fixed;
            left: 50%;
            bottom: 16px;
            transform: translateX(-50%);
            z-index: 0;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.4px;
            color: rgba(75, 85, 99, 0.55);
            background: rgba(255, 255, 255, 0.55);
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 999px;
            padding: 8px 16px;
            backdrop-filter: blur(8px);
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.05);
            pointer-events: none;
            user-select: none;
            white-space: nowrap;
        }

        .alert-error {
            padding: 12px 16px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 12px;
            color: #991b1b;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error i {
            font-size: 18px;
            color: #dc2626;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 440px;
            }

            .brand-panel {
                width: 100%;
                padding: 30px 26px;
            }

            .brand-panel .features {
                display: none;
            }

            .form-panel {
                width: 100%;
                padding: 30px 26px;
            }
        }
    </style>
</head>
<body>
    <!-- Floating decorative shapes -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <div class="login-container">
        <!-- Left Panel - Branding -->
        <div class="brand-panel">
            <div class="brand-icon">
                <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN">
            </div>
            <h2>IDAKOM <span>POLBAN</span></h2>
            <p>Ikatan Keluarga Mahasiswa Indramayu Komisariat Politeknik Negeri Bandung</p>
            
            <div class="features">
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Akses eksklusif untuk admin</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-users-cog"></i>
                    <span>Kelola anggota &amp; pendaftaran</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Pantau perkembangan organisasi</span>
                </div>
            </div>
        </div>

        <!-- Right Panel - Form -->
        <div class="form-panel">
            <div class="form-header">
                <h1><i class="fas fa-lock"></i>Login Admin</h1>
                <p>Masuk untuk mengelola dashboard organisasi</p>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i>Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password"><i class="fas fa-key"></i>Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password" type="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-right-to-bracket"></i>
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="form-footer">
                <a href="/"><i class="fas fa-arrow-left"></i>Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <div class="watermark">Managed By 2023 IDAKOM POLBAN</div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
