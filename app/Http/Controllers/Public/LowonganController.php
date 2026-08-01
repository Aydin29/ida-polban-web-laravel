<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        return view('public.lowongan.index', [
            'lowongans' => Lowongan::latest()->paginate(15),
        ]);
    }

    public function show(string $id)
    {
        return view('public.lowongan.show', [
            'lowongan' => Lowongan::findOrFail($id),
        ]);
    }
}
