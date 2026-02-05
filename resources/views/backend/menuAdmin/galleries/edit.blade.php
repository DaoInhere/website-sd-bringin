<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Album Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- 1. INFO SAAT INI --}}
                    <div class="mb-6 bg-blue-50 p-4 rounded border border-blue-200">
                        <p class="text-sm text-blue-800 font-bold mb-2">Foto Saat Ini ({{ count($gallery->photos ?? []) }} Foto):</p>
                        <div class="flex gap-2 overflow-x-auto pb-2">
                            @if(is_array($gallery->photos))
                                @foreach($gallery->photos as $photo)
                                    <img src="{{ asset('storage/' . $photo) }}" class="h-16 w-16 object-cover rounded border border-blue-300">
                                @endforeach
                            @endif
                        </div>
                        <p class="text-xs text-red-600 mt-2">*Catatan: Jika Anda mengupload foto baru, maka semua foto lama di atas akan terhapus dan digantikan oleh yang baru diupload.</p>
                    </div>

                    {{-- 2. UPLOAD FOTO BARU (Opsional) --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Ganti Foto (Opsional)</label>
                        <input type="file" name="photos[]" multiple 
                               class="w-full border p-2 rounded @error('photos') border-red-500 @enderror">
                        <small class="text-gray-500 block mt-1">Biarkan kosong jika tidak ingin mengubah foto.</small>
                        @error('photos') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- 3. JUDUL --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Judul Album</label>
                        <input type="text" name="title" value="{{ old('title', $gallery->title) }}" 
                               class="w-full border p-2 rounded">
                    </div>

                    {{-- 4. DESKRIPSI --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="3" 
                                  class="w-full border p-2 rounded">{{ old('description', $gallery->description) }}</textarea>
                    </div>

                    {{-- 5. TANGGAL --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tanggal Kegiatan</label>
                        <input type="date" name="activityDate" 
                               value="{{ old('activityDate', $gallery->activityDate ? $gallery->activityDate->format('Y-m-d') : '') }}"
                               class="w-full border p-2 rounded" required>
                    </div>

                    <button type="submit" 
                        style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;">
                        Update Album
                    </button>
                    <a href="{{ route('galleries.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>