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
                                <tr class="bg-gray-50 text-gray-700">
                                    <th class="py-3 px-4 border border-gray-300 text-center w-12">No</th>
                                    <th class="py-3 px-4 border border-gray-300 text-center">Foto</th>
                                    <th class="py-3 px-4 border border-gray-300 text-left">Nama Lomba</th>
                                    <th class="py-3 px-4 border border-gray-300 text-center">Juara</th>
                                    <th class="py-3 px-4 border border-gray-300 text-center">Tingkat</th>
                                    <th class="py-3 px-4 border border-gray-300 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                @foreach($achievements as $key => $achievement)
                                <tr>
                                    <td class="py-3 px-4 border border-gray-300 text-center">
                                        {{ $achievements->firstItem() + $key }}
                                    </td>
                                    <td class="py-2 px-2 border border-gray-300">
                                        <div class="flex justify-center">
                                            @if($achievement->image)
                                                <img src="{{ asset('storage/' . $achievement->image) }}" class="w-16 h-10 object-cover rounded border border-gray-200">
                                            @else
                                                <span class="text-gray-400 text-xs italic">No Image</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 border border-gray-300 font-semibold text-gray-800">
                                        {{ $achievement->title }}
                                    </td>
                                    <td class="py-3 px-4 border border-gray-300 text-center">
                                        {{ $achievement->rank }}
                                    </td>
                                    <td class="py-3 px-4 border border-gray-300 text-center">
                                        {{ $achievement->level }}
                                    </td>
                                    <td class="py-3 px-4 border border-gray-300">
                                        <div class="flex items-center justify-center gap-4">
                                            <a href="{{ route('achievements.edit', $achievement->id) }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Edit</a>
                                            
                                            <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" action="{{ route('achievements.destroy', $achievement->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Hapus</button>
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