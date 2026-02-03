<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip',
        'name',
        'position',
        'photo',
    ];

    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter untuk dashboard
        $query->when(
            $filters['find'] ?? false,
            function ($query, $search) {
                $query->where(function ($find) use ($search) {
                    $find->where('nip', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('position', 'like', "%{$search}%");
                });
            }
        );
    }

    public function getPhotoUrlAttribute()
    {
        // Cek 1: Apakah file ada di STORAGE? (storage/app/public/...)
        // Biasanya untuk file hasil upload user via form
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }

        // Cek 2: Apakah file ada di PUBLIC ASSETS? (public/assets/...)
        // Biasanya untuk file statis/manual yang kamu copy paste ke folder project
        // Fungsi public_path() mengarah ke folder public utama
        if ($this->photo && file_exists(public_path('asset/' . $this->photo))) {
            return asset('asset/' . $this->photo);
        }

        // Cek 3: Fallback / Default
        // Jika tidak ditemukan di kedua tempat, tampilkan avatar default
        return asset('asset/nophoto.jpg');
    }
}