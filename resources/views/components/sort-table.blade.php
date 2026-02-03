<th {{ $attributes->merge(['class' => 'border-b border-gray-200 p-3']) }}>
    <a href="{{ $url() }}"
       class="inline-flex items-center gap-1 hover:text-sekolah-hijau transition">
        {{ $label }}
        <span class="text-xs">{{ $icon() }}</span>
    </a>
</th>