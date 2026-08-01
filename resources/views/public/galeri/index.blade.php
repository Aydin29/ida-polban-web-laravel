                <!DOCTYPE html>
                <html lang="id">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Galeri Kegiatan - IDAKOM POLBAN</title>
                    <link rel="icon" type="image/png" href="{{ asset('LOGOIDAHD.png') }}">
                    <script src="https://cdn.tailwindcss.com"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
                    <style>
                        * { font-family: 'Poppins', sans-serif; }
                    </style>
                </head>
                <body class="bg-gray-50">
                    <nav class="sticky top-0 z-50 bg-white shadow-md">
                        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                            <div class="flex items-center gap-2 text-2xl font-bold">
                                <img src="{{ asset('LOGOIDAHD.png') }}" alt="Logo IDAKOM POLBAN" class="h-14 w-auto">
                                <span class="text-gray-900">IDAKOM <span class="text-green-500">POLBAN</span></span>
                            </div>
                            <a href="/" class="text-gray-700 hover:text-green-500 transition font-medium">← Kembali</a>
                        </div>
                    </nav>

                    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white py-16">
                        <div class="max-w-7xl mx-auto px-6 text-center">
                            <h1 class="text-4xl font-bold mb-3">Galeri <span class="text-yellow-300">Kegiatan</span></h1>
                            <p class="text-green-100 text-lg">Dokumentasi kegiatan IDAKOM POLBAN berdasarkan periode kepengurusan</p>
                        </div>
                    </section>

                    <section class="py-16 px-6">
                        <div class="max-w-7xl mx-auto">
                            @forelse($galerisByPeriode as $periode => $galeris)
                                @php
                                    $firstGaleri = $galeris->first();
                                    $firstImage = $firstGaleri && $firstGaleri->images->isNotEmpty() ? $firstGaleri->images->first() : null;
                                    $totalImages = $galeris->sum(fn ($galeri) => $galeri->images->count());
                                    $totalPrograms = $galeris->count();
                                @endphp

                                <div class="mb-8">
                                    <a href="{{ route('public.galeri.show', ['periode' => $periode]) }}" class="block group">
                                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 group-hover:-translate-y-1">
                                            @if($firstImage)
                                                <div class="grid md:grid-cols-3">
                                                    <div class="md:col-span-1 h-64 md:h-auto min-h-[240px] overflow-hidden">
                                                        <img src="{{ $firstImage->image_url }}" alt="Periode {{ $periode }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                                    </div>
                                                    <div class="md:col-span-2 p-8 flex flex-col justify-between">
                                                        <div>
                                                            <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-4">Periode {{ $periode }}</span>
                                                            <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $firstGaleri->judul }}</h2>
                                                            <p class="text-gray-600 mb-5">{{ $firstGaleri->deskripsi ?: 'Lihat dokumentasi kegiatan pada periode ini.' }}</p>
                                                        </div>
                                                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                                            <span class="inline-flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg"><i class="fas fa-images text-green-500"></i>{{ $totalPrograms }} program</span>
                                                            <span class="inline-flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg"><i class="fas fa-photo-film text-green-500"></i>{{ $totalImages }} foto</span>
                                                            <span class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-lg ml-auto"><i class="fas fa-eye"></i>Lihat Semua</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="p-8">
                                                    <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-4">Periode {{ $periode }}</span>
                                                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $totalPrograms }} program tersedia</h2>
                                                    <p class="text-gray-600">Belum ada foto unggulan untuk periode ini, tetapi seluruh program tetap bisa dibuka.</p>
                                                    <div class="mt-5 inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-lg">
                                                        <i class="fas fa-eye"></i>Lihat Semua
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="text-center py-16 bg-white rounded-2xl shadow-lg">
                                    <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Belum ada galeri kegiatan</h2>
                                    <p class="text-gray-500">Tambahkan data galeri terlebih dahulu agar tampil di halaman publik.</p>
                                </div>
                            @endforelse
                        </div>
                    </section>

                    <footer class="bg-gray-900 text-gray-400 py-12 mt-8">
                        <div class="max-w-7xl mx-auto px-6 text-center">
                            <p>&copy; Created By 2023 IDAKOM POLBAN. All rights reserved.</p>
                        </div>
                    </footer>
                </body>
                </html>
                    </body>
                    </html>
