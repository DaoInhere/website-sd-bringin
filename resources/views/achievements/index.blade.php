<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-4">
                        <a href="{{ route('achievements.create') }}" 
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                            + Tambah Prestasi Baru
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-2">
                        {{ $achievements->links() }}
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm leading-normal">
                                    <th class="border border-gray-300 p-3 text-left">Foto</th>
                                    <th class="border border-gray-300 p-3 text-left">Nama Lomba</th>
                                    <th class="border border-gray-300 p-3 text-left">Kategori</th>
                                    <th class="border border-gray-300 p-3 text-left">Tingkat</th>
                                    <th class="border border-gray-300 p-3 text-left">Juara</th>
                                    <th class="border border-gray-300 p-3 text-left">Tanggal</th>
                                    <th class="border border-gray-300 p-3 text-left">Deskripsi</th>
                                    <th class="border border-gray-300 p-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($achievements as $key => $achievement)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="border border-gray-300 p-3">
                                        <img src="{{ $achievement->image_url }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                                    </td>
                                    <td class="border border-gray-300 p-3 font-bold">{{ $achievement->title }}</td>
                                    <td class="border border-gray-300 p-3">{{ $achievement->category }}</td>
                                    <td class="border border-gray-300 p-3">{{ $achievement->level }}</td>
                                    <td class="border border-gray-300 p-3">{{ $achievement->position }}</td>
                                    <td class="border border-gray-300 p-3">{{ $achievement->date->translatedFormat('d F Y') }}</td>
                                    <td class="border border-gray-300 p-3">{{ $achievement->description }}</td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <a href="{{ route('achievements.edit', $achievement->id) }}" style="color: #d97706; margin-right: 10px;">Edit</a>
                                        <form onsubmit="return confirm('Yakin hapus data ini?');" action="{{ route('achievements.destroy', $achievement->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="color: #dc2626; background: none; border: none; cursor: pointer;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $achievements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>