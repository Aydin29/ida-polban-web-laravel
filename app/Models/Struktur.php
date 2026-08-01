<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'periode',
        'jabatan',
        'nama',
        'divisi',
        'level',
        'icon',
        'urutan',
    ];
}
