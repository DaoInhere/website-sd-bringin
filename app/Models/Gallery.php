<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'photos',
        'description',
        'activityDate'
    ];

    protected $casts = [
        'activityDate' => 'date',
        'photos' => 'array', 
    ];

    // Helper: Ambil foto pertama sebagai sampul album
    public function getCoverUrlAttribute()
    {
        // Jika photos ada isinya dan berupa array
        if (is_array($this->photos) && count($this->photos) > 0) {
            $firstPhoto = $this->photos[0];

            if (file_exists(public_path('storage/' . $firstPhoto))) {
                return asset('storage/' . $firstPhoto);
            }
        }

        // Fallback / Gambar Default
        return asset('asset/sekolah sd bringin 01 semarang.jpg');
    }
}