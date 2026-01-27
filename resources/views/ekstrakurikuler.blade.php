@extends('layouts.frontend')

@section('content')
<main class="bg-gray-50">

    {{-- 1. HERO SECTION (JUDUL HALAMAN DENGAN BANNER BARU) --}}
    <section class="relative h-64 md:h-80 bg-sekolah-hijau overflow-hidden">
        {{-- Overlay Gelap agar teks terbaca --}}
        <div class="absolute inset-0 bg-black/40 z-10"></div>

        {{-- Background Image Baru --}}
        {{-- Catatan: Jika ingin pakai gambar sendiri, ganti URL di bawah dengan {{ asset('asset/nama-file-anda.jpg') }} --}}
        <div class="absolute inset-0 bg-cover z-0"
             style="background-image: url('{{ asset('asset/bannerEkstrakurikuler.png') }}'); filter: blur(3px);">
        </div>

        <div class="relative z-20 h-full flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-2 drop-shadow-lg">
                Ekstrakurikuler
            </h1>
            <div class="w-24 h-1 bg-sekolah-kuning rounded-full mb-4"></div>
            <p class="text-white text-lg md:text-xl font-medium max-w-2xl drop-shadow-md">
                Wadah pengembangan minat, bakat, dan karakter siswa SD Negeri 1 Bringin
            </p>
        </div>
    </section>

    {{-- 2. DAFTAR EKSTRAKURIKULER (GRID SYSTEM) --}}
    <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Pilihan Kegiatan</h2>
            <p class="text-gray-600 mt-2">Berbagai kegiatan positif untuk membentuk Profil Pelajar Pancasila</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($extracurriculars->isEmpty())
                <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                    Belum ada data jadwal ekstrakurikuler yang diinput.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($extracurriculars as $extracurricular)

                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 group hover:-translate-y-1">
                        <div class="h-48 bg-gray-200 relative overflow-hidden">
                            <img src="{{ asset('asset/' . $extracurricular->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute top-4 right-4 bg-sekolah-kuning text-sekolah-hijau-dark text-xs font-bold px-3 py-1 rounded-full uppercase">
                                {{ $extracurricular->required }}
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <i class="fas fa-campground text-sekolah-hijau text-xl"></i>
                                <h3 class="text-xl font-bold text-gray-800">{{ $extracurricular->subject}}</h3>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $extracurricular->description }}
                            </p>
                            <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-500">
                                <span><i class="far fa-clock mr-1"></i>{{ $extracurricular->day}}, {{ $extracurricular->hour}}</span>
                                <span><i class="far fa-user mr-1"></i>{{ $extracurricular->teacher }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif   
        </div>
    </section>

</main>
@endsection