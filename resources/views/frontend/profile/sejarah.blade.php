@extends('layouts.frontend')

@section('content')
<div class="container mx-auto pb-16">
    <!-- Header with Background Image and Blur Effect -->
    <div class="relative text-center py-36 bg-cover bg-center" style="background-image: url('{{ asset('asset/galeri foto.jpg') }}')">
        <!-- Apply a blur effect to the background image -->
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
        
        <!-- Title text, keeping it above the background -->
        <h2 class="relative z-10 text-4xl font-bold text-white">Sejarah Sekolah</h2>
    </div>

    <!-- Main Content -->
    <div class="bg-green-100 rounded-lg shadow-lg p-8 max-w-5xl mx-auto mt-8">
        <h3 class="text-3xl font-semibold text-gray-800 mb-4">SMK Muhammadiyah Tumijajar</h3>
        <p class="text-gray-700 mb-6">
            SMK Muhammadiyah Tumijajar berdiri pada tahun 1996, berada di bawah naungan Majelis Dikdasmen Wilayah Muhammadiyah Lampung.
            Sekolah ini terletak di Dayamurni, Tumijajar, Tulang Bawang Barat, dan fokus pada pengembangan keterampilan peserta didik.
        </p>
        <p class="text-gray-700 mb-6">
            Dengan program studi Teknik Kendaraan Ringan, Teknik Bisnis Sepeda Motor, Multimedia, Tata Boga, dan Teknologi Informatika Multimedia,
            SMK Muhammadiyah Tumijajar telah terakreditasi dan menyediakan fasilitas praktikum yang lengkap.
        </p>
        <p class="text-gray-700 mb-6">
            Dengan fasilitas yang memadai, SMK Muhammadiyah Tumijajar menyediakan program pendidikan yang memberikan keterampilan yang dibutuhkan oleh industri.
            Kami juga menyediakan berbagai kegiatan ekstrakurikuler untuk mengembangkan potensi siswa di bidang olahraga, seni, dan sosial.
        </p>
    </div>
</div>
@endsection
