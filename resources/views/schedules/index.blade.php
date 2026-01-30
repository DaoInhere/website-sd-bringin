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
                        style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                        + Tambah Jadwal Baru
                    </a>
                </div>

                @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <div class="mb-2">
                    {{ $schedules->links() }}
                </div>
                
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">ID</th>                            
                            <th class="border p-2">Jam</th>
                            <th class="border p-2">Hari</th>
                            <th class="border p-2">Kegiatan / Mata Pelajaran</th>
                            <th class="border p-2">Kelas</th>
                            <th class="border p-2">Tipe</th>
                            <th class="border p-2">Seragam</th>
                            <th class="border p-2">Kurikulum</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($schedules as $index => $schedule)
                            <tr class="text-center">
                                <td class="border p-2">{{ $schedule->id }}</td>
                                <td class="border p-2 font-bold">{{ $schedule->hour }}</td>
                                <td class="border p-2">{{ $schedule->day }}</td>
                                <td class="border p-2">{{ Str::limit($schedule->subject, 50) }}</td>
                                <td class="border p-2">{{ $schedule->class == '0' ? 'Semua' : $schedule->class }}</td>
                                <td class="border p-2">{{ $schedule->type }}</td>
                                <td class="border p-2">{{ $schedule->uniform }}</td>
                                <td class="border p-2">{{ $schedule->curriculum }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                                    
                                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data jadwal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border p-4 text-center text-gray-500">Belum ada data jadwal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>