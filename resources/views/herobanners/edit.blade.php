<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Banner
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('herobanners.update', $herobanner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Foto</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500 mb-2">Catatan: Biarkan kosong jika tidak ingin mengganti gambar. Jika ingin diganti, gambar baru wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                        
                        <div class="mb-3 mt-3 p-2 border rounded w-fit bg-gray-50">
                            <p class="text-xs text-gray-500 mb-1">Gambar Saat Ini:</p>
                            <img src="{{ $herobanner->image_url }}" class="h-40 w-auto rounded shadow-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Judul Banner (Teks Utama)</label>
                        <input type="text" name="title" value="{{ old('title', $herobanner->title) }}" class="w-full border p-2 rounded" placeholder="Contoh: Selamat datang di SDN Bringin 01!">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Sub Judul Banner (Teks Pendukung)</label>
                        <textarea name="subtitle" rows="10" class="w-full border p-2 rounded @error('subtitle') border-red-500 @enderror" placeholder="Contoh: Bergabung bersama kami!">{{ old('subtitle', $herobanner->subtitle) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Redupkan Banner</x-required-label>
                        <div class="flex items-center gap-6">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="dim" value="1"
                                    {{ old('dim', $herobanner->dim ?? '') == 1 ? 'checked' : '' }}
                                    class="form-radio text-sekolah-hijau">
                                <span>Ya</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="dim" value="0"
                                    {{ old('dim', $herobanner->dim ?? '') == 0 ? 'checked' : '' }}
                                    class="form-radio text-sekolah-hijau">
                                <span>Tidak</span>
                            </label>
                        </div>
                        @error('dim')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" 
                        style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                        Perbarui Banner
                    </button>
                    <a href="{{ route('herobanners.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>