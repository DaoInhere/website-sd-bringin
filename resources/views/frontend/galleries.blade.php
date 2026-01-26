@extends('layouts.frontend')

@section('content')
<div class="container mx-auto py-12 px-4 mt-10" x-data="{ open: false, imgSrc: '', imgTitle: '', imgDesc: '' }">
    
    <div class="mb-10 animate-fade-in-up">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 border-l-8 border-sekolah-hijau ps-4 uppercase tracking-tighter">
            Gallery Kegiatan
        </h2>
        <p class="text-gray-600 mt-2 font-nunito">Dokumentasi aktivitas siswa dan guru SDN Bringin 01.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <div class="gallery-container animate-fade-in-up" 
             @click="open = true; 
                     imgSrc = '{{ asset('asset/gambarPramuka.png') }}'; 
                     imgTitle = 'Latihan Rutin Pramuka Penggalang';
                     imgDesc = 'Kegiatan latihan rutin mingguan untuk mengasah keterampilan kepramukaan dan kemandirian siswa SDN Bringin 01.'">
            <img src="{{ asset('asset/gambarPramuka.png') }}" class="gallery-img" alt="Kegiatan Pramuka">
            <div class="gallery-overlay">
                <span class="gallery-title">Latihan Rutin Pramuka Penggalang</span>
                <span class="gallery-deskripsi">Mengasah keterampilan dan kemandirian siswa.</span>
                <span class="gallery-subtitle">SDN Bringin 01 — 15 Jan 2026</span>
            </div>
        </div>

        <div class="gallery-container animate-fade-in-up" style="animation-delay: 0.1s;"
             @click="open = true; 
                     imgSrc = '{{ asset('asset/gambarPramuka.png') }}'; 
                     imgTitle = 'Upacara Bendera Hari Senin';
                     imgDesc = 'Upacara rutin setiap hari Senin sebagai bentuk penanaman nilai nasionalisme dan patriotisme kepada seluruh siswa.'">
            <img src="{{ asset('asset/gambarPramuka.png') }}" class="gallery-img" alt="Upacara Bendera">
            <div class="gallery-overlay">
                <span class="gallery-title">Upacara Bendera Hari Senin</span>
                <span class="gallery-deskripsi">Penanaman nilai nasionalisme dan patriotisme.</span>
                <span class="gallery-subtitle">SDN Bringin 01 — 20 Jan 2026</span>
            </div>
        </div>

        <div class="gallery-container animate-fade-in-up" style="animation-delay: 0.2s;"
             @click="open = true; 
                     imgSrc = '{{ asset('asset/gambarPramuka.png') }}'; 
                     imgTitle = 'Kegiatan Belajar Mengajar Interaktif';
                     imgDesc = 'Suasana belajar mengajar di kelas yang interaktif menggunakan media digital untuk meningkatkan minat belajar anak.'">
            <img src="{{ asset('asset/gambarPramuka.png') }}" class="gallery-img" alt="Kegiatan Belajar">
            <div class="gallery-overlay">
                <span class="gallery-title">Kegiatan Belajar Mengajar Interaktif</span>
                <span class="gallery-deskripsi">Meningkatkan minat belajar dengan media interaktif.</span>
                <span class="gallery-subtitle">SDN Bringin 01 — 15 Jan 2026</span>
            </div>
        </div>

    </div>

    <div x-show="open" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="lightbox-overlay"
         @keydown.escape.window="open = false">
        
        <div class="absolute inset-0 bg-black/95 backdrop-blur-md" @click="open = false"></div>

        <div class="lightbox-content" @click.stop>
            <button @click="open = false" 
                    class="absolute -top-12 right-0 md:-right-12 text-white hover:text-red-500 transition-colors z-[110]" 
                    title="Tutup (Esc)">
                <svg xmlns="http://www.w3.org/1500/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <img :src="imgSrc" class="lightbox-img" :alt="imgTitle">
            
            <div class="mt-6 text-center max-w-2xl px-4">
                <h3 x-text="imgTitle" class="text-white text-xl md:text-2xl font-poppins font-bold uppercase tracking-wide"></h3>
                <p x-text="imgDesc" class="text-white/80 mt-3 font-nunito text-base leading-relaxed italic"></p>
                <div class="h-1 w-16 bg-sekolah-hijau mx-auto mt-4 rounded-full shadow-lg"></div>
            </div>
        </div>
    </div>
</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection