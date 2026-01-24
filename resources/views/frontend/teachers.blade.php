@extends('layouts.frontend')

@section('content')
<main class="pb-16">
    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-10">
        {{-- Header --}}
        <div class="text-center mb-10">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Daftar Guru & Staf Pengajar</h2>
            <p class="mt-2 text-gray-500">SD Negeri Bringin 01</p>
        </div>

        @if($teachers->isEmpty())
            <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                Belum ada data guru yang diinput.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($teachers as $teacher)

                    <div class="rounded-2xl bg-white shadow-sm ring-1 ring-black/5 overflow-hidden hover:shadow-md transition">
                        <div class="p-6 sm:p-7 flex items-center gap-6">
                            {{-- Photo (lebih besar) --}}
                            <div class="shrink-0">
                                <div class="h-28 w-28 rounded-full overflow-hidden bg-gray-50 ring-4 ring-white shadow-sm">
                                    <img
                                        src="{{ $teacher->photo_url }}"
                                        class="h-full w-full object-cover"
                                    />
                                </div>
                            </div>

                            {{-- Info --}}
                            <div class="min-w-0">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                                    {{ $teacher->position ?? '-' }}
                                </p>

                                <h3 class="mt-1 text-xl font-extrabold text-gray-900 truncate">
                                    {{ $teacher->name }}
                                </h3>

                                {{-- Kalau mau tambahin deskripsi kecil opsional --}}
                                {{-- <p class="mt-1 text-sm text-gray-600 truncate">Guru & Staf Pengajar</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</main>
@endsection
