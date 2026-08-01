@extends('admin.layout')

@section('title', 'Galeri')
@section('page-title', 'Galeri Foto')
@section('page-description', 'Kelola album dan konten galeri IDA POLBAN.')

@section('content')
    @if(session('success'))
        <div class="panel" style="background:#d1fae5; color:#065f46; border:1px solid #a7f3d0; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

<div style="margin-bottom:18px;">
        <p style="margin:0 0 12px 0;">Tambahkan gambar dan deskripsi galeri baru.</p>
        <a href="{{ route('admin.galeri.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Galeri</a>
    </div>

    <div class="panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Periode</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $galeri)
                    <tr>
                        <td>{{ $galeri->judul }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($galeri->deskripsi, 80) }}</td>
                        <td>
                            @if($galeri->kategori)
                                <span class="badge">{{ $galeri->kategori }}</span>
                            @else
                                <span style="color:#9ca3af;">—</span>
                            @endif
                        </td>
                        <td>{{ $galeri->periode ?: '-' }}</td>
                        <td>{{ $galeri->images_count }} gambar</td>
                        <td>
                            <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus galeri ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div style="margin-top:18px;">
            {{ $galeris->links() }}
        </div>
    </div>
@endsection

