<?php

namespace Database\Seeders;

use App\Models\HeroBanner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroBanner::create([
            'image' => 'galeri foto.jpg',
            'title' => 'SELAMAT DATANG DI',
            'subtitle' => 'WEBSITE RESMI SD NEGERI BRINGIN 01 KOTA SEMARANG',
            'firstButton' => '/galeri',
            'firstButtonLabel' => 'Galeri',
            'secondButton' => '/profil/sejarah',
            'secondButtonLabel' => 'Detail',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        HeroBanner::create([
            'image' => 'gerbang sdn bringin 01.jpg',
            'title' => 'VISI & MISI SEKOLAH',
            'subtitle' => 'MENCETAK GENERASI CERDAS DAN BERAKHLAK MULIA',
            'firstButton' => '/profil/visi-misi',
            'firstButtonLabel' => 'Profil Sekolah',
            'secondButton' => '/kontak',
            'secondButtonLabel' => 'Hubungi Kami',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        HeroBanner::create([
            'image' => 'seragam luri sdn bringin 01.jpg',
            'title' => 'PPDB ONLINE 2026',
            'subtitle' => 'BERGABUNGLAH BERSAMA KELUARGA BESAR KAMI',
            'firstButton' => 'https://arsip.siap-ppdb.com/',
            'firstButtonLabel' => 'Daftar Sekarang',
            'secondButton' => '/syarat-pendaftaran',
            'secondButtonLabel' => 'Syarat Pendaftaran',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
