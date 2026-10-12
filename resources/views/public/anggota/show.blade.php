<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $anggota->nama_lengkap }} - Organisasi IDAKOM POLBAN</title>
    <link rel="icon" type="image/png" href="{{ asset('LOGOIDAHD.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
<!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 sm:py-4 flex justify-between items-center">
            <div class="flex items-center gap-2 text-xl sm:text-2xl font-bold">
                <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN" class="h-10 sm:h-14 w-auto">
                <span class="text-gray-900">IDAKOM <span class="text-green-500">POLBAN</span></span>
            </div>
            <a href="/" class="text-gray-700 hover:text-green-500 transition font-medium hidden md:inline">← Kembali</a>
            <!-- Mobile Hamburger -->
            <button onclick="toggleMobileMenu()" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-gray-700 hover:bg-gray-100 transition" aria-label="Menu">
                <i class="fas fa-bars text-xl" id="mobileMenuIcon"></i>
            </button>
        </div>
        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="px-4 py-3 space-y-1">
                <a href="/" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">← Kembali ke Beranda</a>
                <a href="{{ route('public.anggota.index') }}" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">← Daftar Anggota</a>
            </div>
        </div>
    </nav>

    <!-- Profile Header -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user text-5xl text-white"></i>
            </div>
            <h1 class="text-4xl font-bold mb-2">{{ $anggota->nama_lengkap }}</h1>
            <p class="text-green-100 text-lg">{{ $anggota->jabatan ?? 'Anggota' }}</p>
            @if($anggota->periode)
                <span class="inline-block mt-3 bg-white/20 px-4 py-1 rounded-full text-sm">
                    <i class="fas fa-calendar mr-1"></i>Periode {{ $anggota->periode }}
                </span>
            @endif
        </div>
    </section>

    <!-- Detail Content -->
    <section class="py-16 px-6">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('public.anggota.index') }}" class="inline-block text-green-600 hover:text-green-800 font-semibold mb-8">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Anggota
            </a>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Informasi Pribadi -->
                <div class="p-8 border-b border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Informasi Pribadi</h2>
                            <p class="text-sm text-gray-500">Data diri anggota</p>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Nama Lengkap</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->nama_lengkap }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Nama Panggilan</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->nama_panggilan ?: '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Pendidikan -->
                <div class="p-8 border-b border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Informasi Pendidikan</h2>
                            <p class="text-sm text-gray-500">Riwayat pendidikan anggota</p>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Asal Sekolah</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->asal_sekolah ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Jurusan</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->jurusan ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Program Studi</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->program_studi ?: '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Organisasi -->
                <div class="p-8 border-b border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600">
                            <i class="fas fa-building"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Informasi Organisasi</h2>
                            <p class="text-sm text-gray-500">Posisi dan masa jabatan</p>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Jabatan</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->jabatan ?: 'Anggota' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Divisi</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->divisi ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Periode</p>
                            <p class="text-gray-900 font-semibold">{{ $anggota->periode ?: '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to list -->
            <div class="text-center mt-8">
                <a href="{{ route('public.anggota.index') }}" class="inline-block bg-green-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition">
                    <i class="fas fa-users mr-2"></i>Lihat Semua Anggota
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p>&copy; Created By 2023 IDAKOM POLBAN. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const icon = document.getElementById('mobileMenuIcon');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                menu.classList.add('hidden');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        }

        function closeMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const icon = document.getElementById('mobileMenuIcon');
            menu.classList.add('hidden');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    </script>
</body>
</html>
