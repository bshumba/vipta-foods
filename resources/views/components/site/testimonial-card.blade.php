@props([
    'testimonial' => [],
])

<figure {{ $attributes->merge(['class' => 'rounded-lg border border-vipta-border bg-vipta-paper p-6 shadow-sm']) }}>
    <blockquote class="text-base leading-7 text-vipta-muted">
        "{{ $testimonial['quote'] ?? '' }}"
    </blockquote>
    <figcaption class="mt-6">
        <p class="font-display text-xl font-semibold text-vipta-green">{{ $testimonial['name'] ?? '' }}</p>
        <p class="mt-1 text-sm text-vipta-earth">{{ $testimonial['role'] ?? '' }}</p>
    </figcaption>
</figure>
