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
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">No</th>
                                    <th class="py-3 px-6 text-left">Foto</th>
                                    <th class="py-3 px-6 text-left">Nama Lomba</th>
                                    <th class="py-3 px-6 text-left">Juara</th>
                                    <th class="py-3 px-6 text-left">Tingkat</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach($achievements as $key => $achievement)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">{{ $achievements->firstItem() + $key }}</td>
                                    <td class="py-3 px-6 text-left">
                                        @if($achievement->image)
                                            <img src="{{ asset('storage/' . $achievement->image) }}" class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-left font-bold">{{ $achievement->title }}</td>
                                    <td class="py-3 px-6 text-left">{{ $achievement->rank }}</td>
                                    <td class="py-3 px-6 text-left">{{ $achievement->level }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center gap-2">
                                            <a href="{{ route('achievements.edit', $achievement->id) }}" class="text-yellow-500 hover:text-yellow-600 font-bold">Edit</a>
                                            |
                                            <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" action="{{ route('achievements.destroy', $achievement->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600 font-bold">Hapus</button>
                                            </form>
                                        </div>
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