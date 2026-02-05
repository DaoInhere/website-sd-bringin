<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\HeroBanner;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil Seeder
        $this->call([
            UserSeeder::class,
            ScheduleSeeder::class,
            TeacherSeeder::class,
            AchievementSeeder::class,
            HeroBannerSeeder::class,
        ]);
        
        // Buat 10 Jadwal Pelajaran
        Schedule::factory()->count(15)->create();
       
        // HeroBanner::factory(5)->create();

        // Achievement::factory(3)->create();

        // Buat Kategori Berita
        // Category::factory(3)->create();

        // Buat 10 Berita Palsu
        // (Berita ini otomatis akan menumpang ke user_id 1 milik Admin)
        Post::factory(10)->create();
        
        // Buat 5 Data Guru
        // Teacher::factory(5)->create();

        // Buat 6 Data Foto Galeri
        // Gallery::factory(6)->create();
        
    }
}