@extends('admin.layout')

@section('title', 'Struktur')
@section('page-title', 'Struktur Organisasi')
@section('page-description', 'Kelola struktur pengurus IDA POLBAN.')

@section('content')
    @if(session('success'))
        <div class="panel" style="background:#d1fae5; color:#065f46; border:1px solid #a7f3d0; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

<div style="margin-bottom:18px;">
        <p style="margin:0 0 12px 0;">Atur jabatan, nama pengurus, dan urutan struktur.</p>
        <a href="{{ route('admin.struktur.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Struktur</a>
    </div>

    <div class="panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Periode</th>
                    <th>Jabatan</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Level</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($strukturs as $struktur)
                    <tr>
                        <td>{{ $struktur->periode }}</td>
                        <td>{{ $struktur->jabatan }}</td>
                        <td>{{ $struktur->nama }}</td>
                        <td>{{ $struktur->divisi }}</td>
                        <td>{{ $struktur->level }}</td>
                        <td>{{ $struktur->urutan }}</td>
                        <td>
                            <a href="{{ route('admin.struktur.edit', $struktur) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.struktur.destroy', $struktur) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus struktur ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada data struktur.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div style="margin-top:18px;">
            {{ $strukturs->links() }}
        </div>
    </div>
@endsection
