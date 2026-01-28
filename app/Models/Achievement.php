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
}