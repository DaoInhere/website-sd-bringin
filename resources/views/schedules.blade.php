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
                        Kurikulum Pelajaran
                    </h1>
                    <p class="mt-2 text-white/90">
                        Informasi &rarr; Jadwal KBM
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-3">
            @forelse ($curriculums as $index => $curriculum)
                <details class="group rounded-2xl bg-white shadow-sm ring-1 ring-black/5 overflow-hidden transition-all duration-500">
                    <summary class="cursor-pointer list-none px-5 py-4 flex items-center justify-between">
                        @if ($loop->first)
                            <span class="font-semibold text-gray-900">{{ $curriculum }} (Terbaru)</span>
                        @else
                            <span class="font-semibold text-gray-900">{{ $curriculum }}</span>
                        @endif

                        {{-- icon caret --}}
                        <span class="ml-3 inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gray-50 ring-1 ring-black/5">
                            <svg class="h-5 w-5 text-gray-700 transition-transform duration-200 group-open:rotate-180"
                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                      clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>

                    <div class="border-t border-gray-100 px-5 py-5 max-h-0 overflow-hidden opacity-0 group-open:max-h-screen group-open:opacity-100 transition-all duration-500">
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                            @foreach ($classes as $class)
                                <a
                                    href="{{ url('/informasi/jadwalkbm') }}?kelas={{ $class }}&kurikulum={{ $curriculum }}"
                                    class="inline-flex items-center justify-center rounded-xl bg-sekolah-hijau px-4 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-black/5 hover:opacity-90 transition"
                                >
                                    Kelas {{ $class }}
                                </a>
                            @endforeach
                            
                            <a href="{{ url('/informasi/jadwalkbm') }}?kurikulum={{ $curriculum }}&tipe=UTS" class="inline-flex items-center justify-center rounded-xl bg-sekolah-hijau px-4 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-black/5 hover:opacity-90 transition">
                                UTS
                            </a>
                            <a href="{{ url('/informasi/jadwalkbm') }}?kurikulum={{ $curriculum }}&tipe=UAS" class="inline-flex items-center justify-center rounded-xl bg-sekolah-hijau px-4 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-black/5 hover:opacity-90 transition">
                                UAS
                            </a>
                        </div>
                    </div>
                </details>
            @empty
                <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                    Data kurikulum belum tersedia.
                </div>
            @endforelse
        </div>
    </section>

</main>
@endsection