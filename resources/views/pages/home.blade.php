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
@section('og_image', $hero['image'] ?? 'images/vipta/hero-cookie.png')
@section('og_image_alt', $hero['image_alt'] ?? '')

@section('content')
    <section class="bg-vipta-cream">
        <div class="mx-auto grid min-h-[700px] max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 min-[900px]:grid-cols-[1fr_0.92fr] lg:min-h-[760px] lg:px-12 lg:py-24">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">{{ $hero['eyebrow'] ?? '' }}</p>
                <h1 class="mt-5 font-display text-4xl font-bold leading-[1.04] text-vipta-green sm:text-6xl min-[900px]:text-5xl lg:text-7xl">
                    {{ $hero['heading'] ?? '' }}
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-vipta-muted">
                    {{ $hero['intro'] ?? '' }}
                </p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <x-site.button :route="$primaryCta['route'] ?? 'products'">
                        {{ $primaryCta['label'] ?? 'Explore Products' }}
                    </x-site.button>
                    <x-site.button :route="$secondaryCta['route'] ?? 'contact'" variant="outline">
                        {{ $secondaryCta['label'] ?? 'Order / Enquire' }}
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

        <div class="mx-auto max-w-7xl px-5 pb-16 sm:px-8 lg:px-12 lg:pb-24">
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($benefits as $benefit)
                    <x-site.text-card :title="$benefit['title'] ?? ''" :body="$benefit['description'] ?? ''" heading-size="small" hover class="px-5 py-4" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-y border-vipta-border bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.92fr_1fr] lg:px-12">
            <div class="rounded-2xl border border-vipta-border bg-vipta-paper p-6 shadow-[var(--shadow-vipta-soft)]">
                <div class="rounded-xl bg-vipta-cream p-6">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">{{ $productIntro['eyebrow'] ?? '' }}</p>
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
                <x-site.section-heading eyebrow="Product introduction" :heading="$productIntro['heading'] ?? ''" :body="$productIntro['body'] ?? ''" />
                <x-site.button route="products" variant="outline-sage" class="mt-8">
                    Explore Miracle Cookie
                </x-site.button>
            </div>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$ingredientsPreview['eyebrow'] ?? ''" :heading="$ingredientsPreview['heading'] ?? ''" :body="$ingredientsPreview['body'] ?? ''" align="center" />

            <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($ingredients as $ingredient)
                    <x-site.ingredient-card :ingredient="$ingredient" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-vipta-paper py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <div class="grid gap-10 min-[900px]:grid-cols-[0.85fr_1fr]">
                <x-site.section-heading :eyebrow="$whyChoose['eyebrow'] ?? ''" :heading="$whyChoose['heading'] ?? ''" />

                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach (($whyChoose['items'] ?? []) as $item)
                        <x-site.text-card :title="$item['title'] ?? ''" :body="$item['description'] ?? ''" variant="white" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.85fr_1fr] lg:px-12">
            <div>
                <x-site.section-heading :eyebrow="$storyPreview['eyebrow'] ?? ''" :heading="$storyPreview['heading'] ?? ''" :body="$storyPreview['body'] ?? ''" />
                <x-site.button :route="$storyPreview['cta_route'] ?? 'our-story'" variant="outline" class="mt-8">
                    {{ $storyPreview['cta_label'] ?? 'Read Our Story' }}
                </x-site.button>
            </div>
            <div class="overflow-hidden rounded-2xl border border-vipta-border shadow-[var(--shadow-vipta-soft)]">
                <img
                    src="{{ asset($storyPreview['image'] ?? 'images/vipta/heritage-landscape.png') }}"
                    alt="{{ $storyPreview['image_alt'] ?? '' }}"
                    width="1400"
                    height="1120"
                    loading="lazy"
                    decoding="async"
                    class="aspect-[5/4] w-full object-cover"
                >
            </div>
        </div>
    </section>

    <section class="bg-vipta-green py-16 text-white lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$impactPreview['eyebrow'] ?? ''" :heading="$impactPreview['heading'] ?? ''" :body="$impactPreview['body'] ?? ''" theme="dark" class="max-w-3xl" />

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

    <x-site.cta-section
        :heading="$finalCta['heading'] ?? ''"
        :body="$finalCta['body'] ?? ''"
        :primary-label="$finalCta['cta_label'] ?? 'Contact Us'"
        :primary-route="$finalCta['cta_route'] ?? 'contact'"
        variant="panel"
        class="bg-vipta-cream"
    />
@endsection
