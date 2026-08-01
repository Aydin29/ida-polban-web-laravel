<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnggotaController as AdminAnggotaController;
use App\Http\Controllers\Admin\StrukturController as AdminStrukturController;
use App\Http\Controllers\Admin\LowonganController as AdminLowonganController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\PendaftaranController as AdminPendaftaranController;
use App\Http\Controllers\Admin\WaGroupController;
use App\Http\Controllers\Admin\RekapController as AdminRekapController;
use App\Http\Controllers\Public\AnggotaController;
use App\Http\Controllers\Public\StrukturController;
use App\Http\Controllers\Public\LowonganController;
use App\Http\Controllers\Public\GaleriController;
use App\Http\Controllers\Public\PendaftaranController;
use App\Models\Anggota;

Route::get('/', function () {
    $galeris = \App\Models\Galeri::with('images')->whereNotNull('periode')->latest()->get();
    $periodeListGaleri = \App\Models\Galeri::whereNotNull('periode')
        ->select('periode')
        ->distinct()
        ->orderBy('periode', 'desc')
        ->pluck('periode');
    $galerisByPeriode = [];
    foreach ($periodeListGaleri as $periode) {
        $galerisByPeriode[$periode] = \App\Models\Galeri::with('images')
            ->where('periode', $periode)
            ->latest()
            ->get();
    }
    $anggotas = Anggota::latest()->take(8)->get();
    $allAnggotas = Anggota::latest()->get();
    $allAnggotasJson = $allAnggotas->map(function($a) {
        return [
            'id' => $a->id,
            'nama_lengkap' => $a->nama_lengkap,
            'nama_panggilan' => $a->nama_panggilan,
            'jabatan' => $a->jabatan,
            'divisi' => $a->divisi,
            'periode' => $a->periode,
            'asal_sekolah' => $a->asal_sekolah,
            'jurusan' => $a->jurusan,
            'program_studi' => $a->program_studi,
            'alamat_rumah' => $a->alamat_rumah,
        ];
    });
    $periodeList = Anggota::whereNotNull('periode')->select('periode')->distinct()->orderBy('periode', 'desc')->pluck('periode');
    $strukturs = \App\Models\Struktur::orderBy('urutan')->get();
    $strukturPeriodeList = Anggota::whereNotNull('periode')->select('periode')->distinct()->orderBy('periode', 'desc')->pluck('periode');
    return view('welcome', compact('galeris', 'galerisByPeriode', 'anggotas', 'allAnggotas', 'allAnggotasJson', 'periodeList', 'strukturs', 'strukturPeriodeList'));
});

// Public Routes (tanpa login)
Route::prefix('public')->name('public.')->group(function () {
    Route::get('anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('anggota/{anggota}', [AnggotaController::class, 'show'])->name('anggota.show');
    
    Route::get('struktur', [StrukturController::class, 'index'])->name('struktur.index');
    Route::get('struktur/{struktur}', [StrukturController::class, 'show'])->name('struktur.show');
    
    Route::get('lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
    Route::get('lowongan/{lowongan}', [LowonganController::class, 'show'])->name('lowongan.show');
    
    Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
        Route::get('galeri/periode/{periode}', [GaleriController::class, 'show'])
            ->where('periode', '.*')
            ->name('galeri.show');
    
    Route::get('pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('pendaftaran/success', [PendaftaranController::class, 'success'])->name('pendaftaran.success');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('anggota', AdminAnggotaController::class)->parameters(['anggota' => 'anggota']);
    Route::post('anggota/{anggota}/duplicate', [AdminAnggotaController::class, 'duplicate'])->name('anggota.duplicate');
    Route::delete('anggota/bulk/delete', [AdminAnggotaController::class, 'bulkDestroy'])->name('anggota.bulk-destroy');
    Route::resource('struktur', AdminStrukturController::class)->parameters(['struktur' => 'struktur']);
    Route::resource('lowongan', AdminLowonganController::class)->parameters(['lowongan' => 'lowongan']);
    Route::resource('galeri', AdminGaleriController::class)->parameters(['galeri' => 'galeri']);
    Route::delete('galeri/image/{galeriImage}', [AdminGaleriController::class, 'deleteImage'])->name('galeri.image.delete');
    Route::resource('pendaftaran', AdminPendaftaranController::class)->only(['index', 'show', 'destroy'])->parameters(['pendaftaran' => 'pendaftaran']);
    Route::delete('pendaftaran/bulk/delete', [AdminPendaftaranController::class, 'bulkDestroy'])->name('pendaftaran.bulk-destroy');
    Route::post('pendaftaran/{pendaftaran}/approve', [AdminPendaftaranController::class, 'approve'])->name('pendaftaran.approve');
    Route::post('pendaftaran/{pendaftaran}/reject', [AdminPendaftaranController::class, 'reject'])->name('pendaftaran.reject');
    Route::resource('wa-group', WaGroupController::class)->parameters(['wa-group' => 'wa_group']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('rekap', [AdminRekapController::class, 'index'])->name('rekap.index');
    Route::get('rekap/pdf', [AdminRekapController::class, 'pdf'])->name('rekap.pdf');
});
