<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- TOP BAR --}}
                <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <a href="{{ route('posts.create') }}"
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Berita / Pengumuman Baru
                    </a>

                    <form method="GET" action="{{ url()->current() }}" class="w-full sm:w-auto">
                        <div class="relative">
                            <input type="text" name="find" value="{{ request('find') }}"
                                   placeholder="Cari berita..."
                                   class="w-full sm:w-72 pl-5 pr-5 py-2.5 rounded-xl border" />
                        </div>
                    @if(request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif

                    @if(request('dir'))
                        <input type="hidden" name="dir" value="{{ request('dir') }}">
                    @endif
                    
                    </form>
                </div>

                <div class="mb-4">
                    {{ $posts->withQueryString()->links() }}
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 text-sm">

                                <x-sort-table col="author" label="Penulis" class="border border-gray-300 p-3 text-left" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="image" label="Gambar" class="border border-gray-300 p-3 text-left" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="title" label="Judul" class="border border-gray-300 p-3 text-left" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="category" label="Kategori" class="border border-gray-300 p-3 text-left" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="content" label="Isi" class="border border-gray-300 p-3 text-left" :sort="$sort" :dir="$dir" />
                                <th class="border border-gray-300 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($posts as $post)
                                <tr class="hover:bg-gray-50">
                                    <td class="border p-3">{{ $post->user->name }}</td>
                                    <td class="border p-3">
                                        <img src="{{ $post->image_url }}"
                                            class="w-20 h-12 object-cover rounded">
                                    </td>
                                    <td class="border p-3">{{ $post->title }}</td>
                                    <td class="border p-3">{{ $post->category }}</td>
                                    <td class="border p-3">{{ Str::limit($post->content), 50 }}</td>
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
                                    <td colspan="6"
                                        class="border p-8 text-center text-gray-500 italic">
                                        Belum ada berita.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

                <div class="mt-4">
                    {{ $posts->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>