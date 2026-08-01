<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnggotaRequest;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $periodeList = Anggota::whereNotNull('periode')
            ->select('periode')
            ->distinct()
            ->orderBy('periode', 'desc')
            ->pluck('periode');

        $query = Anggota::query();

        if ($request->filled('periode')) {
            $query->where('periode', $request->periode);
        }

        $query->orderByRaw("CASE jabatan
            WHEN 'Ketua Umum' THEN 1
            WHEN 'Sekretaris Umum' THEN 2
            WHEN 'Bendahara Umum' THEN 3
            WHEN 'Sekretaris 1' THEN 4
            WHEN 'Bendahara Umum 2' THEN 5
            WHEN 'Ketua Bidang Internal' THEN 6
            WHEN 'Ketua Bidang Eksternal' THEN 7
            WHEN 'Anggota Bidang Internal' THEN 8
            WHEN 'Anggota Bidang Eksternal' THEN 9
            ELSE 10
        END")
        ->orderBy('nama_lengkap');

        return view('admin.anggota.index', [
            'anggotas' => $query->paginate(15)->withQueryString(),
            'periodeList' => $periodeList,
            'selectedPeriode' => $request->periode,
        ]);
    }

    public function create()
    {
        return view('admin.anggota.form', [
            'anggota' => new Anggota(),
            'method' => 'POST',
            'route' => route('admin.anggota.store'),
            'title' => 'Tambah Anggota',
        ]);
    }

    public function store(AnggotaRequest $request)
    {
        Anggota::create($request->validated());

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.anggota.edit', $id);
    }

    public function edit(string $id)
    {
        return view('admin.anggota.form', [
            'anggota' => Anggota::findOrFail($id),
            'method' => 'PUT',
            'route' => route('admin.anggota.update', $id),
            'title' => 'Edit Anggota',
        ]);
    }

    public function update(AnggotaRequest $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->validated());

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Anggota::findOrFail($id)->delete();

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }

    public function duplicate(string $id)
    {
        $anggota = Anggota::findOrFail($id);

        $clone = $anggota->replicate();
        // Mark as copy to help identify duplicated records
        if ($clone->nama_panggilan) {
            $clone->nama_panggilan = $clone->nama_panggilan . ' (copy)';
        } else {
            $clone->nama_lengkap = $clone->nama_lengkap . ' (copy)';
        }

        $clone->save();

        return redirect()->route('admin.anggota.edit', $clone->id)->with('success', 'Anggota berhasil diduplikasi.');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        
        if (empty($ids)) {
            return redirect()->route('admin.anggota.index')->with('error', 'Tidak ada anggota yang dipilih.');
        }

        $count = count($ids);
        Anggota::whereIn('id', $ids)->delete();

        return redirect()->route('admin.anggota.index')->with('success', "$count anggota berhasil dihapus.");
    }
}
