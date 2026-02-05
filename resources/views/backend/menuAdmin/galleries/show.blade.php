<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Album: ') }} {{ $gallery->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- INFO ALBUM --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $gallery->title }}</h3>
                        <p class="text-gray-500 mt-1">
                            📅 {{ $gallery->activityDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="mt-4 text-gray-700 leading-relaxed">
                            {{ $gallery->description }}
                        </p>
                    </div>
                    <a href="{{ route('galleries.index') }}" class="text-gray-500 hover:text-gray-700">
                        &larr; Kembali
                    </a>
                </div>
            </div>

            {{-- GRID FOTO --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @if(is_array($gallery->photos))
                    @foreach ($gallery->photos as $photoPath)
                        <div class="bg-white p-2 rounded shadow hover:shadow-lg transition group">
                            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded bg-gray-200">
                                <a href="{{ asset('storage/' . $photoPath) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $photoPath) }}" 
                                         alt="Foto Dokumentasi" 
                                         class="w-full h-48 object-cover transform group-hover:scale-110 transition duration-500">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="col-span-full text-center text-gray-500">Tidak ada foto dalam album ini.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>