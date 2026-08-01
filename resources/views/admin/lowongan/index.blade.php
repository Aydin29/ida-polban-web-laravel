@extends('admin.layout')

@section('title', 'Lowongan')
@section('page-title', 'Lowongan Kerja')
@section('page-description', 'Kelola daftar lowongan yang tampil di website.')

@section('content')
    @if(session('success'))
        <div class="panel" style="background:#d1fae5; color:#065f46; border:1px solid #a7f3d0; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

<div style="margin-bottom:18px;">
        <p style="margin:0 0 12px 0;">Tambah lowongan baru atau edit informasi lowongan yang ada.</p>
        <a href="{{ route('admin.lowongan.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Lowongan</a>
    </div>

    <div class="panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Lokasi</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lowongans as $lowongan)
                    <tr>
                        <td>{{ $lowongan->judul }}</td>
                        <td>{{ $lowongan->perusahaan }}</td>
                        <td>{{ $lowongan->posisi }}</td>
                        <td>{{ $lowongan->lokasi }}</td>
                        <td>{{ $lowongan->tipe }}</td>
                        <td>
                            <a href="{{ route('admin.lowongan.edit', $lowongan) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.lowongan.destroy', $lowongan) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus lowongan ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada lowongan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div style="margin-top:18px;">
            {{ $lowongans->links() }}
        </div>
    </div>
@endsection
