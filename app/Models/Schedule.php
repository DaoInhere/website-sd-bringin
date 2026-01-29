<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;
    
    protected $fillable = ['hour', 'day', 'subject', 'class', 'type', 'curriculum', 'uniform', 'description', 'image'];

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        // $query->when(
        //     $filters['category'] ?? false, fn ($query, $category) =>
        //     $query->whereHas('category', fn($query) => $query->where('slug', $category))
        // );

        // $query->when(
        //     $filters['author'] ?? false, fn ($query, $author) =>
        //     $query->whereHas('author', fn($query) => $query->where('username', $author))
        // );
    }

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
