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

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Acara / Event</x-required-label>
                        <input type="text" name="title" class="w-full border p-2 rounded" placeholder="Contoh: HUT RI ke-79" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Nama Lomba</x-required-label>
                        <input type="text" name="name" class="w-full border p-2 rounded" placeholder="Contoh: Lomba Makan Kerupuk" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kategori</x-required-label>
                        <select name="category" class="w-full border p-2 rounded bg-white" required>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Seni">Seni</option>
                            <option value="Kreativitas">Kreativitas</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Keagamaan">Keagamaan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tingkat</x-required-label>
                        <select name="level" class="w-full border p-2 rounded bg-white" required>
                            <option value="Kecamatan">Kecamatan</option>
                            <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Posisi Juara</x-required-label>
                        <input type="text" name="position" class="w-full border p-2 rounded" placeholder="Contoh: Juara 1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Penghargaan</label>
                        <input type="text" name="award" class="w-full border p-2 rounded" placeholder="Contoh: Sertifikat, Piala">
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tanggal</x-required-label>
                        <input type="date" name="date" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="5" class="w-full border p-2 rounded" placeholder="Deskripsi singkat tentang prestasi ini"></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Foto Dokumentasi</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500">Catatan: Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
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