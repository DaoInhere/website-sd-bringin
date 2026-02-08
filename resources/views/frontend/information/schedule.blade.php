@extends('layouts.frontend')

@section('content')
<main class="pb-16">
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
                        Jadwal Kegiatan Belajar Mengajar
                    </h1>

                    <p class="mt-2 text-white/90">
                        Jadwal KBM yang digunakan oleh warga sekolah SD Negeri Bringin 01       
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <a
                href="{{ url('/informasi/jadwalkbm') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700 hover:text-sekolah-hijau"
            >
                <span aria-hidden="true">&larr;</span>
                Kembali ke semua jadwal
            </a>

            @if ($type == 'UTS')
                <h2 class="text-xl sm:text-2xl font-extrabold text-sekolah-hijau">
                    Jadwal Ujian Tengah Semester
                </h2>
            @elseif ($type == 'UAS')
                <h2 class="text-xl sm:text-2xl font-extrabold text-sekolah-hijau">
                    Jadwal Ujian Akhir Semester
                </h2>
            @else
                <h2 class="text-xl sm:text-2xl font-extrabold text-sekolah-hijau">
                    Jadwal Kelas {{ $class }}
                </h2>
            @endif   
            <h3 class="text-gray-400 font-semibold">
                Kurikulum {{ $curriculum }}
            </h3>
        </div>

        @php
            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        @endphp

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 xl gap-6">
            @foreach ($days as $day)
                <div class="rounded-2xl bg-white shadow-sm ring-1 ring-black/5 overflow-hidden">
                    <div class="flex items-center justify-between px-5 py-4 bg-gray-50">
                        <h3 class="text-lg font-bold text-sekolah-hijau">{{ $day }}</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead class="bg-white">
                                <tr class="border-b border-gray-100">
                                    @if ($type == 'UTS' || $type == 'UAS')
                                        <th class="px-5 py-3 font-semibold text-gray-700 whitespace-nowrap w-28">Kelas</th>
                                        <th class="px-5 py-3 font-semibold text-gray-700 whitespace-nowrap w-28">Jam</th>
                                        <th class="px-5 py-3 font-semibold text-gray-700 whitespace-nowrap">Mata Pelajaran / Kegiatan</th>
                                        <th class="px-5 py-3 font-semibold text-gray-700 whitespace-nowrap w-32">Seragam</th>
                                    @else
                                        <th class="px-5 py-3 font-semibold text-gray-700 whitespace-nowrap w-28">Jam</th>
                                        <th class="px-5 py-3 font-semibold text-gray-700 whitespace-nowrap">Mata Pelajaran / Kegiatan</th>
                                        <th class="px-5 py-3 font-semibold text-gray-700 whitespace-nowrap w-32">Seragam</th>
                                    @endif   
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">
                                @forelse ($schedules[$day] ?? [] as $schedule)
                                    <tr class="hover:bg-gray-50 transition">
                                    @if ($type == 'UTS' || $type == 'UAS')
                                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $schedule->class }}
                                        </td>
                                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $schedule->hour }}
                                        </td>
                                        <td class="px-5 py-3 text-gray-700">
                                            {{ $schedule->subject }}
                                        </td>
                                        <td class="px-5 py-3 text-gray-700 whitespace-nowrap">
                                            {{ $schedule->uniform ?? '-' }}
                                        </td>
                                    @else
                                        <td class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $schedule->hour }}
                                        </td>
                                        <td class="px-5 py-3 text-gray-700">
                                            {{ $schedule->subject }}
                                        </td>
                                        <td class="px-5 py-3 text-gray-700 whitespace-nowrap">
                                            {{ $schedule->uniform ?? '-' }}
                                        </td>
                                    @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-5 py-6 text-center text-gray-500">
                                            Tidak ada jadwal
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
