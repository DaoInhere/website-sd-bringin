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

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Foto Guru</label>
                        <input type="file" name="photo" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full border p-2 rounded" placeholder="Contoh: Budi Santoso, S.Pd" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Jabatan / Mata Pelajaran</label>
                        <input type="text" name="position" class="w-full border p-2 rounded" placeholder="Contoh: Guru Matematika / Kepala Sekolah" required>
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