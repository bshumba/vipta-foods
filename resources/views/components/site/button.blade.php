@props([
    'href' => null,
    'route' => null,
    'variant' => 'primary',
])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-lg px-6 py-4 text-center text-sm font-semibold transition duration-200 hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-vipta-gold focus:ring-offset-2';

    $variantClasses = match ($variant) {
        'gold' => 'bg-vipta-gold text-vipta-green shadow-[var(--shadow-vipta-soft)] hover:bg-vipta-cream focus:ring-offset-vipta-green',
        'outline' => 'border border-vipta-green text-vipta-green hover:bg-vipta-sage focus:ring-offset-vipta-cream',
        'outline-sage' => 'border border-vipta-green text-vipta-green hover:bg-vipta-cream focus:ring-offset-vipta-sage',
        'white-outline' => 'border border-white/40 text-white hover:bg-white/10 focus:ring-offset-vipta-green',
        'paper-outline' => 'border border-vipta-green text-vipta-green hover:bg-vipta-sage focus:ring-offset-vipta-paper',
        default => 'bg-vipta-green text-white shadow-[var(--shadow-vipta-soft)] hover:bg-vipta-leaf focus:ring-offset-vipta-cream',
    };

    $url = $href ?? route($route ?? 'home');
@endphp

<a href="{{ $url }}" {{ $attributes->merge(['class' => "{$baseClasses} {$variantClasses}"]) }}>
    {{ $slot }}
</a>
