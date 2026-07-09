@props([
    'eyebrow' => '',
    'heading' => '',
    'body' => null,
    'align' => 'left',
    'theme' => 'light',
])

@php
    $isCentered = $align === 'center';
    $isDark = $theme === 'dark';
@endphp

<div {{ $attributes->merge(['class' => $isCentered ? 'mx-auto max-w-3xl text-center' : '']) }}>
    @if (filled($eyebrow))
        <p class="text-xs font-bold uppercase tracking-[0.18em] {{ $isDark ? 'text-vipta-gold' : 'text-vipta-earth' }}">{{ $eyebrow }}</p>
    @endif

    @if (filled($heading))
        <h2 class="mt-4 font-display text-3xl font-semibold leading-tight {{ $isDark ? 'text-white' : 'text-vipta-green' }} sm:text-4xl lg:text-5xl">
            {{ $heading }}
        </h2>
    @endif

    @if (filled($body))
        <p class="{{ $isCentered ? 'mx-auto ' : '' }}mt-5 max-w-2xl text-base leading-8 {{ $isDark ? 'text-white/75' : 'text-vipta-muted' }}">
            {{ $body }}
        </p>
    @endif
</div>
