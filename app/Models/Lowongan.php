<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'perusahaan',
        'posisi',
        'lokasi',
        'kualifikasi',
        'deskripsi',
        'tipe',
        'badge',
        'tanggal_posting',
    ];
}
