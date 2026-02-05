<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Foto Galeri (Banyak Sekaligus)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- 1. INPUT FOTO (MULTI) --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Pilih Foto (Bisa Banyak)</x-required-label>
                        
                        {{-- PENTING: name="photos[]" dan multiple --}}
                        <input type="file" name="photos[]" multiple 
                               class="w-full border p-2 rounded @error('photos') border-red-500 @enderror @error('photos.*') border-red-500 @enderror" 
                               required>
                        
                        <small class="text-gray-500">Catatan: Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                        
                        @error('photos') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        @error('photos.*') <p class="text-red-500 text-sm mt-1">File harus gambar max 2MB.</p> @enderror
                    </div>

                    {{-- 2. JUDUL --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Judul / Caption</label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                               class="w-full border p-2 rounded @error('title') border-red-500 @enderror" 
                               placeholder="Contoh: Kegiatan Upacara">
                    </div>

                    {{-- 3. DESKRIPSI --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="3" 
                                  class="w-full border p-2 rounded @error('description') border-red-500 @enderror" 
                                  placeholder="Deskripsi kegiatan...">{{ old('description') }}</textarea>
                    </div>

                    {{-- 4. TANGGAL KEGIATAN --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tanggal Kegiatan</x-required-label>
                        <input type="date" name="activityDate" value="{{ old('activityDate') }}"
                               class="w-full border p-2 rounded @error('activityDate') border-red-500 @enderror" required>
                        @error('activityDate') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" 
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        Simpan Semua Foto
                    </button>
                    <a href="{{ route('galleries.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>