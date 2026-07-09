@props([
    'ingredient' => [],
    'mode' => 'preview',
])

@if ($mode === 'detail')
    <x-site.text-card :title="$ingredient['name'] ?? ''" :body="$ingredient['short_description'] ?? ''" eyebrow="Ingredient" hover>
        <p class="mt-4 border-t border-vipta-border pt-4 text-sm leading-6 text-vipta-muted">{{ $ingredient['why_it_matters'] ?? '' }}</p>
    </x-site.text-card>
@else
    <article {{ $attributes->merge(['class' => 'overflow-hidden rounded-lg border border-vipta-border bg-vipta-paper shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-[var(--shadow-vipta-soft)]']) }}>
        <div class="flex aspect-[4/3] items-center justify-center bg-[linear-gradient(135deg,#f8faf3_0%,#eef2e8_52%,#dfe5d9_100%)]">
            <span class="font-display text-6xl font-semibold text-vipta-green/25">{{ mb_substr($ingredient['name'] ?? '', 0, 1) }}</span>
        </div>
        <div class="p-5">
            <p class="text-xs font-bold uppercase tracking-[0.14em] text-vipta-earth">Ingredient</p>
            <h3 class="mt-2 font-display text-2xl font-semibold text-vipta-green">{{ $ingredient['name'] ?? '' }}</h3>
            <p class="mt-3 text-sm leading-6 text-vipta-muted">{{ $ingredient['short_description'] ?? '' }}</p>
        </div>
    </article>
@endif
