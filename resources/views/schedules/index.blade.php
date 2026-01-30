<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Jadwal KBM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <a href="{{ route('schedules.create') }}" 
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                        + Tambah Jadwal Baru
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    {{ $schedules->links() }}
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 text-gray-700 text-sm">
                            <tr>
                                <th class="border border-gray-300 p-2">ID</th>                            
                                <th class="border border-gray-300 p-2">Jam</th>
                                <th class="border border-gray-300 p-2">Hari</th>
                                <th class="border border-gray-300 p-2 text-left">Kegiatan / Mapel</th>
                                <th class="border border-gray-300 p-2">Kelas</th>
                                <th class="border border-gray-300 p-2">Tipe</th>
                                <th class="border border-gray-300 p-2">Seragam</th>
                                <th class="border border-gray-300 p-2">Kurikulum</th>
                                <th class="border border-gray-300 p-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr class="text-center hover:bg-gray-50 transition duration-150">
                                    <td class="border border-gray-300 p-2 text-xs text-gray-500">{{ $schedule->id }}</td>
                                    <td class="border border-gray-300 p-2 font-bold text-sm">{{ $schedule->hour }}</td>
                                    <td class="border border-gray-300 p-2 text-sm">{{ $schedule->day }}</td>
                                    <td class="border border-gray-300 p-2 text-left text-sm">{{ Str::limit($schedule->subject, 50) }}</td>
                                    <td class="border border-gray-300 p-2 text-sm">
                                        <span class="px-2 py-1 bg-gray-100 rounded text-xs">
                                            {{ $schedule->class == '0' ? 'Semua' : $schedule->class }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-300 p-2 text-xs uppercase">{{ $schedule->type }}</td>
                                    <td class="border border-gray-300 p-2 text-xs italic text-gray-600">{{ $schedule->uniform }}</td>
                                    <td class="border border-gray-300 p-2 text-xs font-semibold">{{ $schedule->curriculum }}</td>
                                    <td class="border border-gray-300 p-2">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('schedules.edit', $schedule->id) }}" 
                                               class="text-amber-600 hover:text-amber-800 font-bold text-[10px] border border-amber-600 px-2 py-1 rounded uppercase tracking-tighter transition">
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data jadwal ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-800 font-bold text-[10px] border border-red-600 px-2 py-1 rounded uppercase tracking-tighter transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="border border-gray-300 p-8 text-center text-gray-500 italic">
                                        Belum ada data jadwal kegiatan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $schedules->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>