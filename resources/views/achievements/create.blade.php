<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Prestasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- NAMA ACARA --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Acara / Event</x-required-label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="w-full border p-2 rounded @error('title') border-red-500 bg-red-50 @enderror" 
                               placeholder="Contoh: HUT RI ke-79" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NAMA LOMBA --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Lomba</x-required-label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border p-2 rounded @error('name') border-red-500 bg-red-50 @enderror" 
                               placeholder="Contoh: Lomba Makan Kerupuk" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- KATEGORI --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kategori</x-required-label>
                        <select name="category" class="w-full border p-2 rounded bg-white @error('category') border-red-500 @enderror" required>
                            <option value="Olahraga" {{ old('category') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Seni" {{ old('category') == 'Seni' ? 'selected' : '' }}>Seni</option>
                            <option value="Kreativitas" {{ old('category') == 'Kreativitas' ? 'selected' : '' }}>Kreativitas</option>
                            <option value="Akademik" {{ old('category') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Keagamaan" {{ old('category') == 'Keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                            <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- TINGKAT --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tingkat</x-required-label>
                        <select name="level" class="w-full border p-2 rounded bg-white @error('level') border-red-500 @enderror" required>
                            <option value="Kecamatan" {{ old('level') == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                            <option value="Kabupaten/Kota" {{ old('level') == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                            <option value="Provinsi" {{ old('level') == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                            <option value="Nasional" {{ old('level') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ old('level') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                        @error('level')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- POSISI JUARA --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Posisi Juara</x-required-label>
                        <input type="text" name="position" value="{{ old('position') }}"
                               class="w-full border p-2 rounded @error('position') border-red-500 bg-red-50 @enderror" 
                               placeholder="Contoh: Juara 1" required>
                        @error('position')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PENGHARGAAN --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Penghargaan</label>
                        <input type="text" name="award" value="{{ old('award') }}"
                               class="w-full border p-2 rounded @error('award') border-red-500 bg-red-50 @enderror" 
                               placeholder="Contoh: Sertifikat, Piala">
                        @error('award')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- TANGGAL --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tanggal</x-required-label>
                        <input type="date" name="date" value="{{ old('date') }}"
                               class="w-full border p-2 rounded @error('date') border-red-500 bg-red-50 @enderror" required>
                        @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="5" 
                                  class="w-full border p-2 rounded @error('description') border-red-500 bg-red-50 @enderror" 
                                  placeholder="Deskripsi singkat tentang prestasi ini">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- FOTO --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Foto Dokumentasi</label>
                        <input type="file" name="image" 
                               class="w-full border p-2 rounded @error('image') border-red-500 bg-red-50 @enderror">
                        <small class="text-gray-500">Catatan: Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <button type="submit" 
                            style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                            Simpan Data
                        </button>
                        <a href="{{ route('achievements.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>