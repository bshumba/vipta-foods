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
                <figure class="relative mx-auto flex max-w-xl flex-col items-center">
                    @if (filled($hero['image_badge'] ?? null))
                        <figcaption
                            class="relative z-10 max-w-md rounded-full border border-vipta-border/80 bg-vipta-paper/90 px-5 py-3 text-center text-sm font-bold uppercase tracking-[0.12em] text-vipta-green shadow-sm backdrop-blur">
                            {{ $hero['image_badge'] }}
                        </figcaption>
                    @endif
                    <div
                        class="-mt-3 flex h-[23rem] w-full items-center justify-center overflow-hidden sm:h-[29rem] sm:overflow-visible min-[900px]:h-[30rem]">
                        <img src="{{ asset($hero['image'] ?? 'images/vipta/single-cookie.png') }}"
                            alt="{{ $hero['image_alt'] ?? '' }}" width="1400" height="1050" fetchpriority="high"
                            decoding="async"
                            class="h-[26rem] w-auto max-w-[calc(100vw-2.5rem)] object-contain drop-shadow-[0_28px_42px_rgba(20,82,37,0.16)] sm:h-[38rem] sm:max-w-none min-[900px]:h-[40rem]">
                    </div>
                </figure>

                @if (filled($hero['comparison'] ?? null))
                    <div
                        class="-mt-3 rounded-2xl border border-vipta-border bg-vipta-green px-5 py-4 text-center shadow-[var(--shadow-vipta-soft)] sm:-mt-5">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-vipta-gold">Health Comparison</p>
                        <p class="mt-2 font-display text-2xl font-semibold leading-tight text-white sm:text-3xl">
                            {{ $hero['comparison'] }}
                        </p>
                    </div>
                @endif
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

    <section class="bg-vipta-green py-16 text-white lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$impactPreview['eyebrow'] ?? ''" :heading="$impactPreview['heading'] ?? ''"
                :body="$impactPreview['body'] ?? ''" theme="dark" class="max-w-3xl" />

            <div class="mt-12 grid gap-5 md:grid-cols-3">
                @foreach (($impactPreview['items'] ?? []) as $item)
                    <x-site.text-card :title="$item['title'] ?? ''" :body="$item['description'] ?? ''" variant="dark" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$testimonialIntro['eyebrow'] ?? ''" :heading="$testimonialIntro['heading'] ?? ''" align="center" />

            <div class="mt-12 grid gap-5 lg:grid-cols-3">
                @foreach ($testimonials as $testimonial)
                    <x-site.testimonial-card :testimonial="$testimonial" />
                @endforeach
            </div>
        </div>
    </section>

    <x-site.cta-section :heading="$finalCta['heading'] ?? ''" :body="$finalCta['body'] ?? ''"
        :primary-label="$finalCta['cta_label'] ?? 'Contact Us'" :primary-route="$finalCta['cta_route'] ?? 'contact'"
        variant="panel" class="bg-vipta-cream" />
@endsection