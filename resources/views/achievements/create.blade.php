<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Tambah Prestasi Baru</h2>

                    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Acara / Event</label>
                                <input type="text" name="title" class="w-full border rounded p-2" placeholder="Contoh: HUT RI ke-79" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lomba</label>
                                <input type="text" name="name" class="w-full border rounded p-2" placeholder="Contoh: Lomba Makan Kerupuk" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                                <select name="category" class="w-full border rounded p-2" required>
                                    <option value="Olahraga">Olahraga</option>
                                    <option value="Seni">Seni</option>
                                    <option value="Kreativitas">Kreativitas</option>
                                    <option value="Akademik">Akademik</option>
                                    <option value="Keagamaan">Keagamaan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tingkat</label>
                                <input type="text" name="level" class="w-full border rounded p-2" placeholder="Contoh: Tingkat Daerah" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Juara Ke-</label>
                                <input type="text" name="position" class="w-full border rounded p-2" placeholder="Contoh: Juara 1" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Penghargaan (Opsional)</label>
                                <input type="text" name="award" class="w-full border rounded p-2" placeholder="Contoh: Sertifikat, Piala">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal</label>
                                <input type="date" name="date" class="w-full border rounded p-2" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional)</label>
                            <textarea name="description" rows="3" class="w-full border rounded p-2"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto Dokumentasi</label>
                            <input type="file" name="image" class="w-full border rounded p-2">
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>