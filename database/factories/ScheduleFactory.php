<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $hours = [
            '07:00 - 08:00',
            '08:00 - 09:00',
            '09:00 - 10:00',
        ];

        $day  = fake()->randomElement($days);
        $hour = fake()->randomElement($hours);

        $uniform = match ($day) {
            'Senin', 'Selasa' => 'Merah Putih',
            'Rabu', 'Kamis'   => 'Batik',
            'Jumat'           => 'Pramuka',
        };

        do {
            $subject = fake()->randomElement([
                'Matematika',
                'IPA',
                'IPS',
                'Upacara',
            ]);
        } while ($subject === 'Upacara');

        $type = ($subject === 'Upacara') ? 'Kegiatan' : 'Mapel';

        $curriculum = ($subject === 'Upacara')
            ? 'Semua'
            : fake()->randomElement([
                '2025/2026',
                '2026/2027',
                '2027/2028',
                '2028/2029',
            ]);

        return [
            'day'     => $day,
            'hour'    => $hour,
            'subject' => $subject,
            'type' => $type,
            'class'   => fake()->numberBetween(1, 6),
            'uniform' => $uniform,
            'curriculum' => $curriculum,
        ];
    }
}
