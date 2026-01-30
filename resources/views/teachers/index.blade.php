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
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Data Baru
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                @error('position')
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded border border-red-200">
                        {{ $message }}
                    </div>
                @enderror 

                <div class="mb-4">
                    {{ $teachers->links() }}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 text-gray-700 text-sm">
                            <tr>
                                <th class="border border-gray-300 p-3 text-center">NIP</th>
                                <th class="border border-gray-300 p-3 text-center">Foto</th>
                                <th class="border border-gray-300 p-3 text-left">Nama Lengkap</th>
                                <th class="border border-gray-300 p-3 text-left">Jabatan / Mapel</th>
                                <th class="border border-gray-300 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as $teacher)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="border border-gray-300 p-3 text-center text-sm text-gray-600">
                                        {{ $teacher->nip }}
                                    </td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <img src="{{ $teacher->photo_url }}" class="w-14 h-14 object-cover mx-auto rounded-full border shadow-sm">
                                    </td>
                                    <td class="border border-gray-300 p-3 font-bold text-sm text-gray-800">
                                        {{ Str::limit($teacher->name, 100) }}
                                    </td>
                                    <td class="border border-gray-300 p-3 text-sm text-gray-600">
                                        {{ Str::limit($teacher->position, 50) }}
                                    </td>
                                    <td class="border border-gray-300 p-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('teachers.edit', $teacher->nip) }}" 
                                               class="text-amber-600 hover:text-amber-800 font-bold text-xs border border-amber-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('teachers.destroy', $teacher->nip) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data guru ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-800 font-bold text-xs border border-red-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-gray-300 p-8 text-center text-gray-500 italic">
                                        Belum ada data guru yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $teachers->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>