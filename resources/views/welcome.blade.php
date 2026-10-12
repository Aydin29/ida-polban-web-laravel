<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKA DARMA AYU KOMISARIAT POLBAN</title>
    
    <!-- UPDATE DISINI: Path Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('LOGOIDAHD.png') }}">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Scroll Animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .fade-in-left {
            opacity: 0;
            transform: translateX(-30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .fade-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .fade-in-right {
            opacity: 0;
            transform: translateX(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .fade-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .scale-in {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .scale-in.visible {
            opacity: 1;
            transform: scale(1);
        }
        
        .stagger-item {
            transition-delay: var(--delay, 0s);
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        /* Bubble Animation */
        @keyframes bubble {
            0% {
                transform: translateY(0px) scale(1);
            }
            50% {
                transform: translateY(-15px) scale(1.05);
            }
            100% {
                transform: translateY(0px) scale(1);
            }
        }
        
        .bubble-float {
            animation: bubble 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 sm:py-4 flex justify-between items-center">
            <div class="flex items-center gap-2 text-xl sm:text-2xl font-bold">
                <!-- UPDATE DISINI: Path Logo Navbar -->
                <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN" class="h-10 sm:h-14 w-auto">
                <span class="text-gray-900">IDAKOM <span class="text-green-500">POLBAN</span></span>
            </div>
            <!-- Desktop Navigation -->
            <div class="hidden md:flex gap-6 lg:gap-8 items-center">
                <a href="#beranda" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Beranda</a>
                <a href="#tentang" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Tentang</a>
                <a href="#struktur" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Struktur</a>
                <a href="#program" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Program</a>
                <a href="#anggota" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Anggota</a>
                <a href="#galeri" class="text-gray-700 hover:text-green-500 transition text-sm font-medium">Galeri</a>
                <a href="#daftar" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition text-sm font-medium">Daftar</a>
            </div>
            <!-- Mobile Hamburger -->
            <button onclick="toggleMobileMenu()" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-gray-700 hover:bg-gray-100 transition" aria-label="Menu">
                <i class="fas fa-bars text-xl" id="mobileMenuIcon"></i>
            </button>
        </div>
        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="px-4 py-3 space-y-1">
                <a href="#beranda" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Beranda</a>
                <a href="#tentang" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Tentang</a>
                <a href="#struktur" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Struktur</a>
                <a href="#program" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Program</a>
                <a href="#anggota" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Anggota</a>
                <a href="#galeri" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">Galeri</a>
                <a href="#daftar" onclick="closeMobileMenu()" class="block px-4 py-3 rounded-lg bg-green-500 text-white font-bold text-center hover:bg-green-600 transition mt-2">Daftar Sekarang</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="bg-gradient-to-r from-green-500 to-green-700 text-white py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-8 md:gap-12 items-center">
            <div class="fade-in-left text-center md:text-left">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6">Selamat Datang di <span class="text-yellow-300">IKA DARMA AYU KOMISARIAT POLBAN</span></h1>
                <p class="text-base sm:text-lg md:text-xl text-green-100 mb-6 md:mb-8">Tempat untuk berbagi informasi, mengelola anggota, dan mengembangkan organisasi kami bersama-sama.</p>
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center md:justify-start">
                    <a href="#daftar" class="bg-white text-green-600 px-6 md:px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition text-sm md:text-base text-center">Daftar Sekarang</a>
                    <a href="#tentang" class="border-2 border-white text-white px-6 md:px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-green-600 transition text-sm md:text-base text-center">Pelajari Lebih Lanjut</a>
                </div>
            </div>
            <div class="text-center fade-in-right hidden md:block">
                <div class="bg-green-400 rounded-full w-72 h-72 mx-auto flex items-center justify-center bubble-float p-6">
                    <!-- UPDATE DISINI: Path Logo Hero Section -->
                    <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN" class="w-full h-full object-contain scale-125">
                </div>
            </div>
        </div>
    </section>

 <!-- Tentang Section -->
<section id="tentang" class="py-20 px-6 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 fade-in-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Tentang <span class="text-green-500">Kami</span></h2>
            <div class="w-24 h-1 bg-green-500 mx-auto"></div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="bg-green-100 rounded-lg p-4 h-80 flex items-center justify-center fade-in-left overflow-hidden relative">
                
                <div id="slider" class="flex transition-transform duration-700 ease-in-out h-full w-full rounded-lg">
                    <img src="{{ asset('ALUN.jpeg') }}" alt="ALUN" class="min-w-full h-full object-cover rounded-lg flex-shrink-0">
                    <img src="{{ asset('ALUNHD.jpeg') }}" alt="ALUNHD" class="min-w-full h-full object-cover rounded-lg flex-shrink-0">
                    <img src="{{ asset('ICHD.jpeg') }}" alt="ICHD" class="min-w-full h-full object-cover rounded-lg flex-shrink-0">
                    <img src="{{ asset('BMANGGAHD.jpeg') }}" alt="BMANGGAHD" class="min-w-full h-full object-cover rounded-lg flex-shrink-0">
                </div>
                
                <button type="button" id="sliderPrev" onclick="prevSlide()" aria-label="Gambar sebelumnya" class="absolute left-3 top-1/2 -translate-y-1/2 z-50 flex h-9 w-9 items-center justify-center rounded-full bg-black/35 text-white transition hover:bg-black/60 focus:outline-none focus:ring-2 focus:ring-white cursor-pointer">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <button type="button" id="sliderNext" onclick="nextSlide()" aria-label="Gambar berikutnya" class="absolute right-3 top-1/2 -translate-y-1/2 z-50 flex h-9 w-9 items-center justify-center rounded-full bg-black/35 text-white transition hover:bg-black/60 focus:outline-none focus:ring-2 focus:ring-white cursor-pointer">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2 z-50">
                    <span class="w-2.5 h-2.5 bg-white/80 rounded-full cursor-pointer hover:bg-white transition" onclick="slideTo(0)"></span>
                    <span class="w-2.5 h-2.5 bg-white/40 rounded-full cursor-pointer hover:bg-white transition" onclick="slideTo(1)"></span>
                    <span class="w-2.5 h-2.5 bg-white/40 rounded-full cursor-pointer hover:bg-white transition" onclick="slideTo(2)"></span>
                    <span class="w-2.5 h-2.5 bg-white/40 rounded-full cursor-pointer hover:bg-white transition" onclick="slideTo(3)"></span>
                </div>
                
            </div>
            
            <div class="fade-in-right">
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Organisasi IDAKOM POLBAN</h3>
                <div id="tentangText" class="text-gray-700 text-lg leading-relaxed">
                    <p>IDAKOM POLBAN, yang memiliki nama resmi Ikatan Keluarga Mahasiswa Indramayu (Ika Darma Ayu) Komisariat Politeknik Negeri Bandung, adalah organisasi kemahasiswaan daerah yang berfungsi sebagai wadah pemersatu bagi para mahasiswa perantauan asal Indramayu.</p>
                    <div id="tentangFull" class="hidden mt-4">
                        <p class="mb-4">Wilayah pergerakan komisariat ini berpusat di lingkungan kampus Politeknik Negeri Bandung. Sebagai bagian resmi dari organisasi induk Ika Darma Ayu (IDA) Bandung yang memiliki akar sejarah panjang sejak tahun 1964, komisariat ini hadir sebagai "rumah kedua" yang berasaskan kekeluargaan untuk menjaga tali persaudaraan sekaligus merawat kecintaan terhadap budaya luhur tanah Dermayu.</p>
                        <p class="mb-4">Organisasi ini tidak didirikan oleh satu orang individu tunggal, melainkan lahir dari inisiatif kolektif dan semangat gotong-royong para mahasiswa senior asal Indramayu yang menempuh studi di Politeknik Negeri Bandung. Kehadiran IDAKOM POLBAN tidak hanya sekadar tempat berkumpul dan melepas rindu kampung halaman, tetapi juga aktif bergerak dalam ranah sosial dan edukasi.</p>
                        <p>Melalui program kerja nyata seperti sosialisasi kampus dan pelaksanaan pengabdian masyarakat, organisasi ini berkomitmen penuh untuk membantu adik-adik pelajar di Indramayu agar dapat melanjutkan pendidikan ke jenjang perguruan tinggi dan terus berkontribusi bagi kemajuan daerah asal mereka.</p>
                    </div>
                </div>
                <button onclick="toggleTentang()" id="tentangToggle" class="mt-4 text-green-600 hover:text-green-800 font-semibold text-sm flex items-center gap-2 transition">
                    <span id="tentangToggleText">Lebih Detail</span>
                    <i id="tentangToggleIcon" class="fas fa-chevron-down text-xs transition-transform"></i>
                </button>
                <div class="grid grid-cols-3 gap-6 mt-12">
                    <div class="text-center scale-in">
                        <div class="text-4xl font-bold text-green-500">{{ \App\Models\Anggota::count() }}</div>
                        <p class="text-gray-600 text-sm mt-2">Anggota Aktif</p>
                    </div>
                    <div class="text-center scale-in">
                        <div class="text-4xl font-bold text-green-500">5</div>
                        <p class="text-gray-600 text-sm mt-2">Program Kerja</p>
                    </div>
                    <div class="text-center scale-in">
                        <div class="text-4xl font-bold text-green-500">1997</div>
                        <p class="text-gray-600 text-sm mt-2">Tahun Berdiri</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Struktur Section -->
        <section id="struktur" class="py-20 px-6">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12 fade-in-up">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Struktur <span class="text-green-500">Organisasi</span></h2>
                    <div class="w-24 h-1 bg-green-500 mx-auto mb-4"></div>
                    <p class="text-gray-600 text-lg">Kepengurusan organisasi dari setiap periode</p>
                </div>

                <!-- Filter Periode -->
                @php
                    $selectedPeriodeStruktur = request('periode_struktur', '');
                    if ($selectedPeriodeStruktur) {
                        $filteredStrukturs = \App\Models\Anggota::where('periode', $selectedPeriodeStruktur)
                            ->whereIn('jabatan', [
                                'Ketua Umum', 'Sekretaris Umum', 'Bendahara Umum',
                                'Sekretaris 1', 'Bendahara Umum 2',
                                'Ketua Bidang Internal', 'Ketua Bidang Eksternal',
                                'Anggota Bidang Internal', 'Anggota Bidang Eksternal'
                            ])
                            ->get();
                    } else {
                        $filteredStrukturs = collect();
                    }
                @endphp

                <div class="max-w-md mx-auto mb-12 fade-in-up">
                    <form method="GET" action="#struktur" class="flex items-center justify-center gap-3">
                        <label class="font-semibold text-gray-700">Periode:</label>
                        <select name="periode_struktur" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="">Pilih Periode</option>
                            @foreach($strukturPeriodeList as $periode)
                                <option value="{{ $periode }}" {{ $selectedPeriodeStruktur === $periode ? 'selected' : '' }}>{{ $periode }}</option>
                            @endforeach
                        </select>
                        @if($selectedPeriodeStruktur)
                            <a href="{{ url('/#struktur') }}" class="bg-gray-400 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-500 transition">
                                <i class="fas fa-times"></i>
                            </a>
                        @endif
                    </form>
                </div>

                @if($selectedPeriodeStruktur && $filteredStrukturs->count() > 0)
                    @php
                        $ketuaUmum = $filteredStrukturs->firstWhere('jabatan', 'Ketua Umum');
                        $sekretarisUmum = $filteredStrukturs->firstWhere('jabatan', 'Sekretaris Umum');
                        $bendaharaUmum = $filteredStrukturs->firstWhere('jabatan', 'Bendahara Umum');
                        $sekretaris1 = $filteredStrukturs->firstWhere('jabatan', 'Sekretaris 1');
                        $bendaharaUmum2 = $filteredStrukturs->firstWhere('jabatan', 'Bendahara Umum 2');
                        $ketuaBidang1 = $filteredStrukturs->firstWhere('jabatan', 'Ketua Bidang Internal');
                        $ketuaBidang2 = $filteredStrukturs->firstWhere('jabatan', 'Ketua Bidang Eksternal');
                        $anggotaBidang1 = $filteredStrukturs->where('jabatan', 'Anggota Bidang Internal');
                        $anggotaBidang2 = $filteredStrukturs->where('jabatan', 'Anggota Bidang Eksternal');
                    @endphp

                    <!-- Organization Chart -->
                    <div class="relative flex flex-col items-center fade-in-up">
                        <!-- Level 1: Ketua Umum -->
                        <div class="relative z-10">
                            <div class="bg-emerald-500 text-white rounded-xl px-10 py-5 font-bold text-lg shadow-lg text-center min-w-[220px] border-2 border-emerald-600">
                                <div class="text-2xl mb-1">👔</div>
                                <div>Ketua Umum</div>
                                <div class="text-sm font-normal mt-1 opacity-90">— {{ $ketuaUmum->nama_lengkap ?? 'Belum ada data' }} —</div>
                            </div>
                        </div>

                        <!-- Vertical line from Ketua Umum down -->
                        <div class="w-0.5 h-8 bg-gray-400"></div>

                        <!-- Level 2: Sekretaris Umum & Bendahara Umum (sederajat) -->
                        <div class="relative w-full max-w-lg">
                            <!-- Horizontal branch line -->
                            <div class="absolute top-0 left-[10%] w-[80%] h-0.5 bg-gray-400"></div>
                            <!-- Vertical lines down to each -->
                            <div class="absolute top-0 left-[25%] w-0.5 h-5 bg-gray-400"></div>
                            <div class="absolute top-0 right-[25%] w-0.5 h-5 bg-gray-400"></div>

                            <div class="grid grid-cols-2 gap-12 pt-5">
                                <div class="flex justify-center">
                                    <div class="bg-sky-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-sky-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">📋</div>
                                        <div>Sekretaris Umum</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">{{ $sekretarisUmum->nama_lengkap ?? '—' }}</div>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="bg-amber-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-amber-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">💰</div>
                                        <div>Bendahara Umum</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">{{ $bendaharaUmum->nama_lengkap ?? '—' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lines from Sekretaris Umum & Bendahara Umum down -->
                        <div class="relative w-full max-w-lg h-10">
                            <div class="absolute left-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute right-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute top-[23px] left-[15%] w-[70%] h-0.5 bg-gray-400"></div>
                            <div class="absolute left-1/2 -translate-x-1/2 top-[23px] w-0.5 h-[17px] bg-gray-400"></div>
                        </div>

                        <!-- Level 3: Sekretaris 1 & Bendahara Umum 2 (sederajat) -->
                        <div class="relative w-full max-w-lg">
                            <div class="absolute top-0 left-[10%] w-[80%] h-0.5 bg-gray-400"></div>
                            <div class="absolute top-0 left-[25%] w-0.5 h-5 bg-gray-400"></div>
                            <div class="absolute top-0 right-[25%] w-0.5 h-5 bg-gray-400"></div>

                            <div class="grid grid-cols-2 gap-12 pt-5">
                                <div class="flex justify-center">
                                    <div class="bg-sky-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-sky-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">📋</div>
                                        <div>Sekretaris 1</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">{{ $sekretaris1->nama_lengkap ?? '—' }}</div>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="bg-amber-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-amber-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">💰</div>
                                        <div>Bendahara Umum 2</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">{{ $bendaharaUmum2->nama_lengkap ?? '—' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lines from Sekretaris 1 & Bendahara Umum 2 to Bidang -->
                        <div class="relative w-full max-w-lg h-10">
                            <div class="absolute left-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute right-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute top-[23px] left-[15%] w-[70%] h-0.5 bg-gray-400"></div>
                            <div class="absolute left-1/2 -translate-x-1/2 top-[23px] w-0.5 h-[17px] bg-gray-400"></div>
                        </div>

                        <!-- Lines from Bendahara to both Bidang -->
                        <div class="relative w-full max-w-2xl h-10">
                            <!-- Vertical line from Bendahara -->
                            <div class="absolute left-1/2 -translate-x-1/2 top-0 w-0.5 h-6 bg-gray-400"></div>
                            <!-- Horizontal branch line -->
                            <div class="absolute top-[23px] left-[10%] w-[80%] h-0.5 bg-gray-400"></div>
                            <!-- Vertical lines down to each Bidang -->
                            <div class="absolute top-[23px] left-[25%] w-0.5 h-[17px] bg-gray-400"></div>
                            <div class="absolute top-[23px] right-[25%] w-0.5 h-[17px] bg-gray-400"></div>
                        </div>

                        <!-- Level 4: Bidang Internal 1 & 2 -->
                        <div class="grid grid-cols-2 gap-12 w-full max-w-2xl">
                            <div class="flex justify-center">
                                <div class="bg-green-50 rounded-xl p-5 border-2 border-green-300 shadow-lg min-w-[220px] w-full">
                                    <h3 class="font-bold text-lg text-green-700 mb-3 text-center">🏢 Bidang Internal</h3>
                                    <div class="bg-green-200 rounded-lg px-4 py-2 text-center font-semibold text-sm">
                                        👤 Ketua: {{ $ketuaBidang1->nama_lengkap ?? '—' }}
                                    </div>
                                    @forelse($anggotaBidang1 as $anggota)
                                        <div class="bg-white rounded-lg px-4 py-2 text-center text-sm mt-2 shadow-sm">{{ $anggota->nama_lengkap }}</div>
                                    @empty
                                        <div class="bg-white rounded-lg px-4 py-2 text-center text-sm mt-2 shadow-sm">Anggota: —</div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="bg-blue-50 rounded-xl p-5 border-2 border-blue-300 shadow-lg min-w-[220px] w-full">
                                    <h3 class="font-bold text-lg text-blue-700 mb-3 text-center">🏢 Bidang Eksternal</h3>
                                    <div class="bg-blue-200 rounded-lg px-4 py-2 text-center font-semibold text-sm">
                                        👤 Ketua: {{ $ketuaBidang2->nama_lengkap ?? '—' }}
                                    </div>
                                    @forelse($anggotaBidang2 as $anggota)
                                        <div class="bg-white rounded-lg px-4 py-2 text-center text-sm mt-2 shadow-sm">{{ $anggota->nama_lengkap }}</div>
                                    @empty
                                        <div class="bg-white rounded-lg px-4 py-2 text-center text-sm mt-2 shadow-sm">Anggota: —</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Organization Chart (Default - Belum ada data) -->
                    <div class="relative flex flex-col items-center fade-in-up">
                        <!-- Level 1: Ketua Umum -->
                        <div class="relative z-10">
                            <div class="bg-emerald-500 text-white rounded-xl px-10 py-5 font-bold text-lg shadow-lg text-center min-w-[220px] border-2 border-emerald-600">
                                <div class="text-2xl mb-1">👔</div>
                                <div>Ketua Umum</div>
                                <div class="text-sm font-normal mt-1 opacity-90">— Belum ada data —</div>
                            </div>
                        </div>

                        <!-- Vertical line from Ketua Umum down -->
                        <div class="w-0.5 h-8 bg-gray-400"></div>

                        <!-- Level 2: Sekretaris Umum & Bendahara Umum (sederajat) -->
                        <div class="relative w-full max-w-lg">
                            <div class="absolute top-0 left-[10%] w-[80%] h-0.5 bg-gray-400"></div>
                            <div class="absolute top-0 left-[25%] w-0.5 h-5 bg-gray-400"></div>
                            <div class="absolute top-0 right-[25%] w-0.5 h-5 bg-gray-400"></div>

                            <div class="grid grid-cols-2 gap-12 pt-5">
                                <div class="flex justify-center">
                                    <div class="bg-sky-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-sky-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">📋</div>
                                        <div>Sekretaris Umum</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">—</div>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="bg-amber-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-amber-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">💰</div>
                                        <div>Bendahara Umum</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">—</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative w-full max-w-lg h-10">
                            <div class="absolute left-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute right-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute top-[23px] left-[15%] w-[70%] h-0.5 bg-gray-400"></div>
                            <div class="absolute left-1/2 -translate-x-1/2 top-[23px] w-0.5 h-[17px] bg-gray-400"></div>
                        </div>

                        <!-- Level 3: Sekretaris 1 & Bendahara Umum 2 (sederajat) -->
                        <div class="relative w-full max-w-lg">
                            <div class="absolute top-0 left-[10%] w-[80%] h-0.5 bg-gray-400"></div>
                            <div class="absolute top-0 left-[25%] w-0.5 h-5 bg-gray-400"></div>
                            <div class="absolute top-0 right-[25%] w-0.5 h-5 bg-gray-400"></div>

                            <div class="grid grid-cols-2 gap-12 pt-5">
                                <div class="flex justify-center">
                                    <div class="bg-sky-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-sky-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">📋</div>
                                        <div>Sekretaris 1</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">—</div>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="bg-amber-100 rounded-xl px-6 py-4 text-center font-semibold text-gray-900 shadow-lg border-2 border-amber-300 min-w-[160px]">
                                        <div class="text-2xl mb-1">💰</div>
                                        <div>Bendahara Umum 2</div>
                                        <div class="text-sm font-normal text-gray-500 mt-1">—</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative w-full max-w-lg h-10">
                            <div class="absolute left-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute right-[25%] top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute top-[23px] left-[15%] w-[70%] h-0.5 bg-gray-400"></div>
                            <div class="absolute left-1/2 -translate-x-1/2 top-[23px] w-0.5 h-[17px] bg-gray-400"></div>
                        </div>

                        <!-- Level 4: Bidang Internal & Bidang Eksternal -->
                        <div class="relative w-full max-w-2xl h-10">
                            <div class="absolute left-1/2 -translate-x-1/2 top-0 w-0.5 h-6 bg-gray-400"></div>
                            <div class="absolute top-[23px] left-[10%] w-[80%] h-0.5 bg-gray-400"></div>
                            <div class="absolute top-[23px] left-[25%] w-0.5 h-[17px] bg-gray-400"></div>
                            <div class="absolute top-[23px] right-[25%] w-0.5 h-[17px] bg-gray-400"></div>
                        </div>

                        <div class="grid grid-cols-2 gap-12 w-full max-w-2xl">
                            <div class="flex justify-center">
                                <div class="bg-green-50 rounded-xl p-5 border-2 border-green-300 shadow-lg min-w-[220px] w-full">
                                    <h3 class="font-bold text-lg text-green-700 mb-3 text-center">🏢 Bidang Internal</h3>
                                    <div class="bg-green-200 rounded-lg px-4 py-2 text-center font-semibold text-sm">👤 Ketua: —</div>
                                    <div class="bg-white rounded-lg px-4 py-2 text-center text-sm mt-2 shadow-sm">Anggota: —</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="bg-blue-50 rounded-xl p-5 border-2 border-blue-300 shadow-lg min-w-[220px] w-full">
                                    <h3 class="font-bold text-lg text-blue-700 mb-3 text-center">🏢 Bidang Eksternal</h3>
                                    <div class="bg-blue-200 rounded-lg px-4 py-2 text-center font-semibold text-sm">👤 Ketua: —</div>
                                    <div class="bg-white rounded-lg px-4 py-2 text-center text-sm mt-2 shadow-sm">Anggota: —</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

    <!-- Program Section -->
    <section id="program" class="py-20 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Program & <span class="text-green-500">Kegiatan</span></h2>
                <div class="w-24 h-1 bg-green-500 mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-5 gap-6">
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition transform hover:scale-105 fade-in-up scale-in stagger-item" style="--delay: 0s;">
                    <div class="text-5xl text-green-500 mb-4"><i class="fas fa-graduation-cap"></i></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Sosialisasi Pendidikan</h3>
                    <p class="text-gray-600 text-sm">Program edukasi dan sosialisasi untuk meningkatkan wawasan.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition transform hover:scale-105 fade-in-up scale-in stagger-item" style="--delay: 0.1s;">
                    <div class="text-5xl text-green-500 mb-4"><i class="fas fa-gift"></i></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">IDA Berbagi</h3>
                    <p class="text-gray-600 text-sm">Program berbagi kebaikan dan peduli kepada masyarakat.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition transform hover:scale-105 fade-in-up scale-in stagger-item" style="--delay: 0.2s;">
                    <div class="text-5xl text-green-500 mb-4"><i class="fas fa-futbol"></i></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Indramayu Futsal League</h3>
                    <p class="text-gray-600 text-sm">Kompetisi futsal untuk membangun semangat dan kebersamaan.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition transform hover:scale-105 fade-in-up scale-in stagger-item" style="--delay: 0.3s;">
                    <div class="text-5xl text-green-500 mb-4"><i class="fas fa-hands-helping"></i></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">IDA Mengabdi</h3>
                    <p class="text-gray-600 text-sm">Program pengabdian masyarakat dan bakti sosial.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition transform hover:scale-105 fade-in-up scale-in stagger-item" style="--delay: 0.4s;">
                    <div class="text-5xl text-green-500 mb-4"><i class="fas fa-users"></i></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Malam Keakraban</h3>
                    <p class="text-gray-600 text-sm">Acara kebersamaan untuk mempererat ikatan anggota.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="py-20 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Galeri <span class="text-green-500">Kegiatan</span></h2>
                <div class="w-24 h-1 bg-green-500 mx-auto"></div>
            </div>

            @forelse($galerisByPeriode as $periode => $galeris)
                @php
                    $firstGaleri = $galeris->first();
                    $firstImage = $firstGaleri && $firstGaleri->images->isNotEmpty() ? $firstGaleri->images->first() : null;
                    $totalImages = $galeris->sum(fn($g) => $g->images->count());
                    $totalPrograms = $galeris->count();
                @endphp
                <div class="mb-8 fade-in-up scale-in">
                    <a href="{{ route('public.galeri.show', $periode) }}" class="block group">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition transform hover:scale-[1.01]">
                            @if($firstImage)
                                <div class="relative h-64 overflow-hidden">
                                    <img src="{{ $firstImage->image_url }}" alt="Periode {{ $periode }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute bottom-6 left-6 text-white">
                                        <h3 class="text-2xl font-bold mb-1">Periode {{ $periode }}</h3>
                                        <p class="text-white/80">{{ $totalPrograms }} program &bull; {{ $totalImages }} foto</p>
                                    </div>
                                    <div class="absolute top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg font-semibold opacity-0 group-hover:opacity-100 transition">
                                        <i class="fas fa-eye mr-1"></i>Lihat Semua
                                    </div>
                                </div>
                            @else
                                <div class="h-64 bg-green-100 flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fas fa-image text-5xl text-green-400 mb-2"></i>
                                        <p class="text-green-600 font-bold text-xl">Periode {{ $periode }}</p>
                                        <p class="text-green-500/70">{{ $totalPrograms }} program</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </a>
                </div>
            @empty
                <div class="text-center py-12 fade-in-up">
                    <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada galeri kegiatan.</p>
                </div>
            @endforelse

            @if(count($galerisByPeriode) > 0)
            <div class="text-center mt-12 fade-in-up">
                <a href="{{ route('public.galeri.index') }}" class="inline-block bg-green-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition">
                    <i class="fas fa-images mr-2"></i>Lihat Semua Galeri
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Anggota Baru Section -->
    <section id="anggota" class="py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Anggota <span class="text-green-500">Baru</span></h2>
                <div class="w-24 h-1 bg-green-500 mx-auto mb-4"></div>
                <p class="text-gray-600 text-lg">Kenali anggota baru organisasi lebih dekat</p>
            </div>

            <!-- Filter Periode -->
            <div class="max-w-md mx-auto mb-12 fade-in-up">
                <form method="GET" action="#anggota" class="flex items-center justify-center gap-3">
                    <label class="font-semibold text-gray-700">Periode:</label>
                    <select name="periode_anggota" id="periodeAnggota" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="">Semua Periode</option>
                        @foreach($periodeList as $p)
                            <option value="{{ $p }}" {{ request('periode_anggota') === $p ? 'selected' : '' }}>{{ $p }}</option>
                        @endforeach
                    </select>
                    @if(request('periode_anggota'))
                        <a href="{{ url('/#anggota') }}" class="bg-gray-400 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-500 transition">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </form>
            </div>

            <div class="grid md:grid-cols-4 gap-6">
                @php
                    $filteredAnggotas = $anggotas;
                    if (request('periode_anggota')) {
                        $filteredAnggotas = \App\Models\Anggota::where('periode', request('periode_anggota'))->latest()->get();
                    }
                @endphp
                @forelse($filteredAnggotas as $anggota)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition fade-in-up scale-in">
                        <div class="bg-green-100 h-32 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold text-2xl mx-auto mb-1 shadow-md">
                                    {{ strtoupper(substr($anggota->nama_lengkap, 0, 1)) }}
                                </div>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h4 class="font-bold text-gray-900">{{ $anggota->nama_lengkap }}</h4>
                            <p class="text-gray-600 text-sm">{{ $anggota->jabatan ?? 'Anggota' }}</p>
                            <p class="text-gray-400 text-xs mt-1">{{ $anggota->periode }}</p>
                            <button onclick="openDetailProfil({{ $anggota->id }})" class="mt-3 inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-1.5 rounded-lg text-xs font-semibold transition cursor-pointer">
                                <i class="fas fa-user mr-1"></i>Detail Profil
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 fade-in-up">
                        <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Belum ada data anggota baru.</p>
                    </div>
                @endforelse
            </div>

            @if($allAnggotas->count() > 0)
            <div class="text-center mt-12 fade-in-up">
                <button onclick="openAnggotaModal()" class="inline-block bg-green-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition cursor-pointer">
                    <i class="fas fa-users mr-2"></i>Lihat Semua Anggota
                </button>
            </div>
            @endif
        </div>
    </section>

    <!-- Modal Lihat Semua Anggota -->
    <div id="anggotaModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4" onclick="if(event.target === this) closeAnggotaModal()">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[85vh] flex flex-col">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-8 py-5 border-b border-gray-100">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Semua Anggota</h3>
                    <p class="text-sm text-gray-500">{{ $allAnggotas->count() }} anggota terdaftar</p>
                </div>
                <button onclick="closeAnggotaModal()" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 hover:text-gray-700 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            
            <!-- Modal Body (scrollable) -->
            <div class="overflow-y-auto flex-1 px-8 py-6">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($allAnggotas as $anggota)
                    <div class="bg-white rounded-xl border border-gray-200 hover:border-green-300 hover:shadow-md transition p-4 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                            {{ strtoupper(substr($anggota->nama_lengkap, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-semibold text-gray-900 truncate">{{ $anggota->nama_lengkap }}</h4>
                            <p class="text-xs text-gray-500 truncate">{{ $anggota->jabatan ?? 'Anggota' }}</p>
                            @if($anggota->periode)
                            <p class="text-xs text-gray-400">Periode {{ $anggota->periode }}</p>
                            @endif
                        </div>
                        <a href="{{ route('public.anggota.show', $anggota->id) }}" class="shrink-0 bg-green-50 hover:bg-green-100 text-green-600 hover:text-green-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                            <i class="fas fa-user mr-1"></i>Detail
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="px-8 py-4 border-t border-gray-100 flex justify-between items-center">
                <p class="text-sm text-gray-500">Klik "Detail" untuk melihat profil lengkap anggota</p>
                <button onclick="closeAnggotaModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-lg font-semibold transition text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Detail Profil Anggota -->
    <div id="detailProfilModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4" onclick="if(event.target === this) closeDetailProfil()">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-8 py-5 border-b border-gray-100">
                <div id="detailProfilHeader" class="flex items-center gap-4">
                    <div id="detailAvatar" class="w-14 h-14 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold text-2xl shadow-md"></div>
                    <div>
                        <h3 id="detailNama" class="text-xl font-bold text-gray-900"></h3>
                        <p id="detailJabatan" class="text-sm text-gray-500"></p>
                    </div>
                </div>
                <button onclick="closeDetailProfil()" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 hover:text-gray-700 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            
            <!-- Modal Body (scrollable) -->
            <div class="overflow-y-auto flex-1 px-8 py-6">
                <div id="detailContent" class="space-y-6">
                    <!-- will be filled by JavaScript -->
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="px-8 py-4 border-t border-gray-100 flex justify-end">
                <button onclick="closeDetailProfil()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-lg font-semibold transition text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Daftar Section -->
    <section id="daftar" class="py-20 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Pendaftaran <span class="text-green-500">Anggota</span></h2>
                <div class="w-24 h-1 bg-green-500 mx-auto mb-4"></div>
                <p class="text-gray-600 text-lg">Bergabunglah dengan organisasi kami!</p>
            </div>
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-12 fade-in-up scale-in">
                <div class="text-center mb-8">
                    <i class="fas fa-user-plus text-6xl text-green-500 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-900">Form Pendaftaran</h3>
                    <p class="text-gray-600 mt-2">Isi formulir di bawah untuk menjadi anggota kami</p>
                </div>
                <a href="{{ route('public.pendaftaran.create') }}" class="block w-full bg-green-500 text-white px-8 py-4 rounded-lg font-bold hover:bg-green-600 transition text-center text-lg">
                    <i class="fas fa-arrow-right mr-2"></i>Buka Form Pendaftaran
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div class="fade-in-up">
                    <h3 class="text-white font-bold text-lg mb-4">IDAKOM POLBAN</h3>
                    <p class="text-sm">Organisasi Daerah Mahasiswa Indramayu di Politeknik Negeri Bandung yang berkomitmen untuk pengembangan diri dan masyarakat.</p>
                </div>
                <div class="fade-in-up">
                    <h4 class="text-white font-bold mb-4">Menu</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#beranda" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-white transition">Tentang</a></li>
                        <li><a href="#struktur" class="hover:text-white transition">Struktur</a></li>
                        <li><a href="#program" class="hover:text-white transition">Program</a></li>
                    </ul>
                </div>
                <div class="fade-in-up">
                    <h4 class="text-white font-bold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#galeri" class="hover:text-white transition">Galeri</a></li>
                        <li><a href="#anggota" class="hover:text-white transition">Anggota</a></li>
                        <li><a href="#daftar" class="hover:text-white transition">Daftar</a></li>
                    </ul>
                </div>
                <div class="fade-in-up">
                    <h4 class="text-white font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Polban, Bandung</li>
                        <li><a href="mailto:ikadarmaayupolban@gmail.com" class="hover:text-white transition"><i class="fas fa-envelope mr-2"></i>ikadarmaayupolban@gmail.com</a></li>
                        <li><a href="https://wa.me/6282117030776" target="_blank" class="hover:text-white transition"><i class="fas fa-phone mr-2"></i>+62 82117030776</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center">
                <p class="text-sm">&copy; Created By 2023 IDAKOM POLBAN. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
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

        // Toggle Tentang (Lebih Detail / Ringkas)
        function toggleTentang() {
            const fullText = document.getElementById('tentangFull');
            const toggleText = document.getElementById('tentangToggleText');
            const toggleIcon = document.getElementById('tentangToggleIcon');
            
            if (fullText.classList.contains('hidden')) {
                fullText.classList.remove('hidden');
                toggleText.textContent = 'Ringkas';
                toggleIcon.style.transform = 'rotate(180deg)';
            } else {
                fullText.classList.add('hidden');
                toggleText.textContent = 'Lebih Detail';
                toggleIcon.style.transform = 'rotate(0deg)';
            }
        }

        // Scroll Animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right, .scale-in').forEach(el => {
            observer.observe(el);
        });

        // Smooth scroll untuk navbar
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Auto Image Slider
        let currentSlide = 0;
        const slider = document.getElementById('slider');
        const totalSlides = slider ? slider.children.length : 0;
        let slideInterval;

        function updateSlide(index) {
            if (!slider) return;
            currentSlide = index;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // PERBAIKAN: Selector untuk titik-titik indikator (dots) di bawah slider
            const dotsContainer = slider.parentNode.querySelector('.absolute.bottom-3');
            if(dotsContainer) {
                const dots = dotsContainer.querySelectorAll('span');
                dots.forEach((dot, i) => {
                    dot.style.background = i === currentSlide ? 'rgba(255,255,255,0.9)' : 'rgba(255,255,255,0.4)';
                });
            }
        }

        function slideTo(index) {
            clearInterval(slideInterval);
            updateSlide(index);
            startSlideInterval();
        }

        // PERBAIKAN: Menambahkan fungsi nextSlide()
        function nextSlide() {
            clearInterval(slideInterval);
            const nextIndex = (currentSlide + 1) % totalSlides;
            updateSlide(nextIndex);
            startSlideInterval();
        }

        // PERBAIKAN: Menambahkan fungsi prevSlide()
        function prevSlide() {
            clearInterval(slideInterval);
            const prevIndex = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlide(prevIndex);
            startSlideInterval();
        }

        function openAnggotaModal() {
            const modal = document.getElementById('anggotaModal');
            if (!modal) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeAnggotaModal() {
            const modal = document.getElementById('anggotaModal');
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        // Data anggota untuk detail profil (diisi dari server)
        const anggotaData = @json($allAnggotasJson);

        function openDetailProfil(id) {
            const data = anggotaData.find(a => a.id === id);
            if (!data) return;

            const inisial = data.nama_lengkap.charAt(0).toUpperCase();
            const fields = [
                { label: 'Nama Lengkap', value: data.nama_lengkap, icon: 'fa-user', color: 'green' },
                { label: 'Nama Panggilan', value: data.nama_panggilan || '-', icon: 'fa-smile', color: 'green' },
                { label: 'Jabatan', value: data.jabatan || 'Anggota', icon: 'fa-briefcase', color: 'blue' },
                { label: 'Divisi', value: data.divisi || '-', icon: 'fa-building', color: 'blue' },
                { label: 'Periode', value: data.periode || '-', icon: 'fa-calendar', color: 'purple' },
                { label: 'Asal Sekolah', value: data.asal_sekolah || '-', icon: 'fa-school', color: 'amber' },
                { label: 'Jurusan', value: data.jurusan || '-', icon: 'fa-book', color: 'amber' },
                { label: 'Program Studi', value: data.program_studi || '-', icon: 'fa-graduation-cap', color: 'amber' },
            ];

            // Set header
            document.getElementById('detailAvatar').textContent = inisial;
            document.getElementById('detailNama').textContent = data.nama_lengkap;
            document.getElementById('detailJabatan').textContent = data.jabatan || 'Anggota';

            // Set content
            const colors = {
                green: ['bg-green-100', 'text-green-600'],
                blue: ['bg-blue-100', 'text-blue-600'],
                purple: ['bg-purple-100', 'text-purple-600'],
                amber: ['bg-amber-100', 'text-amber-600'],
                red: ['bg-red-100', 'text-red-600'],
            };
            let contentHtml = '<div class="space-y-4">';
            fields.forEach(f => {
                const c = colors[f.color] || colors.green;
                contentHtml += `
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 ${c[0]} rounded-lg flex items-center justify-center ${c[1]} flex-shrink-0">
                            <i class="fas ${f.icon}"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 font-medium">${f.label}</p>
                            <p class="text-gray-900 font-semibold">${f.value}</p>
                        </div>
                    </div>
                `;
            });
            contentHtml += '</div>';
            document.getElementById('detailContent').innerHTML = contentHtml;

            // Show modal
            const modal = document.getElementById('detailProfilModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeDetailProfil() {
            const modal = document.getElementById('detailProfilModal');
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeAnggotaModal();
                closeDetailProfil();
            }
        });

        function startSlideInterval() {
            slideInterval = setInterval(() => {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlide(currentSlide);
            }, 3000);
        }

        if (totalSlides > 0) {
            startSlideInterval();
        }
    </script>
</body>
</html>