@extends('admin.layout')

@section('title', $title)
@section('page-title', $title)
@section('page-description', 'Kelola struktur organisasi dan jabatan pengurus.')

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

            <label>Periode</label>
            <input type="text" name="periode" value="{{ old('periode', $struktur->periode) }}">

            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $struktur->jabatan) }}" required>

            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $struktur->nama) }}" required>

            <label>Divisi</label>
            <input type="text" name="divisi" value="{{ old('divisi', $struktur->divisi) }}">

            <label>Level</label>
            <input type="number" name="level" value="{{ old('level', $struktur->level ?? 3) }}" min="1" max="5" required>

            <label>Icon</label>
            <input type="text" name="icon" value="{{ old('icon', $struktur->icon) }}">

            <label>Urutan</label>
            <input type="number" name="urutan" value="{{ old('urutan', $struktur->urutan ?? 0) }}">

            <button type="submit" class="btn">Simpan Data</button>
            <a href="{{ route('admin.struktur.index') }}" class="btn btn-secondary" style="margin-left:12px;">Kembali</a>
        </form>
    </div>
@endsection
