<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran - IDAKOM POLBAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('LOGOIDAHD.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
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

    <!-- Form Section -->
    <section class="py-20 px-6">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Form <span class="text-green-500">Pendaftaran</span></h1>
                <p class="text-gray-600 text-lg">Bergabunglah dengan Organisasi IDAKOM POLBAN</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-12">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                        <h3 class="font-bold mb-2">Ada kesalahan:</h3>
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nama_lengkap" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-user text-green-500 mr-2"></i>Nama Lengkap
                        </label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Masukkan nama lengkap Anda" required>
                        @error('nama_lengkap')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_panggilan" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-tag text-green-500 mr-2"></i>Nama Panggilan
                        </label>
                        <input type="text" id="nama_panggilan" name="nama_panggilan" value="{{ old('nama_panggilan') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Nama panggilan Anda" required>
                        @error('nama_panggilan')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="tempat_lahir" class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-map-marker-alt text-green-500 mr-2"></i>Tempat Lahir
                            </label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Contoh: Indramayu" required>
                            @error('tempat_lahir')
                                <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-calendar text-green-500 mr-2"></i>Tanggal Lahir
                            </label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            @error('tanggal_lahir')
                                <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nomor_hp" class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-phone text-green-500 mr-2"></i>Nomor HP
                            </label>
                            <input type="tel" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Contoh: 08123456789" required>
                            @error('nomor_hp')
                                <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-envelope text-green-500 mr-2"></i>Email Pribadi
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="contoh@email.com" required>
                            @error('email')
                                <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="instagram" class="block text-gray-700 font-semibold mb-2">
                            <i class="fab fa-instagram text-green-500 mr-2"></i>Instagram
                        </label>
                        <input type="text" id="instagram" name="instagram" value="{{ old('instagram') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="@username" required>
                        @error('instagram')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="asal_sekolah" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-school text-green-500 mr-2"></i>Asal Sekolah
                        </label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Nama sekolah/madrasah Anda" required>
                        @error('asal_sekolah')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="jurusan" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-book text-green-500 mr-2"></i>Jurusan
                        </label>
                        <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Teknik Elektro" required>
                        @error('jurusan')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

<div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="program_studi" class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-graduation-cap text-green-500 mr-2"></i>Program Studi
                            </label>
                            <input type="text" id="program_studi" name="program_studi" value="{{ old('program_studi') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="D3 - Teknik Telekomunikasi" required>
                            @error('program_studi')
                                <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="angkatan" class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-calendar-check text-green-500 mr-2"></i>Angkatan Tahun Masuk
                            </label>
                            <select id="angkatan" name="angkatan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Angkatan</option>
                                @for($year = 2050; $year >= 1997; $year--)
                                    <option value="{{ $year }}" {{ old('angkatan') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                            @error('angkatan')
                                <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="alamat_rumah" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-home text-green-500 mr-2"></i>Alamat Domisili
                        </label>
                        <textarea id="alamat_rumah" name="alamat_rumah" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Mis. Desa Cantigi, Kec. Cangkring, Kab. Indramayu">{{ old('alamat_rumah') }}</textarea>
                        @error('alamat_rumah')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="bukti_file" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-file text-green-500 mr-2"></i>Bukti File Penerimaan Jalur Masuk
                        </label>
                        <input type="file" id="bukti_file" name="bukti_file" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <p class="text-gray-500 text-sm mt-2">Format: PDF, JPG, PNG (Max: 2MB)</p>
                        @error('bukti_file')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-4 pt-6">
                        <button type="submit" class="flex-1 bg-green-500 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-600 transition flex items-center justify-center gap-2">
                            <i class="fas fa-check"></i>Kirim Pendaftaran
                        </button>
                        <a href="/" class="flex-1 bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-bold hover:bg-gray-400 transition flex items-center justify-center gap-2">
                            <i class="fas fa-times"></i>Batal
                        </a>
                    </div>
                </form>
            </div>

<div class="mt-8 text-center text-gray-600">
                <p>Ada pertanyaan? <a href="mailto:ikadarmaayupolban@gmail.com" class="text-green-500 hover:text-green-600 font-semibold">Hubungi kami</a></p>
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
