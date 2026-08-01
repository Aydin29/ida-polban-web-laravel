<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
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

        $query = Anggota::latest();

        if ($request->filled('periode')) {
            $query->where('periode', $request->periode);
        }

        return view('public.anggota.index', [
            'anggotas' => $query->paginate(15)->withQueryString(),
            'periodeList' => $periodeList,
            'selectedPeriode' => $request->periode,
        ]);
    }

    public function show(string $id)
    {
        return view('public.anggota.show', [
            'anggota' => Anggota::findOrFail($id),
        ]);
    }
}
