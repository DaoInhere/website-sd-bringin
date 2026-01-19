@extends('layouts.frontend')

@section('content')
<div class="container mx-auto pb-16">
    <!-- Header with Green Background -->
    <div class="bg-green-500 text-white text-center py-36">
        <h2 class="text-4xl font-bold">Sejarah Sekolah</h2>
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

        <!-- Emblem or Logo Image -->
        <div class="text-center mt-8">
            <img src="{{ asset('storage/d4343423-534f-4bed-a7f7-76bfdda97738.png') }}" alt="Logo SMK Muhammadiyah Tumijajar" class="w-48 mx-auto">
        </div>
    </div>
</div>
@endsection