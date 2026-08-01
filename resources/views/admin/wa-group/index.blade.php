@extends('admin.layout')

@section('title', 'Link Grup WA')
@section('page-title', 'Link Grup WhatsApp')
@section('page-description', 'Kelola link grup WhatsApp berdasarkan angkatan.')

@section('content')
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom:18px;">
        <a href="{{ route('admin.wa-group.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Link Grup</a>
    </div>

    <div class="panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Angkatan</th>
                    <th>Nama Grup</th>
                    <th>Link Grup</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($waGroups as $group)
                    <tr>
                        <td><strong>{{ $group->angkatan }}</strong></td>
                        <td>{{ $group->nama_group ?: '-' }}</td>
                        <td>
                            <a href="{{ $group->link_group }}" target="_blank" style="color:#059669;text-decoration:underline;font-size:13px;">
                                <i class="fab fa-whatsapp"></i> {{ $group->link_group }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.wa-group.edit', $group) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.wa-group.destroy', $group) }}" method="POST" style="display:inline-block; margin-left:8px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus link grup ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada link grup WhatsApp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
