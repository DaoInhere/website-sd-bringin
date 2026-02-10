<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;
    
    protected $fillable = ['hourStart', 'hourEnd', 'day', 'subject', 'class', 'type', 'curriculum', 'uniform', 'description', 'image'];

    protected $casts = ['hourStart' => 'datetime:H:i', 'hourEnd' => 'datetime:H:i',];

    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter untuk dashboard
        $query->when(
            $filters['find'] ?? false,
            function ($query, $search) {
                $query->where(function ($find) use ($search) {
                    $find->where('hourStart', 'like', "%{$search}%")
                    ->orWhere('hourEnd', 'like', "%{$search}%")
                    ->orWhere('day', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('class', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhere('uniform', 'like', "%{$search}%")
                    ->orWhere('curriculum', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
                });
            }
        );
    }

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

    public function getHourstartFormatAttribute()
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $this->hourStart)->format('H:i');
    }

    public function getHourendFormatAttribute()
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $this->hourEnd)->format('H:i');
    }


}
