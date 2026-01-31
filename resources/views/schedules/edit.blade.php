<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Jadwal') }}
        </h2>
    </x-slot>

@if(in_array($schedule->type, ['Mapel', 'UTS', 'UAS']))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Jam</x-required-label>
                        <input type="text" name="hour" value="{{ old('hour', $schedule->hour) }}" class="w-full border p-2 rounded" placeholder="00:00 - 00:00" required>
                    <p class="text-sm text-gray-500 mt-1">Format: 00:00 - 00:00</p>
                    </div>
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Hari</x-required-label>
                        @php
                            $selected = old('day', $schedule->day);
                        @endphp

                        <select name="day" class="w-full border p-2 rounded bg-white" required>
                            <option value="Senin" {{ $selected === 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ $selected === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ $selected === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ $selected === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ $selected === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Mata Pelajaran</x-required-label>
                        <input type="text" name="subject" value="{{ old('subject', $schedule->subject) }}" class="w-full border p-2 rounded" placeholder="Contoh: Matematika / IPA / IPS" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kelas</x-required-label>
                        <input type="text" name="class" value="{{ old('class', $schedule->class) }}" class="w-full border p-2 rounded" placeholder="Contoh: 1 / 2 / 3" required>
                        <p class="text-sm text-gray-500 mt-1">Catatan: 0 = Semua Kelas</p> 
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Tipe</x-required-label>
                        @php
                            $selected = old('type', $schedule->type);
                        @endphp

                        <select name="type" class="w-full border p-2 rounded bg-white" required>
                            <option value="Mapel" {{ $selected === 'Mapel' ? 'selected' : '' }}>Mata Pelajaran (Mapel)</option>
                            <option value="UTS" {{ $selected === 'UTS' ? 'selected' : '' }}>Ujian Tengah Semester (UTS)</option>
                            <option value="UAS" {{ $selected === 'UAS' ? 'selected' : '' }}>Ujian Akhir Semester (UAS)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Seragam</x-required-label>
                        <input type="text" name="uniform" value="{{ old('uniform', $schedule->uniform) }}" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kurikulum</x-required-label>
                        <input type="text" name="curriculum" value="{{ old('curriculum', $schedule->curriculum) }}" class="w-full border p-2 rounded" placeholder="Contoh: 2025/2026" required>
                        <p class="text-sm text-gray-500 mt-1">Format: 0000/0000</p> 
                    </div>

                    <button type="submit" 
                        style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                        Perbarui Data
                    </button>
                    <a href="{{ route('schedules.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
@elseif ($schedule->type == 'Kegiatan')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="Kegiatan">
                    <input type="hidden" name="curriculum" value="Semua">

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Jam</x-required-label>
                        <input type="text" name="hour" value="{{ old('hour', $schedule->hour) }}" class="w-full border p-2 rounded" placeholder="00:00 - 00:00" required>
                    <p class="text-sm text-gray-500 mt-1">Format: 00:00 - 00:00</p>
                    </div>
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Hari</x-required-label>

                        <select name="day" class="w-full border p-2 rounded bg-white" required>
                            <option value="Senin" {{ $schedule->day === 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ $schedule->day === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ $schedule->day === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ $schedule->day === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ $schedule->day === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ $schedule->day === 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ $schedule->day === 'Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kegiatan</x-required-label>
                        <input type="text" name="subject" value="{{ old('subject', $schedule->subject) }}" class="w-full border p-2 rounded" placeholder="Contoh: Matematika / IPA / IPS" required>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kelas</x-required-label>
                        <input type="text" name="class" value="{{ old('class', $schedule->class) }}" class="w-full border p-2 rounded" placeholder="Contoh: 1 / 2 / 3" required>
                        <p class="text-sm text-gray-500 mt-1">Catatan: 0 = Semua Kelas</p> 
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Seragam</x-required-label>
                        <input type="text" name="uniform" value="{{ old('uniform', $schedule->uniform) }}" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka" required>
                    </div>

                    <button type="submit" 
                        style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                        Perbarui Data
                    </button>
                    <a href="{{ route('schedules.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
@else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="type" value="Ekstrakurikuler">
                    <input type="hidden" name="curriculum" value="Semua">
                    <input type="hidden" name="class" value="0">

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Jam</x-required-label>
                        <input type="text" name="hour" value="{{ old('hour', $schedule->hour) }}" class="w-full border p-2 rounded" placeholder="00:00 - 00:00" required>
                    <p class="text-sm text-gray-500 mt-1">Format: 00:00 - 00:00</p>
                    </div>
                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Hari</x-required-label>
                        @php
                            $selected = old('day', $schedule->day);
                        @endphp

                        <select name="day" class="w-full border p-2 rounded bg-white" required>
                            <option value="Senin" {{ $selected === 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ $selected === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ $selected === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ $selected === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ $selected === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ $selected === 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ $selected === 'Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Kegiatan Ekstrakurikuler</x-required-label>
                        <input type="text" name="subject" value="{{ old('subject', $schedule->subject) }}" class="w-full border p-2 rounded" placeholder="Contoh: Matematika / IPA / IPS" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Foto</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">
                        <small class="text-gray-500">Catatan: Biarkan kosong jika tidak ingin mengganti gambar. Jika ingin diganti, gambar baru wajib JPG/JPEG/PNG. Maksimal 2MB.</small>

                        <div class="mb-3 mt-3 p-2 border rounded w-fit bg-gray-50">
                            <p class="text-xs text-gray-500 mb-1">Gambar Saat Ini:</p>
                            <img src="{{ $schedule->image_url }}" class="h-40 w-auto rounded shadow-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Deskripsi</x-required-label>
                        <textarea name="description" rows="10" class="w-full border p-2 rounded" placeholder="Deskripsi ekstrakurikuler" required>{{ old('description', $schedule->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-required-label class="block text-gray-700 font-bold mb-2">Seragam</x-required-label>
                        <input type="text" name="uniform" value="{{ old('uniform', $schedule->uniform) }}" class="w-full border p-2 rounded" placeholder="Contoh: Merah Putih / Batik / Pramuka" required>
                    </div>

                    <button type="submit" 
                        style="background-color: #d97706; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">
                        Perbarui Data
                    </button>
                    <a href="{{ route('schedules.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>

                </form>

            </div>
        </div>
    </div>
@endif
</x-app-layout>