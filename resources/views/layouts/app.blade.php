@php
    $brand = \App\Support\ViptaContent::brand();
    $accessibility = \App\Support\ViptaContent::accessibility();
    $seo = \App\Support\ViptaContent::seo();
    $pageTitle = trim($__env->yieldContent('title', ''));
    $siteName = $seo['site_name'] ?? $brand['name'] ?? config('app.name');
    $fullTitle = filled($pageTitle) ? "{$pageTitle} | {$siteName}" : ($seo['default_title'] ?? $siteName);
    $metaDescription = trim($__env->yieldContent('meta_description', $seo['default_description'] ?? $brand['description'] ?? ''));
    $canonicalUrl = url()->current();
    $openGraphImage = asset(trim($__env->yieldContent('og_image', $seo['default_image'] ?? $brand['logo'] ?? 'images/logo.png')));
    $openGraphImageAlt = trim($__env->yieldContent('og_image_alt', $seo['default_image_alt'] ?? $brand['logo_alt'] ?? $siteName));
    $openGraphType = trim($__env->yieldContent('og_type', $seo['default_type'] ?? 'website'));
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $metaDescription }}">
        <meta name="robots" content="index, follow">

        <title>{{ $fullTitle }}</title>
        <link rel="canonical" href="{{ $canonicalUrl }}">
        <link rel="icon" type="image/png" href="{{ asset($brand['logo'] ?? 'images/logo.png') }}">
        <link rel="apple-touch-icon" href="{{ asset($brand['logo'] ?? 'images/logo.png') }}">

        <meta property="og:site_name" content="{{ $siteName }}">
        <meta property="og:title" content="{{ $fullTitle }}">
        <meta property="og:description" content="{{ $metaDescription }}">
        <meta property="og:type" content="{{ $openGraphType }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:image" content="{{ $openGraphImage }}">
        <meta property="og:image:alt" content="{{ $openGraphImageAlt }}">
        <meta name="twitter:card" content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}">
        <meta name="twitter:title" content="{{ $fullTitle }}">
        <meta name="twitter:description" content="{{ $metaDescription }}">
        <meta name="twitter:image" content="{{ $openGraphImage }}">
        <meta name="theme-color" content="#145225">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-vipta-cream text-vipta-ink antialiased">
        <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-lg focus:bg-vipta-green focus:px-4 focus:py-3 focus:text-sm focus:font-semibold focus:text-white">
            {{ $accessibility['skip_to_content'] ?? 'Skip to content' }}
        </a>

        <x-site.navbar />

        <main id="main-content">
            @yield('content')
        </main>

        <x-site.footer />
    </body>
</html>
