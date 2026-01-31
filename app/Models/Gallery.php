<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'photo',
        'description',
        'activityDate'
    ];

    protected $casts = [
        'activityDate' => 'date',
    ];

    public function getPhotoUrlAttribute()
    {
        // Cek 1: Apakah file ada di STORAGE? (storage/app/public/...)
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }

        // Cek 2: Apakah file ada di PUBLIC ASSETS? (public/assets/...)
        if ($this->photo && file_exists(public_path('asset/' . $this->photo))) {
            return asset('asset/' . $this->photo);
        }

        // Cek 3: Fallback / Default
        return asset('asset/sekolah sd bringin 01 semarang.jpg');
    }
}