<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_hp',
        'email',
        'instagram',
        'asal_sekolah',
        'jurusan',
'program_studi',
        'angkatan',
        'alamat_rumah',
        'bukti_file',
        'status',
        'approved_at',
        'rejected_at',
        'periode',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];
}
