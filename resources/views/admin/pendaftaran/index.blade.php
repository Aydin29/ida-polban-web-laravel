@extends('admin.layout')

@section('title', 'Pendaftar')
@section('page-title', 'Daftar Pendaftar')
@section('page-description', 'Tinjau dan kelola pendaftar yang mengajukan formulir.')

@section('content')
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="panel" style="background:#fee2e2; color:#7f1d1d; border:1px solid #fecaca; margin-bottom:20px;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Stats -->
    <div class="stats" style="grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:24px;">
        <div class="stat-card" style="padding:14px 12px;">
            <div style="font-size:16px;color:#10b981;margin-bottom:2px;"><i class="fas fa-users"></i></div>
            <h2 style="font-size:22px;margin:0;">{{ $totalCount }}</h2>
            <p style="font-size:11px;margin:2px 0 0;">Total</p>
        </div>
        <div class="stat-card" style="padding:14px 12px;">
            <div style="font-size:16px;color:#f59e0b;margin-bottom:2px;"><i class="fas fa-clock"></i></div>
            <h2 style="font-size:22px;margin:0;">{{ $pendingCount }}</h2>
            <p style="font-size:11px;margin:2px 0 0;">Menunggu</p>
        </div>
        <div class="stat-card" style="padding:14px 12px;">
            <div style="font-size:16px;color:#10b981;margin-bottom:2px;"><i class="fas fa-check-circle"></i></div>
            <h2 style="font-size:22px;margin:0;">{{ $approvedCount }}</h2>
            <p style="font-size:11px;margin:2px 0 0;">Diterima</p>
        </div>
        <div class="stat-card" style="padding:14px 12px;">
            <div style="font-size:16px;color:#ef4444;margin-bottom:2px;"><i class="fas fa-times-circle"></i></div>
            <h2 style="font-size:22px;margin:0;">{{ $rejectedCount ?? 0 }}</h2>
            <p style="font-size:11px;margin:2px 0 0;">Ditolak</p>
        </div>
    </div>

    <!-- Table Panel -->
    <div class="panel" style="padding:20px 24px;">
        <div style="display:flex;gap:10px;flex-wrap:wrap;align-items:center;margin-bottom:18px;padding-bottom:14px;border-bottom:1px solid #f3f4f6;">
            <div style="flex:1;min-width:200px;position:relative;">
                <i class="fas fa-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#9ca3af;font-size:13px;"></i>
                <input type="search" id="searchInput" placeholder="Cari nama, sekolah, atau program studi..."
                       style="width:100%;padding:10px 14px 10px 36px;border:1.5px solid #d1d5db;border-radius:10px;font-family:'Poppins',sans-serif;font-size:13px;outline:none;transition:all 0.25s ease;"
                       onfocus="this.style.borderColor='#10b981';this.style.boxShadow='0 0 0 3px rgba(16,185,129,0.12)'"
                       onblur="this.style.borderColor='#d1d5db';this.style.boxShadow='none'">
            </div>
            <button onclick="document.getElementById('searchInput').value='';location.reload();" class="btn btn-secondary" style="padding:10px 18px;font-size:13px;">
                <i class="fas fa-sync-alt" style="font-size:12px;"></i> Reset
            </button>
        </div>

        <div style="overflow-x:auto;">
            <form id="bulkDeleteForm" action="{{ route('admin.pendaftaran.bulk-destroy') }}" method="POST" style="margin-bottom:14px;">
                @csrf
                @method('DELETE')
                <div style="display:flex;gap:10px;align-items:center;margin-bottom:14px;">
                    <button type="button" id="selectAllBtn" class="btn btn-secondary" style="padding:6px 14px;font-size:12px;">
                        <i class="fas fa-check-double"></i> Pilih Semua
                    </button>
                    <button type="submit" id="bulkDeleteBtn" class="btn btn-danger" style="padding:6px 14px;font-size:12px;display:none;" onclick="return confirm('Hapus semua pendaftar yang dipilih?');">
                        <i class="fas fa-trash"></i> Hapus <span id="selectedCount">0</span> Terpilih
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:40px;">
                                <input type="checkbox" id="checkAll" style="width:16px;height:16px;cursor:pointer;">
                            </th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Sekolah</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                            <th>Tgl Daftar</th>
                            <th>Terakhir Diperbarui</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftarans as $pendaftar)
                            <tr>
                                <td style="text-align:center;">
                                    <input type="checkbox" name="ids[]" value="{{ $pendaftar->id }}" class="select-item" style="width:16px;height:16px;cursor:pointer;">
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px;">
                                        <div style="width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,#d1fae5,#a7f3d0);display:flex;align-items:center;justify-content:center;font-weight:700;color:#065f46;font-size:13px;flex-shrink:0;">
                                            {{ strtoupper(substr($pendaftar->nama_lengkap, 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong style="font-size:13px;color:#1f2937;">{{ $pendaftar->nama_lengkap }}</strong>
                                            <br><small style="color:#9ca3af;font-size:11px;">{{ $pendaftar->nama_panggilan }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span style="font-size:13px;">{{ $pendaftar->nomor_hp }}</span></td>
                                <td><span style="font-size:13px;color:#374151;">{{ $pendaftar->asal_sekolah }}</span></td>
                                <td><span style="font-size:13px;color:#374151;">{{ $pendaftar->program_studi }}</span></td>
                                <td><span style="font-size:13px;color:#374151;">{{ $pendaftar->angkatan ?: '-' }}</span></td>
                                <td>
                                    @if($pendaftar->status === 'pending' || $pendaftar->status === 'baru')
                                        <span class="badge" style="background:#fef3c7;color:#92400e;padding:3px 10px;font-size:11px;">
                                            <i class="fas fa-hourglass-half" style="margin-right:4px;font-size:9px;"></i> Menunggu
                                        </span>
                                    @elseif($pendaftar->status === 'approved')
                                        <span class="badge" style="background:#d1fae5;color:#065f46;padding:3px 10px;font-size:11px;">
                                            <i class="fas fa-check" style="margin-right:4px;font-size:9px;"></i> Diterima
                                        </span>
                                    @elseif($pendaftar->status === 'rejected')
                                        <span class="badge" style="background:#fee2e2;color:#7f1d1d;padding:3px 10px;font-size:11px;">
                                            <i class="fas fa-times" style="margin-right:4px;font-size:9px;"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td><span style="font-size:12px;color:#6b7280;"><i class="far fa-calendar-alt" style="margin-right:4px;"></i>{{ $pendaftar->created_at->format('d M Y') }}</span></td>
                                <td>
                                    <span class="relative-time" data-timestamp="{{ $pendaftar->updated_at->timestamp }}" style="font-size:12px;color:#6b7280;">
                                        <i class="far fa-clock" style="margin-right:4px;"></i>
                                        {{ $pendaftar->updated_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td style="text-align:center;white-space:nowrap;">
                                    <div style="display:flex;gap:5px;justify-content:center;">
                                        <a href="{{ route('admin.pendaftaran.show', $pendaftar) }}" class="btn btn-secondary" style="padding:6px 12px;font-size:12px;">
                                            <i class="fas fa-eye" style="font-size:11px;"></i> Lihat
                                        </a>
                                        <button type="button" class="btn btn-danger" style="padding:6px 12px;font-size:12px;" onclick="confirmDelete('{{ route('admin.pendaftaran.destroy', $pendaftar) }}')">
                                            <i class="fas fa-trash" style="font-size:11px;"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">
                                    <div style="text-align:center;padding:40px 20px;color:#9ca3af;">
                                        <div style="font-size:40px;margin-bottom:12px;opacity:0.4;"><i class="fas fa-inbox"></i></div>
                                        <h3 style="margin:0 0 4px;font-size:16px;color:#6b7280;">Belum Ada Pendaftar</h3>
                                        <p style="margin:0;font-size:13px;">Belum ada pendaftar yang masuk ke sistem.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>

        @if(method_exists($pendaftarans, 'links'))
            <div style="margin-top:20px;padding-top:14px;border-top:1px solid #f3f4f6;">
                {{ $pendaftarans->links() }}
            </div>
        @endif
    </div>
@endsection

@section('scripts')
<script>
    // Bulk select logic
    const checkAll = document.getElementById('checkAll');
    const selectAllBtn = document.getElementById('selectAllBtn');
    const checkboxes = document.querySelectorAll('.select-item');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    const selectedCount = document.getElementById('selectedCount');

    function updateBulkDeleteBtn() {
        const checked = document.querySelectorAll('.select-item:checked');
        const count = checked.length;
        if (count > 0) {
            bulkDeleteBtn.style.display = 'inline-flex';
            selectedCount.textContent = count;
        } else {
            bulkDeleteBtn.style.display = 'none';
        }
    }

    if (checkAll) {
        checkAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateBulkDeleteBtn();
        });
    }

    if (selectAllBtn) {
        selectAllBtn.addEventListener('click', function() {
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            checkboxes.forEach(cb => cb.checked = !allChecked);
            if (checkAll) checkAll.checked = !allChecked;
            updateBulkDeleteBtn();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const allChecked = Array.from(checkboxes).every(c => c.checked);
            if (checkAll) checkAll.checked = allChecked;
            updateBulkDeleteBtn();
        });
    });

    function confirmDelete(actionUrl) {
        if (!confirm('Hapus pendaftar ini?')) {
            return;
        }

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = actionUrl;

        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);

        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit();
    }

    // Real-time relative time updater
    function updateRelativeTimes() {
        const now = Math.floor(Date.now() / 1000);
        document.querySelectorAll('.relative-time').forEach(el => {
            const timestamp = parseInt(el.dataset.timestamp);
            if (!timestamp) return;
            
            const diff = now - timestamp;
            let text;
            
            if (diff < 60) {
                text = 'baru saja';
            } else if (diff < 3600) {
                const min = Math.floor(diff / 60);
                text = min + ' menit yang lalu';
            } else if (diff < 86400) {
                const jam = Math.floor(diff / 3600);
                text = jam + ' jam yang lalu';
            } else if (diff < 604800) {
                const hari = Math.floor(diff / 86400);
                text = hari + ' hari yang lalu';
            } else if (diff < 2592000) {
                const minggu = Math.floor(diff / 604800);
                text = minggu + ' minggu yang lalu';
            } else {
                const bulan = Math.floor(diff / 2592000);
                text = bulan + ' bulan yang lalu';
            }
            
            el.innerHTML = '<i class="far fa-clock" style="margin-right:4px;"></i>' + text;
        });
    }

    // Update every 30 seconds
    updateRelativeTimes();
    setInterval(updateRelativeTimes, 30000);
</script>
@endsection
