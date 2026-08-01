<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'periode',
    ];

    public static $kategoriList = [
        'Sosialisasi Pendidikan',
        'IDA Berbagi',
        'Indramayu Futsal League',
        'IDA Mengabdi',
        'Malam Keakraban',
        'Cover',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(GaleriImage::class);
    }
}
