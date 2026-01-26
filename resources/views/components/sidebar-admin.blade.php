@props(['open' => true])

<aside :class="open ? 'w-64' : 'w-20'" class="bg-white shadow-md transition-all duration-300 ease-in-out flex flex-col border-r border-gray-200">
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-2">
        
        <div class="flex items-center px-2 mb-6 h-10 overflow-hidden">
            <div class="shrink-0 flex items-center justify-center">
                <x-application-logo class="w-10 h-10 min-w-[40px] text-teal-600" />
            </div>
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-x-2"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 class="ml-3 font-bold text-teal-600 truncate whitespace-nowrap uppercase">
                SDN 1 BRINGIN
            </div>
        </div>

        <button @click="open = !open" class="w-full flex items-center p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors mb-4">
            <svg class="w-6 h-6 min-w-[24px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span x-show="open" class="ml-3 font-medium text-gray-700">Tutup Menu</span>
        </button>

        <div class="pt-2">
            <p x-show="open" class="text-[10px] font-bold text-gray-400 uppercase px-2 mb-2 tracking-widest">Fitur Utama</p>
            
            <x-sidebar-link href="{{ route('posts.index') }}" icon="📰" :open="$open">Berita Sekolah</x-sidebar-link>
            <x-sidebar-link href="{{ route('galleries.index') }}" icon="📷" :open="$open">Galeri Foto</x-sidebar-link>
            <x-sidebar-link href="{{ route('teachers.index') }}" icon="👨‍🏫" :open="$open">Data Guru</x-sidebar-link>
            <x-sidebar-link href="{{ route('schedules.index') }}" icon="📅" :open="$open">Jadwal KBM</x-sidebar-link>
        </div>

        <div class="pt-4 border-t border-gray-100">
            <p x-show="open" class="text-[10px] font-bold text-gray-400 uppercase px-2 mb-2 tracking-widest">Sistem</p>
            <x-sidebar-link href="{{ route('profile (admin).edit') }}" icon="⚙️" :open="$open">Pengaturan</x-sidebar-link>
        </div>
    </nav>
</aside>