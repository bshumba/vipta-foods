@php
    $page = \App\Support\ViptaContent::page('benefits');
    $hero = $page['hero'] ?? [];
    $disclaimer = $page['disclaimer'] ?? [];
    $compoundsIntro = $page['compounds_intro'] ?? [];
    $compounds = $page['compounds'] ?? [];
    $wellness = $page['wellness'] ?? [];
    $sexualIntro = $page['sexual_intro'] ?? [];
    $sexualBenefits = $page['sexual_benefits'] ?? [];
    $sourcesIntro = $page['sources_intro'] ?? [];
    $cta = $page['cta'] ?? [];
    $sourceItems = collect($compounds)
        ->merge(filled($wellness['source_url'] ?? null) ? [[
            'name' => $wellness['source_label'] ?? 'Wellness reference',
            'source_url' => $wellness['source_url'],
            'source_label' => $wellness['source_label'] ?? 'Wellness reference',
        ]] : [])
        ->merge(collect($sexualBenefits)->filter(fn (array $item): bool => filled($item['source_url'] ?? null)))
        ->values();
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'Health and Sexual Benefits')
@section('meta_description', $page['meta_description'] ?? '')
@section('og_image', $hero['image'] ?? 'images/vipta/story-matohwe-harvest.png')
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

                <div class="mt-9 grid gap-3 sm:grid-cols-3">
                    @foreach (($hero['stats'] ?? []) as $stat)
                        <div class="rounded-lg border border-vipta-border bg-vipta-paper px-5 py-4 shadow-sm">
                            <p class="font-display text-3xl font-semibold text-vipta-green">{{ $stat['value'] ?? '' }}</p>
                            <p class="mt-1 text-xs font-bold uppercase tracking-[0.12em] text-vipta-earth">{{ $stat['label'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-2xl border border-vipta-border bg-vipta-paper p-4 shadow-[var(--shadow-vipta-soft)]">
                    <img
                        src="{{ asset($hero['image'] ?? 'images/vipta/story-matohwe-harvest.png') }}"
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

    <section class="border-y border-vipta-border bg-vipta-green py-12 text-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 min-[900px]:grid-cols-[0.36fr_1fr] lg:px-12">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-gold">{{ $disclaimer['eyebrow'] ?? '' }}</p>
                <h2 class="mt-3 font-display text-3xl font-semibold leading-tight">{{ $disclaimer['heading'] ?? '' }}</h2>
            </div>
            <p class="text-base leading-8 text-white/76">
                {{ $disclaimer['body'] ?? '' }}
            </p>
        </div>
    </section>

    <section class="bg-vipta-paper py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <div class="grid gap-10 min-[900px]:grid-cols-[0.72fr_1fr]">
                <x-site.section-heading :eyebrow="$compoundsIntro['eyebrow'] ?? ''" :heading="$compoundsIntro['heading'] ?? ''" :body="$compoundsIntro['body'] ?? ''" />

                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ($compounds as $compound)
                        <article class="rounded-lg border border-vipta-border bg-vipta-cream p-6 shadow-sm">
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-vipta-earth">Plant compound</p>
                            <h3 class="mt-3 font-display text-2xl font-semibold text-vipta-green">{{ $compound['name'] ?? '' }}</h3>
                            <p class="mt-3 text-sm leading-6 text-vipta-muted">{{ $compound['summary'] ?? '' }}</p>
                            @if (filled($compound['source_url'] ?? null))
                                <a
                                    href="{{ $compound['source_url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-5 inline-flex text-sm font-bold text-vipta-green underline decoration-vipta-gold decoration-2 underline-offset-4"
                                >
                                    {{ $compound['source_label'] ?? 'View source' }}
                                </a>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl items-start gap-10 px-5 sm:px-8 min-[900px]:grid-cols-[0.8fr_1fr] lg:px-12">
            <div>
                <x-site.section-heading :eyebrow="$wellness['eyebrow'] ?? ''" :heading="$wellness['heading'] ?? ''" :body="$wellness['body'] ?? ''" />
                @if (filled($wellness['source_url'] ?? null))
                    <a
                        href="{{ $wellness['source_url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-7 inline-flex rounded-lg border border-vipta-green px-5 py-3 text-sm font-bold text-vipta-green transition hover:bg-vipta-green hover:text-white"
                    >
                        {{ $wellness['source_label'] ?? 'View source' }}
                    </a>
                @endif
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                @foreach (($wellness['items'] ?? []) as $item)
                    <article class="rounded-lg border border-vipta-border bg-vipta-paper p-6 shadow-sm">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-vipta-green font-display text-lg font-semibold text-white">{{ $loop->iteration }}</span>
                        <h3 class="mt-5 font-display text-xl font-semibold text-vipta-green">{{ $item['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-6 text-vipta-muted">{{ $item['description'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-vipta-cream py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <x-site.section-heading :eyebrow="$sexualIntro['eyebrow'] ?? ''" :heading="$sexualIntro['heading'] ?? ''" :body="$sexualIntro['body'] ?? ''" align="center" />

            <div class="mt-12 grid gap-5 md:grid-cols-2">
                @foreach ($sexualBenefits as $benefit)
                    <article class="rounded-lg border border-vipta-border bg-vipta-paper p-7 shadow-[var(--shadow-vipta-soft)]">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-vipta-earth">Intimate wellness</p>
                        <h3 class="mt-3 font-display text-2xl font-semibold text-vipta-green">{{ $benefit['title'] ?? '' }}</h3>
                        <p class="mt-4 text-sm leading-7 text-vipta-muted">{{ $benefit['description'] ?? '' }}</p>
                        <p class="mt-5 text-xs font-bold uppercase tracking-[0.12em] text-vipta-earth/80">
                            {{ $benefit['source_label'] ?? 'Client-supplied note' }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @if ($sourceItems->isNotEmpty())
        <section class="border-y border-vipta-border bg-vipta-paper py-16 lg:py-24">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 min-[900px]:grid-cols-[0.72fr_1fr] lg:px-12">
                <x-site.section-heading :eyebrow="$sourcesIntro['eyebrow'] ?? ''" :heading="$sourcesIntro['heading'] ?? ''" :body="$sourcesIntro['body'] ?? ''" />

                <div class="grid gap-3">
                    @foreach ($sourceItems as $source)
                        <a
                            href="{{ $source['source_url'] ?? '#' }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center justify-between gap-4 rounded-lg border border-vipta-border bg-vipta-cream px-5 py-4 text-sm font-bold text-vipta-green transition hover:border-vipta-green hover:bg-vipta-sage"
                        >
                            <span>{{ $source['source_label'] ?? $source['name'] ?? 'Reference source' }}</span>
                            <span class="text-vipta-earth transition group-hover:translate-x-1">View</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-site.cta-section
        :heading="$cta['heading'] ?? ''"
        :body="$cta['body'] ?? ''"
        :primary-label="$cta['primary_label'] ?? 'Explore Products'"
        :primary-route="$cta['primary_route'] ?? 'products'"
        :secondary-label="$cta['secondary_label'] ?? 'Order / Enquire'"
        :secondary-route="$cta['secondary_route'] ?? 'contact'"
        variant="panel"
        class="bg-vipta-sage"
    />
@endsection
