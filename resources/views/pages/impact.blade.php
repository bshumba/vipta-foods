@php
    $page = \App\Support\ViptaContent::page('impact');
    $hero = $page['hero'] ?? [];
    $harvestToTable = $page['harvest_to_table'] ?? [];
    $impactAreas = $page['impact_areas'] ?? [];
    $timeline = $page['timeline'] ?? [];
    $partnerNote = $page['partner_note'] ?? [];
    $cta = $page['cta'] ?? [];
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'Impact')
@section('meta_description', $page['meta_description'] ?? '')
@section('og_image', $hero['image'] ?? 'images/vipta/heritage-landscape.png')
@section('og_image_alt', $hero['image_alt'] ?? '')

@section('content')
    <section class="bg-vipta-green text-white">
        <div class="mx-auto grid min-h-[690px] max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 min-[900px]:grid-cols-[0.92fr_1fr] lg:min-h-[740px] lg:px-12 lg:py-24">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-gold">{{ $hero['eyebrow'] ?? '' }}</p>
                <h1 class="mt-5 font-display text-4xl font-bold leading-[1.04] sm:text-6xl min-[900px]:text-5xl lg:text-7xl">
                    {{ $hero['heading'] ?? '' }}
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-white/75">
                    {{ $hero['intro'] ?? '' }}
                </p>

                <div class="mt-8 grid gap-3">
                    @foreach (($hero['highlights'] ?? []) as $highlight)
                        <x-site.list-item variant="dark">{{ $highlight }}</x-site.list-item>
                    @endforeach
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-2xl border border-white/15 bg-white/8 shadow-[var(--shadow-vipta-soft)]">
                    <img
                        src="{{ asset($hero['image'] ?? 'images/vipta/heritage-landscape.png') }}"
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

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.86fr_1fr] lg:px-12">
            <div class="overflow-hidden rounded-2xl border border-vipta-border shadow-[var(--shadow-vipta-soft)]">
                <img
                    src="{{ asset($harvestToTable['image'] ?? 'images/vipta/story-matohwe-harvest.png') }}"
                    alt="{{ $harvestToTable['image_alt'] ?? '' }}"
                    width="1400"
                    height="1120"
                    loading="lazy"
                    decoding="async"
                    class="aspect-[5/4] w-full object-cover"
                >
            </div>

            <div>
                <x-site.section-heading :eyebrow="$harvestToTable['eyebrow'] ?? ''" :heading="$harvestToTable['heading'] ?? ''" :body="$harvestToTable['body'] ?? ''" />
                <div class="mt-8 grid gap-3">
                    @foreach (($harvestToTable['items'] ?? []) as $item)
                        <x-site.list-item>{{ $item }}</x-site.list-item>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-vipta-border bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$impactAreas['eyebrow'] ?? ''" :heading="$impactAreas['heading'] ?? ''" :body="$impactAreas['body'] ?? ''" align="center" />

            <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach (($impactAreas['items'] ?? []) as $item)
                    <x-site.text-card :title="$item['title'] ?? ''" :body="$item['description'] ?? ''" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-vipta-paper py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$timeline['eyebrow'] ?? ''" :heading="$timeline['heading'] ?? ''" :body="$timeline['body'] ?? ''" align="center" />

            <x-site.timeline :steps="$timeline['steps'] ?? []" :columns="5" :connected="false" compact class="mt-12 gap-4" />
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 min-[900px]:grid-cols-[0.85fr_1fr] lg:px-12">
            <x-site.section-heading :eyebrow="$partnerNote['eyebrow'] ?? ''" :heading="$partnerNote['heading'] ?? ''" :body="$partnerNote['body'] ?? ''" />

            <div class="grid gap-4">
                @foreach (($partnerNote['items'] ?? []) as $item)
                    <x-site.list-item>{{ $item }}</x-site.list-item>
                @endforeach
            </div>
        </div>
    </section>

    <x-site.cta-section
        :heading="$cta['heading'] ?? ''"
        :body="$cta['body'] ?? ''"
        :primary-label="$cta['primary_label'] ?? 'Partner With Us'"
        :primary-route="$cta['primary_route'] ?? 'contact'"
        :secondary-label="$cta['secondary_label'] ?? 'Explore Products'"
        :secondary-route="$cta['secondary_route'] ?? 'products'"
    />
@endsection
