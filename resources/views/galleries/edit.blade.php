<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Foto Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Foto</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500 mb-2">Catatan: Biarkan kosong jika tidak ingin mengganti foto. Jika ingin diganti, foto baru wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                        
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Foto Saat Ini:</p>
                            <img src="{{ $gallery->image_url }}" class="w-32 h-32 object-cover rounded border">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Judul / Caption</label>
                        <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="10" class="w-full border p-2 rounded @error('description') border-red-500 @enderror" required>{{ old('description', $gallery->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tanggal Kegiatan</x-required-label>
                        <input type="date" name="activityDate" class="w-full border p-2 rounded" value={{ $gallery->activityDate }} required>
                        <small class="text-gray-500">Format: Hari / Bulan / Tahun</small>
                    </div>

                    <button type="submit" 
                        style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                        Update Foto
                    </button>
                    <a href="{{ route('galleries.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>