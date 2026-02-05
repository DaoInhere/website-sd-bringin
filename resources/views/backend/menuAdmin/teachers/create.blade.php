<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Guru Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- FOTO GURU --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Foto Guru</x-required-label>
                        <input type="file" name="photo" 
                               class="w-full border p-2 rounded @error('photo') border-red-500 bg-red-50 @enderror">
                        <small class="text-gray-500">Catatan: Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                        
                        {{-- INI KODE PESAN ERRORNYA --}}
                        @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NIP --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">NIP</x-required-label>
                        <input type="text" name="nip" value="{{ old('nip') }}"
                               class="w-full border p-2 rounded @error('nip') border-red-500 bg-red-50 @enderror" 
                               inputmode="numeric" pattern="[0-9]*" placeholder="Contoh: 1234567890">
                        
                        @error('nip')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NAMA --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Lengkap</x-required-label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border p-2 rounded @error('name') border-red-500 bg-red-50 @enderror" 
                               placeholder="Contoh: Budi Santoso, S.Pd">
                        
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- JABATAN --}}
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Jabatan / Mata Pelajaran</x-required-label>
                        <input type="text" name="position" value="{{ old('position') }}"
                               class="w-full border p-2 rounded @error('position') border-red-500 bg-red-50 @enderror" 
                               placeholder="Contoh: Guru Matematika / Kepala Sekolah">
                        
                        @error('position')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror                   
                    </div>

                    <button type="submit" 
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        Simpan Data
                    </button>
                    <a href="{{ route('teachers.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>