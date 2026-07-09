@props([
    'heading' => '',
    'body' => '',
    'primaryLabel' => null,
    'primaryRoute' => null,
    'primaryHref' => null,
    'secondaryLabel' => null,
    'secondaryRoute' => null,
    'secondaryHref' => null,
    'variant' => 'green',
])

@php
    $isGreen = $variant === 'green';
    $sectionClasses = $isGreen
        ? 'bg-vipta-green px-5 py-16 text-white sm:px-8 lg:px-12 lg:py-24'
        : 'px-5 py-16 sm:px-8 lg:px-12 lg:py-24';

    $panelClasses = $isGreen
        ? 'mx-auto max-w-5xl text-center'
        : 'mx-auto max-w-5xl rounded-2xl border border-vipta-border bg-vipta-paper px-6 py-12 text-center shadow-[var(--shadow-vipta-soft)] sm:px-10 lg:px-16';
@endphp

<section {{ $attributes->merge(['class' => $sectionClasses]) }}>
    <div class="{{ $panelClasses }}">
        <h2 class="font-display text-3xl font-semibold leading-tight {{ $isGreen ? 'text-white' : 'text-vipta-green' }} sm:text-4xl lg:text-5xl">
            {{ $heading }}
        </h2>
        <p class="mx-auto mt-5 max-w-2xl text-base leading-8 {{ $isGreen ? 'text-white/75' : 'text-vipta-muted' }}">{{ $body }}</p>

        @if (filled($primaryLabel) || filled($secondaryLabel))
            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                @if (filled($primaryLabel))
                    <x-site.button :href="$primaryHref" :route="$primaryRoute" :variant="$isGreen ? 'gold' : 'primary'" class="{{ filled($secondaryLabel) ? '' : 'sm:inline-flex' }}">
                        {{ $primaryLabel }}
                    </x-site.button>
                @endif

                @if (filled($secondaryLabel))
                    <x-site.button :href="$secondaryHref" :route="$secondaryRoute" :variant="$isGreen ? 'white-outline' : 'paper-outline'">
                        {{ $secondaryLabel }}
                    </x-site.button>
                @endif
            </div>
        @endif
    </div>
</section>
