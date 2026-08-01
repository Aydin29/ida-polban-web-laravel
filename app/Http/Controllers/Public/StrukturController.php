<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()
    {
        return view('public.struktur.index', [
            'strukturs' => Struktur::latest()->paginate(15),
        ]);
    }

    public function show(string $id)
    {
        return view('public.struktur.show', [
            'struktur' => Struktur::findOrFail($id),
        ]);
    }
}
