<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Galeri Foto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <a href="{{ route('galleries.create') }}" 
                    style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        + Tambah Foto Baru
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Foto</th>
                            <th class="border p-2">Judul / Caption</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $index => $gallery)
                            <tr class="text-center">
                                <td class="border p-2">{{ $index + 1 }}</td>
                                <td class="border p-2">
                                    <img src="{{ asset('asset/' . $gallery->image) }}" class="w-24 h-24 object-cover mx-auto rounded">
                                </td>
                                <td class="border p-2">{{ $gallery->title ?? '-' }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                                    
                                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border p-4 text-center text-gray-500">Belum ada foto galeri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>