@extends('layouts.frontend')

@section('content')
<main class="pb-16 bg-gray-50 min-h-screen">
    {{-- HERO BANNER --}}
    <section class="relative">
        <div class="relative h-64 md:h-80 overflow-hidden">
            <img
                src="{{ asset('asset/prestasi_banner.png') }}"
                alt="Prestasi SDN 1 Bringin"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110"
            />
            <div class="absolute inset-0 bg-black/50"></div>

            <div class="relative z-10 flex h-full items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight drop-shadow-md text-white mb-2">
                        Prestasi Sekolah
                    </h1>
                    <div class="h-1 w-20 bg-sekolah-kuning mx-auto rounded-full"></div>
                    <p class="mt-4 text-white/90 text-lg font-medium">
                        Rekap jejak langkah juara siswa-siswi SD Negeri Bringin 01
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto -mt-10 max-w-7xl px-4 sm:px-6 lg:px-8 relative z-20">
        {{-- STATISTIK CARD --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            <div class="rounded-2xl bg-gradient-to-br from-sekolah-hijau to-teal-700 shadow-xl p-6 text-white transform hover:-translate-y-1 transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/80 text-xs font-bold uppercase tracking-widest">Total Prestasi</p>
                        <p class="mt-1 text-4xl font-extrabold">{{ $achievements->total() }}</p>
                        <p class="text-xs text-white/60 mt-1">Piala & Penghargaan</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-full">
                        <i class="fas fa-trophy text-3xl text-yellow-300"></i>
                    </div>
                </div>
            </div>
            
            <div class="rounded-2xl bg-white shadow-xl p-6 transform hover:-translate-y-1 transition duration-300 border-t-4 border-sekolah-hijau">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest">Update Terakhir</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800">{{ $latestAchievementDate }}</p>
                        <p class="text-xs text-gray-400 mt-1">Data terbaru yang diinput</p>
                    </div>
                    <div class="bg-gray-100 p-3 rounded-full">
                        <i class="far fa-calendar-check text-2xl text-gray-500"></i>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl bg-white shadow-xl p-6 transform hover:-translate-y-1 transition duration-300 border-t-4 border-sekolah-kuning">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest">Tingkat Tertinggi</p>
                        <p class="mt-1 text-2xl font-bold text-sekolah-hijau">{{ $levelSummary }}</p>
                        <p class="text-xs text-gray-400 mt-1">Capaian level maksimal</p>
                    </div>
                    <div class="bg-yellow-50 p-3 rounded-full">
                        <i class="fas fa-medal text-2xl text-sekolah-kuning"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEARCH & FILTER --}}
        <div class="bg-white rounded-2xl shadow-md p-6 mb-10">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input
                        id="achievementSearch"
                        type="text"
                        placeholder="Cari nama lomba, juara, atau tingkat..."
                        class="w-full rounded-xl border border-gray-200 pl-11 pr-4 py-3 text-sm focus:border-sekolah-hijau focus:ring-2 focus:ring-sekolah-hijau/20 transition outline-none"
                    />
                </div>
                <div class="md:w-64">
                    <select
                        id="yearFilter"
                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-sekolah-hijau focus:ring-2 focus:ring-sekolah-hijau/20 transition outline-none bg-white"
                    >
                        <option value="">Semua Tahun</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- LIST DATA --}}
        <div id="achievementList" class="min-h-[400px]">
            @if($achievements->isEmpty())
                <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                    <div class="bg-gray-50 p-6 rounded-full mb-4">
                        <i class="fas fa-trophy text-4xl text-gray-300"></i>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($achievements as $achievement)
                        <article
                            class="achievement-item rounded-2xl bg-white shadow-sm ring-1 ring-black/5 overflow-hidden"
                            data-year="{{ $achievement->date }}"
                            data-search="{{ strtolower($achievement->date.' '.$achievement->position.' '.$achievement->level.' '.$achievement->name.' '.$achievement->category) }}"
                        >
                            <div class="p-5 sm:p-6">
                                <div class="flex items-start gap-4">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold text-white bg-sekolah-hijau shadow-sm">
                                                {{ $achievement->position }}
                                            </span>

                                            <span class="inline-flex items-center rounded-full bg-sekolah-hijau/10 text-sekolah-hijau px-3 py-1 text-xs font-semibold ring-1 ring-sekolah-hijau/20">
                                                {{ $achievement->level }}
                                            </span>

                                            <span class="inline-flex items-center rounded-full bg-gray-100 text-gray-700 px-3 py-1 text-xs font-semibold ring-1 ring-gray-200">
                                                {{ $achievement->category }}
                                            </span>

                                            <span class="ml-auto hidden sm:inline text-sm font-semibold text-gray-500">
                                                {{ $achievement->date }}
                                            </span>
                                        </div>

                                        <h3 class="mt-3 text-lg sm:text-xl font-extrabold text-gray-900 leading-snug">
                                            {{ $achievement->title }}
                                        </h3>

                                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                                            <span class="font-semibold text-gray-800">Ringkas:</span>
                                            {{ $achievement->date }} • {{ $achievement->position }} • {{ $achievement->level }} • {{ $achievement->name }} ({{ $achievement->category }})
                                        </p>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <div class="absolute top-3 left-3 z-10">
                                <span class="inline-flex items-center rounded-lg bg-white/90 backdrop-blur-sm px-3 py-1 text-xs font-bold text-gray-800 shadow-sm uppercase tracking-wide">
                                    {{ $achievement->level }}
                                </span>
                            </div>
                        </div>

                        {{-- KONTEN --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="inline-flex items-center rounded-full bg-sekolah-hijau text-white px-2.5 py-0.5 text-xs font-bold">
                                    <i class="fas fa-medal mr-1 text-yellow-300"></i> {{ $achievement->rank }}
                                </span>
                                <span class="text-xs text-gray-500 font-medium flex items-center">
                                    <i class="far fa-calendar-alt mr-1"></i> 
                                    {{ \Carbon\Carbon::parse($achievement->date)->translatedFormat('d M Y') }}
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 leading-snug mb-3 line-clamp-2 group-hover:text-sekolah-hijau transition-colors">
                                {{ $achievement->title }}
                            </h3>

                            <p class="text-sm text-gray-600 line-clamp-3 mb-4 flex-grow">
                                {{ $achievement->description ?? 'Tidak ada deskripsi tambahan.' }}
                            </p>

                            <div class="pt-4 border-t border-gray-100 mt-auto">
                                <button 
                                    type="button"
                                    onclick="openModal(this)"
                                    data-title="{{ $achievement->title }}"
                                    data-image="{{ $achievement->image ? asset('storage/' . $achievement->image) : '' }}"
                                    data-rank="{{ $achievement->rank }}"
                                    data-level="{{ $achievement->level }}"
                                    data-date="{{ \Carbon\Carbon::parse($achievement->date)->translatedFormat('l, d F Y') }}"
                                    data-desc="{{ $achievement->description }}"
                                    class="w-full inline-flex justify-center items-center gap-2 px-4 py-2.5 rounded-xl bg-gray-50 text-gray-700 text-sm font-bold hover:bg-sekolah-hijau hover:text-white transition-all duration-300 group-hover:shadow-md cursor-pointer"
                                >
                                    Selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $achievements->links() }}
                </div>
            @endif
            
            <div id="noResult" class="hidden flex-col items-center justify-center py-16 text-center text-gray-500">
                <div class="bg-gray-100 p-4 rounded-full mb-3">
                    <i class="fas fa-search text-2xl text-gray-400"></i>
                </div>
                <p class="font-medium">Tidak ada prestasi yang cocok dengan pencarian.</p>
            </div>
        </div>
    </section>

    {{-- MODAL POPUP (DIPERBESAR) --}}
    <div id="detailModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                
                {{-- Modal Panel (Diubah jadi max-w-6xl biar LEGA) --}}
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-6xl scale-95 opacity-0" id="modalPanel">
                    
                    {{-- Tombol Close --}}
                    <div class="absolute right-4 top-4 z-20">
                        <button type="button" onclick="closeModal()" class="rounded-full bg-black/20 p-2 text-white hover:bg-black/40 transition focus:outline-none cursor-pointer">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-col md:flex-row h-full min-h-[500px]"> {{-- Min height ditambah --}}
                        {{-- KIRI: GAMBAR FULL --}}
                        <div class="md:w-3/5 bg-gray-900 flex items-center justify-center relative"> {{-- Lebar gambar ditambah --}}
                            <img id="modalImg" src="" alt="" class="max-h-[80vh] w-full object-contain p-2 md:absolute md:inset-0 md:h-full">
                            
                            <div id="modalNoImg" class="hidden flex-col items-center text-gray-400">
                                <i class="fas fa-trophy text-6xl mb-2"></i>
                                <span>Tidak ada dokumentasi</span>
                            </div>
                        </div>

                        {{-- KANAN: DETAIL TEKS --}}
                        <div class="md:w-2/5 p-8 md:p-10 flex flex-col bg-white"> {{-- Lebar teks disesuaikan --}}
                            <div class="mb-6">
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span id="modalLevel" class="inline-flex items-center rounded-lg bg-sekolah-kuning/20 text-yellow-700 px-3 py-1 text-xs font-bold uppercase tracking-wide">
                                        LEVEL
                                    </span>
                                    <span id="modalRank" class="inline-flex items-center rounded-lg bg-sekolah-hijau/10 text-sekolah-hijau px-3 py-1 text-xs font-bold uppercase tracking-wide">
                                        JUARA
                                    </span>
                                </div>

                                <h2 id="modalTitle" class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-3">
                                    Judul Prestasi
                                </h2>
                                
                                <p id="modalDate" class="text-sm text-gray-500 font-medium flex items-center">
                                    <i class="far fa-calendar-alt mr-2 text-sekolah-hijau"></i> 
                                    <span class="text-gray-700">Tanggal</span>
                                </p>
                            </div>

                            <div class="prose prose-lg text-gray-600 flex-grow overflow-y-auto max-h-[400px] pr-2 custom-scrollbar">
                                <p id="modalDesc">Deskripsi lengkap...</p>
                            </div>

                            <div class="mt-8 pt-6 border-t border-gray-100">
                                <p class="text-xs text-center text-gray-400">Prestasi Siswa SD Negeri 1 Bringin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // === LOGIKA SEARCH & FILTER ===
        const searchInput = document.getElementById('achievementSearch');
        const yearFilter = document.getElementById('yearFilter');
        const items = document.querySelectorAll('.achievement-item');
        const noResult = document.getElementById('noResult');

        function filterItems() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedYear = yearFilter.value;
            let visibleCount = 0;

            items.forEach(item => {
                const searchData = item.getAttribute('data-search');
                const itemYear = item.getAttribute('data-year');
                
                const matchesSearch = searchData.includes(searchTerm);
                const matchesYear = selectedYear === '' || itemYear === selectedYear;

                if (matchesSearch && matchesYear) {
                    item.style.display = ''; 
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (visibleCount === 0 && items.length > 0) {
                noResult.classList.remove('hidden');
                noResult.classList.add('flex');
            } else {
                noResult.classList.add('hidden');
                noResult.classList.remove('flex');
            }
        }

        if (searchInput) searchInput.addEventListener('input', filterItems);
        if (yearFilter) yearFilter.addEventListener('change', filterItems);

        // === LOGIKA MODAL POPUP ===
        const modal = document.getElementById('detailModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalPanel = document.getElementById('modalPanel');

        // Elemen dalam modal
        const mTitle = document.getElementById('modalTitle');
        const mImg = document.getElementById('modalImg');
        const mNoImg = document.getElementById('modalNoImg');
        const mRank = document.getElementById('modalRank');
        const mLevel = document.getElementById('modalLevel');
        const mDate = document.getElementById('modalDate');
        const mDesc = document.getElementById('modalDesc');

        function openModal(button) {
            // 1. Ambil data
            const title = button.getAttribute('data-title');
            const image = button.getAttribute('data-image');
            const rank = button.getAttribute('data-rank');
            const level = button.getAttribute('data-level');
            const date = button.getAttribute('data-date');
            const desc = button.getAttribute('data-desc');

            // 2. Isi konten
            mTitle.innerText = title;
            mRank.innerText = rank;
            mLevel.innerText = level;
            
            mDate.innerHTML = `<i class="far fa-calendar-alt mr-2 text-sekolah-hijau"></i> <span class="text-gray-700">${date}</span>`;
            
            if (desc && desc !== 'null') {
                mDesc.innerText = desc;
            } else {
                mDesc.innerText = 'Tidak ada deskripsi tambahan untuk prestasi ini.';
            }

            // Cek Gambar
            if (image) {
                mImg.src = image;
                mImg.classList.remove('hidden');
                mNoImg.classList.add('hidden');
            } else {
                mImg.classList.add('hidden');
                mNoImg.classList.remove('hidden');
                mNoImg.classList.add('flex');
            }

            // 3. Tampilkan
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalPanel.classList.remove('scale-95', 'opacity-0');
                modalPanel.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            modalBackdrop.classList.add('opacity-0');
            modalPanel.classList.remove('scale-100', 'opacity-100');
            modalPanel.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        window.onclick = function(event) {
            if (event.target == modal || event.target.closest('#modalBackdrop')) {
                closeModal();
            }
        }
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #9ca3af; }
    </style>
</main>
@endsection