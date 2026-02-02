<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Banner Halaman Beranda
        </h2>
    </x-slot>

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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- TOP BAR: tombol tambah + search --}}
                <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <a href="{{ route('herobanners.create') }}"
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Banner
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
                                placeholder="Cari banner..."
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

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    {{ $herobanners->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="border border-gray-300 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('image') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Gambar <span class="text-xs {{ $iconClass('image') }}">{{ $icon('image') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('title') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Judul <span class="text-xs {{ $iconClass('title') }}">{{ $icon('title') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('subtitle') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Sub Judul <span class="text-xs {{ $iconClass('subtitle') }}">{{ $icon('subtitle') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('dim') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Banner Redup <span class="text-xs {{ $iconClass('dim') }}">{{ $icon('dim') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($herobanners as $herobanner)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="border border-gray-300 p-3 text-center">
                                        <img src="{{ $herobanner->image_url }}"
                                             class="w-24 h-24 object-cover mx-auto rounded shadow-sm">
                                    </td>

                                    <td class="border border-gray-300 p-3 font-bold text-sm">
                                        {{ Str::limit($herobanner->title, 50) ?? '-' }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-sm text-gray-600">
                                        {{ Str::limit($herobanner->subtitle, 50) ?? '-' }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-sm text-gray-600">
                                        {{ $herobanner->dim == true ? 'Ya' : 'Tidak' }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('herobanners.edit', $herobanner->id) }}"
                                               class="text-amber-600 hover:text-amber-800 font-bold text-xs border border-amber-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('herobanners.destroy', $herobanner->id) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('Yakin hapus banner ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-800 font-bold text-xs border border-red-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-gray-300 p-8 text-center text-gray-500 italic">
                                        Belum ada gambar banner.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $herobanners->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
