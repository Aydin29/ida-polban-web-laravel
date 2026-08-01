@extends('admin.layout')

@section('title', 'Detail Pendaftar')
@section('page-title', 'Detail Pendaftar')
@section('page-description', 'Lihat informasi lengkap pendaftar.')

@section('content')
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Header -->
    <div class="panel" style="margin-bottom:24px;padding:0;overflow:hidden;">
        <div style="background:linear-gradient(135deg,#059669,#047857,#065f46);padding:28px 32px;color:#fff;display:flex;align-items:center;gap:20px;flex-wrap:wrap;">
            <div style="width:64px;height:64px;border-radius:16px;background:rgba(255,255,255,0.15);display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:700;flex-shrink:0;">
                {{ strtoupper(substr($pendaftaran->nama_lengkap, 0, 1)) }}
            </div>
            <div style="flex:1;min-width:180px;">
                <h2 style="margin:0;font-size:22px;font-weight:700;">{{ $pendaftaran->nama_lengkap }}</h2>
                @if($pendaftaran->nama_panggilan)
                    <p style="margin:4px 0 0;opacity:0.75;font-size:14px;">
                        <i class="fas fa-user-tag" style="margin-right:6px;"></i> {{ $pendaftaran->nama_panggilan }}
                    </p>
                @endif
            </div>
            <div>
                @if(in_array($pendaftaran->status, ['pending', 'baru']))
                    <span style="display:inline-flex;align-items:center;gap:6px;padding:6px 16px;border-radius:50px;background:#fef3c7;color:#92400e;font-weight:600;font-size:12px;">
                        <i class="fas fa-hourglass-half"></i> Menunggu
                    </span>
                @elseif($pendaftaran->status === 'approved')
                    <span style="display:inline-flex;align-items:center;gap:6px;padding:6px 16px;border-radius:50px;background:#d1fae5;color:#065f46;font-weight:600;font-size:12px;">
                        <i class="fas fa-check-circle"></i> Diterima
                    </span>
                @elseif($pendaftaran->status === 'rejected')
                    <span style="display:inline-flex;align-items:center;gap:6px;padding:6px 16px;border-radius:50px;background:#fee2e2;color:#7f1d1d;font-weight:600;font-size:12px;">
                        <i class="fas fa-times-circle"></i> Ditolak
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Informasi Pribadi -->
    <div class="panel" style="margin-bottom:24px;">
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;padding-bottom:14px;border-bottom:2px solid #f0fdf4;">
            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#d1fae5,#a7f3d0);display:flex;align-items:center;justify-content:center;color:#065f46;font-size:16px;">
                <i class="fas fa-user"></i>
            </div>
            <div>
                <h3 style="margin:0;font-size:15px;font-weight:700;color:#065f46;">Informasi Pribadi</h3>
                <p style="margin:1px 0 0;font-size:11px;color:#9ca3af;">Data diri pendaftar</p>
            </div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;">
            <div>
                <div class="detail-label">Nama Lengkap</div>
                <div class="detail-value">{{ $pendaftaran->nama_lengkap }}</div>
            </div>
            <div>
                <div class="detail-label">Nama Panggilan</div>
                <div class="detail-value">{{ $pendaftaran->nama_panggilan ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Tempat Lahir</div>
                <div class="detail-value">{{ $pendaftaran->tempat_lahir ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Tanggal Lahir</div>
                <div class="detail-value">{{ $pendaftaran->tanggal_lahir ? $pendaftaran->tanggal_lahir->format('d M Y') : '-' }}</div>
            </div>
        </div>
    </div>

    <!-- Informasi Kontak -->
    <div class="panel" style="margin-bottom:24px;">
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;padding-bottom:14px;border-bottom:2px solid #f0fdf4;">
            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#dbeafe,#bfdbfe);display:flex;align-items:center;justify-content:center;color:#1e40af;font-size:16px;">
                <i class="fas fa-address-card"></i>
            </div>
            <div>
                <h3 style="margin:0;font-size:15px;font-weight:700;color:#065f46;">Informasi Kontak</h3>
                <p style="margin:1px 0 0;font-size:11px;color:#9ca3af;">Kontak yang bisa dihubungi</p>
            </div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;">
            <div>
                <div class="detail-label">No. HP</div>
                <div class="detail-value">{{ $pendaftaran->nomor_hp ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $pendaftaran->email ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Instagram</div>
                <div class="detail-value">
                    @if($pendaftaran->instagram)
                        <a href="https://instagram.com/{{ str_replace('@', '', $pendaftaran->instagram) }}" target="_blank" style="color:#059669;text-decoration:underline;">
                            <i class="fab fa-instagram"></i> {{ $pendaftaran->instagram }}
                        </a>
                    @else
                        -
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Pendidikan -->
    <div class="panel" style="margin-bottom:24px;">
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;padding-bottom:14px;border-bottom:2px solid #f0fdf4;">
            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#fef3c7,#fde68a);display:flex;align-items:center;justify-content:center;color:#92400e;font-size:16px;">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div>
                <h3 style="margin:0;font-size:15px;font-weight:700;color:#065f46;">Informasi Pendidikan</h3>
                <p style="margin:1px 0 0;font-size:11px;color:#9ca3af;">Asal sekolah dan program studi</p>
            </div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;">
            <div>
                <div class="detail-label">Asal Sekolah</div>
                <div class="detail-value">{{ $pendaftaran->asal_sekolah ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Jurusan</div>
                <div class="detail-value">{{ $pendaftaran->jurusan ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Program Studi</div>
                <div class="detail-value">{{ $pendaftaran->program_studi ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Angkatan</div>
                <div class="detail-value">{{ $pendaftaran->angkatan ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Alamat Domisili</div>
                <div class="detail-value">{{ $pendaftaran->alamat_rumah ?: '-' }}</div>
            </div>
            <div>
                <div class="detail-label">Periode</div>
                <div class="detail-value">{{ $pendaftaran->periode ?: '-' }}</div>
            </div>
        </div>
    </div>

    <!-- Informasi Sistem -->
    <div class="panel" style="margin-bottom:24px;">
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;padding-bottom:14px;border-bottom:2px solid #f0fdf4;">
            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#ede9fe,#ddd6fe);display:flex;align-items:center;justify-content:center;color:#5b21b6;font-size:16px;">
                <i class="fas fa-cog"></i>
            </div>
            <div>
                <h3 style="margin:0;font-size:15px;font-weight:700;color:#065f46;">Informasi Sistem</h3>
                <p style="margin:1px 0 0;font-size:11px;color:#9ca3af;">Status dan waktu pendaftaran</p>
            </div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;">
            <div>
                <div class="detail-label">Status</div>
                <div class="detail-value">
                    @if(in_array($pendaftaran->status, ['pending', 'baru']))
                        <span style="display:inline-flex;align-items:center;gap:6px;padding:3px 12px;border-radius:50px;background:#fef3c7;color:#92400e;font-weight:600;font-size:11px;">
                            <i class="fas fa-hourglass-half"></i> Menunggu
                        </span>
                    @elseif($pendaftaran->status === 'approved')
                        <span style="display:inline-flex;align-items:center;gap:6px;padding:3px 12px;border-radius:50px;background:#d1fae5;color:#065f46;font-weight:600;font-size:11px;">
                            <i class="fas fa-check"></i> Diterima
                        </span>
                    @elseif($pendaftaran->status === 'rejected')
                        <span style="display:inline-flex;align-items:center;gap:6px;padding:3px 12px;border-radius:50px;background:#fee2e2;color:#7f1d1d;font-weight:600;font-size:11px;">
                            <i class="fas fa-times"></i> Ditolak
                        </span>
                    @endif
                </div>
            </div>
            <div>
                <div class="detail-label">Dibuat pada</div>
                <div class="detail-value">
                    <i class="far fa-calendar-alt" style="color:#9ca3af;margin-right:4px;"></i>
                    {{ $pendaftaran->created_at->format('d M Y H:i') }}
                </div>
            </div>
            @if($pendaftaran->updated_at && $pendaftaran->updated_at != $pendaftaran->created_at)
                <div>
                    <div class="detail-label">Terakhir diperbarui</div>
                    <div class="detail-value">
                        <i class="far fa-clock" style="color:#9ca3af;margin-right:4px;"></i>
                        {{ $pendaftaran->updated_at->format('d M Y H:i') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if($pendaftaran->bukti_file)
        <!-- Bukti File -->
        <div class="panel" style="margin-bottom:24px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;padding-bottom:14px;border-bottom:2px solid #f0fdf4;">
                <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#fce7f3,#fbcfe8);display:flex;align-items:center;justify-content:center;color:#9d174d;font-size:16px;">
                    <i class="fas fa-paperclip"></i>
                </div>
                <div>
                    <h3 style="margin:0;font-size:15px;font-weight:700;color:#065f46;">Bukti File</h3>
                    <p style="margin:1px 0 0;font-size:11px;color:#9ca3af;">Dokumen pendukung yang dilampirkan</p>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:14px;padding:14px 18px;background:#f9fafb;border-radius:10px;border:1px solid #e5e7eb;">
                <div style="width:44px;height:44px;border-radius:10px;background:#ecfdf5;display:flex;align-items:center;justify-content:center;color:#059669;font-size:20px;flex-shrink:0;">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:#1f2937;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        {{ basename($pendaftaran->bukti_file) }}
                    </div>
                    <div style="font-size:11px;color:#9ca3af;">Dokumen pendaftaran</div>
                </div>
                <a href="{{ asset('storage/' . $pendaftaran->bukti_file) }}" target="_blank" class="btn btn-secondary" style="padding:8px 16px;font-size:12px;white-space:nowrap;">
                    <i class="fas fa-download" style="font-size:11px;"></i> Download
                </a>
            </div>
        </div>
    @endif

    <!-- Action Buttons -->
    <div class="panel">
        <div style="display:flex;gap:10px;flex-wrap:wrap;align-items:center;">
            @if(in_array($pendaftaran->status, ['pending', 'baru']))
                <form action="{{ route('admin.pendaftaran.approve', $pendaftaran) }}" method="POST" style="display:flex;align-items:end;gap:10px;flex-wrap:wrap;">
                    @csrf
                    <div>
                        <label style="display:block;font-size:11px;font-weight:600;color:#374151;margin-bottom:4px;">
                            <i class="fas fa-calendar-alt" style="margin-right:4px;"></i> Periode
                        </label>
                        <input type="text" name="periode" required placeholder="2024/2025"
                               style="padding:9px 12px;border:1.5px solid #d1d5db;border-radius:8px;font-family:'Poppins',sans-serif;font-size:13px;outline:none;min-width:150px;transition:all 0.25s ease;"
                               onfocus="this.style.borderColor='#10b981';this.style.boxShadow='0 0 0 3px rgba(16,185,129,0.12)'"
                               onblur="this.style.borderColor='#d1d5db';this.style.boxShadow='none'">
                    </div>
                    <button type="submit" class="btn" style="padding:9px 20px;font-size:13px;">
                        <i class="fas fa-check"></i> Setujui
                    </button>
                </form>
                <form action="{{ route('admin.pendaftaran.reject', $pendaftaran) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn" style="background:linear-gradient(135deg,#ef4444,#dc2626);padding:9px 20px;font-size:13px;" onclick="return confirm('Tolak pendaftar ini?');">
                        <i class="fas fa-times"></i> Tolak
                    </button>
                </form>
            @elseif($pendaftaran->status === 'approved')
                <div style="display:flex;align-items:center;gap:8px;padding:10px 18px;background:#d1fae5;border-radius:10px;border:1px solid #a7f3d0;">
                    <i class="fas fa-check-circle" style="color:#059669;font-size:18px;"></i>
                    <span style="font-weight:600;color:#065f46;font-size:13px;">
                        Sudah diverifikasi
                        @if($pendaftaran->periode) — Periode: {{ $pendaftaran->periode }} @endif
                    </span>
                </div>
            @elseif($pendaftaran->status === 'rejected')
                <div style="display:flex;align-items:center;gap:8px;padding:10px 18px;background:#fee2e2;border-radius:10px;border:1px solid #fecaca;">
                    <i class="fas fa-times-circle" style="color:#dc2626;font-size:18px;"></i>
                    <span style="font-weight:600;color:#7f1d1d;font-size:13px;">Pendaftar ditolak</span>
                </div>
            @endif
            <div style="margin-left:auto;display:flex;gap:8px;">
                <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary" style="padding:9px 18px;font-size:13px;">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <form action="{{ route('admin.pendaftaran.destroy', $pendaftaran) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="padding:9px 18px;font-size:13px;" onclick="return confirm('Hapus pendaftar ini?');">
                        <i class="fas fa-trash" style="font-size:11px;"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .detail-label {
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .detail-value {
            font-size: 14px;
            font-weight: 500;
            color: #1f2937;
        }
    </style>
@endsection