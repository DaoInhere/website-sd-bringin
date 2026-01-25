<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Jam</label>
                        <input type="text" name="hour" class="w-full border p-2 rounded" placeholder="00:00 - 00:00" required>
                    <p class="text-sm text-gray-500 mt-1">Format: 00:00 - 00:00</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Hari</label>
                        <select name="day" class="w-full border p-2 rounded bg-white" required>
                            <option value="" selected hidden>
                                -- pilih hari --
                            </option>

                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Kegiatan / Mata Pelajaran</label>
                        <input type="text" name="subject" class="w-full border p-2 rounded" placeholder="Contoh: Matematika / IPA / IPS" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Kelas</label>
                        <input type="text" name="class" class="w-full border p-2 rounded" placeholder="Contoh: 1 / 2 / 3" required>
                        <p class="text-sm text-gray-500 mt-1">Catatan: 0 = Semua Kelas</p> 
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tipe</label>
                        <select name="type" class="w-full border p-2 rounded bg-white" required>
                            <option value="" selected hidden>
                                -- pilih tipe --
                            </option>

                            <option value="Mapel">Mapel</option>
                            <option value="Kegiatan">Kegiatan</option>
                            <option value="Ekstrakurikuler">Ekstrakurikuler</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Seragam</label>
                        <input type="text" name="uniform" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Kurikulum</label>
                        <input type="text" name="curriculum" class="w-full border p-2 rounded" placeholder="Contoh: 2025/2026" required>
                        <p class="text-sm text-gray-500 mt-1">Format: 0000/0000</p> 
                        <p class="text-sm text-gray-500 mt-1">Catatan: Jika tipenya kegiatan atau ekstrakurikuler, isi kolom kurikulum diatas sebagai "Semua"</p> 
                    </div>

                    <button type="submit" 
                        style="background-color: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                        Simpan Data
                    </button>
                    <a href="{{ route('schedules.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>