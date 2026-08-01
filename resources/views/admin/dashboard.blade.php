@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Admin')
@section('page-description', 'Ringkasan semua data dan aktivitas terbaru.')

@section('content')
    <div class="stats">
        <div class="stat-card">
            <h2>{{ $anggotaCount }}</h2>
            <p>Anggota</p>
        </div>
        <div class="stat-card">
            <h2>{{ $strukturCount }}</h2>
            <p>Struktur</p>
        </div>
        <div class="stat-card">
            <h2>{{ $lowonganCount }}</h2>
            <p>Lowongan</p>
        </div>
        <div class="stat-card">
            <h2>{{ $galeriCount }}</h2>
            <p>Galeri</p>
        </div>
        <div class="stat-card">
            <h2>{{ $pendingCount }}</h2>
            <p>Menunggu</p>
        </div>
    </div>

    <div class="panel">
        <h3 style="margin-top:0;">Pendaftar Terbaru</h3>
        <table class="table" style="margin-top:16px;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Asal Sekolah</th>
                    <th>Program Studi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestPendaftar as $pendaftar)
                    <tr>
                        <td>{{ $pendaftar->nama_lengkap }}</td>
                        <td>{{ $pendaftar->asal_sekolah }}</td>
                        <td>{{ $pendaftar->program_studi }}</td>
                        <td>
                            @php
                                $statusLabel = match ($pendaftar->status) {
                                    'approved' => 'Diterima',
                                    'rejected' => 'Ditolak',
                                    default => 'Menunggu',
                                };

                                $statusDate = match ($pendaftar->status) {
                                    'approved' => $pendaftar->approved_at,
                                    'rejected' => $pendaftar->rejected_at,
                                    default => null,
                                };
                            @endphp
                            <div style="display:flex;flex-direction:column;gap:4px;">
                                <span class="badge">{{ $statusLabel }}</span>
                                <span style="font-size:12px;color:#6b7280;">
                                    {{ $statusDate ? $statusDate->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm:ss') : 'Belum ada tanggal keputusan' }}
                                </span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Belum ada pendaftar</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
