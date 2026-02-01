<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    /** @use HasFactory<\Database\Factories\HeroBannerFactory> */
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'dim',
        'firstButton',
        'firstButtonLabel',
        'secondButton',
        'secondButtonLabel',
    ];

    public function getImageUrlAttribute()
    {
        // Cek 1: Apakah file ada di STORAGE? (storage/app/public/...)
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }

        // Cek 2: Apakah file ada di PUBLIC ASSETS? (public/assets/...)
        if ($this->image && file_exists(public_path('asset/' . $this->image))) {
            return asset('asset/' . $this->image);
        }

        // Cek 3: Fallback / Default
        return asset('asset/sekolah sd bringin 01 semarang.jpg');
    }
}
