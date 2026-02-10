<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Data Jadwal KBM') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-6">

                <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ route('schedules.create') }}"
                            style="background-color: #16a34a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold;">
                            + Tambah Jadwal Baru
                        </a>
                    </div>

                    <form method="GET" action="{{ url()->current() }}" class="w-full sm:w-auto">
                        <div class="relative">
                            <input type="text" name="find" value="{{ request('find') }}"
                                   placeholder="Cari jadwal..."
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

                @if (session('success'))
                <div class="mb-5 rounded-xl bg-emerald-50 p-4 text-emerald-800 ring-1 ring-emerald-200">
                    {{ session('success') }}
                </div>
                @endif

                <div class="mb-4">
                    {{ $schedules->appends(request()->only(['find','sort','dir']))->links() }}
                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto ring-1 ring-gray-200">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-50 text-gray-700 text-sm">
                            <tr>
                                <x-sort-table col="id" label="ID" class="text-center" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="hourStart" label="Jam" class="text-center" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="day" label="Hari" class="text-center" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="subject" label="Kegiatan / Mapel" class="text-left" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="class" label="Kelas" class="text-center" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="type" label="Tipe" class="text-center" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="uniform" label="Seragam" class="text-center" :sort="$sort" :dir="$dir" />
                                <x-sort-table col="curriculum" label="Kurikulum" class="text-center" :sort="$sort" :dir="$dir" />
                                <th class="border-b border-gray-200 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse ($schedules as $schedule)
                            <tr class="text-center hover:bg-gray-50 transition">
                                <td class="p-3 text-xs text-gray-500">{{ $schedule->id }}</td>

                                <td class="p-3 font-bold text-sm text-gray-900">{{ $schedule->hourStart->format('H:i') }} - {{  $schedule->hourEnd->format('H:i') }}</td>

                                <td class="p-3 text-sm text-gray-700">{{ $schedule->day }}</td>

                                <td class="p-3 text-left text-sm text-gray-700">{{ Str::limit($schedule->subject, 50) }}</td>

                                <td class="p-3 text-sm">
                                    <span class="inline-flex px-2.5 py-1 rounded-full bg-gray-100 text-xs text-gray-700 ring-1 ring-gray-200">
                                        {{ $schedule->class == '0' ? 'Semua' : $schedule->class }}
                                    </span>
                                </td>

                                <td class="p-3 text-xs uppercase text-gray-700">{{ $schedule->type }}</td>

                                <td class="p-3 text-xs italic text-gray-600">{{ $schedule->uniform == null ? '-' : $schedule->uniform }}</td>

                                <td class="p-3 text-xs font-semibold text-gray-800">{{ $schedule->curriculum }}</td>

                                <td class="p-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('schedules.edit', $schedule->id) }}"
                                            class="text-amber-700 hover:text-amber-900 font-bold text-[11px] border border-amber-600 px-3 py-1.5 rounded-lg uppercase tracking-tight transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin hapus data jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-700 hover:text-red-900 font-bold text-[11px] border border-red-600 px-3 py-1.5 rounded-lg uppercase tracking-tight transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="p-10 text-center text-gray-500 italic">
                                    Belum ada data jadwal kegiatan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mb-4">
                    {{ $schedules->appends(request()->only(['find','sort','dir']))->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>