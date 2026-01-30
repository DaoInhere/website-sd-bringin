<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <a href="{{ route('posts.create') }}" 
                    style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        + Tambah Berita Baru
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-2">
                    {{ $posts->links() }}
                </div>

                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th class="border border-gray-300 p-3 text-left">Penulis</th>
                            <th class="border border-gray-300 p-3 text-left">Gambar</th>
                            <th class="border border-gray-300 p-3 text-left">Judul</th>
                            <th class="border border-gray-300 p-3 text-left">Kategori</th>
                            <th class="border border-gray-300 p-3 text-left">Isi</th>
                            <th class="border border-gray-300 p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $index => $post)
                        <tr>
                            <td class="border border-gray-300 p-3 font-bold">{{ Str::limit($post->user->name, 20) }}</td>
                            <td class="border border-gray-300 p-3">
                                <img src="{{ $post->image_url }}" 
                                     alt="img" style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                            </td>
                            <td class="border border-gray-300 p-3">{{ Str::limit($post->title, 50) }}</td>
                            <td class="border border-gray-300 p-3">
                                @if ($post->category == 'Pengumuman')
                                <span style="background-color: #dbeafe; color: #1e40af; padding: 2px 8px; border-radius: 10px; font-size: 12px;">
                                    {{ $post->category }}
                                </span>
                                @else
                                <span style="background-color: #faf9c8; color: #99972f; padding: 2px 8px; border-radius: 10px; font-size: 12px;">
                                    {{ $post->category }}
                                </span>
                                @endif
                            </td>
                            <td class="border border-gray-300 p-3">{{ Str::limit($post->content, 50) }}</td>
                            <td class="border border-gray-300 p-3 text-center">
                                <a href="{{ route('posts.edit', $post->id) }}" style="color: #d97706; margin-right: 10px;">Edit</a>
                                
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: #dc2626; background: none; border: none; cursor: pointer;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="border border-gray-300 p-6 text-center text-gray-500">
                                Belum ada berita. Yuk buat satu!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>