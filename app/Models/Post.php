<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // INI KUNCI PENTINGNYA!
    // Kita harus mendaftarkan kolom apa saja yang boleh diisi
    protected $fillable = [
        'image',
        'title',
        'category_id',
        'content',
    ];

    // Relasi ke Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}