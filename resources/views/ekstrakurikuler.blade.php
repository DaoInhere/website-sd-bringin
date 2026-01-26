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

            {{-- ITEM 1: PRAMUKA (WAJIB) --}}
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 group hover:-translate-y-1">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="{{ asset('asset/gambarPramuka.png') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 right-4 bg-sekolah-kuning text-sekolah-hijau-dark text-xs font-bold px-3 py-1 rounded-full uppercase">
                        Wajib
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fas fa-campground text-sekolah-hijau text-xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Pramuka</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Membentuk karakter disiplin, mandiri, dan cinta tanah air melalui kegiatan kepramukaan yang menyenangkan.
                    </p>
                    <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-500">
                        <span><i class="far fa-clock mr-1"></i> Jumat, 15.00</span>
                        <span><i class="far fa-user mr-1"></i> Pak Budi</span>
                    </div>
                </div>
            </div>

            {{-- ITEM 2: TAHFIDZ --}}
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 group hover:-translate-y-1">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="{{ asset('asset/gambarTahfidz.png') }}" alt="Tahfidz" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fas fa-quran text-sekolah-hijau text-xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Tahfidz Qur'an</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Program hafalan Juz 30 untuk mencetak generasi yang qurani, berakhlak mulia, dan cerdas.
                    </p>
                    <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-500">
                        <span><i class="far fa-clock mr-1"></i> Pagi (Rutin)</span>
                        <span><i class="far fa-user mr-1"></i> Bu Siti</span>
                    </div>
                </div>
            </div>

            {{-- ITEM 3: KOMPUTER --}}
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 group hover:-translate-y-1">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="{{ asset('asset/gambarTik.png') }}" alt="Komputer" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fas fa-desktop text-sekolah-hijau text-xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Komputer (TIK)</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Pengenalan teknologi informasi, dasar-dasar mengetik, dan pengoperasian aplikasi perkantoran sederhana.
                    </p>
                    <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-500">
                        <span><i class="far fa-clock mr-1"></i> Sabtu, 10.00</span>
                        <span><i class="far fa-user mr-1"></i> Pak Andi</span>
                    </div>
                </div>
            </div>

            {{-- ITEM 4: OLAHRAGA (FUTSAL) --}}
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 group hover:-translate-y-1">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="{{ asset('asset/gambarFutsal.png') }}" alt="Futsal" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fas fa-futbol text-sekolah-hijau text-xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Futsal</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Melatih fisik, sportivitas, dan kerjasama tim melalui olahraga futsal yang digemari siswa.
                    </p>
                    <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-500">
                        <span><i class="far fa-clock mr-1"></i> Rabu, 15.30</span>
                        <span><i class="far fa-user mr-1"></i> Pak Olahraga</span>
                    </div>
                </div>
            </div>

             {{-- ITEM 5: SENI TARI --}}
             <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 group hover:-translate-y-1">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="{{ asset('asset/gambarNari.png') }}" alt="Tari" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fas fa-music text-sekolah-hijau text-xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Seni Tari</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Melestarikan budaya daerah melalui seni tari tradisional dan kreasi baru.
                    </p>
                    <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-500">
                        <span><i class="far fa-clock mr-1"></i> Kamis, 14.00</span>
                        <span><i class="far fa-user mr-1"></i> Bu Tari</span>
                    </div>
                </div>
            </div>

             {{-- ITEM 6: REBANA --}}
             <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 group hover:-translate-y-1">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="{{ asset('asset/gambarRebanaa.jpg') }}" alt="Rebana" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <i class="fas fa-drum text-sekolah-hijau text-xl"></i>
                        <h3 class="text-xl font-bold text-gray-800">Seni Rebana</h3>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Mengembangkan bakat seni islami dan melatih kekompakan dalam bermain alat musik rebana.
                    </p>
                    <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-500">
                        <span><i class="far fa-clock mr-1"></i> Sabtu, 08.00</span>
                        <span><i class="far fa-user mr-1"></i> Pak Ustadz</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
@endsection