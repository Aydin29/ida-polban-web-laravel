<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class GaleriImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'galeri_id',
        'gambar',
    ];

    public function galeri(): BelongsTo
    {
        return $this->belongsTo(Galeri::class);
    }

    public function getImageUrlAttribute(): string
    {
        $candidates = [$this->gambar, ltrim((string) preg_replace('#^galeri/#', '', $this->gambar), '/')];

        foreach ($candidates as $candidate) {
            if ($candidate !== '' && Storage::disk('galeri')->exists($candidate)) {
                return $this->diskRelativeUrl('galeri', $candidate);
            }
        }

        return $this->diskRelativeUrl('public', $this->gambar);
    }

    private function diskRelativeUrl(string $disk, string $path): string
    {
        $baseUrl = (string) config("filesystems.disks.{$disk}.url", '');
        $basePath = parse_url($baseUrl, PHP_URL_PATH);

        if (!is_string($basePath) || $basePath === '') {
            $basePath = $disk === 'public' ? '/storage' : '/galeri';
        }

        return rtrim($basePath, '/').'/'.ltrim($path, '/');
    }

    public function deleteStoredImage(): void
    {
        // Hapus di disk baru dan lama agar data lama tetap kompatibel.
        Storage::disk('galeri')->delete($this->gambar);
        Storage::disk('galeri')->delete(ltrim((string) preg_replace('#^galeri/#', '', $this->gambar), '/'));
        Storage::disk('public')->delete($this->gambar);
    }
}

