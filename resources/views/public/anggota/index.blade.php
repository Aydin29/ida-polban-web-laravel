<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota - Organisasi POLBAN</title>
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
                <span class="text-gray-900">IDA <span class="text-green-500">POLBAN</span></span>
            </div>
            <!-- Desktop Navigation -->
            <div class="hidden md:flex gap-6 lg:gap-8 items-center">
                <a href="/" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Beranda</a>
                <a href="/#tentang" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Tentang</a>
                <a href="/#struktur" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Struktur</a>
                <a href="/#program" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Program</a>
                <a href="{{ route('public.anggota.index') }}" class="text-green-500 font-semibold text-sm font-medium border-b-2 border-green-500">Anggota</a>
                <a href="/#galeri" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Galeri</a>
                <a href="/#daftar" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition text-sm font-medium">Daftar</a>
            </div>
            <!-- Mobile Hamburger -->
            <button onclick="toggleMobileMenu()" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-gray-700 hover:bg-gray-100 transition" aria-label="Menu">
                <i class="fas fa-bars text-xl" id="mobileMenuIcon"></i>
            </button>
        </div>
        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="px-4 py-3 space-y-1">
                <a href="/" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Beranda</a>
                <a href="/#tentang" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Tentang</a>
                <a href="/#struktur" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Struktur</a>
                <a href="/#program" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Program</a>
                <a href="{{ route('public.anggota.index') }}" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg bg-green-50 text-green-600 font-semibold">Anggota</a>
                <a href="/#galeri" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Galeri</a>
                <a href="/#daftar" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg bg-green-500 text-white font-bold text-center hover:bg-green-600 transition mt-2">Daftar Sekarang</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-4">Daftar <span class="text-yellow-300">Anggota</span></h1>
            <p class="text-green-100 text-lg">Seluruh anggota Organisasi POLBAN</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Filter Periode -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-10">
                <form method="GET" action="{{ route('public.anggota.index') }}" class="flex items-center gap-4 flex-wrap justify-center">
                    <label class="font-semibold text-gray-700">
                        <i class="fas fa-filter text-green-500 mr-1"></i>Filter Periode:
                    </label>
                    <select name="periode" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="">Semua Periode</option>
                        @foreach($periodeList as $p)
                            <option value="{{ $p }}" {{ $selectedPeriode === $p ? 'selected' : '' }}>{{ $p }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-green-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-green-600 transition">
                        <i class="fas fa-filter mr-1"></i> Tampilkan
                    </button>
                    @if($selectedPeriode)
                        <a href="{{ route('public.anggota.index') }}" class="bg-gray-400 text-white px-5 py-2 rounded-lg font-semibold hover:bg-gray-500 transition">
                            <i class="fas fa-times mr-1"></i> Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- Grid Anggota -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($anggotas as $anggota)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition transform hover:scale-[1.02]">
                        <div class="bg-gradient-to-r from-green-400 to-green-600 h-32 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-user text-3xl text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $anggota->nama_lengkap }}</h3>
                            <p class="text-sm text-gray-500 mb-1">
                                <i class="fas fa-tag text-green-500 mr-1"></i>{{ $anggota->nama_panggilan }}
                            </p>
                            <p class="text-sm text-gray-500 mb-1">
                                <i class="fas fa-briefcase text-green-500 mr-1"></i>{{ $anggota->jabatan ?? 'Anggota' }}
                            </p>
                            <p class="text-sm text-gray-500 mb-3">
                                <i class="fas fa-calendar text-green-500 mr-1"></i>{{ $anggota->periode ?? '-' }}
                            </p>
                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                <span class="text-xs text-gray-400">
                                    <i class="fas fa-graduation-cap mr-1"></i>{{ $anggota->program_studi ?? '-' }}
                                </span>
                                <a href="{{ route('public.anggota.show', $anggota->id) }}" class="text-green-600 hover:text-green-800 text-sm font-semibold">
                                    Detail <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Belum ada data anggota.</p>
                        <a href="/#daftar" class="inline-block mt-4 bg-green-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-600 transition">
                            <i class="fas fa-user-plus mr-1"></i>Daftar Sekarang
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $anggotas->links() }}
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-10">
                <a href="/" class="inline-block bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
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
