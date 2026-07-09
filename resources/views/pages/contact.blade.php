@php
    $page = \App\Support\ViptaContent::page('contact');
    $contact = \App\Support\ViptaContent::contact();
    $hero = $page['hero'] ?? [];
    $form = $page['form'] ?? [];
    $contactCards = $page['contact_cards'] ?? [];
    $enquiryTypes = $contact['enquiry_types'] ?? [];
    $enquiryTypesIntro = $page['enquiry_types_intro'] ?? [];
    $enquiryTypeDescriptions = $page['enquiry_type_descriptions'] ?? [];
    $whatToInclude = $page['what_to_include'] ?? [];
    $cta = $page['cta'] ?? [];
    $whatsappNumber = preg_replace('/\D+/', '', $contact['whatsapp'] ?? '');
    $phoneHref = preg_replace('/\s+/', '', $contact['phone'] ?? '');
@endphp

@extends('layouts.app')

@section('title', $page['title'] ?? 'Contact')
@section('meta_description', $page['meta_description'] ?? '')
@section('og_image', 'images/logo.png')
@section('og_image_alt', \App\Support\ViptaContent::brand()['logo_alt'] ?? 'Vipta Global logo')

@section('content')
    <section class="bg-vipta-cream">
        <div class="mx-auto grid min-h-[610px] max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 min-[900px]:grid-cols-[0.92fr_1fr] lg:min-h-[680px] lg:px-12 lg:py-24">
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
                        <x-site.list-item variant="plain">{{ $highlight }}</x-site.list-item>
                    @endforeach
                </div>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <x-site.button :href="'https://wa.me/'.$whatsappNumber">
                        {{ $cta['primary_label'] ?? 'WhatsApp Vipta' }}
                    </x-site.button>
                    <x-site.button :route="$cta['secondary_route'] ?? 'products'" variant="outline">
                        {{ $cta['secondary_label'] ?? 'Explore Products' }}
                    </x-site.button>
                </div>
            </div>

            <div class="rounded-lg border border-vipta-border bg-vipta-paper p-6 shadow-[var(--shadow-vipta-soft)] sm:p-8">
                <x-site.section-heading :eyebrow="$whatToInclude['eyebrow'] ?? ''" :heading="$whatToInclude['heading'] ?? ''" />
                <div class="mt-7 grid gap-3">
                    @foreach (($whatToInclude['items'] ?? []) as $item)
                        <x-site.list-item variant="cream">{{ $item }}</x-site.list-item>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-vipta-border bg-vipta-paper py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 min-[900px]:grid-cols-[0.92fr_1fr] lg:px-12">
            <div
                x-data="{ submitted: false, selectedEnquiry: '', descriptions: {{ \Illuminate\Support\Js::from($enquiryTypeDescriptions) }} }"
                class="rounded-lg border border-vipta-border bg-white p-6 shadow-[var(--shadow-vipta-soft)] sm:p-8 lg:p-10"
            >
                <x-site.section-heading :eyebrow="$form['eyebrow'] ?? ''" :heading="$form['heading'] ?? ''" :body="$form['intro'] ?? ''" />

                <form class="mt-8 grid gap-5" @submit.prevent="submitted = true">
                    <div>
                        <label for="name" class="text-sm font-semibold text-vipta-green">{{ $form['name_label'] ?? 'Full name' }}</label>
                        <input id="name" name="name" type="text" required class="mt-2 w-full rounded-lg border border-vipta-border bg-vipta-cream px-4 py-3 text-base text-vipta-ink outline-none transition focus:border-vipta-green focus:ring-2 focus:ring-vipta-gold/40">
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="phone" class="text-sm font-semibold text-vipta-green">{{ $form['phone_label'] ?? 'Phone / WhatsApp' }}</label>
                            <input id="phone" name="phone" type="tel" class="mt-2 w-full rounded-lg border border-vipta-border bg-vipta-cream px-4 py-3 text-base text-vipta-ink outline-none transition focus:border-vipta-green focus:ring-2 focus:ring-vipta-gold/40">
                        </div>
                        <div>
                            <label for="email" class="text-sm font-semibold text-vipta-green">{{ $form['email_label'] ?? 'Email address' }}</label>
                            <input id="email" name="email" type="email" required class="mt-2 w-full rounded-lg border border-vipta-border bg-vipta-cream px-4 py-3 text-base text-vipta-ink outline-none transition focus:border-vipta-green focus:ring-2 focus:ring-vipta-gold/40">
                        </div>
                    </div>

                    <div>
                        <label for="enquiry_type" class="text-sm font-semibold text-vipta-green">{{ $form['type_label'] ?? 'Enquiry type' }}</label>
                        <select id="enquiry_type" name="enquiry_type" required x-model="selectedEnquiry" class="mt-2 w-full rounded-lg border border-vipta-border bg-vipta-cream px-4 py-3 text-base text-vipta-ink outline-none transition focus:border-vipta-green focus:ring-2 focus:ring-vipta-gold/40">
                            <option value="">Choose an enquiry type</option>
                            @foreach ($enquiryTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                        <p x-cloak x-show="selectedEnquiry" x-transition.opacity.duration.200ms x-text="descriptions[selectedEnquiry]" class="mt-3 rounded-lg border border-vipta-border bg-vipta-cream px-4 py-3 text-sm leading-6 text-vipta-muted"></p>
                    </div>

                    <div>
                        <label for="message" class="text-sm font-semibold text-vipta-green">{{ $form['message_label'] ?? 'Message' }}</label>
                        <textarea id="message" name="message" rows="6" required placeholder="{{ $form['message_placeholder'] ?? '' }}" class="mt-2 w-full resize-y rounded-lg border border-vipta-border bg-vipta-cream px-4 py-3 text-base text-vipta-ink outline-none transition focus:border-vipta-green focus:ring-2 focus:ring-vipta-gold/40"></textarea>
                    </div>

                    <button type="submit" class="rounded-lg bg-vipta-green px-6 py-4 text-center text-sm font-semibold text-white shadow-[var(--shadow-vipta-soft)] transition hover:bg-vipta-leaf focus:outline-none focus:ring-2 focus:ring-vipta-gold focus:ring-offset-2 focus:ring-offset-white">
                        {{ $form['submit_label'] ?? 'Send Enquiry' }}
                    </button>

                    <div x-cloak x-show="submitted" x-transition class="rounded-lg border border-vipta-gold/70 bg-vipta-cream px-4 py-4 text-sm leading-6 text-vipta-muted">
                        <p class="font-semibold text-vipta-green">{{ $form['success_heading'] ?? '' }}</p>
                        <p class="mt-1">{{ $form['success_message'] ?? '' }}</p>
                    </div>
                </form>
            </div>

            <div class="grid content-start gap-5 sm:grid-cols-2">
                @foreach ($contactCards as $card)
                    @php
                        $valueKey = $card['value_key'] ?? '';
                        $value = $contact[$valueKey] ?? '';
                    @endphp

                    <x-site.text-card variant="cream">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-vipta-earth">{{ $card['label'] ?? '' }}</p>
                        <h3 class="mt-3 break-words font-display text-lg font-semibold text-vipta-green sm:text-xl">
                            @if ($valueKey === 'email')
                                <a href="mailto:{{ $value }}" class="transition hover:text-vipta-leaf">{{ $value }}</a>
                            @elseif ($valueKey === 'phone')
                                <a href="tel:{{ $phoneHref }}" class="transition hover:text-vipta-leaf">{{ $value }}</a>
                            @elseif ($valueKey === 'whatsapp')
                                <a href="https://wa.me/{{ $whatsappNumber }}" class="transition hover:text-vipta-leaf">{{ $value }}</a>
                            @else
                                {{ $value }}
                            @endif
                        </h3>
                        <p class="mt-3 text-sm leading-6 text-vipta-muted">{{ $card['description'] ?? '' }}</p>
                    </x-site.text-card>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-vipta-sage py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-12">
            <div class="grid gap-10 min-[900px]:grid-cols-[0.8fr_1fr]">
                <x-site.section-heading :eyebrow="$enquiryTypesIntro['eyebrow'] ?? ''" :heading="$enquiryTypesIntro['heading'] ?? ''" :body="$enquiryTypesIntro['body'] ?? ''" />

                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ($enquiryTypes as $type)
                        <x-site.text-card :title="$type" :body="$enquiryTypeDescriptions[$type] ?? ''" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-site.cta-section
        :heading="$cta['heading'] ?? ''"
        :body="$cta['body'] ?? ''"
        :primary-label="$cta['primary_label'] ?? 'WhatsApp Vipta'"
        :primary-href="'https://wa.me/'.$whatsappNumber"
        :secondary-label="$cta['secondary_label'] ?? 'Explore Products'"
        :secondary-route="$cta['secondary_route'] ?? 'products'"
    />
@endsection
