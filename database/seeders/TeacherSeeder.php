<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'nip' => '1',
            "name" => "Dwi Priyani, S.Pd.SD",
            'position' => 'Kepala Sekolah',
            'photo' => 'kepalaSekolah.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '2',
            "name" => "Muh Hasan Rifa'i, S.Pd",
            'position' => 'Guru',
            'photo' => 'hasan.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '3',
            "name" => "Ester Eny Puspitawati, S.Pd",
            'position' => 'Guru',
            'photo' => 'ester.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '4',
            "name" => "Desy Indar Kusumastuti, S.Pd",
            'position' => 'Guru',
            'photo' => 'desy.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Teacher::create([
            'nip' => '5',
            "name" => "Paryono, S.Pd",
            'position' => 'Guru',
            'photo' => 'paryono.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '6',
            "name" => "Sri Utami, S.Pd",
            'position' => 'Guru',
            'photo' => 'sri.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '7',
            "name" => "Rahmad Suryo Atmojo, S.Pd",
            'position' => 'Guru',
            'photo' => 'rahmad.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '8',
            "name" => "Sri Hastutik, S.Pd",
            'position' => 'Guru',
            'photo' => 'hastutik.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '9',
            "name" => "Puryanto, A.Ma.Pd",
            'position' => 'Guru',
            'photo' => 'puryanto.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '10',
            "name" => "Mustofa, S.Pd",
            'position' => 'Guru',
            'photo' => 'mustofa.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '11',
            "name" => "Ika Yuliawati, Amd",
            'position' => 'Guru',
            'photo' => 'ika.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Teacher::create([
            'nip' => '12',
            "name" => "Djoni Chrissensia",
            'position' => 'Guru',
            'photo' => 'djoni.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
