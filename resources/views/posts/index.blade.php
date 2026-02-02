<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Berita') }}
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
                    <a href="{{ route('posts.create') }}"
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Berita / Pengumuman Baru
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
                                placeholder="Cari berita..."
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
                    {{ $posts->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 text-sm">
                                <th class="border border-gray-300 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('author') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Penulis <span class="text-xs {{ $iconClass('author') }}">{{ $icon('author') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-left">
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
                                    <a href="{{ $toggleSortUrl('category') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Kategori <span class="text-xs {{ $iconClass('category') }}">{{ $icon('category') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('content') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Isi <span class="text-xs {{ $iconClass('content') }}">{{ $icon('content') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($posts as $post)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="border border-gray-300 p-3 font-medium text-sm">
                                        {{ Str::limit($post->user->name, 20) }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        <img src="{{ $post->image_url }}"
                                             alt="img"
                                             class="w-20 h-12 object-cover rounded shadow-sm">
                                    </td>

                                    <td class="border border-gray-300 p-3 text-sm font-semibold">
                                        {{ Str::limit($post->title, 40) }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        @if ($post->category == 'Pengumuman')
                                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">
                                                {{ $post->category }}
                                            </span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">
                                                {{ $post->category }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="border border-gray-300 p-3 text-sm text-gray-600">
                                        {{ Str::limit(strip_tags($post->content), 50) }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                               class="text-amber-600 hover:text-amber-800 font-bold text-xs border border-amber-600 px-3 py-1 rounded uppercase tracking-wider">
                                                Edit
                                            </a>

                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('Yakin hapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-800 font-bold text-xs border border-red-600 px-3 py-1 rounded uppercase tracking-wider">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border border-gray-300 p-8 text-center text-gray-500 italic">
                                        Belum ada berita yang diterbitkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $posts->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
