<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Data Jadwal KBM') }}
            </h2>
        </div>
    </x-slot>

    @php
        // state dari query (Laravel request helper)
        $sort = request('sort');            // contoh: hour
        $dir  = request('dir', 'asc');      // asc/desc

        // toggle url untuk icon (tanpa sorting backend)
        $toggleSortUrl = function (string $col) use ($sort, $dir) {
            $nextDir = ($sort === $col && $dir === 'asc') ? 'desc' : 'asc';

            return request()->fullUrlWithQuery([
                'sort' => $col,
                'dir'  => $nextDir,
                'page' => null, // reset page saat ganti kolom
            ]);
        };

        // icon berdasarkan state
        $icon = function (string $col) use ($sort, $dir) {
            if ($sort !== $col) return '↕';
            return $dir === 'asc' ? '↑' : '↓';
        };

        // warna icon
        $iconClass = function (string $col) use ($sort, $dir) {
            if ($sort !== $col) return 'text-gray-400';
            return $dir === 'asc' ? 'text-emerald-600' : 'text-amber-600';
        };
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-6">

                {{-- ALERT SUCCESS --}}
                @if (session('success'))
                    <div class="mb-5 rounded-xl bg-emerald-50 p-4 text-emerald-800 ring-1 ring-emerald-200">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- TOP BAR: tombol tambah + search --}}
                <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    {{-- tombol tambah (TETAP ADA) --}}
                    <a href="{{ route('schedules.create') }}"
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Jadwal Baru
                    </a>

                    <form method="GET" action="{{ url()->current() }}" class="w-full sm:w-auto">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="fas fa-search"></i>
                            </span>

                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Cari jadwal..."
                                class="w-full sm:w-72 pl-10 pr-10 py-2.5 rounded-xl border border-gray-200 bg-white text-sm text-gray-700
                                       placeholder:text-gray-400 shadow-sm
                                       focus:outline-none focus:ring-2 focus:ring-sekolah-hijau/30 focus:border-sekolah-hijau transition" />

                            <button type="submit"
                                    class="absolute inset-y-0 right-2 flex items-center justify-center px-2 text-gray-500 hover:text-sekolah-hijau transition"
                                    aria-label="Cari">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>

                        {{-- Supaya q tidak menghapus sort/dir saat submit --}}
                        @if(request('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif
                        @if(request('dir'))
                            <input type="hidden" name="dir" value="{{ request('dir') }}">
                        @endif
                    </form>
                </div>

                {{-- pagination (ikut q/sort/dir) --}}
                <div class="sm:text-right mb-4">
                    {{ $schedules->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto ring-1 ring-gray-200">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-50 text-gray-700 text-sm">
                            <tr>
                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('id') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        ID <span class="text-xs {{ $iconClass('id') }}">{{ $icon('id') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('hour') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Jam <span class="text-xs {{ $iconClass('hour') }}">{{ $icon('hour') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('day') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Hari <span class="text-xs {{ $iconClass('day') }}">{{ $icon('day') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('subject') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Kegiatan / Mapel <span class="text-xs {{ $iconClass('subject') }}">{{ $icon('subject') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('class') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Kelas <span class="text-xs {{ $iconClass('class') }}">{{ $icon('class') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('type') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Tipe <span class="text-xs {{ $iconClass('type') }}">{{ $icon('type') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('uniform') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Seragam <span class="text-xs {{ $iconClass('uniform') }}">{{ $icon('uniform') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('curriculum') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Kurikulum <span class="text-xs {{ $iconClass('curriculum') }}">{{ $icon('curriculum') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse ($schedules as $schedule)
                                <tr class="text-center hover:bg-gray-50 transition">
                                    <td class="p-3 text-xs text-gray-500">{{ $schedule->id }}</td>
                                    <td class="p-3 font-bold text-sm text-gray-900">{{ $schedule->hour }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $schedule->day }}</td>
                                    <td class="p-3 text-left text-sm text-gray-700">
                                        {{ Str::limit($schedule->subject, 50) }}
                                    </td>
                                    <td class="p-3 text-sm">
                                        <span class="inline-flex px-2.5 py-1 rounded-full bg-gray-100 text-xs text-gray-700 ring-1 ring-gray-200">
                                            {{ $schedule->class == '0' ? 'Semua' : $schedule->class }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-xs uppercase text-gray-700">{{ $schedule->type }}</td>
                                    <td class="p-3 text-xs italic text-gray-600">{{ $schedule->uniform }}</td>
                                    <td class="p-3 text-xs font-semibold text-gray-800">{{ $schedule->curriculum }}</td>
                                    <td class="p-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('schedules.edit', $schedule->id) }}"
                                               class="text-amber-700 hover:text-amber-900 font-bold text-[11px] border border-amber-600 px-3 py-1.5 rounded-lg uppercase tracking-tight transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Yakin hapus data jadwal ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-700 hover:text-red-900 font-bold text-[11px] border border-red-600 px-3 py-1.5 rounded-lg uppercase tracking-tight transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="p-10 text-center text-gray-500 italic">
                                        Belum ada data jadwal kegiatan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- BOTTOM PAGINATION (ikut q/sort/dir) --}}
                <div class="mt-5">
                    {{ $schedules->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>