@php
    $page = \App\Support\ViptaContent::page('about');
    $hero = $page['hero'] ?? [];
    $mission = $page['mission'] ?? [];
    $vision = $page['vision'] ?? [];
    $journey = $page['journey'] ?? [];
    $community = $page['community'] ?? [];
    $cta = $page['cta'] ?? [];
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'About')
@section('meta_description', $page['meta_description'] ?? '')
@section('og_image', $hero['image'] ?? 'images/vipta/about-forest.png')
@section('og_image_alt', $hero['image_alt'] ?? '')

@section('content')
    <section class="relative overflow-hidden bg-vipta-cream">
        <div class="absolute inset-0">
            <img
                src="{{ asset($hero['image'] ?? 'images/vipta/about-forest.png') }}"
                alt="{{ $hero['image_alt'] ?? '' }}"
                width="1400"
                height="1400"
                fetchpriority="high"
                decoding="async"
                class="h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(248,250,243,0.72)_0%,rgba(248,250,243,0.84)_54%,#f8faf3_100%)]"></div>
        </div>

        <div class="relative mx-auto flex min-h-[620px] max-w-7xl items-center px-5 py-20 text-center sm:px-8 lg:min-h-[700px] lg:px-12">
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

    <section class="bg-vipta-cream pb-16 lg:pb-24">
        <div class="mx-auto grid max-w-7xl gap-6 px-5 sm:px-8 min-[900px]:grid-cols-2 lg:px-12">
            @foreach ([$mission, $vision] as $statement)
                <x-site.text-card
                    :eyebrow="$statement['eyebrow'] ?? ''"
                    :title="$statement['heading'] ?? ''"
                    :body="$statement['body'] ?? ''"
                    heading-size="large"
                    class="p-7 shadow-[var(--shadow-vipta-soft)] sm:p-8 lg:p-10"
                />
            @endforeach
        </div>
    </section>

    <section class="border-y border-vipta-border bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$journey['eyebrow'] ?? ''" :heading="$journey['heading'] ?? ''" :body="$journey['body'] ?? ''" align="center" />

            <x-site.timeline :steps="$journey['steps'] ?? []" />
        </div>
    </section>

    <section class="bg-vipta-paper py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.9fr_1fr] lg:px-12">
            <div class="overflow-hidden rounded-2xl border border-vipta-border shadow-[var(--shadow-vipta-soft)]">
                <img
                    src="{{ asset($community['image'] ?? 'images/vipta/heritage-landscape.png') }}"
                    alt="{{ $community['image_alt'] ?? '' }}"
                    width="1400"
                    height="1120"
                    loading="lazy"
                    decoding="async"
                    class="aspect-[5/4] w-full object-cover"
                >
            </div>

            <div>
                <x-site.section-heading :eyebrow="$community['eyebrow'] ?? ''" :heading="$community['heading'] ?? ''" :body="$community['body'] ?? ''" />

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach (($community['items'] ?? []) as $item)
                        <x-site.text-card :title="$item['title'] ?? ''" :body="$item['description'] ?? ''" variant="white" class="p-5" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-site.cta-section
        :heading="$cta['heading'] ?? ''"
        :body="$cta['body'] ?? ''"
        :primary-label="$cta['primary_label'] ?? 'Explore Products'"
        :primary-route="$cta['primary_route'] ?? 'products'"
        :secondary-label="$cta['secondary_label'] ?? 'Contact Us'"
        :secondary-route="$cta['secondary_route'] ?? 'contact'"
    />
@endsection
