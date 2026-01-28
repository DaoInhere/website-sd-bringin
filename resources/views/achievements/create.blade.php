<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Tambah Prestasi Baru</h2>
                        <a href="{{ route('achievements.index') }}" class="text-gray-500 hover:text-gray-700">
                            &larr; Kembali
                        </a>
                    </div>

                    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lomba / Prestasi</label>
                            <input type="text" name="title" class="w-full border rounded p-2" placeholder="Contoh: Lomba Cerdas Cermat PAI" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Juara Ke-</label>
                                <input type="text" name="rank" class="w-full border rounded p-2" placeholder="Contoh: Juara 1" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tingkat</label>
                                <select name="level" class="w-full border rounded p-2" required>
                                    <option value="Kecamatan">Kecamatan</option>
                                    <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                    <option value="Provinsi">Provinsi</option>
                                    <option value="Nasional">Nasional</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pelaksanaan</label>
                            <input type="date" name="date" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional)</label>
                            <textarea name="description" rows="3" class="w-full border rounded p-2" placeholder="Ceritakan sedikit tentang prestasi ini..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto Dokumentasi</label>
                            <input type="file" name="image" class="w-full border rounded p-2">
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maks: 2MB</p>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>