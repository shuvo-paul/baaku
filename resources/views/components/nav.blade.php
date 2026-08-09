<nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[calc(100%-48px)] max-w-[1200px]">
    @php $content = \App\Models\Content::values(); @endphp
    <div class="bg-white shadow-nav rounded-[999px] px-10 py-4 flex items-center justify-between">
        {{-- Logo --}}
        <a href="/" class="flex items-center gap-3 shrink-0">
            <img src="/logo.png" alt="{{ $content['nav.brand'] ?? '' }}" class="w-10 h-10 object-contain">
            <span class="font-medium text-[15px] tracking-[-0.03em] text-ink hidden lg:block">{{ $content['nav.brand'] ?? '' }}</span>
        </a>

        {{-- Desktop Nav Links --}}
        <div class="hidden lg:flex items-center gap-12">
            <a href="{{ $content['nav.home_url'] ?? '' }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">{{ $content['nav.home_label'] ?? '' }}</a>
            <a href="{{ $content['nav.about_url'] ?? '' }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">{{ $content['nav.about_label'] ?? '' }}</a>
            <a href="{{ $content['nav.events_url'] ?? '' }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">{{ $content['nav.events_label'] ?? '' }}</a>
            <a href="{{ $content['nav.contact_url'] ?? '' }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">{{ $content['nav.contact_label'] ?? '' }}</a>
        </div>

        {{-- Right: Search + Mobile Menu --}}
        <div class="flex items-center gap-3">
            {{-- Search Button --}}
            <button class="w-12 h-12 rounded-full flex items-center justify-center hover:bg-soft-bone transition-colors" aria-label="অনুসন্ধান">
                <svg class="w-5 h-5 text-ink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.3-4.3" stroke-linecap="round"/>
                </svg>
            </button>

            {{-- Mobile Hamburger --}}
            <button class="lg:hidden w-12 h-12 rounded-full flex items-center justify-center hover:bg-soft-bone transition-colors" aria-label="মেনু" x-data="{ open: false }" @click="open = !open">
                <svg class="w-5 h-5 text-ink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>
</nav>
