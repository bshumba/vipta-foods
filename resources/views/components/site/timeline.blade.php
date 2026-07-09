@props([
    'steps' => [],
    'columns' => 4,
    'connected' => true,
    'compact' => false,
])

@php
    $gridClass = (int) $columns === 5 ? 'min-[900px]:grid-cols-5' : 'min-[900px]:grid-cols-4';
    $numberClasses = $compact
        ? 'mx-auto flex h-12 w-12 items-center justify-center rounded-full border-2 border-vipta-green bg-vipta-cream font-display text-xl font-semibold text-vipta-green'
        : 'mx-auto flex h-14 w-14 items-center justify-center rounded-full border-2 border-vipta-green bg-vipta-cream font-display text-2xl font-semibold text-vipta-green';
@endphp

<div {{ $attributes->merge(['class' => "relative mt-14 grid gap-5 {$gridClass}"]) }}>
    @if ($connected)
        <div class="absolute left-0 right-0 top-[2.15rem] hidden h-px bg-vipta-green/30 min-[900px]:block"></div>
    @endif

    @foreach ($steps as $step)
        <article class="relative rounded-lg border border-vipta-border bg-vipta-paper p-6 text-center shadow-sm">
            <div class="{{ $numberClasses }}">
                {{ $loop->iteration }}
            </div>
            <h3 class="mt-6 font-display text-2xl font-semibold leading-tight text-vipta-green">{{ $step['title'] ?? '' }}</h3>
            <p class="mt-3 text-sm leading-6 text-vipta-muted">{{ $step['description'] ?? '' }}</p>
        </article>
    @endforeach
</div>
