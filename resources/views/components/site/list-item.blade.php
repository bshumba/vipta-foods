@props([
    'variant' => 'bordered',
])

@php
    $classes = match ($variant) {
        'plain' => 'flex items-center gap-3 text-sm font-semibold text-vipta-green',
        'dark' => 'flex items-center gap-3 text-sm font-semibold text-white',
        'cream' => 'flex gap-3 rounded-lg bg-vipta-cream px-4 py-3 text-sm font-semibold text-vipta-green',
        default => 'flex items-center gap-3 rounded-lg border border-vipta-border bg-vipta-paper px-4 py-3 text-sm font-semibold text-vipta-green',
    };
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-vipta-gold"></span>
    <span>{{ $slot }}</span>
</div>
