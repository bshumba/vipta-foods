@php
    $page = \App\Support\ViptaContent::page('our_story');
    $hero = $page['hero'] ?? [];
    $quote = $page['quote'] ?? [];
    $reclaiming = $page['reclaiming'] ?? [];
    $fruitToCookie = $page['fruit_to_cookie'] ?? [];
    $pathway = $page['pathway'] ?? [];
    $closing = $page['closing'] ?? [];
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'Our Story')
@section('meta_description', $page['meta_description'] ?? '')
@section('og_image', $reclaiming['image'] ?? 'images/vipta/story-matohwe-harvest.png')
@section('og_image_alt', $reclaiming['image_alt'] ?? '')

@section('content')
    <section class="bg-vipta-cream">
        <div class="mx-auto flex min-h-[540px] max-w-7xl items-center px-5 py-20 text-center sm:px-8 lg:min-h-[620px] lg:px-12">
            <div class="mx-auto max-w-4xl">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">{{ $hero['eyebrow'] ?? '' }}</p>
                <h1 class="mt-5 font-display text-4xl font-bold leading-[1.06] text-vipta-green sm:text-6xl lg:text-7xl">
                    {{ $hero['heading'] ?? '' }}
                </h1>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-vipta-muted">
                    {{ $hero['intro'] ?? '' }}
                </p>
            </div>
        </div>
    </section>

    <section class="border-y border-vipta-border bg-vipta-sage px-5 py-16 sm:px-8 lg:px-12 lg:py-24">
        <figure class="mx-auto max-w-4xl text-center">
            <blockquote class="font-display text-3xl font-medium italic leading-snug text-vipta-green sm:text-4xl">
                "{{ $quote['body'] ?? '' }}"
            </blockquote>
            <figcaption class="mt-7 text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">
                {{ $quote['attribution'] ?? '' }}
            </figcaption>
        </figure>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.78fr_1fr] lg:px-12">
            <div>
                <x-site.section-heading :eyebrow="$reclaiming['eyebrow'] ?? ''" :heading="$reclaiming['heading'] ?? ''" :body="$reclaiming['body'] ?? ''" />
                <x-site.button :route="$reclaiming['cta_route'] ?? 'products'" variant="outline" class="mt-8">
                    {{ $reclaiming['cta_label'] ?? 'Explore the Cookie' }}
                </x-site.button>
            </div>

            <div class="overflow-hidden rounded-2xl border border-vipta-border shadow-[var(--shadow-vipta-soft)]">
                <img
                    src="{{ asset($reclaiming['image'] ?? 'images/vipta/story-matohwe-harvest.png') }}"
                    alt="{{ $reclaiming['image_alt'] ?? '' }}"
                    width="1400"
                    height="1120"
                    loading="lazy"
                    decoding="async"
                    class="aspect-[5/4] w-full object-cover"
                >
            </div>
        </div>
    </section>

    <section class="bg-vipta-paper py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[1fr_0.88fr] lg:px-12">
            <div class="order-2 overflow-hidden rounded-2xl border border-vipta-border shadow-[var(--shadow-vipta-soft)] min-[900px]:order-1">
                <img
                    src="{{ asset($fruitToCookie['image'] ?? 'images/vipta/product-ingredients-board.png') }}"
                    alt="{{ $fruitToCookie['image_alt'] ?? '' }}"
                    width="1400"
                    height="1120"
                    loading="lazy"
                    decoding="async"
                    class="aspect-[5/4] w-full object-cover"
                >
            </div>

            <div class="order-1 min-[900px]:order-2">
                <x-site.section-heading :eyebrow="$fruitToCookie['eyebrow'] ?? ''" :heading="$fruitToCookie['heading'] ?? ''" :body="$fruitToCookie['body'] ?? ''" />

                <div class="mt-8 grid gap-4">
                    @foreach (($fruitToCookie['points'] ?? []) as $point)
                        <x-site.text-card :title="$point['title'] ?? ''" :body="$point['description'] ?? ''" variant="white" class="p-5" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-vipta-border bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$pathway['eyebrow'] ?? ''" :heading="$pathway['heading'] ?? ''" :body="$pathway['body'] ?? ''" align="center" />

            <x-site.timeline :steps="$pathway['steps'] ?? []" />
        </div>
    </section>

    <x-site.cta-section
        :heading="$closing['heading'] ?? ''"
        :body="$closing['body'] ?? ''"
        :primary-label="$closing['cta_label'] ?? 'Explore Products'"
        :primary-route="$closing['cta_route'] ?? 'products'"
    />
@endsection
