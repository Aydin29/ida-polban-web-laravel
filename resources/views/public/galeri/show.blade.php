<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Periode {{ $periode }} - IDAKOM POLBAN</title>
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
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2 text-2xl font-bold">
                <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN" class="h-14 w-auto">
                <span class="text-gray-900">IDAKOM <span class="text-green-500">POLBAN</span></span>
            </div>
            <a href="/" class="text-gray-700 hover:text-green-500 transition font-medium">← Kembali</a>
        </div>
    </nav>

    <!-- Header -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-2">Periode {{ $periode }}</h1>
            <p class="text-green-100 text-lg">Dokumentasi kegiatan IDAKOM POLBAN periode {{ $periode }}</p>
            <span class="inline-block mt-3 bg-white/20 px-4 py-1 rounded-full text-sm">
                <i class="fas fa-image mr-1"></i>{{ $galeris->sum(fn($g) => $g->images->count()) }} foto dari {{ $galeris->count() }} program
            </span>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('public.galeri.index') }}" class="inline-block text-green-600 hover:text-green-800 font-semibold mb-8">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Galeri
            </a>

            @foreach($galeris as $galeri)
                <div class="mb-12 bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">{{ $galeri->judul }}</h2>
                                @if($galeri->kategori)
                                    <span class="inline-block mt-1 bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">
                                        <i class="fas fa-tag mr-1"></i>{{ $galeri->kategori }}
                                    </span>
                                @endif
                            </div>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-image mr-1"></i>{{ $galeri->images->count() }} foto
                            </span>
                        </div>
                        @if($galeri->deskripsi)
                            <p class="text-gray-600 mt-3">{{ $galeri->deskripsi }}</p>
                        @endif
                    </div>

                    @if($galeri->images->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
                            @foreach($galeri->images as $image)
                                <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition transform hover:scale-[1.02]">
                                    <img src="{{ $image->image_url }}" alt="{{ $galeri->judul }}" class="w-full h-64 object-cover hover:scale-105 transition duration-300 cursor-pointer" onclick="openModal('{{ $image->image_url }}', '{{ $galeri->judul }}')">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-12 text-center">
                            <i class="fas fa-image text-5xl text-gray-300"></i>
                            <p class="text-gray-500 mt-2">Belum ada foto untuk program ini</p>
                        </div>
                    @endif
                </div>
            @endforeach

            <!-- Lightbox Modal -->
            <div id="imageModal" class="fixed inset-0 bg-black/80 z-50 hidden items-center justify-center p-4" onclick="closeModal(event)">
                <div class="max-w-4xl w-full">
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300 transition z-10">&times;</button>
                    <img id="modalImage" src="" alt="" class="w-full max-h-[80vh] object-contain rounded-lg mx-auto">
                    <p id="modalCaption" class="text-white text-center mt-4 text-lg font-semibold"></p>
                </div>
            </div>

            <!-- Back to list -->
            <div class="text-center mt-8">
                <a href="{{ route('public.galeri.index') }}" class="inline-block bg-green-500 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-600 transition">
                    <i class="fas fa-images mr-2"></i>Lihat Semua Galeri
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
        function openModal(src, caption) {
            document.getElementById('modalImage').src = src;
            document.getElementById('modalCaption').textContent = caption;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(event) {
            if (event && event.target !== event.currentTarget) return;
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('imageModal').classList.add('hidden');
                document.getElementById('imageModal').classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        });
    </script>
</body>
</html>
