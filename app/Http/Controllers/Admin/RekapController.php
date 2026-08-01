<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        $periodeList = Anggota::whereNotNull('periode')
            ->select('periode')
            ->distinct()
            ->orderBy('periode', 'desc')
            ->pluck('periode');

        $angkatanList = Anggota::whereNotNull('angkatan')
            ->select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan');

        return view('admin.rekap.index', compact('periodeList', 'angkatanList'));
    }

    public function pdf(Request $request)
    {
        $request->validate([
            'periode' => 'nullable|string|max:50',
            'angkatan' => 'nullable|string|max:50',
        ]);

        $periode = $request->periode;
        $angkatan = $request->angkatan;

        $query = Anggota::orderBy('jabatan');

        if ($periode) {
            $query->where('periode', $periode);
        }

        if ($angkatan) {
            $query->where('angkatan', $angkatan);
        }

        $anggotas = $query->get();

        $filename = 'rekap-anggota';
        if ($periode) {
            $filename .= '-periode-' . str_replace('/', '-', $periode);
        }
        if ($angkatan) {
            $filename .= '-angkatan-' . $angkatan;
        }
        $filename .= '.pdf';

        $useAngkatanLayout = $angkatan && ! $periode;
        $isLandscape = ! $useAngkatanLayout;
        $showJabatanDivisi = ! $useAngkatanLayout;

        $pdf = app('dompdf.wrapper')->loadView('admin.rekap.pdf', compact('anggotas', 'periode', 'angkatan', 'isLandscape', 'showJabatanDivisi'));
        $pdf->setPaper('a4', $isLandscape ? 'landscape' : 'portrait');

        return $pdf->download($filename);
    }
}

