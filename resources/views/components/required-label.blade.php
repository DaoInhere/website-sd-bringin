<label {{ $attributes->merge(['class' => 'block font-semibold text-gray-700']) }}>
    {{ $slot }}
    <span class="relative inline-block group cursor-help">
        <span class="text-red-500">*</span>

        <span class="absolute left-1/2 -translate-y-6 mt-1
                   whitespace-nowrap rounded-md bg-white px-2 py-1 shadow
                   text-xs opacity-0
                   group-hover:opacity-100
                   group-focus-within:opacity-100
                   transition"> Wajib Diisi
        </span>
    </span>
</label>