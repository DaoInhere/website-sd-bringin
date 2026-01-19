<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;
    
    protected $fillable = ['hour', 'day', 'subject', 'class', 'uniform'];

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
}
