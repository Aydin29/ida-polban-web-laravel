@extends('admin.layout')

@section('title', $title)
@section('page-title', $title)
@section('page-description', 'Kelola link grup WhatsApp berdasarkan angkatan.')

@section('content')
    <div class="panel" style="max-width:600px;">
        <form action="{{ $route }}" method="POST">
            @csrf
            @if($method !== 'POST')
                @method($method)
            @endif

            <div style="margin-bottom:18px;">
                <label for="angkatan" style="display:block;font-weight:600;color:#374151;margin-bottom:6px;">Angkatan <span style="color:#ef4444;">*</span></label>
                <select id="angkatan" name="angkatan" required
                    style="width:100%;padding:10px 14px;border:1.5px solid #d1d5db;border-radius:8px;font-family:'Poppins',sans-serif;font-size:14px;outline:none;">
                    <option value="">Pilih Angkatan</option>
                    @for($year = 2050; $year >= 1997; $year--)
                        <option value="{{ $year }}" {{ old('angkatan', $waGroup->angkatan) == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
                @error('angkatan') <span style="color:#ef4444;font-size:13px;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom:18px;">
                <label for="nama_group" style="display:block;font-weight:600;color:#374151;margin-bottom:6px;">Nama Grup</label>
                <input type="text" id="nama_group" name="nama_group" value="{{ old('nama_group', $waGroup->nama_group) }}"
                    placeholder="Contoh: IDA POLBAN Angkatan 2023"
                    style="width:100%;padding:10px 14px;border:1.5px solid #d1d5db;border-radius:8px;font-family:'Poppins',sans-serif;font-size:14px;outline:none;">
                @error('nama_group') <span style="color:#ef4444;font-size:13px;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom:18px;">
                <label for="link_group" style="display:block;font-weight:600;color:#374151;margin-bottom:6px;">Link Grup WhatsApp <span style="color:#ef4444;">*</span></label>
                <input type="url" id="link_group" name="link_group" value="{{ old('link_group', $waGroup->link_group) }}"
                    placeholder="https://chat.whatsapp.com/..."
                    style="width:100%;padding:10px 14px;border:1.5px solid #d1d5db;border-radius:8px;font-family:'Poppins',sans-serif;font-size:14px;outline:none;" required>
                @error('link_group') <span style="color:#ef4444;font-size:13px;">{{ $message }}</span> @enderror
            </div>

            <div style="display:flex;gap:10px;margin-top:24px;">
                <button type="submit" class="btn">
                    <i class="fas fa-save"></i> {{ $method === 'POST' ? 'Simpan' : 'Perbarui' }}
                </button>
                <a href="{{ route('admin.wa-group.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
