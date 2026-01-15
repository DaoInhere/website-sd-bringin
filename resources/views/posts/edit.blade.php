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
                    @method('PUT') <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Ganti Gambar (Opsional)</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        
                        <div class="mt-2">
                            <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Img" class="w-32 h-20 object-cover rounded border">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Kategori</label>
                        <select name="category_id" class="w-full border p-2 rounded" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Isi Berita</label>
                        <textarea name="content" rows="10" class="w-full border p-2 rounded" required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="submit" style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px;">
                            Update Berita
                        </button>
                        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>