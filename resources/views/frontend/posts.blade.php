@extends('layouts.frontend')

@section('content')

<main class="pb-16">
    {{-- HERO --}}
    <section class="relative">
        <div class="relative h-[240px] sm:h-[300px] lg:h-[340px] overflow-hidden">
            <img
                src="{{ asset('asset/banner_Berita.png') }}"
                alt="Berita & Pengumuman"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110" />
            <div class="absolute inset-0 bg-black/45"></div>

            <div class="relative z-10 flex h-full items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center text-white">
                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight drop-shadow text-white">
                        Berita & Pengumuman
                    </h1>
                    <p class="mt-3 text-white/90">
                        Informasi terbaru untuk warga sekolah SD Negeri Bringin 01
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Filter --}}
    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            {{-- Filter Tahun --}}
            <div class="relative group">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Filter Tahun</label>
                <div class="relative">
                    <button class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sekolah-hijau/40 shadow-sm hover:border-sekolah-hijau transition duration-300 flex items-center justify-between">
                        <span>Semua Tahun</span>
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <ul class="absolute top-full left-0 mt-0 w-full bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 transform origin-top scale-95 group-hover:scale-100">
                        <li><button class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100 w-full text-left">2022</button></li>
                        <li><button class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100 w-full text-left">2021</button></li>
                        <li><button class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100 w-full text-left">2020</button></li>
                    </ul>
                </div>
            </div>

            {{-- Filter Label --}}
            <div class="relative group">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Filter Label</label>
                <div class="relative">
                    <button class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sekolah-hijau/40 shadow-sm hover:border-sekolah-hijau transition duration-300 flex items-center justify-between">
                        <span>Berita</span>
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <ul class="absolute top-full left-0 mt-0 w-full bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 transform origin-top scale-95 group-hover:scale-100">
                        <li><button class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100 w-full text-left">Berita</button></li>
                        <li><button class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100 w-full text-left">Pengumuman</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Cards --}}
            @forelse($posts as $post)
            <div class="card relative group rounded-2xl bg-white shadow-lg overflow-hidden">
                <img
                    src="{{ $post->image_url }}"
                    class="w-full h-64 object-cover" />
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                <div class="absolute bottom-5 left-5 right-5 p-5 text-white text-center opacity-0 group-hover:opacity-100 transition duration-300">
                    <h3 class="text-lg font-bold text-white">{{ Str::limit($post->title, 50) }}</h3>
                    <p class="text-sm mt-2">{{ $post->category }}</p>
                    <p class="text-sm mt-2">{{ $post->created_at->diffForHumans() }}</p>
                    <a href="#" class="mt-4 inline-block bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white py-2 px-4 rounded-full"
                        onclick="openModal('{{ $post->title }}', '{{ $post->created_at->translatedFormat('d F Y') }}', '{{ json_encode($post->content) }}', '{{ $post->image_url }}');">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info d-inline-block">Belum ada berita yang diterbitkan.</div>
            </div>
            @endforelse
        </div>
    </section>

</main>

{{-- Modal Container --}}
<div id="modal" class="fixed inset-0 z-50 hidden bg-black/70 flex justify-center items-center">
    <div class="bg-white rounded-xl max-w-2xl w-full p-8 overflow-y-auto max-h-[80vh]">
        <button onclick="closeModal()" class="absolute top-10 right-10 text-white bg-red-500 hover:bg-red-600 rounded-full p-2">
            <i class="fas fa-times"></i>
        </button>
        <img id="modal-img" class="w-full rounded-lg mb-4" alt="Modal Image">
        <h2 id="modal-title" class="text-2xl font-extrabold text-gray-800"></h2>
        <h2 id="modal-created_at" class="text-2sm font-thin text-gray-800 mb-4"></h2>
        <p id="modal-content" class="text-gray-600 leading-relaxed text-justify"></p>
    </div>
</div>

{{-- JavaScript --}}
<script>
    function openModal(title, created_at, content, imgSrc) {
        document.getElementById('modal-title').textContent = title;
        document.getElementById('modal-created_at').textContent = created_at;
        document.getElementById('modal-content').textContent = content;
        document.getElementById('modal-img').src = imgSrc;
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>
@endsection