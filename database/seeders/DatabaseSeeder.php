<?php

namespace Database\Seeders;


use App\Models\Post;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 10 Jadwal Pelajaran
        Schedule::factory(100)->create();

        // Memanggil Seeder
        $this->call([
            UserSeeder::class,
            ScheduleSeeder::class,
            TeacherSeeder::class,
        ]);

        // Buat Kategori Berita
        Category::factory(3)->create();

        // Buat 10 Berita Palsu
        // (Berita ini otomatis akan menumpang ke user_id 1 milik Admin)
        // Post::factory(10)->create();
        
        // Buat 5 Data Guru
        Teacher::factory(5)->create();

        // Buat 6 Data Foto Galeri
        Gallery::factory(6)->create();
        
        // Buat Pengaturan Website
        // pakai pengecekan 'if' agar aman jika dijalankan berulang
        if (Setting::count() == 0) {
            Setting::create(['key' => 'judul_web', 'value' => 'SD Negeri Bringin 01']);
            Setting::create(['key' => 'alamat', 'value' => 'Jl. Bringin No. 1, Semarang']);
            Setting::create(['key' => 'telepon', 'value' => '024-1234567']);
            Setting::create(['key' => 'email', 'value' => 'info@sdnbringin01.sch.id']);
        }
    }
}