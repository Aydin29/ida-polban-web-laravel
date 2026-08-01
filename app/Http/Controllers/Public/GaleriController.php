<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $periodeList = Galeri::whereNotNull('periode')
            ->select('periode')
            ->distinct()
            ->orderBy('periode', 'desc')
            ->pluck('periode');

        $galerisByPeriode = [];
        foreach ($periodeList as $periode) {
            $galerisByPeriode[$periode] = Galeri::with('images')
                ->where('periode', $periode)
                ->latest()
                ->get();
        }

        return view('public.galeri.index', [
            'galerisByPeriode' => $galerisByPeriode,
        ]);
    }

    public function show(string $periode)
    {
        $galeris = Galeri::with('images')
            ->where('periode', $periode)
            ->latest()
            ->get();

        if ($galeris->isEmpty()) {
            abort(404);
        }

        return view('public.galeri.show', [
            'galeris' => $galeris,
            'periode' => $periode,
        ]);
    }
}
