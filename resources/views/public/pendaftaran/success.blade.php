<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - IDAKOM POLBAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('LOGOIDAHD.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-slide-in {
            animation: slideIn 0.6s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2 text-2xl font-bold">
                <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN" class="h-10 w-auto">
                <span class="text-gray-900">IDAKOM <span class="text-green-500">POLBAN</span></span>
            </div>
            <a href="/" class="text-gray-700 hover:text-green-500 transition font-medium">← Kembali</a>
        </div>
    </nav>

    <!-- Success Section -->
    <section class="py-20 px-6 min-h-screen flex items-center">
        <div class="max-w-2xl mx-auto text-center w-full">
            <div class="bg-white rounded-lg shadow-lg p-12 animate-slide-in">
                <!-- Success Icon -->
                <div class="mb-6 flex justify-center">
                    <div class="bg-green-100 rounded-full p-6 inline-block">
                        <i class="fas fa-check text-5xl text-green-500"></i>
                    </div>
                </div>

                <h1 class="text-4xl font-bold text-gray-900 mb-4">Pendaftaran Berhasil!</h1>
                <p class="text-xl text-gray-600 mb-6">Terima kasih telah mendaftar sebagai anggota IDAKOM POLBAN</p>

                <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded mb-8 text-left">
                    <p class="text-gray-700 mb-3">
                        <i class="fas fa-info-circle text-green-500 mr-2"></i>
                        <strong>Pendaftaran Anda telah diterima!</strong>
                    </p>
                    <p class="text-gray-600">
                        Tim kami akan memeriksa data Anda dan menghubungi Anda melalui Email yang telah Anda daftarkan. Silahkan tunggu konfirmasi dari kami dalam beberapa hari ke depan.
                    </p>
                </div>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded mb-8 text-left">
                    <p class="text-gray-700 mb-3">
                        <i class="fas fa-clock text-blue-500 mr-2"></i>
                        <strong>Apa yang akan terjadi selanjutnya?</strong>
                    </p>
                    <ul class="text-gray-600 space-y-2">
                        <li>✓ Kami akan memverifikasi data pendaftaran Anda</li>
                        <li>✓ Kami akan menghubungi Anda untuk konfirmasi</li>
                        <li>✓ Anda akan menerima petunjuk selanjutnya via Email</li>
                    </ul>
                </div>

                <div class="flex gap-4 justify-center flex-wrap">
                    <a href="/" class="bg-green-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition inline-flex items-center gap-2">
                        <i class="fas fa-home"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>

            <div class="mt-12 text-center text-gray-600">
                <p class="mb-2">Ada pertanyaan?</p>
                <p>
<a href="mailto:ikadarmaayupolban@gmail.com" class="text-green-500 hover:text-green-600 font-semibold">ikadarmaayupolban@gmail.com</a> 
                    atau 
                    <a href="https://wa.me/6282117030776" target="_blank" class="text-green-500 hover:text-green-600 font-semibold">+62 821-1703-0776</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8 mt-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p>&copy; Created By 2023 IDAKOM POLBAN. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
