<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'image', 'description'];

    // Relasi: Galeri di-upload oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}