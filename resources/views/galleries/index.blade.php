<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Album Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <a href="{{ route('galleries.create') }}" 
                    style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Buat Album Baru
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="border border-gray-300 p-3 text-center">Sampul Album</th>
                                <th class="border border-gray-300 p-3 text-left">Info Kegiatan</th>
                                <th class="border border-gray-300 p-3 text-center">Jumlah Foto</th>
                                <th class="border border-gray-300 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    {{-- SAMPUL --}}
                                    <td class="border border-gray-300 p-3 text-center">
                                        <img src="{{ $gallery->cover_url }}" class="w-24 h-24 object-cover mx-auto rounded shadow-sm">
                                    </td>

                                    {{-- INFO --}}
                                    <td class="border border-gray-300 p-3">
                                        <div class="font-bold text-lg">{{ $gallery->title ?? '-' }}</div>
                                        <div class="text-sm text-gray-500 mb-1">
                                            {{ $gallery->activityDate->translatedFormat('d F Y') }}
                                        </div>
                                        <div class="text-sm text-gray-600 italic">
                                            {{ Str::limit($gallery->description, 60) ?? '-' }}
                                        </div>
                                    </td>

                                    {{-- JUMLAH FOTO --}}
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                            {{ count($gallery->photos ?? []) }} Foto
                                        </span>
                                    </td>

                                    {{-- AKSI --}}
                                    <td class="border border-gray-300 p-3 text-center">
                                        <div class="flex flex-col gap-2 items-center">
                                            {{-- TOMBOL LIHAT ALBUM --}}
                                            <a href="{{ route('galleries.show', $gallery->id) }}" 
                                            class="bg-blue-600 text-white text-xs px-3 py-1 rounded hover:bg-blue-700 w-full">
                                                Lihat Album
                                            </a>
                                            
                                            <div class="flex gap-2 w-full justify-center">
                                                {{-- TOMBOL EDIT --}}
                                                <a href="{{ route('galleries.edit', $gallery->id) }}" 
                                                class="text-amber-600 hover:text-amber-800 font-bold text-xs border border-amber-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                    Edit
                                                </a>

                                                {{-- TOMBOL HAPUS --}}
                                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin hapus album ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs border border-red-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="border border-gray-300 p-8 text-center text-gray-500 italic">
                                        Belum ada album galeri.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>