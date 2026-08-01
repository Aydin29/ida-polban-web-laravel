@extends('admin.layout')

@section('title', 'Rekap Anggota')
@section('page-title', 'Rekap Data Anggota')
@section('page-description', 'Cetak rekap data anggota berdasarkan periode dan/atau tahun angkatan masuk dalam format PDF.')

@section('content')
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="panel" style="max-width:600px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:24px;">
            <div style="width:64px;height:64px;border-radius:16px;background:linear-gradient(135deg,#d1fae5,#a7f3d0);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:28px;color:#065f46;">
                <i class="fas fa-file-pdf"></i>
            </div>
            <h3 style="margin:0 0 4px;font-size:18px;font-weight:700;color:#1f2937;">Cetak Rekap Anggota</h3>
            <p style="margin:0;font-size:13px;color:#6b7280;">Pilih periode dan/atau tahun angkatan untuk mencetak rekap data anggota dalam format PDF.</p>
        </div>

        <form action="{{ route('admin.rekap.pdf') }}" method="GET" style="display:flex;flex-direction:column;gap:16px;">
            <div>
                <label style="display:block;font-weight:600;color:#374151;margin-bottom:6px;font-size:14px;">
                    <i class="fas fa-calendar-alt text-green-500 mr-1"></i> Pilih Periode (Opsional)
                </label>
                <select name="periode"
                        style="width:100%;padding:12px 14px;border:1.5px solid #d1d5db;border-radius:10px;font-family:'Poppins',sans-serif;font-size:14px;outline:none;transition:all 0.25s ease;"
                        onfocus="this.style.borderColor='#10b981';this.style.boxShadow='0 0 0 3px rgba(16,185,129,0.12)'"
                        onblur="this.style.borderColor='#d1d5db';this.style.boxShadow='none'">
                    <option value="">-- Semua Periode --</option>
                    @foreach($periodeList as $p)
                        <option value="{{ $p }}">{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label style="display:block;font-weight:600;color:#374151;margin-bottom:6px;font-size:14px;">
                    <i class="fas fa-graduation-cap text-green-500 mr-1"></i> Tahun Angkatan Masuk (Opsional)
                </label>
                <select name="angkatan"
                        style="width:100%;padding:12px 14px;border:1.5px solid #d1d5db;border-radius:10px;font-family:'Poppins',sans-serif;font-size:14px;outline:none;transition:all 0.25s ease;"
                        onfocus="this.style.borderColor='#10b981';this.style.boxShadow='0 0 0 3px rgba(16,185,129,0.12)'"
                        onblur="this.style.borderColor='#d1d5db';this.style.boxShadow='none'">
                    <option value="">-- Semua Angkatan --</option>
                    @foreach($angkatanList as $a)
                        <option value="{{ $a }}">{{ $a }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn" style="padding:14px 24px;font-size:15px;display:flex;align-items:center;justify-content:center;gap:10px;">
                <i class="fas fa-download"></i> Cetak PDF
            </button>
        </form>
    </div>
@endsection
