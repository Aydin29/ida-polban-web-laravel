@extends('admin.layout')

@section('title', $title)
@section('page-title', $title)
@section('page-description', 'Kelola item galeri dan tautan gambar.')

@section('content')
    <div class="panel">
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
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

            <label>Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

            <label>Kategori Program & Kegiatan</label>
            <select name="kategori">
                <option value="">— Pilih Kategori —</option>
                @foreach(\App\Models\Galeri::$kategoriList as $kat)
                    <option value="{{ $kat }}" {{ old('kategori', $galeri->kategori) === $kat ? 'selected' : '' }}>{{ $kat }}</option>
                @endforeach
            </select>

            <label>Periode</label>
            <input type="text" name="periode" value="{{ old('periode', $galeri->periode) }}" placeholder="Contoh: 2024/2025">

            <label>Gambar (bisa pilih lebih dari 1)</label>
            <input type="file" name="images[]" multiple accept="image/*">

            @if($method !== 'POST' && $galeri->images->count() > 0)
                <div style="margin-top:16px;">
                    <label>Gambar Saat Ini:</label>
                    <div style="display:flex; flex-wrap:wrap; gap:12px; margin-top:8px;">
                        @foreach($galeri->images as $image)
                            <div style="position:relative; width:150px; border:1px solid #ddd; border-radius:8px; overflow:hidden;">
                                <img src="{{ $image->image_url }}" alt="Gambar" style="width:100%; height:120px; object-fit:cover;">
                                <div style="padding:6px; text-align:center;">
                                    <form action="{{ route('admin.galeri.image.delete', $image->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:#ef4444; color:white; border:none; padding:4px 12px; border-radius:4px; cursor:pointer; font-size:12px;">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <button type="submit" class="btn">Simpan Data</button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary" style="margin-left:12px;">Kembali</a>
        </form>
    </div>
@endsection
