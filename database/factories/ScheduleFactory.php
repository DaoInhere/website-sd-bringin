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
        static $used = [];

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $hoursStart = [
            '07:00',
            '08:00',
            '09:00',
        ];

        $hoursEnd = [
            '10:00',
            '11:00',
            '12:00',
        ];

        do {
            $day  = fake()->randomElement($days);
            $hourStart = fake()->randomElement($hoursStart);
            $hourEnd = fake()->randomElement($hoursEnd);
            $key  = $day.'|'.$hourStart.'|'.$hourEnd;
        } while (isset($used[$key]));

        $used[$key] = true;

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
                '2024/2025',
                '2025/2026',
                '2026/2027',
            ]);

        return [
            'day'     => $day,
            'hourStart'    => $hourStart,
            'hourEnd'    => $hourEnd,
            'subject' => $subject,
            'type' => $type,
            'class'   => fake()->numberBetween(1, 6),
            'uniform' => $uniform,
            'curriculum' => $curriculum,
        ];
    }
}
