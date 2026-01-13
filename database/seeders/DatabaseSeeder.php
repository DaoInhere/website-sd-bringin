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
        // 2. Buat 3 Kategori Palsu
        Category::factory(3)->create();

        // 3. Buat 10 Berita Palsu
        Post::factory(10)->create();
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(ScheduleSeeder::class);
    }
}