<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'nomor_hp',
        'asal_sekolah',
        'jurusan',
        'program_studi',
        'angkatan',
        'alamat_rumah',
        'jabatan',
        'divisi',
        'periode',
        'tahun_mulai',
        'tahun_selesai',
        'email',
        'no_wa',
    ];
}
