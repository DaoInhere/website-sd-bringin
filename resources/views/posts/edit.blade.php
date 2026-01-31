<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Penulis</x-required-label>
                        <input type="text" name="username" value="{{ old('username', $post->user->name) }}" class="w-full border p-2 rounded bg-gray-100" disabled>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Gambar</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500">Catatan: Biarkan kosong jika tidak ingin mengganti gambar. Jika ingin diganti, gambar baru wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                        
                        <div class="mb-3 mt-3 p-2 border rounded w-fit bg-gray-50">
                            <p class="text-xs text-gray-500 mb-1">Gambar Saat Ini:</p>
                            <img src="{{ $post->image_url }}" class="h-40 w-auto rounded shadow-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Judul Berita</x-required-label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kategori</x-required-label>
                        <select name="category" class="w-full border p-2 rounded bg-white" required>
                            <option value="Pengumuman" {{ $post->category === 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="Berita" {{ $post->category === 'Berita' ? 'selected' : '' }}>Berita</option>
                        </select>

                        @error('category')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Isi Berita</x-required-label>
                        <textarea name="content" rows="10" class="w-full border p-2 rounded" required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="submit"  style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                            Perbarui Berita
                        </button>
                        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>