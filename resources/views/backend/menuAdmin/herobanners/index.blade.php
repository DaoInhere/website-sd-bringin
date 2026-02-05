<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Banner Halaman Beranda
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- TOP BAR: tombol tambah + search --}}
                <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <a href="{{ route('herobanners.create') }}"
                       style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Banner Baru
                    </a>

                    <form method="GET" action="{{ url()->current() }}" class="w-full sm:w-auto">
                        <div class="relative">
                            <input type="text" name="find" value="{{ request('find') }}"
                                   placeholder="Cari banner..."
                                   class="w-full sm:w-72 pl-10 pr-10 py-2.5 rounded-xl border" />
                        </div>

                    @if(request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif

                    @if(request('dir'))
                        <input type="hidden" name="dir" value="{{ request('dir') }}">
                    @endif
                    
                    </form>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    {{ $herobanners->appends(request()->only(['find','sort','dir']))->links() }}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <x-sort-table col="image" label="Gambar" class="border border-gray-300 p-3 text-center font-semibold" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="title" label="Judul" class="border border-gray-300 p-3 text-left font-semibold" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="subtitle" label="Sub Judul" class="border border-gray-300 p-3 text-left font-semibold" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="dim" label="Banner Redup" class="border border-gray-300 p-3 text-left font-semibold" :sort="$sort" :dir="$dir" />
                                <th class="border border-gray-300 p-3 text-center font-semibold">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($herobanners as $herobanner)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="border border-gray-300 p-3 text-center">
                                        <img src="{{ $herobanner->image_url }}"
                                             class="w-24 h-24 object-cover mx-auto rounded shadow-sm">
                                    </td>

                                    <td class="border border-gray-300 p-3 font-bold text-sm">
                                        {{ Str::limit($herobanner->title, 50) ?? '-' }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-sm text-gray-600">
                                        {{ Str::limit($herobanner->subtitle, 50) ?? '-' }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-sm text-gray-600">
                                        {{ $herobanner->dim == true ? 'Ya' : 'Tidak' }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('herobanners.edit', $herobanner->id) }}"
                                               class="text-amber-600 hover:text-amber-800 font-bold text-xs border border-amber-600 px-3 py-1 rounded uppercase tracking-wider transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('herobanners.destroy', $herobanner->id) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('Yakin hapus banner ini?')">
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
                                        Belum ada gambar banner.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $herobanners->appends(request()->only(['find','sort','dir']))->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
