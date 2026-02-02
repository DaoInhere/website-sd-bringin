@extends('layouts.frontend')

@section('content')

<main class="pb-16">
    {{-- HERO SECTION --}}
    <section class="relative">
        <div class="relative h-[220px] sm:h-[260px] overflow-hidden">
            <img
                src="{{ asset('asset/galeri foto.jpg') }}"
                alt="Galeri Kegiatan"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110"
                onerror="this.src='https://placehold.co/1200x400?text=No+Image'"
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

    {{-- CONTENT SECTION --}}
    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        @if($galleries->isEmpty())
            <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                Belum ada data galeri yang diinput.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($galleries as $gallery)
                    <div class="relative group overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                        
                        {{-- 1. FOTO SAMPUL (Ambil cover_url dari Model) --}}
                        <div class="h-64 overflow-hidden relative">
                            <img 
                                src="{{ $gallery->cover_url }}"
                                alt="{{ $gallery->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-110"
                            />
                            {{-- Badge Jumlah Foto --}}
                            <div class="absolute bottom-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded-md backdrop-blur-sm">
                                <i class="fas fa-images mr-1"></i> {{ count($gallery->photos ?? []) }} Foto
                            </div>
                        </div>

                        {{-- OVERLAY HOVER --}}
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex justify-center items-center p-4">
                            <div class="text-center text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-xl font-bold text-white mb-1">{{ $gallery->title }}</h3>
                                <p class="text-sm text-gray-200 mb-4">{{ $gallery->activityDate->translatedFormat('d F Y') }}</p>
                                
                                {{-- GANTI TOMBOL LAMA DENGAN INI --}}
                                <button 
                                    type="button"
                                    data-title="{{ $gallery->title }}"
                                    data-description="{{ $gallery->description }}"
                                    data-photos="{{ json_encode($gallery->photos) }}" 
                                    onclick="openAlbumModal(this)"
                                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-full transition-colors shadow-lg cursor-pointer">
                                    Lihat Album
                                </button>
                            </div>
                        </div>

                        {{-- Tampilan Mobile / Default Text (Bawah Foto) --}}
                        <div class="p-4 sm:hidden">
                            <h3 class="font-bold text-gray-800">{{ $gallery->title }}</h3>
                            <p class="text-sm text-gray-500">{{ $gallery->activityDate->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $galleries->links() }}
            </div>
        @endif
    </section>

</main>

{{-- MODAL GALLERY (POPUP ALBUM) --}}
<div id="galleryModal" class="fixed inset-0 z-50 hidden bg-black/90 flex justify-center items-start pt-10 pb-10 overflow-y-auto backdrop-blur-sm">
    <div class="bg-white rounded-xl w-full max-w-5xl mx-4 my-auto shadow-2xl overflow-hidden relative flex flex-col max-h-[90vh]">
        
        {{-- Header Modal --}}
        <div class="p-6 border-b border-gray-100 flex justify-between items-start bg-gray-50 sticky top-0 z-10">
            <div>
                <h2 id="modalTitle" class="text-2xl font-extrabold text-gray-800">Judul Kegiatan</h2>
                <p id="modalDesc" class="text-gray-600 mt-1 text-sm">Deskripsi kegiatan...</p>
            </div>
            <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition-colors p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Grid Foto (Isinya akan diisi oleh JS) --}}
        <div id="modalGrid" class="p-6 overflow-y-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 bg-gray-100">
            </div>

        {{-- Footer Modal --}}
        <div class="p-4 border-t border-gray-100 bg-white text-right">
            <button onclick="closeModal()" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-medium transition">
                Tutup
            </button>
        </div>
    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
    function openAlbumModal(element) {
        // 1. Ambil data dari atribut tombol (data-...)
        const title = element.getAttribute('data-title') || 'Dokumentasi Kegiatan';
        const description = element.getAttribute('data-description') || '';
        
        // Ambil data foto (JSON) dan ubah jadi Array
        let photos = [];
        try {
            const rawPhotos = element.getAttribute('data-photos');
            photos = JSON.parse(rawPhotos);
        } catch (e) {
            console.error("Gagal membaca foto", e);
            photos = [];
        }

        // 2. Set Judul & Deskripsi ke Modal
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalDesc').textContent = description;

        // 3. Siapkan Wadah Grid Foto
        const gridContainer = document.getElementById('modalGrid');
        gridContainer.innerHTML = ''; // Bersihkan isi lama

        // 4. Looping Foto
        if (Array.isArray(photos) && photos.length > 0) {
            photos.forEach(photoPath => {
                // Buat pembungkus gambar
                const wrapper = document.createElement('div');
                wrapper.className = 'group relative aspect-square bg-gray-200 rounded-lg overflow-hidden shadow-sm cursor-pointer';
                
                // Buat elemen gambar
                const img = document.createElement('img');
                img.src = '/storage/' + photoPath; // Path ke storage
                img.className = 'w-full h-full object-cover transition duration-300 group-hover:scale-110';
                img.alt = title;

                // Klik gambar untuk zoom / buka tab baru
                wrapper.onclick = function() {
                    window.open(img.src, '_blank');
                };

                wrapper.appendChild(img);
                gridContainer.appendChild(wrapper);
            });
        } else {
            gridContainer.innerHTML = '<p class="col-span-full text-center text-gray-500 py-10">Tidak ada foto dalam album ini.</p>';
        }

        // 5. Tampilkan Modal
        document.getElementById('galleryModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Matikan scroll belakang
    }

    function closeModal() {
        document.getElementById('galleryModal').classList.add('hidden');
        document.body.style.overflow = 'auto'; // Hidupkan scroll belakang
    }

    // Tutup modal jika klik area hitam
    document.getElementById('galleryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>

@endsection