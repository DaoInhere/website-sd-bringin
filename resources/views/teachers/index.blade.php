<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <a href="{{ route('teachers.create') }}" 
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        + Tambah Guru Baru
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @error('position')
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @enderror 

                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Foto</th>
                            <th class="border p-2">Nama Guru</th>
                            <th class="border p-2">Jabatan / Mapel</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teachers as $index => $teacher)
                            <tr class="text-center">
                                <td class="border p-2">{{ $index + 1 }}</td>
                                <td class="border p-2">
                                    <img src="{{ $teacher->photo_url }}" class="w-16 h-16 object-cover mx-auto rounded-full">
                                </td>
                                <td class="border p-2 font-bold">{{ $teacher->name }}</td>
                                <td class="border p-2">{{ $teacher->position }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('teachers.edit', $teacher->nip) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                                    
                                    <form action="{{ route('teachers.destroy', $teacher->nip) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data guru ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border p-4 text-center text-gray-500">Belum ada data guru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>