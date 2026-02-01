<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeroBanner>
 */
class HeroBannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'sekolah sd bringin 01 semarang.jpg',
            'title' => 'Selamat Datang di',
            'subtitle' => 'Website Resmi SD Negeri Bringin 01 Kota Semarang',
            'firstButton' => '/galeri',
            'firstButtonLabel' => 'Galeri',
            'secondButton' => '/profil/sejarah',
            'secondButtonLabel' => 'Detail',
        ];
    }
}
