<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- TOP BAR: tombol tambah + search --}}
                    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <a href="{{ route('achievements.create') }}"
                           style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                            + Tambah Prestasi Baru
                        </a>

                    <form method="GET" action="{{ url()->current() }}" class="w-full sm:w-auto">
                        <div class="relative">
                            <input type="text" name="find" value="{{ request('find') }}"
                                   placeholder="Cari prestasi..."
                                   class="w-full sm:w-72 pl-5 pr-5 py-2.5 rounded-xl border" />
                        </div>

                    @if(request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif

                    @if(request('dir'))
                        <input type="hidden" name="dir" value="{{ request('dir') }}">
                    @endif
                    
                    </form>
                </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        {{ $achievements->appends(request()->only(['find','sort','dir']))->links() }}
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-sm leading-normal">
                                    <x-sort-table col="image" label="Foto" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                    <x-sort-table col="title" label="Nama Lomba" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                    <x-sort-table col="category" label="Kategori" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                    <x-sort-table col="level" label="Tingkat" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                    <x-sort-table col="position" label="Juara" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                    <x-sort-table col="date" label="Tanggal" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                    <x-sort-table col="description" label="Deskripsi" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                    <th class="border border-gray-300 p-3 text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($achievements as $achievement)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="border border-gray-300 p-3">
                                            <img src="{{ $achievement->image_url }}"
                                                 class="w-20 h-20 object-cover rounded shadow-sm">
                                        </td>

                                        <td class="border border-gray-300 p-3 font-bold">
                                            {{ $achievement->name }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            {{ $achievement->category }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            {{ $achievement->level }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            {{ $achievement->position }}
                                        </td>

                                        <td class="border border-gray-300 p-3 text-sm">
                                            {{ $achievement->date->translatedFormat('d F Y') }}
                                        </td>

                                        <td class="border border-gray-300 p-3 text-sm">
                                            {{ Str::limit($achievement->description, 50) }}
                                        </td>

                                        <td class="border border-gray-300 p-3">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('achievements.edit', $achievement->id) }}"
                                                   class="text-amber-600 hover:text-amber-800 font-medium text-sm border border-amber-600 px-3 py-1 rounded">
                                                    Edit
                                                </a>

                                                <form onsubmit="return confirm('Yakin hapus data ini?');"
                                                      action="{{ route('achievements.destroy', $achievement->id) }}"
                                                      method="POST"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="text-red-600 hover:text-red-800 font-medium text-sm border border-red-600 px-3 py-1 rounded">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="border border-gray-300 p-8 text-center text-gray-500 italic">
                                            Belum ada data Prestasi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $achievements->appends(request()->only(['find','sort','dir']))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
