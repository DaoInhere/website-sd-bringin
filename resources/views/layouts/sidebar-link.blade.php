@props(['href', 'icon', 'open'])

<a href="{{ $href }}" 
class="flex items-center p-2 text-gray-700 hover:bg-teal-50 hover:text-teal-600 rounded-lg mb-1 transition-all group">
    <span class="text-xl min-w-[24px] flex items-center justify-center">{{ $icon }}</span>
    <span x-show="open" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="ml-3 font-medium truncate">
        {{ $slot }}
    </span>
</a>