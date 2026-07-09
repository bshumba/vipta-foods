@php
    $page = \App\Support\ViptaContent::page($pageKey);
    $backHomeCta = \App\Support\ViptaContent::cta('back_home');
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'Page')
@section('meta_description', $page['meta_description'] ?? $page['description'] ?? '')

@section('content')
    <section class="bg-vipta-cream">
        <div class="mx-auto max-w-4xl px-5 py-24 sm:px-8 lg:px-12 lg:py-32">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-vipta-earth">{{ $page['phase_label'] ?? '' }}</p>
            <h1 class="mt-5 font-display text-5xl font-bold leading-tight text-vipta-green sm:text-6xl">
                {{ $page['heading'] ?? '' }}
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-vipta-muted">
                {{ $page['description'] ?? '' }}
            </p>
            <div class="mt-10">
                <a href="{{ route($backHomeCta['route'] ?? 'home') }}" class="rounded-lg border border-vipta-green px-6 py-4 text-sm font-semibold text-vipta-green transition hover:bg-vipta-sage focus:outline-none focus:ring-2 focus:ring-vipta-gold focus:ring-offset-2 focus:ring-offset-vipta-cream">
                    {{ $backHomeCta['label'] ?? 'Back to Home' }}
                </a>
            </div>
        </div>
    </section>
@endsection
