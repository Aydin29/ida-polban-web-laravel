@extends('admin.layout')

@section('title', $title)
@section('page-title', $title)
@section('page-description', 'Kelola data lowongan dan kualifikasi yang tersedia.')

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

            <label>Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $lowongan->judul) }}" required>

            <label>Perusahaan</label>
            <input type="text" name="perusahaan" value="{{ old('perusahaan', $lowongan->perusahaan) }}">

            <label>Posisi</label>
            <input type="text" name="posisi" value="{{ old('posisi', $lowongan->posisi) }}" required>

            <label>Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $lowongan->lokasi) }}">

            <label>Tipe</label>
            <input type="text" name="tipe" value="{{ old('tipe', $lowongan->tipe) }}">

            <label>Badge</label>
            <input type="text" name="badge" value="{{ old('badge', $lowongan->badge) }}">

            <label>Tanggal Posting</label>
            <input type="date" name="tanggal_posting" value="{{ old('tanggal_posting', $lowongan->tanggal_posting) }}">

            <label>Kualifikasi</label>
            <textarea name="kualifikasi">{{ old('kualifikasi', $lowongan->kualifikasi) }}</textarea>

            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>

            <button type="submit" class="btn">Simpan Data</button>
            <a href="{{ route('admin.lowongan.index') }}" class="btn btn-secondary" style="margin-left:12px;">Kembali</a>
        </form>
    </div>
@endsection
