@php
    $brand = \App\Support\ViptaContent::brand();
    $navigation = \App\Support\ViptaContent::navigation();
    $primaryCta = \App\Support\ViptaContent::cta('primary');
    $accessibility = \App\Support\ViptaContent::accessibility();
@endphp

<header
    x-data="{ open: false }"
    x-effect="document.body.classList.toggle('overflow-hidden', open)"
    @keydown.escape.window="open = false"
    @resize.window="if (window.innerWidth >= 900) open = false"
    class="sticky top-0 z-50 border-b border-vipta-border/80 bg-vipta-cream/92 backdrop-blur-md"
>
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8 lg:px-12" aria-label="Primary navigation">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-3" aria-label="{{ $brand['home_aria_label'] ?? 'Vipta Health Foods home' }}">
            <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-full sm:h-12 sm:w-12">
                <img
                    src="{{ asset($brand['logo'] ?? 'images/logo.png') }}"
                    alt="{{ $brand['logo_alt'] ?? 'Vipta logo' }}"
                    width="512"
                    height="512"
                    class="h-full w-full scale-[1.45] object-contain"
                >
            </span>
            <span class="font-display text-2xl font-bold leading-none text-vipta-green sm:text-3xl">{{ $brand['display_name'] ?? 'Vipta Foods' }}</span>
        </a>

        <div class="hidden items-center gap-8 min-[900px]:flex">
            @foreach ($navigation as $item)
                <a
                    href="{{ route($item['route']) }}"
                    @class([
                        'text-xs font-bold uppercase tracking-[0.16em] transition-colors duration-200',
                        'text-vipta-green' => request()->routeIs($item['route']),
                        'text-vipta-muted hover:text-vipta-green' => ! request()->routeIs($item['route']),
                    ])
                    @if (request()->routeIs($item['route'])) aria-current="page" @endif
                >
                    <span class="border-b-2 pb-1 {{ request()->routeIs($item['route']) ? 'border-vipta-green' : 'border-transparent' }}">
                        {{ $item['label'] }}
                    </span>
                </a>
            @endforeach
        </div>

        <div class="hidden items-center gap-3 min-[900px]:flex">
            <a href="{{ route($primaryCta['route'] ?? 'contact') }}" class="rounded-lg bg-vipta-green px-5 py-3 text-sm font-semibold text-white shadow-[var(--shadow-vipta-soft)] transition duration-200 hover:bg-vipta-leaf focus:outline-none focus:ring-2 focus:ring-vipta-gold focus:ring-offset-2 focus:ring-offset-vipta-cream">
                {{ $primaryCta['label'] ?? 'Order / Enquire' }}
            </a>
        </div>

        <button
            type="button"
            class="inline-flex h-11 w-11 items-center justify-center rounded-lg border border-vipta-border text-vipta-green transition hover:border-vipta-green hover:bg-vipta-sage min-[900px]:hidden"
            :aria-expanded="open.toString()"
            aria-controls="mobile-menu"
            aria-label="{{ $accessibility['toggle_navigation'] ?? 'Toggle navigation menu' }}"
            @click="open = ! open"
        >
            <svg x-show="! open" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
            </svg>
            <svg x-show="open" x-cloak class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
            </svg>
        </button>
    </nav>

    <div
        id="mobile-menu"
        x-show="open"
        x-cloak
        x-transition:enter="transition duration-200 ease-out"
        x-transition:enter-start="-translate-y-2 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="-translate-y-2 opacity-0"
        @click.outside="open = false"
        class="fixed inset-x-0 top-[76px] max-h-[calc(100dvh-76px)] overflow-y-auto border-t border-vipta-border bg-vipta-paper px-5 py-5 shadow-[var(--shadow-vipta-soft)] min-[900px]:hidden"
    >
        <div class="mx-auto flex max-w-7xl flex-col gap-2">
            @foreach ($navigation as $item)
                <a
                    href="{{ route($item['route']) }}"
                    @click="open = false"
                    @class([
                        'rounded-lg px-4 py-3 text-sm font-bold uppercase tracking-[0.14em] transition',
                        'bg-vipta-sage text-vipta-green' => request()->routeIs($item['route']),
                        'text-vipta-muted hover:bg-vipta-sage hover:text-vipta-green' => ! request()->routeIs($item['route']),
                    ])
                    @if (request()->routeIs($item['route'])) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach

            <a href="{{ route($primaryCta['route'] ?? 'contact') }}" @click="open = false" class="mt-3 rounded-lg bg-vipta-green px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-vipta-leaf focus:outline-none focus:ring-2 focus:ring-vipta-gold focus:ring-offset-2 focus:ring-offset-vipta-paper">
                {{ $primaryCta['label'] ?? 'Order / Enquire' }}
            </a>
        </div>
    </div>
</header>
