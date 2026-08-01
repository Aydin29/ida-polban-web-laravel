<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Galeri;
use App\Models\Lowongan;
use App\Models\Pendaftaran;
use App\Models\Struktur;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'anggotaCount' => Anggota::count(),
            'strukturCount' => Struktur::count(),
            'lowonganCount' => Lowongan::count(),
            'galeriCount' => Galeri::count(),
            'pendingCount' => Pendaftaran::whereIn('status', ['pending', 'baru'])->count(),
            'latestPendaftar' => Pendaftaran::latest()->limit(5)->get(),
        ]);
    }
}
