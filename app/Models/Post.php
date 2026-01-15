<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'image',
        'excerpt',
        'body',
        'status'
    ];

    // Relasi: Berita ini milik satu Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: Berita ini ditulis oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}