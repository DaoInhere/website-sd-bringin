<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::create([
            'title' => 'Kompetisi SDN 1 Beringin',
            'name' => 'Lomba Renang',
            'category' => 'Olahraga',
            'level' => 'Kabupaten/Kota',
            'position' => 'Juara 1',
            'date' => '2025-10-10',
            'award' => 'Sertifikat',
            'description' => 'Siswa berhasil memenangkan lomba renang gaya bebas.',
            'image' => null,
        ]);

        Achievement::create([
            'title' => 'Kompetisi SDN 1 Beringin',
            'name' => 'Lomba Mengambar',        
            'category' => 'Kreativitas',
            'level' => 'Provinsi',
            'position' => 'Juara 1',
            'date' => '2025-10-11',
            'award' => 'Sertifikat',
            'description' => 'Juara menggambar tema lingkungan hidup.',
            'image' => null,
        ]);

        Achievement::create([
            'title' => 'Kompetisi SDN 1 Beringin',
            'name' => 'Lomba Sepak Bola',
            'category' => 'Olahraga',
            'level' => 'Provinsi',
            'position' => 'Juara 1',
            'date' => '2025-10-12',
            'award' => 'Sertifikat',
            'description' => 'Tim sekolah menang telak di final.',
            'image' => null,
        ]);
    }
}