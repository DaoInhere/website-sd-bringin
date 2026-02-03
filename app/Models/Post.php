<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // INI KUNCI PENTINGNYA!
    // Kita harus mendaftarkan kolom apa saja yang boleh diisi
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'category',
        'content',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter untuk dashboard
        $query->when(
            $filters['find'] ?? false,
            function ($query, $search) {
                $query->where(function ($find) use ($search) {
                    $find->where('title', 'like', "%{$search}%")
                    ->orwhere('category', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
                });
            }
        );

        // filter untuk halaman utama
        $query->when(
            $filters['kategori'] ?? false,
            fn (Builder $kategori, string $category) =>
                $kategori->where('category', $category)
        );
    }
    // Relasi ke Kategori
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

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