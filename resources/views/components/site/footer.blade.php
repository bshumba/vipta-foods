@php
    $brand = \App\Support\ViptaContent::brand();
    $footer = \App\Support\ViptaContent::footer();
    $contact = \App\Support\ViptaContent::contact();
    $primaryCta = \App\Support\ViptaContent::cta('primary');
    $quickLinks = $footer['quick_links'] ?? [];
@endphp

<footer class="border-t border-vipta-border bg-vipta-sage-deep">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 sm:px-8 md:grid-cols-[1.3fr_1fr_1fr] lg:px-12 lg:py-16">
        <div>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3" aria-label="{{ $brand['home_aria_label'] ?? 'Vipta Health Foods home' }}">
                <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-full">
                    <img
                        src="{{ asset($brand['logo'] ?? 'images/logo.png') }}"
                        alt="{{ $brand['logo_alt'] ?? 'Vipta logo' }}"
                        width="512"
                        height="512"
                        loading="lazy"
                        class="h-full w-full scale-[1.45] object-contain"
                    >
                </span>
                <span class="font-display text-3xl font-bold text-vipta-green">{{ $brand['display_name'] ?? 'Vipta Foods' }}</span>
            </a>
            <p class="mt-3 max-w-sm text-sm leading-6 text-vipta-muted">
                {{ $footer['summary'] ?? $brand['description'] ?? '' }}
            </p>
            <p class="mt-6 text-sm text-vipta-green">
                &copy; {{ date('Y') }} {{ $brand['copyright'] ?? 'Vipta Health Foods. All rights reserved.' }}
            </p>
        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.16em] text-vipta-earth">{{ $footer['quick_links_heading'] ?? 'Quick Links' }}</h2>
            <ul class="mt-4 space-y-3">
                @foreach ($quickLinks as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="text-sm text-vipta-muted transition hover:text-vipta-green">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="text-xs font-bold uppercase tracking-[0.16em] text-vipta-earth">{{ $footer['contact_heading'] ?? 'Contact' }}</h2>
            <div class="mt-4 space-y-3 text-sm leading-6 text-vipta-muted">
                <p>{{ $contact['location'] ?? $brand['location'] ?? '' }}</p>
                <p>
                    <a href="mailto:{{ $contact['email'] ?? $brand['email'] ?? '' }}" class="transition hover:text-vipta-green">{{ $contact['email'] ?? $brand['email'] ?? '' }}</a>
                </p>
                <p>
                    <a href="{{ route($primaryCta['route'] ?? 'contact') }}" class="font-semibold text-vipta-green transition hover:text-vipta-leaf">{{ $primaryCta['label'] ?? 'Order / Enquire' }}</a>
                </p>
            </div>
        </div>
    </div>
</footer>
