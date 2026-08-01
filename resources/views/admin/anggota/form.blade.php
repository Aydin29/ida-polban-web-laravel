@extends('admin.layout')

@section('title', $title)
@section('page-title', $title)
@section('page-description', 'Isi data anggota untuk publikasi atau administrasi internal.')

@section('content')
    <div class="panel">
        <form action="{{ $route }}" method="POST">
            @csrf
            @if($method !== 'POST')
                @method($method)
            @endif

            @if($errors->any())
                <div class="panel" style="background:#fee2e2; color:#991b1b; border:1px solid #fecaca; margin-bottom:20px;">
                    <ul style="margin:0; padding-left:18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}" required>

            <label>Nama Panggilan</label>
            <input type="text" name="nama_panggilan" value="{{ old('nama_panggilan', $anggota->nama_panggilan) }}">

            <label>Asal Sekolah</label>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $anggota->asal_sekolah) }}">

            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $anggota->jurusan) }}">

            <label>Program Studi</label>
            <input type="text" name="program_studi" value="{{ old('program_studi', $anggota->program_studi) }}">

            <label>Tahun Angkatan Masuk</label>
            <input type="text" name="angkatan" value="{{ old('angkatan', $anggota->angkatan) }}" placeholder="Contoh: 2023">

            <label>Alamat Rumah</label>
            <textarea name="alamat_rumah">{{ old('alamat_rumah', $anggota->alamat_rumah) }}</textarea>

            <label>Jabatan</label>
            <select name="jabatan" id="jabatanSelect" onchange="updateDivisi()" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 w-full" style="font-family:'Poppins',sans-serif; font-size:14px;">
                <option value="">Pilih Jabatan</option>
                <option value="Ketua Umum" {{ old('jabatan', $anggota->jabatan) == 'Ketua Umum' ? 'selected' : '' }}>Ketua Umum</option>
                <option value="Sekretaris Umum" {{ old('jabatan', $anggota->jabatan) == 'Sekretaris Umum' ? 'selected' : '' }}>Sekretaris Umum</option>
                <option value="Bendahara Umum" {{ old('jabatan', $anggota->jabatan) == 'Bendahara Umum' ? 'selected' : '' }}>Bendahara Umum</option>
                <option value="Sekretaris 1" {{ old('jabatan', $anggota->jabatan) == 'Sekretaris 1' ? 'selected' : '' }}>Sekretaris 1</option>
                <option value="Bendahara Umum 2" {{ old('jabatan', $anggota->jabatan) == 'Bendahara Umum 2' ? 'selected' : '' }}>Bendahara Umum 2</option>
                <option value="Ketua Bidang Internal" {{ old('jabatan', $anggota->jabatan) == 'Ketua Bidang Internal' ? 'selected' : '' }}>Ketua Bidang Internal</option>
                <option value="Ketua Bidang Eksternal" {{ old('jabatan', $anggota->jabatan) == 'Ketua Bidang Eksternal' ? 'selected' : '' }}>Ketua Bidang Eksternal</option>
                <option value="Anggota Bidang Internal" {{ old('jabatan', $anggota->jabatan) == 'Anggota Bidang Internal' ? 'selected' : '' }}>Anggota Bidang Internal</option>
                <option value="Anggota Bidang Eksternal" {{ old('jabatan', $anggota->jabatan) == 'Anggota Bidang Eksternal' ? 'selected' : '' }}>Anggota Bidang Eksternal</option>
            </select>

            <label>Divisi</label>
            <input type="text" name="divisi" id="divisiInput" value="{{ old('divisi', $anggota->divisi) }}" readonly style="background:#f3f4f6;">

            <label>Periode</label>
            <input type="text" name="periode" value="{{ old('periode', $anggota->periode) }}">

            <button type="submit" class="btn">Simpan Data</button>
            <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary" style="margin-left:12px;">Kembali</a>
        </form>
    </div>

    <script>
        function updateDivisi() {
            const jabatan = document.getElementById('jabatanSelect').value;
            const divisiInput = document.getElementById('divisiInput');
            const map = {
                'Ketua Umum': 'Pimpinan',
                'Sekretaris Umum': 'Sekretaris',
                'Bendahara Umum': 'Bendahara',
                'Sekretaris 1': 'Sekretaris',
                'Bendahara Umum 2': 'Bendahara',
                'Ketua Bidang Internal': 'Bidang Internal',
                'Ketua Bidang Eksternal': 'Bidang Eksternal',
                'Anggota Bidang Internal': 'Bidang Internal',
                'Anggota Bidang Eksternal': 'Bidang Eksternal'
            };
            divisiInput.value = map[jabatan] || '';
        }
        // Set initial value on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateDivisi();
        });
    </script>
@endsection
