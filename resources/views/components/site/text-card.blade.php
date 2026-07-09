@props([
    'eyebrow' => null,
    'title' => '',
    'body' => null,
    'variant' => 'paper',
    'headingSize' => 'base',
    'center' => false,
    'hover' => false,
])

@php
    $variantClasses = match ($variant) {
        'white' => 'border-vipta-border bg-white shadow-sm',
        'cream' => 'border-vipta-border bg-vipta-cream shadow-sm',
        'dark' => 'border-white/15 bg-white/8',
        default => 'border-vipta-border bg-vipta-paper shadow-sm',
    };

    $titleClasses = match ($headingSize) {
        'large' => 'font-display text-3xl font-semibold leading-tight text-vipta-green sm:text-4xl lg:text-5xl',
        'small' => 'font-display text-xl font-semibold text-vipta-green',
        default => 'font-display text-2xl font-semibold text-vipta-green',
    };

    if ($variant === 'dark') {
        $titleClasses = match ($headingSize) {
            'large' => 'font-display text-3xl font-semibold leading-tight text-white sm:text-4xl lg:text-5xl',
            'small' => 'font-display text-xl font-semibold text-white',
            default => 'font-display text-2xl font-semibold text-white',
        };
    }

    $bodyClasses = $variant === 'dark' ? 'text-white/72' : 'text-vipta-muted';
@endphp

<article {{ $attributes->merge(['class' => trim("rounded-lg border p-5 sm:p-6 {$variantClasses} ".($center ? 'text-center ' : '').($hover ? 'transition duration-200 hover:-translate-y-1 hover:shadow-[var(--shadow-vipta-soft)]' : ''))]) }}>
    @if (filled($eyebrow))
        <p class="text-xs font-bold uppercase tracking-[0.14em] {{ $variant === 'dark' ? 'text-vipta-gold' : 'text-vipta-earth' }}">{{ $eyebrow }}</p>
    @endif

    @if (filled($title))
        <h3 class="{{ filled($eyebrow) ? 'mt-2 ' : '' }}{{ $titleClasses }}">{{ $title }}</h3>
    @endif

    @if (filled($body))
        <p class="mt-3 text-sm leading-6 {{ $bodyClasses }}">{{ $body }}</p>
    @endif

    {{ $slot }}
</article>
