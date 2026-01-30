<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('teachers.update', $teacher->nip) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Foto</label>
                        <input type="file" name="photo" class="w-full border p-2 rounded">
                        <small class="text-gray-500">Catatan: Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Foto Saat Ini:</p>
                            <img src="{{ $teacher->photo_url }}" class="w-32 h-32 object-cover rounded border">
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">NIP</x-required-label>
                        <input type="text" name="nip" value="{{ old('name', $teacher->nip) }}" class="w-full border p-2 rounded" inputmode="numeric" pattern="[0-9]*" placeholder="Contoh: 1234567890" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Lengkap</x-required-label>
                        <input type="text" name="name" value="{{ old('name', $teacher->name) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Jabatan / Mata Pelajaran</x-required-label>
                        <input type="text" name="position" value="{{ old('position', $teacher->position) }}" class="w-full border p-2 rounded" required>
                        @error('position')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror  
                    </div>

                    <button type="submit" 
                        style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                        Update Data
                    </button>
                    <a href="{{ route('teachers.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>