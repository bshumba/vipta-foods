@php
    $page = \App\Support\ViptaContent::page('products');
    $hero = $page['hero'] ?? [];
    $primaryCta = \App\Support\ViptaContent::cta($page['primary_cta'] ?? 'primary');
    $secondaryCta = \App\Support\ViptaContent::cta($page['secondary_cta'] ?? 'back_home');
    $overview = $page['overview'] ?? [];
    $featuredIngredient = $page['featured_ingredient'] ?? [];
    $ingredientsIntro = $page['ingredients_intro'] ?? [];
    $ingredients = \App\Support\ViptaContent::ingredients();
    $features = $page['features'] ?? [];
    $nutrition = $page['nutrition'] ?? [];
    $variants = $page['variants'] ?? [];
    $variantItems = $variants['items'] ?? [];
    $availability = $page['availability'] ?? [];
    $faqIntro = $page['faq_intro'] ?? [];
    $faqs = \App\Support\ViptaContent::faqs();
    $cta = $page['cta'] ?? [];
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'Products')
@section('meta_description', $page['meta_description'] ?? '')
@section('og_image', $hero['image'] ?? 'images/vipta/hero-cookie.png')
@section('og_image_alt', $hero['image_alt'] ?? '')

@section('content')
    <section class="bg-vipta-cream">
        <div class="mx-auto grid min-h-[690px] max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 min-[900px]:grid-cols-[0.92fr_1fr] lg:min-h-[740px] lg:px-12 lg:py-24">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">{{ $hero['eyebrow'] ?? '' }}</p>
                <h1 class="mt-5 font-display text-4xl font-bold leading-[1.04] text-vipta-green sm:text-6xl min-[900px]:text-5xl lg:text-7xl">
                    {{ $hero['heading'] ?? '' }}
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-vipta-muted">
                    {{ $hero['intro'] ?? '' }}
                </p>

                <div class="mt-8 grid gap-3">
                    @foreach (($hero['highlights'] ?? []) as $highlight)
                        <div class="flex items-center gap-3 text-sm font-semibold text-vipta-green">
                            <span class="h-2.5 w-2.5 rounded-full bg-vipta-gold"></span>
                            <span>{{ $highlight }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <x-site.button :route="$primaryCta['route'] ?? 'contact'">
                        {{ $primaryCta['label'] ?? 'Order / Enquire' }}
                    </x-site.button>
                    <x-site.button :route="$secondaryCta['route'] ?? 'home'" variant="outline">
                        {{ $secondaryCta['label'] ?? 'Back to Home' }}
                    </x-site.button>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-2xl border border-vipta-border bg-vipta-paper shadow-[var(--shadow-vipta-soft)]">
                    <img
                        src="{{ asset($hero['image'] ?? 'images/vipta/hero-cookie.png') }}"
                        alt="{{ $hero['image_alt'] ?? '' }}"
                        width="1400"
                        height="1050"
                        fetchpriority="high"
                        decoding="async"
                        class="aspect-[4/3] w-full object-cover"
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-vipta-border bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 min-[900px]:grid-cols-[0.85fr_1fr] lg:px-12">
            <div>
                <x-site.section-heading :eyebrow="$overview['eyebrow'] ?? ''" :heading="$overview['heading'] ?? ''" :body="$overview['body'] ?? ''" />
                <div class="mt-8 grid gap-3">
                    @foreach (($overview['items'] ?? []) as $item)
                        <x-site.list-item>{{ $item }}</x-site.list-item>
                    @endforeach
                </div>
            </div>

            <article class="rounded-lg border border-vipta-border bg-vipta-paper p-7 shadow-[var(--shadow-vipta-soft)] sm:p-8 lg:p-10">
                <x-site.section-heading :eyebrow="$featuredIngredient['eyebrow'] ?? ''" :heading="$featuredIngredient['heading'] ?? ''" :body="$featuredIngredient['body'] ?? ''" />
                <div class="mt-7 grid gap-3">
                    @foreach (($featuredIngredient['points'] ?? []) as $point)
                        <x-site.list-item variant="cream">{{ $point }}</x-site.list-item>
                    @endforeach
                </div>
            </article>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <div class="grid items-center gap-10 min-[900px]:grid-cols-[0.85fr_1fr]">
                <x-site.section-heading :eyebrow="$ingredientsIntro['eyebrow'] ?? ''" :heading="$ingredientsIntro['heading'] ?? ''" :body="$ingredientsIntro['body'] ?? ''" />

                <div class="overflow-hidden rounded-2xl border border-vipta-border shadow-[var(--shadow-vipta-soft)]">
                    <img
                        src="{{ asset($ingredientsIntro['image'] ?? 'images/vipta/product-ingredients-board.png') }}"
                        alt="{{ $ingredientsIntro['image_alt'] ?? '' }}"
                        width="1400"
                        height="1050"
                        loading="lazy"
                        decoding="async"
                        class="aspect-[4/3] w-full object-cover"
                    >
                </div>
            </div>

            <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($ingredients as $ingredient)
                    <x-site.ingredient-card :ingredient="$ingredient" mode="detail" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-vipta-paper py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <div class="grid gap-10 min-[900px]:grid-cols-[0.78fr_1fr]">
                <x-site.section-heading :eyebrow="$features['eyebrow'] ?? ''" :heading="$features['heading'] ?? ''" />

                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach (($features['items'] ?? []) as $feature)
                        <x-site.text-card :title="$feature['title'] ?? ''" :body="$feature['description'] ?? ''" variant="white" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-vipta-green py-16 text-white lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <div class="grid gap-10 min-[900px]:grid-cols-[0.8fr_1fr]">
                <x-site.section-heading :eyebrow="$nutrition['eyebrow'] ?? ''" :heading="$nutrition['heading'] ?? ''" :body="$nutrition['body'] ?? ''" theme="dark" />

                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach (($nutrition['items'] ?? []) as $item)
                        <article class="rounded-lg border border-white/15 bg-white/8 p-6">
                            @if (filled($item['value'] ?? null))
                                <p class="font-display text-4xl font-semibold text-vipta-gold">{{ $item['value'] }}{{ $item['unit'] ?? '' }}</p>
                                <p class="mt-1 text-sm font-bold uppercase tracking-[0.14em] text-white/70">{{ $item['label'] ?? '' }}</p>
                                @if (! ($item['verified'] ?? false))
                                    <p class="mt-3 inline-flex rounded-full border border-white/15 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.12em] text-white/60">
                                        Client-provided
                                    </p>
                                @endif
                            @else
                                <p class="text-xs font-bold uppercase tracking-[0.14em] text-vipta-gold">{{ ($item['verified'] ?? false) ? 'Nutrition note' : 'Client-provided' }}</p>
                                <h3 class="mt-3 font-display text-2xl font-semibold">{{ $item['label'] ?? '' }}</h3>
                            @endif
                            <p class="mt-3 text-sm leading-6 text-white/72">{{ $item['description'] ?? '' }}</p>
                        </article>
                    @endforeach
                </div>

                @if (filled($nutrition['footnote'] ?? null))
                    <p class="rounded-lg border border-white/15 bg-white/8 p-5 text-sm leading-6 text-white/70">
                        {{ $nutrition['footnote'] }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 min-[900px]:grid-cols-[1fr_0.9fr] lg:gap-12 lg:px-12">
            <div>
                <x-site.section-heading :eyebrow="$variants['eyebrow'] ?? ''" :heading="$variants['heading'] ?? ''" :body="$variants['body'] ?? ''" />

                @if ($variantItems !== [])
                    <div x-data="{ activeVariant: @js($variantItems[0]['name'] ?? '') }" class="mt-8">
                        <div class="-mx-5 flex gap-2 overflow-x-auto px-5 pb-2 sm:mx-0 sm:flex-wrap sm:px-0" role="tablist" aria-label="Product flavour variants">
                            @foreach ($variantItems as $variant)
                                <button
                                    type="button"
                                    role="tab"
                                    :aria-selected="(activeVariant === @js($variant['name'] ?? '')).toString()"
                                    @click="activeVariant = @js($variant['name'] ?? '')"
                                    class="shrink-0 rounded-lg border px-4 py-3 text-left text-sm font-semibold transition duration-200 focus:outline-none focus:ring-2 focus:ring-vipta-gold focus:ring-offset-2 focus:ring-offset-vipta-cream"
                                    :class="activeVariant === @js($variant['name'] ?? '') ? 'border-vipta-green bg-vipta-green text-white shadow-[var(--shadow-vipta-soft)]' : 'border-vipta-border bg-vipta-paper text-vipta-green hover:border-vipta-green hover:bg-vipta-sage'"
                                >
                                    {{ $variant['name'] ?? '' }}
                                </button>
                            @endforeach
                        </div>

                        <div class="mt-5">
                            @foreach ($variantItems as $variant)
                                <article
                                    x-cloak
                                    x-show="activeVariant === @js($variant['name'] ?? '')"
                                    x-transition.opacity.duration.200ms
                                    class="rounded-lg border border-vipta-border bg-vipta-paper p-6 shadow-[var(--shadow-vipta-soft)]"
                                    role="tabpanel"
                                >
                                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-vipta-earth">{{ $variant['status'] ?? '' }}</p>
                                    <h3 class="mt-2 font-display text-2xl font-semibold text-vipta-green">{{ $variant['name'] ?? '' }}</h3>
                                    <p class="mt-3 text-sm leading-6 text-vipta-muted">{{ $variant['description'] ?? '' }}</p>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <article class="rounded-lg border border-vipta-border bg-vipta-paper p-7 shadow-[var(--shadow-vipta-soft)] sm:p-8 lg:p-10">
                <x-site.section-heading :eyebrow="$availability['eyebrow'] ?? ''" :heading="$availability['heading'] ?? ''" :body="$availability['body'] ?? ''" />
                <div class="mt-8 grid gap-3">
                    @foreach (($availability['items'] ?? []) as $item)
                        <x-site.list-item variant="cream">{{ $item }}</x-site.list-item>
                    @endforeach
                </div>
            </article>
        </div>
    </section>

    @if ($faqs !== [])
        <section class="border-y border-vipta-border bg-vipta-paper py-16 lg:py-24">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 min-[900px]:grid-cols-[0.78fr_1fr] lg:px-12">
                <x-site.section-heading
                    :eyebrow="$faqIntro['eyebrow'] ?? ''"
                    :heading="$faqIntro['heading'] ?? ''"
                    :body="$faqIntro['body'] ?? ''"
                />

                <div class="grid gap-4">
                    @foreach ($faqs as $faq)
                        <x-site.faq-item :question="$faq['question'] ?? ''" :answer="$faq['answer'] ?? ''" :open="$loop->first" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-site.cta-section
        :heading="$cta['heading'] ?? ''"
        :body="$cta['body'] ?? ''"
        :primary-label="$cta['label'] ?? 'Order / Enquire'"
        :primary-route="$cta['route'] ?? 'contact'"
        variant="panel"
        class="bg-vipta-sage"
    />
@endsection
