<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Kita set penulisnya selalu User ID 1 (Admin yang nanti kita buat)
            'user_id' => User::factory(),
            
            // Pilih kategori secara acak antara ID 1 sampai 3
            'category_id' => Category::factory(),
            
            // Judul acak (antara 3 sampai 8 kata)
            'title' => $this->faker->sentence(mt_rand(3, 8)),
            
            // URL acak
            // 'slug' => $this->faker->slug(),
            
            // Gambar kita biarkan null (kosong) dulu
            'image' => null,
            
            // Kutipan pendek (1 paragraf)
            // 'excerpt' => $this->faker->paragraph(),
            
            // Isi berita panjang (5 paragraf digabung jadi satu teks)
            'content' => $this->faker->paragraphs(5, true),
            
            // Status kita buat langsung 'published' biar muncul di web
            // 'status' => 'published',
        ];
    }
}