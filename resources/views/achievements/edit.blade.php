<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Edit Data Prestasi</h2>
                        <a href="{{ route('achievements.index') }}" class="text-gray-500 hover:text-gray-700">
                            &larr; Kembali
                        </a>
                    </div>

                    <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lomba / Prestasi</label>
                            <input type="text" name="title" value="{{ old('title', $achievement->title) }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Juara Ke-</label>
                                <input type="text" name="rank" value="{{ old('rank', $achievement->rank) }}" class="w-full border rounded p-2" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tingkat</label>
                                <select name="level" class="w-full border rounded p-2" required>
                                    <option value="Kecamatan" {{ $achievement->level == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                                    <option value="Kabupaten/Kota" {{ $achievement->level == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                                    <option value="Provinsi" {{ $achievement->level == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                    <option value="Nasional" {{ $achievement->level == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pelaksanaan</label>
                            <input type="date" name="date" value="{{ old('date', $achievement->date) }}" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional)</label>
                            <textarea name="description" rows="3" class="w-full border rounded p-2">{{ old('description', $achievement->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto Dokumentasi (Upload jika ingin ganti)</label>
                            @if($achievement->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $achievement->image) }}" class="h-20 w-auto rounded border">
                                </div>
                            @endif
                            <input type="file" name="image" class="w-full border rounded p-2">
                        </div>

                        <div class="flex justify-end mt-6">
                            <button  style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>