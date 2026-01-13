<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // 1. Buat Akun Admin Kita (Biar bisa login)
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com', // Ingat email ini!
            'password' => bcrypt('password'), // Passwordnya: password
        ]);

        // 2. Buat 3 Kategori Palsu
        Category::factory(3)->create();

        // 3. Buat 10 Berita Palsu
        Post::factory(10)->create();
=======
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(ScheduleSeeder::class);
>>>>>>> 47265a4096cc86dbaecee11fbf6e8820d663e9fd
    }
}