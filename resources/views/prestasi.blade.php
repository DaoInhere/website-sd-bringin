@extends('layouts.frontend')

@section('content')
<main class="pb-16">
    <section class="relative">
        <div class="relative h-64 md:h-80 overflow-hidden">
            <img
                src="{{ asset('asset/prestasi_banner.png') }}"
                alt="Prestasi SDN 1 Bringin"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110"
            />
            <div class="absolute inset-0 bg-black/45"></div>

            <div class="relative z-10 flex h-full items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center">
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
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="rounded-2xl bg-sekolah-hijau shadow-sm ring-1 ring-black/5 p-5 text-white">
                <p class="text-white text-sm">Total Prestasi</p>
                <p class="mt-1 text-3xl font-extrabold">{{ $achievements->count(); }}</p>
            </div>
            <div class="rounded-2xl bg-sekolah-hijau shadow-sm ring-1 ring-black/5 p-5">
                <p class="text-white text-sm">Tanggal Terbaru</p>
                <p class="mt-1 text-3xl font-extrabold text-white">{{ $latestAchievementDate }}</p>
            </div>
            <div class="rounded-2xl bg-sekolah-hijau shadow-sm ring-1 ring-black/5 p-5">
                <p class="text-white text-sm">Tingkat Dominan</p>
                <p class="mt-1 text-2xl font-extrabold text-white">{{ $levelSummary }}</p>
            </div>
        </div>


        <div class="mt-6 rounded-2xl bg-white shadow-sm ring-1 ring-black/5 p-4 sm:p-5">
            <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
                <div class="flex-1">
                    <label class="block text-sm font-semibold text-gray-700">Cari Prestasi</label>
                    <input
                        id="achievementSearch"
                        type="text"
                        placeholder="Cari berdasarkan lomba, kategori, tingkat, juara..."
                        class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-sekolah-hijau/40"
                    />
                </div>

                <div class="sm:w-56">
                    <label class="block text-sm font-semibold text-gray-700">Filter Tahun</label>
                    <select
                        id="yearFilter"
                        class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-sekolah-hijau/40"
                    >
                        <option value="">Semua Tahun</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="relative">

                <div id="achievementList" class="space-y-4">
                @if($achievements->isEmpty())
                    <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                        Belum ada data prestasi yang diinput.
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
                            </div>

                            {{-- Accent footer --}}
                            <div class="h-2 bg-sekolah-hijau"></div>
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
</main>
@endsection