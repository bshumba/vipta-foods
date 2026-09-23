@php
    $page = \App\Support\ViptaContent::page('home');
    $hero = $page['hero'] ?? [];
    $primaryCta = \App\Support\ViptaContent::cta($page['primary_cta'] ?? 'secondary');
    $secondaryCta = \App\Support\ViptaContent::cta($page['secondary_cta'] ?? 'primary');
    $benefits = \App\Support\ViptaContent::benefits();
    $ingredients = \App\Support\ViptaContent::ingredients();
    $testimonials = \App\Support\ViptaContent::testimonials();
    $productIntro = $page['product_intro'] ?? [];
    $ingredientsPreview = $page['ingredients_preview'] ?? [];
    $whyChoose = $page['why_choose'] ?? [];
    $storyPreview = $page['story_preview'] ?? [];
    $impactPreview = $page['impact_preview'] ?? [];
    $testimonialIntro = $page['testimonials'] ?? [];
    $finalCta = $page['final_cta'] ?? [];
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'Home')
@section('meta_description', $page['meta_description'] ?? '')
@section('og_image', $hero['image'] ?? 'images/vipta/single-cookie.png')
@section('og_image_alt', $hero['image_alt'] ?? '')

@section('content')
    <section class="bg-vipta-cream">
        <div
            class="mx-auto grid min-h-[700px] max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 min-[900px]:grid-cols-[1fr_0.92fr] lg:min-h-[760px] lg:px-12 lg:py-24">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">{{ $hero['eyebrow'] ?? '' }}</p>
                @if (filled($hero['tagline'] ?? null))
                    <p class="mt-4 max-w-xl font-display text-2xl font-semibold leading-tight text-vipta-earth sm:text-3xl">
                        {{ $hero['tagline'] }}
                    </p>
                @endif
                <h1
                    class="mt-5 font-display text-4xl font-bold leading-[1.04] text-vipta-green sm:text-6xl min-[900px]:text-5xl lg:text-7xl">
                    {{ $hero['heading'] ?? '' }}
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-vipta-muted">
                    {{ $hero['intro'] ?? '' }}
                </p>
                <div class="mt-9 flex">
                    <x-site.button :route="$secondaryCta['route'] ?? 'contact'" variant="outline" class="w-[80%]">
                        {{ $secondaryCta['label'] ?? 'Order / Enquire' }}
                    </x-site.button>
                </div>

            </div>

            <div class="relative">
                @if (filled($hero['image_badge'] ?? null))
                    <div class="mb-6 flex justify-center">
                        <span
                            class="rounded-full border border-vipta-border/80 bg-vipta-paper/90 px-5 py-2.5 text-center text-xs font-bold uppercase tracking-[0.14em] text-vipta-green shadow-sm backdrop-blur sm:text-sm">
                            {{ $hero['image_badge'] }}
                        </span>
                    </div>
                @endif

                <div
                    class="rounded-3xl border border-vipta-border/80 bg-vipta-paper p-4 shadow-[var(--shadow-vipta-soft)] sm:p-6">
                    <div
                        style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; gap: 0.75rem;">
                        {{-- Left Card: Miracle Cookie --}}
                        <div style="flex: 1 1 0%; min-width: 0;"
                            class="group flex flex-col items-center rounded-2xl border border-vipta-border/60 bg-vipta-cream/50 p-3 transition-all duration-300 hover:border-vipta-green/30 hover:bg-white hover:shadow-md sm:p-4">
                            <div
                                class="relative flex aspect-square w-full items-center justify-center overflow-hidden rounded-xl bg-white/80 p-3 shadow-inner">
                                <img src="{{ asset($hero['comparison_cookie_image'] ?? 'images/vipta/single-cookie.png') }}"
                                    alt="{{ $hero['comparison_cookie_alt'] ?? '1 Miracle Breakfast Cookie' }}"
                                    fetchpriority="high" decoding="async"
                                    class="max-h-full max-w-full object-contain drop-shadow-[0_6px_12px_rgba(20,82,37,0.15)] transition-transform duration-300 group-hover:scale-105">
                            </div>
                            <div class="mt-3 flex flex-col items-center text-center">
                                <span class="font-display text-xs font-bold text-vipta-green sm:text-base lg:text-lg">1
                                    Miracle Cookie</span>
                                <p class="mt-0.5 text-[10px] font-medium text-vipta-earth sm:text-xs">Nutrient-dense
                                    breakfast</p>
                            </div>
                        </div>

                        {{-- Equals Sign Divider --}}
                        <div style="flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-vipta-green text-lg font-bold text-vipta-gold shadow-md sm:h-12 sm:w-12 sm:text-2xl">
                                =
                            </div>
                        </div>

                        {{-- Right Card: 4 Slices Bread + 1 Egg --}}
                        <div style="flex: 1 1 0%; min-width: 0;"
                            class="group flex flex-col items-center rounded-2xl border border-vipta-border/60 bg-vipta-cream/50 p-3 transition-all duration-300 hover:border-vipta-green/30 hover:bg-white hover:shadow-md sm:p-4">
                            <div
                                class="relative flex aspect-square w-full items-center justify-center overflow-hidden rounded-xl bg-white/80 p-3 shadow-inner">
                                <img src="{{ asset($hero['comparison_bread_egg_image'] ?? 'images/vipta/Bread and Egg.png') }}"
                                    alt="{{ $hero['comparison_bread_egg_alt'] ?? '4 slices of bread and 1 egg' }}"
                                    fetchpriority="high" decoding="async"
                                    class="max-h-full max-w-full object-contain drop-shadow-[0_6px_12px_rgba(0,0,0,0.12)] transition-transform duration-300 group-hover:scale-105">
                            </div>
                            <div class="mt-3 flex flex-col items-center text-center">
                                <span class="font-display text-xs font-bold text-vipta-green sm:text-base lg:text-lg">4
                                    Bread Slices + 1 Egg</span>
                                <p class="mt-0.5 text-[10px] font-medium text-vipta-muted sm:text-xs">Traditional breakfast
                                    equivalent</p>
                            </div>
                        </div>
                    </div>

                    {{-- Comparison Banner Below Images --}}
                    <div
                        class="mt-5 rounded-2xl border border-vipta-border bg-vipta-green px-4 py-3.5 text-center shadow-sm">
                        <!--p class="text-[11px] font-bold uppercase tracking-[0.16em] text-vipta-gold">Health Comparison</p-->
                        <p class="mt-1 font-display text-lg font-bold leading-snug text-white sm:text-xl md:text-2xl">
                            1 Miracle Cookie = 4 Slices of Bread + 1 Egg
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.92fr_1fr] lg:px-12">
            <div class="rounded-2xl border border-vipta-border bg-vipta-paper p-6 shadow-[var(--shadow-vipta-soft)]">
                <div class="rounded-xl bg-vipta-cream p-6">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">
                        {{ $productIntro['eyebrow'] ?? '' }}
                    </p>
                    <p class="mt-8 font-display text-4xl font-semibold leading-tight text-vipta-green">
                        {{ $productIntro['heading'] ?? '' }}
                    </p>
                    <div class="mt-8 grid gap-3">
                        @foreach (($productIntro['highlights'] ?? []) as $highlight)
                            <x-site.list-item>{{ $highlight }}</x-site.list-item>
                        @endforeach
                    </div>
                </div>
            </div>

            <div>
                <x-site.section-heading eyebrow="Product introduction" :heading="$productIntro['heading'] ?? ''"
                    :body="$productIntro['body'] ?? ''" />
                <x-site.button route="benefits" variant="outline-sage" class="mt-8">
                    Explore Miracle Cookie
                </x-site.button>
            </div>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <div class="grid gap-12 min-[900px]:grid-cols-[0.85fr_1fr] min-[1200px]:gap-20">

                {{-- Section heading --}}
                <x-site.section-heading :eyebrow="$whyChoose['eyebrow'] ?? ''" :heading="$whyChoose['heading'] ?? ''" />

                {{-- Benefits --}}
                <div class="grid gap-x-12 gap-y-10 sm:grid-cols-2">
                    @foreach (($whyChoose['items'] ?? []) as $index => $item)
                        <div class="border-t border-vipta-border/70 pt-5">
                            <div class="mb-4 flex items-start justify-between">
                                <span class="text-xs font-bold tracking-[0.18em] text-vipta-green/60">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>

                            <h3 class="text-xl font-semibold text-vipta-green">
                                {{ $item['title'] ?? '' }}
                            </h3>

                            <p class="mt-3 max-w-md text-sm leading-7 text-vipta-ink/70">
                                {{ $item['description'] ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.85fr_1fr] lg:px-12">
            <div>
                <x-site.section-heading :eyebrow="$storyPreview['eyebrow'] ?? ''" :heading="$storyPreview['heading'] ?? ''"
                    :body="$storyPreview['body'] ?? ''" />
                <x-site.button :route="$storyPreview['cta_route'] ?? 'our-story'" variant="outline" class="mt-8">
                    {{ $storyPreview['cta_label'] ?? 'Read Our Story' }}
                </x-site.button>
            </div>
            <div class="overflow-hidden rounded-2xl border border-vipta-border shadow-[var(--shadow-vipta-soft)]">
                <img src="{{ asset($storyPreview['image'] ?? 'images/vipta/Matohwe.jpeg') }}"
                    alt="{{ $storyPreview['image_alt'] ?? '' }}" width="1400" height="1120" loading="lazy" decoding="async"
                    class="aspect-[5/4] w-full object-cover">
            </div>
        </div>
    </section>

    <!--section class="bg-vipta-green py-16 text-white lg:py-24">
                    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
                        <x-site.section-heading :eyebrow="$impactPreview['eyebrow'] ?? ''" :heading="$impactPreview['heading'] ?? ''"
                            :body="$impactPreview['body'] ?? ''" theme="dark" class="max-w-3xl" />

                        <div class="mt-12 grid gap-5 md:grid-cols-3">
                            @foreach (($impactPreview['items'] ?? []) as $item)
                                <x-site.text-card :title="$item['title'] ?? ''" :body="$item['description'] ?? ''" variant="dark" />
                            @endforeach
                        </div>
                    </div>
                </section-->

    <!--section class="bg-vipta-sage py-16 lg:py-24">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
                    <x-site.section-heading :eyebrow="$testimonialIntro['eyebrow'] ?? ''" :heading="$testimonialIntro['heading'] ?? ''" align="center" />

                    <div class="mt-12 grid gap-5 lg:grid-cols-3">
                        @foreach ($testimonials as $testimonial)
                            <x-site.testimonial-card :testimonial="$testimonial" />
                        @endforeach
                    </div>
                </div>
            </section-->

    <x-site.cta-section :heading="$finalCta['heading'] ?? ''" :body="$finalCta['body'] ?? ''"
        :primary-label="$finalCta['cta_label'] ?? 'Contact Us'" :primary-route="$finalCta['cta_route'] ?? 'contact'"
        variant="panel" class="bg-vipta-cream" />
@endsection