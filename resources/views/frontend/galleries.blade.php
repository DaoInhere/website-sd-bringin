@extends('layouts.frontend')

@section('content')

<main class="pb-16">
    {{-- HERO --}}
    <section class="relative">
        <div class="relative h-[220px] sm:h-[260px] overflow-hidden">
            <img
                src="{{ asset('asset/galeri foto.jpg') }}"
                alt="Jadwal KBM"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110"
            />
            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative z-10 flex h-full items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center text-white">
                    <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight drop-shadow text-white">
                        Galeri Kegiatan
                    </h1>
                    <p class="mt-2 text-white/90">
                        Dokumentasi aktivitas siswa dan guru SDN Bringin 01
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        @if($galleries->isEmpty())
            <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                Belum ada data galeri yang diinput.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($galleries as $gallery)
                    <div class="relative group overflow-hidden rounded-lg">
                        <img 
                            src="{{ $gallery->photo_url }}"
                            alt="{{ $gallery->title }}"
                            class="w-full h-64 object-cover rounded-lg transition-transform duration-300 transform group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex justify-center items-center">
                            <div class="text-center text-white">
                                <h3 class="text-xl font-semibold text-white">{{ $gallery->title }}</h3>
                                <p class="text-sm mt-2">{{ $gallery->activityDate->translatedFormat('d F Y') }}</p>
                                <a href="#" 
                                class="mt-4 inline-block bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white py-2 px-4 rounded-full"
                                onclick="openModal('{{ $gallery->title }}', '{{ $gallery->description }}', '{{ $gallery->photo_url }}');">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

</main>

{{-- Modal Container --}}
<div id="modal" class="fixed inset-0 z-50 hidden bg-black/70 flex justify-center items-center">
    <div class="bg-white rounded-xl max-w-2xl w-full p-8 overflow-y-auto max-h-[80vh]">
        <button onclick="closeModal()" class="absolute top-10 right-10 text-white bg-red-500 hover:bg-red-600 rounded-full p-2">
            <i class="fas fa-times"></i>
        </button>
        <img id="modal-img" class="w-full rounded-lg mb-4" alt="Modal Image">
        <h2 id="modal-title" class="text-2xl font-extrabold text-gray-800 mb-4"></h2>
        <p id="modal-content" class="text-gray-600 leading-relaxed text-justify"></p>
    </div>
</div>

{{-- JavaScript --}}
<script>
    function openModal(title, content, imgSrc) {
        document.getElementById('modal-title').textContent = title;
        document.getElementById('modal-content').textContent = content;
        document.getElementById('modal-img').src = imgSrc;
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>

@endsection