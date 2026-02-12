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
                <div class="h-0.5 w-full bg-gray-200 mb-3 mt-1"></div>
                
                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" id="subject_hidden" name="subject">

                <div class="flex gap-3 items-end w-full">
                    <div>
                        <x-required-label class="block text-gray-700 font-bold mb-2">Jam Mulai</x-required-label>
                        <input type="time" name="hourStart" class="w-20 border p-2 rounded" required>
                    </div>
                    <div>
                        <p class="mb-2 mr-2">-</p>
                    </div>
                    <div>
                        <x-required-label class="block text-gray-700 font-bold mb-2">Jam Akhir</x-required-label>
                        <input type="time" name="hourEnd" class="w-20 border p-2 rounded" required> 
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-2 mb-4">Format: Jam . Menit</p>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Hari</x-required-label>
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
                        <x-required-label class="block text-gray-700 font-bold mb-2">Mata Pelajaran</x-required-label>
                        {{-- Dropdown --}}
                        <select id="subject_select" class="w-full border p-2 rounded bg-white" onchange="toggleSubjectInput(this)">
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Pendidikan Agama">Pendidikan Agama</option>
                            <option value="IPA">Ilmu Pengetahuan Alam (IPA)</option>
                            <option value="IPS">Ilmu Pengetahuan Sosial (IPS)</option>
                            <option value="PPKN">Pendidikan Pancasila dan Kewarganegaraan (PPKn)</option>
                            <option value="PJOK">Pendidikan Jasmani, Olahraga dan Kesehatan (PJOK)</option>
                            <option value="SBDP">Seni Budaya dan Prakarya (SBDP)</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="custom">Kustom</option>
                        </select>
                        {{-- Input custom --}}
                        <input type="text" id="subject_input" name="subject" class="w-full border p-2 rounded mt-2 hidden" placeholder="Masukkan mata pelajaran">
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kelas</x-required-label>
                        <input type="text" name="class" class="w-full border p-2 rounded" placeholder="Contoh: 1 / 2 / 3" required>
                        <p class="text-sm text-gray-500 mt-1">Catatan: 0 = Semua Kelas</p> 
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tipe</x-required-label>
                        <select name="type" class="w-full border p-2 rounded bg-white" required>
                            <option value="" selected hidden>
                                -- Pilih tipe --
                            </option>

                            <option value="Mapel">Mata Pelajaran (Mapel)</option>
                            <option value="UTS">Ujian Tengah Semester (UTS)</option>
                            <option value="UAS">Ujian Akhir Semester (UAS)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Seragam</label>
                        <input type="text" name="uniform" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka">
                        <p class="text-sm text-gray-500 mt-1">Catatan: Jika tidak ada seragam, biarkan kolom ini kosong.</p> 
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kurikulum</x-required-label>
                        <input type="number" name="curriculum" class="w-full border p-2 rounded" placeholder="Contoh: 2013" required>
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
                <div class="h-0.5 w-full bg-gray-200 mb-3 mt-1"></div>

                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="Kegiatan">
                    <input type="hidden" name="curriculum" value="0">

                    <div class="flex gap-3 items-end w-full">
                        <div>
                            <x-required-label class="block text-gray-700 font-bold mb-2">Jam Mulai</x-required-label>
                            <input type="time" name="hourStart" class="w-20 border p-2 rounded" required>
                        </div>
                        <div>
                            <p class="mb-2 mr-2">-</p>
                        </div>
                        <div>
                            <x-required-label class="block text-gray-700 font-bold mb-2">Jam Akhir</x-required-label>
                            <input type="time" name="hourEnd" class="w-20 border p-2 rounded" required> 
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2 mb-4">Format: Jam . Menit</p> 

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Hari</x-required-label>
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
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kegiatan</x-required-label>
                        <input type="text" name="subject" class="w-full border p-2 rounded" placeholder="Contoh: Upacara / Istirahat" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kelas</x-required-label>
                        <input type="text" name="class" class="w-full border p-2 rounded" placeholder="Contoh: 1 / 2 / 3" required>
                        <p class="text-sm text-gray-500 mt-1">Catatan: 0 = Semua Kelas</p> 
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Seragam</label>
                        <input type="text" name="uniform" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka">
                        <p class="text-sm text-gray-500 mt-1">Catatan: Jika tidak ada seragam, biarkan kolom ini kosong.</p> 
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
                <div class="h-0.5 w-full bg-gray-200 mb-3 mt-1"></div>

                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="type" value="Ekstrakurikuler">
                    <input type="hidden" name="curriculum" value="0">
                    <input type="hidden" name="class" value="0">

                    <div class="flex gap-3 items-end w-full">
                        <div>
                            <x-required-label class="block text-gray-700 font-bold mb-2">Jam Mulai</x-required-label>
                            <input type="time" name="hourStart" class="w-20 border p-2 rounded" required>
                        </div>
                        <div>
                            <p class="mb-2 mr-2">-</p>
                        </div>
                        <div>
                            <x-required-label class="block text-gray-700 font-bold mb-2">Jam Akhir</x-required-label>
                            <input type="time" name="hourEnd" class="w-20 border p-2 rounded" required> 
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2 mb-4">Format: Jam . Menit</p>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Hari</x-required-label>
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
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kegiatan Ekstrakurikuler</x-required-label>
                        <input type="text" name="subject" class="w-full border p-2 rounded" placeholder="Contoh: Sepak Bola" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Foto</x-required-label>
                        <input type="file" name="image" class="w-full border p-2 rounded" required>
                        <small class="text-gray-500">Catatan: Wajib JPG/JPEG/PNG. Maksimal 2MB.</small>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Deskripsi</x-required-label>
                        <textarea name="description" rows="10" class="w-full border p-2 rounded" placeholder="Deskripsi ekstrakurikuler" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Seragam</label>
                        <input type="text" name="uniform" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka">
                        <p class="text-sm text-gray-500 mt-1">Catatan: Jika tidak ada seragam, biarkan kolom ini kosong.</p> 
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

    function toggleSubjectInput(select) {
        const textInput = document.getElementById('subject_input');
        const hiddenInput = document.getElementById('subject_hidden');

        if (select.value === 'custom') {
            textInput.classList.remove('hidden');
            textInput.disabled = false;
            textInput.required = true;

            hiddenInput.value = '';
        } else {
            textInput.classList.add('hidden');
            textInput.disabled = true;
            textInput.required = false;
            textInput.value = '';

            hiddenInput.value = select.value;
        }
    }
</script>

</x-app-layout>