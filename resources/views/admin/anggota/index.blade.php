@extends('admin.layout')

@section('title', 'Anggota')
@section('page-title', 'Data Anggota')
@section('page-description', 'Kelola data anggota IDA POLBAN.')

@section('content')
    @if(session('success'))
        <div class="panel" style="background:#d1fae5; color:#065f46; border:1px solid #a7f3d0; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="panel" style="background:#fee2e2; color:#7f1d1d; border:1px solid #fecaca; margin-bottom:20px;">
            {{ session('error') }}
        </div>
    @endif

    <div style="margin-bottom:18px;">
        <p style="margin:0 0 12px 0;">Kelola anggota, edit data, atau hapus anggota yang tidak aktif.</p>
        <a href="{{ route('admin.anggota.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Anggota</a>
    </div>

    <!-- Filter Periode -->
    <div class="panel" style="padding:16px 20px; margin-bottom:18px;">
        <form method="GET" action="{{ route('admin.anggota.index') }}" style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
            <label style="font-weight:600; color:#374151; margin:0;">Filter Periode:</label>
            <select name="periode" style="padding:8px 12px; border:1px solid #d1d5db; border-radius:8px; font-family:'Poppins',sans-serif; outline:none;">
                <option value="">Semua Periode</option>
                @foreach($periodeList as $p)
                    <option value="{{ $p }}" {{ $selectedPeriode === $p ? 'selected' : '' }}>{{ $p }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn" style="padding:8px 16px;">Tampilkan</button>
            @if($selectedPeriode)
                <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary" style="padding:8px 16px;">Reset</a>
            @endif
        </form>
    </div>

    <div class="panel">
        <form id="bulkDeleteForm" action="{{ route('admin.anggota.bulk-destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <div style="display:flex;gap:10px;align-items:center;margin-bottom:14px;">
                <button type="button" id="selectAllBtn" class="btn btn-secondary" style="padding:6px 14px;font-size:12px;">
                    <i class="fas fa-check-double"></i> Pilih Semua
                </button>
                <button type="submit" id="bulkDeleteBtn" class="btn btn-danger" style="padding:6px 14px;font-size:12px;display:none;" onclick="return confirm('Hapus semua anggota yang dipilih?');">
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
                        <th>Jabatan</th>
                        <th>Divisi</th>
                        <th>Periode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggotas as $anggota)
                        <tr>
                            <td style="text-align:center;">
                                <input type="checkbox" name="ids[]" value="{{ $anggota->id }}" class="select-item" style="width:16px;height:16px;cursor:pointer;">
                            </td>
                            <td>{{ $anggota->nama_lengkap }}</td>
                            <td>{{ $anggota->jabatan }}</td>
                            <td>{{ $anggota->divisi }}</td>
                            <td>{{ $anggota->periode }}</td>
                            <td>
                                <a href="{{ route('admin.anggota.edit', $anggota) }}" class="btn btn-secondary">Edit</a>
                                <button type="button" class="btn btn-info" style="margin-left:8px;" onclick="confirmDuplicate('{{ route('admin.anggota.duplicate', $anggota) }}')">Duplikat</button>
                                <button type="button" class="btn btn-danger" style="margin-left:8px;" onclick="confirmDelete('{{ route('admin.anggota.destroy', $anggota) }}')">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada anggota.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </form>
        <div style="margin-top:18px;">
            {{ $anggotas->links() }}
        </div>
    </div>
@endsection

@section('scripts')
<script>
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

    checkAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
        updateBulkDeleteBtn();
    });

    selectAllBtn.addEventListener('click', function() {
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        checkboxes.forEach(cb => cb.checked = !allChecked);
        checkAll.checked = !allChecked;
        updateBulkDeleteBtn();
    });

    checkboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const allChecked = Array.from(checkboxes).every(c => c.checked);
            checkAll.checked = allChecked;
            updateBulkDeleteBtn();
        });
    });

    function confirmDelete(actionUrl) {
        if (!confirm('Hapus anggota ini?')) {
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

    function confirmDuplicate(actionUrl) {
        if (!confirm('Duplikat anggota ini?')) {
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

        document.body.appendChild(form);
        form.submit();
    }
</script>
@endsection
