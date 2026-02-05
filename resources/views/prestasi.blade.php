@extends('layouts.frontend')

@section('content')
<main class="pb-16" x-data="achievementLightbox()">
    {{-- HERO --}}
    <section class="relative">
        <div class="relative h-[320px] sm:h-[380px] lg:h-[420px] overflow-hidden">
            <img
                src="{{ asset('asset/prestasi_banner.png') }}"
                alt="Prestasi SDN 1 Bringin"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110" />
            <div class="absolute inset-0 bg-black/45"></div>

            <div class="relative z-10 flex h-full items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center text-white">
                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight drop-shadow text-white">
                        Prestasi Sekolah
                    </h1>
                    <p class="mt-3 text-white/90">
                        Rekap capaian siswa SD Negeri Bringin 01
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- SUMMARY --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="rounded-2xl bg-sekolah-hijau shadow-sm ring-1 ring-black/5 p-5 text-white">
                <p class="text-white text-sm">Total Prestasi</p>
                <p class="mt-1 text-3xl font-extrabold">{{ $achievements->count() }}</p>
            </div>
            <div class="rounded-2xl bg-sekolah-hijau shadow-sm ring-1 ring-black/5 p-5">
                <p class="text-white text-sm">Tanggal Terbaru</p>
                <p class="mt-1 text-3xl font-extrabold text-white">{{ $latestAchievementDate }}</p>
            </div>
            <div class="rounded-2xl bg-sekolah-hijau shadow-sm ring-1 ring-black/5 p-5" id="prestasi">
                <p class="text-white text-sm">Tingkat Dominan</p>
                <p class="mt-1 text-2xl font-extrabold text-white">{{ $levelSummary }}</p>
            </div>
        </div>

    <section class="mx-auto mt-10 max-w-7xl">
        <form method="GET" action="{{ url()->current() }}#prestasi">
                <div class="flex flex-col sm:flex-row gap-4 sm:items-end">
                    {{-- SEARCH --}}
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700">
                            Cari Prestasi
                        </label>
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari berdasarkan acara, lomba, kategori, tingkat, juara, penghargaan..." class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-sekolah-hijau/40" />
                    </div>
        
            @if(request('tahun'))
                <input type="hidden" name="tahun" value="{{ request('tahun') }}">
            @endif

        </form>

        <form method="GET" action="{{ url()->current() }}#prestasi">
            <div>
                <div class="relative group w-full sm:w-56">
                    <label class="block text-sm font-semibold text-gray-700">
                        Filter Tahun
                    </label>

                    <div class="relative mt-2">
                        <button type="button" class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sekolah-hijau/40 shadow-s hover:border-sekolah-hijau transition flex items-center justify-between">
                            <span>{{ request('tahun', 'Semua Tahun') }}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>

                        <ul
                            class="absolute top-full left-0 w-full bg-white shadow-xl rounded-b-lg
                                opacity-0 invisible group-hover:opacity-100 group-hover:visible
                                transition-all duration-200 z-50 border-t">

                            <li>
                                <button
                                    type="submit" name="tahun" value="" class="block w-full px-6 py-3 text-left text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium">
                                    Semua Tahun
                                </button>
                            </li>

                            @foreach ($years as $year)
                                <li>
                                    <button
                                        type="submit" name="tahun" value="{{ $year }}" class="block w-full px-6 py-3 text-left text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium">
                                        {{ $year }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div>

            @if(request('cari'))
                <input type="hidden" name="cari" value="{{ request('cari') }}">
            @endif

            </form>
    </section>

        {{-- LIST --}}
        <div class="mt-8">
            <div class="relative">
                <div id="achievementList" class="space-y-4">
                    @if($achievements->isEmpty())
                    <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                        Tidak ada data.
                    </div>
                    @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($achievements as $achievement)
                        @php
                        $year = $achievement->date instanceof \Carbon\Carbon
                        ? $achievement->date->format('Y')
                        : \Carbon\Carbon::parse($achievement->date)->format('Y');

                        $prettyDate = $achievement->date instanceof \Carbon\Carbon
                        ? $achievement->date->translatedFormat('d F Y')
                        : \Carbon\Carbon::parse($achievement->date)->translatedFormat('d F Y');

                        $searchText = strtolower(
                        $year.' '.
                        $achievement->position.' '.
                        $achievement->level.' '.
                        $achievement->category.' '.
                        $achievement->title.' '.
                        $achievement->name.' '.
                        ($achievement->award ?? '').' '.
                        ($achievement->description ?? '')
                        );

                        // konten deskripsi aman untuk JS attribute (pakai json_encode)
                        $descForModal = $achievement->description ?? '';
                        @endphp

                        <article
                            class="achievement-item rounded-2xl bg-white shadow-sm ring-1 ring-black/5 overflow-hidden group"
                            data-year="{{ $year }}"
                            data-search="{{ $searchText }}">
                            {{-- Image (click => open modal) --}}
                            <button
                                type="button"
                                class="relative h-44 sm:h-48 w-full overflow-hidden text-left"
                                @click="open({
                                            img: @js($achievement->image_url),
                                            title: @js($achievement->title),
                                            name: @js($achievement->name),
                                            date: @js($prettyDate),
                                            year: @js($year),
                                            category: @js($achievement->category),
                                            level: @js($achievement->level),
                                            position: @js($achievement->position),
                                            award: @js($achievement->award),
                                            description: @js($descForModal)
                                        })">
                                <img
                                    src="{{ $achievement->image_url }}"
                                    alt="Foto Prestasi"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

                                {{-- hint zoom --}}
                                <div class="absolute right-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-gray-800 ring-1 ring-black/5">
                                    <span>Detail</span>
                                    <span class="text-gray-500">↗</span>
                                </div>

                                {{-- Date badge --}}
                                <div class="absolute left-4 top-4">
                                    <span class="inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-gray-800 ring-1 ring-black/5">
                                        {{ $prettyDate }}
                                    </span>
                                </div>
                            </button>

                            <div class="p-5 sm:p-6">
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

                                    @if(!empty($achievement->award))
                                    <span class="inline-flex items-center rounded-full bg-amber-50 text-amber-800 px-3 py-1 text-xs font-semibold ring-1 ring-amber-100">
                                        {{ $achievement->award }}
                                    </span>
                                    @endif

                                    <span class="ml-auto text-sm font-semibold text-gray-500">
                                        {{ $year }}
                                    </span>
                                </div>

                                <h3 class="mt-3 text-lg sm:text-xl font-extrabold text-gray-900 leading-snug">
                                    {{ $achievement->title }}
                                </h3>

                                <p class="mt-1 text-sm font-semibold text-gray-700">
                                    {{ $achievement->name }}
                                </p>

                                @if(!empty($achievement->description))
                                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                                    {{ Str::limit(strip_tags($achievement->description), 120) }}
                                </p>
                                @endif
                            </div>
                        </article>
                        @endforeach
                    </div>
                    @endif

                    {{-- empty state after filter --}}
                    <div id="noResult" class="hidden rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5 mt-6">
                        Tidak ada prestasi yang cocok dengan pencarian/filter.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LIGHTBOX MODAL --}}
    <div
        x-show="isOpen"
        x-cloak
        @keydown.escape.window="close()"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[999] flex items-center justify-center px-4 sm:px-6"
        aria-modal="true"
        role="dialog">
        {{-- backdrop --}}
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="close()"></div>

        {{-- modal panel --}}
        <div
            class="relative z-10 w-full max-w-4xl overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-black/10"
            @click.stop>
            {{-- header --}}
            <div class="flex items-start justify-between gap-4 border-b border-gray-100 p-4 sm:p-5">
                <div class="min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-gray-900 truncate" x-text="data.title"></h3>
                    <p class="mt-1 text-sm font-semibold text-gray-700 truncate" x-text="data.name"></p>

                    <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
                        <span class="inline-flex items-center rounded-full bg-sekolah-hijau px-3 py-1 font-bold text-white" x-text="data.position"></span>
                        <span class="inline-flex items-center rounded-full bg-sekolah-hijau/10 text-sekolah-hijau px-3 py-1 font-semibold ring-1 ring-sekolah-hijau/20" x-text="data.level"></span>
                        <span class="inline-flex items-center rounded-full bg-gray-100 text-gray-700 px-3 py-1 font-semibold ring-1 ring-gray-200" x-text="data.category"></span>

                        <template x-if="data.award">
                            <span class="inline-flex items-center rounded-full bg-amber-50 text-amber-800 px-3 py-1 font-semibold ring-1 ring-amber-100" x-text="data.award"></span>
                        </template>

                        <span class="ml-auto inline-flex items-center rounded-full bg-gray-50 text-gray-700 px-3 py-1 font-semibold ring-1 ring-gray-200" x-text="data.date"></span>
                    </div>
                </div>

                <button
                    type="button"
                    class="shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gray-50 text-gray-600 ring-1 ring-gray-200 hover:bg-gray-100 hover:text-gray-900 transition"
                    @click="close()"
                    aria-label="Tutup"
                    title="Tutup (Esc)">
                    <span class="text-xl leading-none">×</span>
                </button>
            </div>

            {{-- body (scrollable) --}}
            <div class="max-h-[75vh] overflow-y-auto">
                {{-- image --}}
                <div class="relative bg-black">
                    <img :src="data.img" alt="Foto Prestasi" class="w-full max-h-[420px] object-contain bg-black" />
                </div>

                {{-- description --}}
                <div class="p-4 sm:p-6">
                    <h4 class="text-sm font-extrabold text-gray-900">Deskripsi</h4>

                    <template x-if="data.description && data.description.trim().length">
                        <p class="mt-2 text-sm text-gray-700 leading-relaxed whitespace-pre-line" x-text="data.description"></p>
                    </template>

                    <template x-if="!data.description || !data.description.trim().length">
                        <p class="mt-2 text-sm text-gray-500 italic">Tidak ada deskripsi.</p>
                    </template>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- Alpine.js (hapus kalau sudah ada di layout global) --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    function achievementLightbox() {
        return {
            isOpen: false,
            data: {
                img: '',
                title: '',
                name: '',
                date: '',
                year: '',
                category: '',
                level: '',
                position: '',
                award: '',
                description: '',
            },
            open(payload) {
                this.data = payload;
                this.isOpen = true;
                document.documentElement.classList.add('overflow-hidden');
            },
            close() {
                this.isOpen = false;
                document.documentElement.classList.remove('overflow-hidden');
            }
        }
    }
</script>
@endsection