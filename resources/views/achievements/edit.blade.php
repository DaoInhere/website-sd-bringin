<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Prestasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6 border-b pb-4">
                    <h3 class="text-lg font-medium text-gray-900">Formulir Perubahan Data</h3>
                    <a href="{{ route('achievements.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                        &larr; Kembali ke Daftar
                    </a>
                </div>

                <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lomba / Prestasi</label>
                        <input type="text" name="title" value="{{ old('title', $achievement->title) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Juara Ke-</label>
                        <input type="text" name="rank" value="{{ old('rank', $achievement->rank) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tingkat</label>
                        <select name="level" class="w-full border p-2 rounded" required>
                            <option value="Kecamatan" {{ $achievement->level == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                            <option value="Kabupaten/Kota" {{ $achievement->level == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                            <option value="Provinsi" {{ $achievement->level == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                            <option value="Nasional" {{ $achievement->level == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tanggal Pelaksanaan</label>
                        <input type="date" name="date" value="{{ old('date', $achievement->date) }}" class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi (Opsional)</label>
                        <textarea name="description" rows="5" class="w-full border p-2 rounded">{{ old('description', $achievement->description) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Foto Dokumentasi</label>
                        
                        @if($achievement->image)
                            <div class="mb-3 p-2 border rounded w-fit bg-gray-50">
                                <p class="text-xs text-gray-500 mb-1">Foto Saat Ini:</p>
                                <img src="{{ asset('storage/' . $achievement->image) }}" class="h-40 w-auto rounded shadow-sm">
                            </div>
                        @endif
                        
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500 italic block mt-1">Biarkan kosong jika tidak ingin mengubah foto.</small>
                    </div>

                    <div class="flex items-center pt-4 border-t">
                        <button type="submit" 
                            style="background-color: #16a34a; color: white; padding: 10px 25px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                            Update Data
                        </button>
                        <a href="{{ route('achievements.index') }}" class="text-gray-600 ml-4 hover:underline">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>