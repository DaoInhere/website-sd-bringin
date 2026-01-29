<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal Baru') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center gap-4 ml-8 mr-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
        <p class="m-1">Pilih Jadwal yang diinginkan:</p>
        <a href="javascript:void(0)" data-section="mapel" onclick="showSection('mapel')" class="flex-1 text-center"
        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
        Jadwal Pelajaran
        </a>
        <a href="javascript:void(0)" data-section="kegiatan" onclick="showSection('kegiatan')" class="flex-1 text-center"
        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
        Jadwal Kegiatan
        </a>
        <a href="javascript:void(0)" data-section="ekstrakurikuler" onclick="showSection('ekstrakurikuler')" class="flex-1 text-center"
        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
        Jadwal Ekstrakurikuler
        </a>
    </div>

    <div class="py-8 opacity-0 -translate-y-10 transition-all duration-500 ease-out hidden" id="mapel">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1>Jadwal Pelajaran</h1>
                <div class="h-0.5 w-full bg-gray-200 mb-3 mt-3"></div>
                
                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Jam</label>
                        <input type="text" name="hour" class="w-full border p-2 rounded" value="00:00 - 00:00" placeholder="00:00 - 00:00" required>
                    <p class="text-sm text-gray-500 mt-1">Format: 00:00 - 00:00</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Hari</label>
                        <select name="day" class="w-full border p-2 rounded bg-white" required>
                            <option value="" selected hidden>
                                -- Pilih hari --
                            </option>

                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Mata Pelajaran</label>
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
                                -- Pilih tipe --
                            </option>

                            <option value="Mapel">Mapel</option>
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
                    </div>

                    <button type="submit" 
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        Simpan Data
                    </button>
                    <a href="{{ route('schedules.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>

    <div class="py-8 opacity-0 -translate-y-10 transition-all duration-500 ease-out hidden" id="kegiatan">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="justify-center">Jadwal Kegiatan</h1>
                <div class="h-0.5 w-full bg-gray-200 mb-3 mt-3"></div>

                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="Kegiatan">
                    <input type="hidden" name="curriculum" value="Semua">

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Jam</label>
                        <input type="text" name="hour" class="w-full border p-2 rounded" value="00:00 - 00:00" placeholder="00:00 - 00:00" required>
                    <p class="text-sm text-gray-500 mt-1">Format: 00:00 - 00:00</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Hari</label>
                        <select name="day" class="w-full border p-2 rounded bg-white" required>
                            <option value="" selected hidden>
                                -- Pilih hari --
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
                        <label class="block text-gray-700 font-bold mb-2">Kegiatan</label>
                        <input type="text" name="subject" class="w-full border p-2 rounded" placeholder="Contoh: Upacara / Istirahat" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Kelas</label>
                        <input type="text" name="class" class="w-full border p-2 rounded" placeholder="Contoh: 1 / 2 / 3" required>
                        <p class="text-sm text-gray-500 mt-1">Catatan: 0 = Semua Kelas</p> 
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Seragam</label>
                        <input type="text" name="uniform" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka" required>
                        <p class="text-sm text-gray-500 mt-1">Catatan: Jika tidak ada seragam, isi dengan tanda -</p> 
                    </div>

                    <button type="submit" 
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        Simpan Data
                    </button>
                    <a href="{{ route('schedules.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>

    <div class="py-8 opacity-0 -translate-y-10 transition-all duration-500 ease-out hidden" id="ekstrakurikuler">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="justify-center">Jadwal Ekstrakurikuler</h1>
                <div class="h-0.5 w-full bg-gray-200 mb-3 mt-3"></div>

                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="type" value="Ekstrakurikuler">
                    <input type="hidden" name="curriculum" value="Semua">
                    <input type="hidden" name="class" value="0">

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Jam</label>
                        <input type="text" name="hour" class="w-full border p-2 rounded" value="00:00 - 00:00" placeholder="00:00 - 00:00" required>
                        <p class="text-sm text-gray-500 mt-1">Format: 00:00 - 00:00</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Hari</label>
                        <select name="day" class="w-full border p-2 rounded bg-white" required>
                            <option value="" selected hidden>
                                -- Pilih hari --
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
                        <label class="block text-gray-700 font-bold mb-2">Kegiatan Ekstrakurikuler</label>
                        <input type="text" name="subject" class="w-full border p-2 rounded" placeholder="Contoh: Matematika / IPA / IPS" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Foto</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500">Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="10" class="w-full border p-2 rounded" placeholder="Deskripsi ekstrakurikuler">{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Seragam</label>
                        <input type="text" name="uniform" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka" required>
                    </div>

                    <button type="submit" 
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        Simpan Data
                    </button>
                    <a href="{{ route('schedules.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>

<script>
    let activeSection = null;
    const DURATION = 500;

    // simpan warna default & warna aktif
    const DEFAULT_COLOR = '#16a34a';
    const ACTIVE_COLOR = '#207941';

    function showSection(id) {
        const target = document.getElementById(id);

        // ambil semua tombol
        const buttons = document.querySelectorAll('a[onclick^="showSection"]');
        const activeBtn = Array.from(buttons).find(b => b.getAttribute('onclick').includes(id));

        // klik section yang sama → tutup
        if (activeSection === id) {
            closeSection(target);
            activeSection = null;

            // reset warna tombol
            buttons.forEach(btn => btn.style.backgroundColor = DEFAULT_COLOR);
            return;
        }

        // jika ada section aktif → tutup dulu
        if (activeSection) {
            const current = document.getElementById(activeSection);

            closeSection(current, () => {
                openSection(target);
                activeSection = id;

                // reset semua tombol ke warna default
                buttons.forEach(btn => btn.style.backgroundColor = DEFAULT_COLOR);

                // set tombol aktif
                if (activeBtn) activeBtn.style.backgroundColor = ACTIVE_COLOR;
            });
        } else {
            openSection(target);
            activeSection = id;

            // reset semua tombol ke warna default
            buttons.forEach(btn => btn.style.backgroundColor = DEFAULT_COLOR);

            // set tombol aktif
            if (activeBtn) activeBtn.style.backgroundColor = ACTIVE_COLOR;
        }
    }

    function closeSection(el, callback = null) {
        el.classList.add('opacity-0', '-translate-y-10');
        el.classList.remove('opacity-100', 'translate-y-0');

        setTimeout(() => {
            el.classList.add('hidden');
            if (callback) callback();
        }, DURATION);
    }

    function openSection(el) {
        // 1️⃣ Pastikan state awal (SEBELUM tampil)
        el.classList.remove('hidden');
        el.classList.add('opacity-0', '-translate-y-10');
        el.classList.remove('opacity-100', 'translate-y-0');

        // 2️⃣ FORCE REFLOW (INI KUNCI)
        el.offsetHeight;

        // 3️⃣ Mulai animasi
        el.classList.remove('opacity-0', '-translate-y-10');
        el.classList.add('opacity-100', 'translate-y-0');

        el.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
</script>

</x-app-layout>