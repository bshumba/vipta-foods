@props([
    'question' => '',
    'answer' => '',
    'open' => false,
])

<article
    x-data="{ open: @js($open) }"
    class="rounded-lg border border-vipta-border bg-vipta-paper shadow-sm transition duration-200 hover:shadow-[var(--shadow-vipta-soft)]"
>
    <button
        type="button"
        class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left focus:outline-none focus:ring-2 focus:ring-vipta-gold focus:ring-offset-2 focus:ring-offset-vipta-paper sm:px-6"
        :aria-expanded="open.toString()"
        @click="open = ! open"
    >
        <span class="font-display text-xl font-semibold text-vipta-green sm:text-2xl">{{ $question }}</span>
        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-vipta-border bg-vipta-cream text-vipta-green transition duration-200" :class="{ 'rotate-45': open }" aria-hidden="true">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
        </span>
    </button>

    <div x-cloak x-show="open" x-transition.opacity.duration.200ms>
        <p class="border-t border-vipta-border px-5 py-4 text-sm leading-6 text-vipta-muted sm:px-6">
            {{ $answer }}
        </p>
    </div>
</article>
