<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Guru') }}
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
                    <a href="{{ route('teachers.create') }}"
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Data Baru
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
                                placeholder="Cari guru..."
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

                @error('position')
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded border border-red-200">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-4">
                    {{ $teachers->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 text-gray-700 text-sm">
                            <tr>
                                <th class="border border-gray-300 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('nip') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        NIP <span class="text-xs {{ $iconClass('nip') }}">{{ $icon('nip') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-center">
                                    <a href="{{ $toggleSortUrl('photo') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Foto <span class="text-xs {{ $iconClass('photo') }}">{{ $icon('photo') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('name') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Nama Lengkap <span class="text-xs {{ $iconClass('name') }}">{{ $icon('name') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-left">
                                    <a href="{{ $toggleSortUrl('position') }}"
                                       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition font-semibold">
                                        Jabatan / Mapel <span class="text-xs {{ $iconClass('position') }}">{{ $icon('position') }}</span>
                                    </a>
                                </th>

                                <th class="border border-gray-300 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($teachers as $teacher)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="border border-gray-300 p-3 text-center text-sm text-gray-600">
                                        {{ $teacher->nip }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-center">
                                        <img src="{{ $teacher->photo_url }}"
                                             class="w-14 h-14 object-cover mx-auto rounded-full border shadow-sm">
                                    </td>

                                    <td class="border border-gray-300 p-3 font-bold text-sm text-gray-800">
                                        {{ Str::limit($teacher->name, 100) }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-sm text-gray-600">
                                        {{ Str::limit($teacher->position, 50) }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('teachers.edit', $teacher->nip) }}"
                                               class="text-amber-600 hover:text-amber-800 font-bold text-xs border border-amber-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('teachers.destroy', $teacher->nip) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('Yakin hapus data guru ini?')">
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
                                        Belum ada data guru yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $teachers->appends(request()->only(['q','sort','dir']))->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>