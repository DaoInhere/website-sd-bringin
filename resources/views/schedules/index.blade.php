<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Data Jadwal KBM') }}
            </h2>
        </div>
    </x-slot>

    @php
    $sort = request('sort', 'id');
    $dir = request('dir', 'desc');

    // kolom yang boleh disort
    $sortable = [
    'id' => 'ID',
    'hour' => 'Jam',
    'day' => 'Hari',
    'subject' => 'Mapel/Kegiatan',
    'class' => 'Kelas',
    'type' => 'Tipe',
    'uniform' => 'Seragam',
    'curriculum' => 'Kurikulum',
    ];

    // build url sort (toggle asc/desc jika klik header yang sama)
    $sortUrl = function($col) use ($sort, $dir) {
    $nextDir = ($sort === $col && $dir === 'asc') ? 'desc' : 'asc';
    return request()->fullUrlWithQuery(['sort' => $col, 'dir' => $nextDir, 'page' => null]);
    };

    $sortIcon = function($col) use ($sort, $dir) {
    if ($sort !== $col) return '↕';
    return $dir === 'asc' ? '↑' : '↓';
    };

    $setSortUrl = function($newSort) {
    return request()->fullUrlWithQuery(['sort' => $newSort, 'page' => null]);
    };

    $toggleDirUrl = function() use ($sort, $dir) {
    $next = $dir === 'asc' ? 'desc' : 'asc';
    return request()->fullUrlWithQuery(['sort' => $sort, 'dir' => $next, 'page' => null]);
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

                {{-- TOP BAR: tombol tambah + sorting UI + pagination --}}
                <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    {{-- KIRI --}}
                    <div class="flex flex-wrap items-center gap-3">
                        {{-- tombol tambah (TETAP ADA) --}}
                        <a href="{{ route('schedules.create') }}"
                            style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                            + Tambah Jadwal Baru
                        </a>

                        {{-- Sorting UI modern --}}
                        <div class="flex items-center gap-2">
                            {{-- dropdown sort --}}
                            <div class="relative group">
                                <button type="button"
                                    class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:border-sekolah-hijau transition">
                                    <span class="text-gray-500">Urutkan:</span>
                                    <span class="text-gray-900">{{ $sortable[$sort] ?? 'ID' }}</span>
                                    <svg class="h-4 w-4 text-gray-500 transition-transform group-hover:rotate-180"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div class="absolute left-0 top-full mt-2 w-56 rounded-xl bg-white shadow-xl ring-1 ring-black/5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden">
                                    @foreach($sortable as $key => $label)
                                    <a href="{{ $setSortUrl($key) }}"
                                        class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-sekolah-hijau transition
                                                {{ $sort === $key ? 'font-bold bg-gray-50 text-sekolah-hijau' : '' }}">
                                        {{ $label }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>

                            {{-- toggle asc/desc --}}
                            <a href="{{ $toggleDirUrl() }}"
                                class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:border-sekolah-hijau transition">
                                @if($dir === 'asc')
                                <span class="inline-flex h-5 w-5 items-center justify-center rounded-md bg-emerald-50 text-emerald-700">↑</span>
                                <span>Asc</span>
                                @else
                                <span class="inline-flex h-5 w-5 items-center justify-center rounded-md bg-amber-50 text-amber-700">↓</span>
                                <span>Desc</span>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                {{-- KANAN: pagination --}}
                <div class="sm:text-right mb-4">
                    {{ $schedules->appends(request()->query())->links() }}
                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto  ring-1 ring-gray-200">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-50 text-gray-700 text-sm">
                            <tr>
                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $sortUrl('id') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        ID <span class="text-xs">{{ $sortIcon('id') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $sortUrl('hour') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        Jam <span class="text-xs">{{ $sortIcon('hour') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $sortUrl('day') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        Hari <span class="text-xs">{{ $sortIcon('day') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-left">
                                    <a href="{{ $sortUrl('subject') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        Kegiatan / Mapel <span class="text-xs">{{ $sortIcon('subject') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $sortUrl('class') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        Kelas <span class="text-xs">{{ $sortIcon('class') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $sortUrl('type') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        Tipe <span class="text-xs">{{ $sortIcon('type') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $sortUrl('uniform') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        Seragam <span class="text-xs">{{ $sortIcon('uniform') }}</span>
                                    </a>
                                </th>

                                <th class="border-b border-gray-200 p-3 text-center">
                                    <a href="{{ $sortUrl('curriculum') }}" class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
                                        Kurikulum <span class="text-xs">{{ $sortIcon('curriculum') }}</span>
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

                {{-- BOTTOM PAGINATION --}}
                <div class="mt-5">
                    {{ $schedules->appends(request()->query())->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>