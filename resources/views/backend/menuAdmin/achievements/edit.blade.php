<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Prestasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Acara / Event</x-required-label>
                        <input type="text" name="title" value="{{ old('title', $achievement->title) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Lomba</x-required-label>
                        <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name', $achievement->name) }}" placeholder="Contoh: Lomba Makan Kerupuk" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kategori</x-required-label>
                        <select name="category" class="w-full border p-2 rounded bg-white" required>
                            <option value="Olahraga" {{ $achievement->category === 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Seni" {{ $achievement->category === 'Seni' ? 'selected' : '' }}>Seni</option>
                            <option value="Kreativitas" {{ $achievement->category === 'Kreativitas' ? 'selected' : '' }}>Kreativitas</option>
                            <option value="Akademik" {{ $achievement->category === 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Keagamaan" {{ $achievement->category === 'Keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                            <option value="Lainnya" {{ $achievement->category === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tingkat</x-required-label>
                        <select name="level" class="w-full border p-2 rounded bg-white" required>
                            <option value="Kecamatan" {{ $achievement->level == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                            <option value="Kabupaten/Kota" {{ $achievement->level == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                            <option value="Provinsi" {{ $achievement->level == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                            <option value="Nasional" {{ $achievement->level == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ $achievement->level == 'Internasional' ? 'selected' : '' }}>Internasional</option> 
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Posisi Juara</x-required-label>
                        <input type="text" name="position" value="{{ old('position', $achievement->position) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Penghargaan</x-required-label>
                        <input type="text" name="award" class="w-full border p-2 rounded" placeholder="Contoh: Sertifikat, Piala" value="{{ old('award', $achievement->award) }}">
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tanggal</x-required-label>
                        <input type="date" name="date" value="{{ old('date', $achievement->date) }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="5" class="w-full border p-2 rounded" placeholder="Deskripsi singkat tentang prestasi ini">{{ old('description', $achievement->description) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Foto Dokumentasi</label>
                        <div class="mb-3 p-2 border rounded w-fit bg-gray-50">
                            <p class="text-xs text-gray-500 mb-1">Foto Saat Ini:</p>
                            <img src="{{ $achievement->image_url }}" class="h-40 w-auto rounded shadow-sm">
                        </div>
                        
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500 italic block mt-1">Catatan: Biarkan kosong jika tidak ingin mengubah foto. Jika ingin diganti, foto baru wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                    </div>

                    <div class="flex items-center">
                        <button type="submit" 
                            style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                            Perbarui Data
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