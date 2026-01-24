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
                        <label class="block text-gray-700 font-bold mb-2">Ganti Foto (Opsional)</label>
                        <input type="file" name="photo" class="w-full border p-2 rounded">
                        
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Foto Saat Ini:</p>
                            @if($teacher->photo)
                                <img src="{{ $teacher->photo_url }}" class="w-32 h-32 object-cover rounded border">
                            @else
                                <span class="text-red-500 text-sm">Belum ada foto</span>
                                <img src="{{ $teacher->photo_url }}" class="w-32 h-32 object-cover rounded border">
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $teacher->name) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Jabatan / Mata Pelajaran</label>
                        <input type="text" name="position" value="{{ old('position', $teacher->position) }}" class="w-full border p-2 rounded" required>
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