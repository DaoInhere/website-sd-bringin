<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="mb-5 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                        <strong>Ups! Ada yang salah:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="mb-4">
                    <x-required-label class="block text-gray-700 font-bold mb-2">Penulis</x-required-label>
                    <input type="text" name="username" value="{{ auth()->user()->name }}" class="w-full border p-2 rounded bg-gray-100" disabled>
                    
                    @error('username')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Upload Gambar</x-required-label>
                        <input type="file" name="image" class="w-full border p-2 rounded @error('image') border-red-500 @enderror">
                        <small class="text-gray-500">Catatan: Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                        
                        @error('image')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Judul</x-required-label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full border p-2 rounded @error('title') border-red-500 @enderror" placeholder="Masukkan judul berita...">
                        <small class="text-gray-500">Catatan: Minimal 5 karakter</small>

                        @error('title')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kategori</x-required-label>
                        <select name="category" class="w-full border p-2 rounded bg-white" required>
                            <option value="" selected hidden>
                                -- Pilih kategori --
                            </option>

                            <option value="Pengumuman">Pengumuman</option>
                            <option value="Berita">Berita</option>
                        </select>

                        @error('category')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                        
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Isi</x-required-label>
                        <textarea name="content" rows="10" class="w-full border p-2 rounded @error('content') border-red-500 @enderror" placeholder="Tulis isi berita..." required>{{ old('content') }}</textarea>
                        <small class="text-gray-500">Catatan: Minimal 10 karakter</small>
                        
                        @error('content')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="submit" s style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                            Simpan Berita
                        </button>
                        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>