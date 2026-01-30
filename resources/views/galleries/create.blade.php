<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Foto Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Pilih Foto</x-required-label>
                        <input type="file" name="image" class="w-full border p-2 rounded" required>
                        <small class="text-gray-500">Catatan: Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Judul / Caption</label>
                        <input type="text" name="title" class="w-full border p-2 rounded" placeholder="Contoh: Kegiatan Upacara Bendera">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="10" class="w-full border p-2 rounded @error('description') border-red-500 @enderror" placeholder="Deskripsi kegiatan" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tanggal Kegiatan</x-required-label>
                        <input type="date" name="activityDate" class="w-full border p-2 rounded" required>
                        <small class="text-gray-500">Format: Hari / Bulan / Tahun</small>
                    </div>

                    <button type="submit" 
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        Upload Foto
                    </button>
                    <a href="{{ route('galleries.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>