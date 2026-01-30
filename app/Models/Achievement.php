<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'name', 'category', 'level', 'position', 
        'award', 'date', 'description', 'image'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function getImageUrlAttribute()
    {
        // Cek 1: Apakah file ada di STORAGE? (storage/app/public/...)
        // Biasanya untuk file hasil upload user via form
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }

        // Cek 2: Apakah file ada di PUBLIC ASSETS? (public/assets/...)
        // Biasanya untuk file statis/manual yang kamu copy paste ke folder project
        // Fungsi public_path() mengarah ke folder public utama
        if ($this->image && file_exists(public_path('asset/' . $this->image))) {
            return asset('asset/' . $this->image);
        }

        // Cek 3: Fallback / Default
        // Jika tidak ditemukan di kedua tempat, tampilkan avatar default
        return asset('asset/sekolah sd bringin 01 semarang.jpg');
    }
}