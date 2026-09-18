<nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[calc(100%-48px)] max-w-[1200px]" x-data="{ open: false }">
    <div class="bg-white shadow-nav rounded-[999px] px-10 py-4 flex items-center justify-between">
        {{-- Logo --}}
        <a href="/" class="flex items-center gap-3 shrink-0">
            <img src="/logo.png" alt="বাকু" class="w-10 h-10 object-contain">
            <span class="font-medium text-[15px] tracking-[-0.03em] text-ink hidden lg:block">বাকু</span>
        </a>

        {{-- Desktop Nav Links --}}
        <div class="hidden lg:flex items-center gap-12">
            <a href="/" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">হোম</a><a href="{{ route('about') }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">আমরা যেমন</a>
            <a href="{{ route('constitution') }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">গঠনতন্ত্র</a>
            <a href="#contact" class="font-medium text-[16px] tracking-[-0.03em] text-ink hover:opacity-70 transition-opacity">যোগাযোগ</a>
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
            <button class="lg:hidden w-12 h-12 rounded-full flex items-center justify-center hover:bg-soft-bone transition-colors" aria-label="মেনু" @click="open = !open">
                <svg x-show="!open" class="w-5 h-5 text-ink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round"/>
                </svg>
                <svg x-show="open" x-cloak class="w-5 h-5 text-ink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Panel --}}
    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" @click.outside="open = false" class="mt-3 bg-white shadow-nav rounded-[24px] px-10 py-6 flex flex-col gap-6 lg:hidden">
        <a href="/" class="font-medium text-[16px] tracking-[-0.03em] text-ink">হোম</a>
        <a href="{{ route('about') }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink">আমরা যেমন</a>
        <a href="{{ route('constitution') }}" class="font-medium text-[16px] tracking-[-0.03em] text-ink">গঠনতন্ত্র</a>
        <a href="#contact" class="font-medium text-[16px] tracking-[-0.03em] text-ink">যোগাযোগ</a>
    </div>
</nav>
