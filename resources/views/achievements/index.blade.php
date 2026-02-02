<x-app-layout>
    @php
        $sort = request('sort');
        $dir  = request('dir', 'asc');

        $toggleSortUrl = function (string $col) use ($sort, $dir) {
            $nextDir = ($sort === $col && $dir === 'asc') ? 'desc' : 'asc';

            return request()->fullUrlWithQuery([
                'sort' => $col,
                'dir'  => $nextDir,
                'page' => null,
            ]);
        };

        $icon = function (string $col) use ($sort, $dir) {
            if ($sort !== $col) return '↕';
            return $dir === 'asc' ? '↑' : '↓';
        };

        $iconClass = function (string $col) use ($sort, $dir) {
            if ($sort !== $col) return 'text-gray-400';
            return $dir === 'asc' ? 'text-emerald-600' : 'text-amber-600';
        };
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- TOP BAR: tombol tambah + search --}}
                    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <a href="{{ route('achievements.create') }}"
                           style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                            + Tambah Prestasi Baru
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
                                    placeholder="Cari prestasi..."
                                    class="w-full sm:w-72 pl-10 pr-10 py-2.5 rounded-xl border border-gray-200 bg-white text-sm text-gray-700
                                           placeholder:text-gray-400 shadow-sm
                                           focus:outline-none focus:ring-2 focus:ring-sekolah-hijau/30 focus:border-sekolah-hijau transition" />

                                <button type="submit"
                                        class="absolute inset-y-0 right-2 flex items-center justify-center px-2 text-gray-500 hover:text-sekolah-hijau transition"
                                        aria-label="Cari">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>

                            {{-- jaga sort/dir saat search --}}
                            @if(request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif
                            @if(request('dir'))
                                <input type="hidden" name="dir" value="{{ request('dir') }}">
                            @endif
                        </form>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm leading-normal">
                                    <th class="border border-gray-300 p-3 text-left">
                                        <a href="{{ $toggleSortUrl('image') }}"
                                           class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                            Foto <span class="text-xs {{ $iconClass('image') }}">{{ $icon('image') }}</span>
                                        </a>
                                    </th>

                                    <th class="border border-gray-300 p-3 text-left">
                                        <a href="{{ $toggleSortUrl('name') }}"
                                           class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                            Nama Lomba <span class="text-xs {{ $iconClass('name') }}">{{ $icon('name') }}</span>
                                        </a>
                                    </th>

                                    <th class="border border-gray-300 p-3 text-left">
                                        <a href="{{ $toggleSortUrl('category') }}"
                                           class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                            Kategori <span class="text-xs {{ $iconClass('category') }}">{{ $icon('category') }}</span>
                                        </a>
                                    </th>

                                    <th class="border border-gray-300 p-3 text-left">
                                        <a href="{{ $toggleSortUrl('level') }}"
                                           class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                            Tingkat <span class="text-xs {{ $iconClass('level') }}">{{ $icon('level') }}</span>
                                        </a>
                                    </th>

                                    <th class="border border-gray-300 p-3 text-left">
                                        <a href="{{ $toggleSortUrl('position') }}"
                                           class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                            Juara <span class="text-xs {{ $iconClass('position') }}">{{ $icon('position') }}</span>
                                        </a>
                                    </th>

                                    <th class="border border-gray-300 p-3 text-left">
                                        <a href="{{ $toggleSortUrl('date') }}"
                                           class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                            Tanggal <span class="text-xs {{ $iconClass('date') }}">{{ $icon('date') }}</span>
                                        </a>
                                    </th>

                                    <th class="border border-gray-300 p-3 text-left">
                                        <a href="{{ $toggleSortUrl('description') }}"
                                           class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                            Deskripsi <span class="text-xs {{ $iconClass('description') }}">{{ $icon('description') }}</span>
                                        </a>
                                    </th>

                                    <th class="border border-gray-300 p-3 text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($achievements as $achievement)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="border border-gray-300 p-3">
                                            <img src="{{ $achievement->image_url }}"
                                                 class="w-20 h-20 object-cover rounded shadow-sm">
                                        </td>

                                        <td class="border border-gray-300 p-3 font-bold">
                                            {{ $achievement->name }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            {{ $achievement->category }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            {{ $achievement->level }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            {{ $achievement->position }}
                                        </td>

                                        <td class="border border-gray-300 p-3 text-sm">
                                            {{ $achievement->date->translatedFormat('d F Y') }}
                                        </td>

                                        <td class="border border-gray-300 p-3 text-sm">
                                            {{ Str::limit($achievement->description, 50) }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('achievements.edit', $achievement->id) }}"
                                                   class="text-amber-600 hover:text-amber-800 font-medium text-sm border border-amber-600 px-3 py-1 rounded">
                                                    Edit
                                                </a>

                                                <form onsubmit="return confirm('Yakin hapus data ini?');"
                                                      action="{{ route('achievements.destroy', $achievement->id) }}"
                                                      method="POST"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="text-red-600 hover:text-red-800 font-medium text-sm border border-red-600 px-3 py-1 rounded">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="border border-gray-300 p-8 text-center text-gray-500 italic">
                                            Belum ada data Prestasi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $achievements->appends(request()->only(['q','sort','dir']))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
