<section id="home" class="px-6 pt-28 pb-16 lg:px-12 lg:pt-32 lg:pb-24">
    @php $content = \App\Models\Content::values(); @endphp
    <div class="relative bg-ink rounded-[40px] overflow-hidden min-h-[60vh] lg:min-h-[70vh] flex items-center">
        {{-- Background decorative pattern --}}
        <div class="absolute inset-0 opacity-[0.03]">
            <svg class="w-full h-full" viewBox="0 0 1200 800" fill="none" xmlns="http://www.w3.org/2000/svg">
                <text x="50" y="200" font-size="200" fill="white" font-weight="700" opacity="0.5">বাংলা</text>
                <text x="300" y="450" font-size="300" fill="white" font-weight="700" opacity="0.3">সাহিত্য</text>
                <text x="100" y="650" font-size="150" fill="white" font-weight="700" opacity="0.4">ভাষা</text>
            </svg>
        </div>

        {{-- Content --}}
        <div class="relative z-10 px-8 py-16 lg:px-20 lg:py-20 max-w-[900px]">
            {{-- Eyebrow --}}
            <div class="flex items-center gap-2 mb-6">
                <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-dust-taupe">{{ $content['hero.eyebrow'] ?? '' }}</span>
            </div>

            {{-- Headline --}}
            <h1 class="font-display text-[40px] lg:text-[64px] font-medium leading-[1] tracking-[-0.02em] text-canvas-cream mb-6 text-balance">
                {{ $content['hero.headline'] ?? '' }}
            </h1>

            {{-- Subtitle --}}
            <p class="text-[18px] lg:text-[20px] font-normal leading-[1.5] text-dust-taupe mb-10 max-w-[600px]">
                {{ $content['hero.subtitle'] ?? '' }}
            </p>

            {{-- CTAs --}}
            <div class="flex flex-wrap gap-4">
                <a href="{{ $content['hero.cta_primary_url'] ?? '' }}" class="inline-flex items-center px-6 py-3 bg-canvas-cream text-ink rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:opacity-90 transition-opacity">
                    {{ $content['hero.cta_primary_label'] ?? '' }}
                </a>
                <a href="{{ $content['hero.cta_secondary_url'] ?? '' }}" class="inline-flex items-center px-6 py-3 border-[1.5px] border-canvas-cream/40 text-canvas-cream rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:bg-canvas-cream/10 transition-colors">
                    {{ $content['hero.cta_secondary_label'] ?? '' }}
                </a>
            </div>
        </div>

        {{-- Decorative circles (right side) --}}
        <div class="hidden lg:block absolute right-20 top-1/2 -translate-y-1/2">
            <div class="relative">
                {{-- Large circle --}}
                <div class="w-[280px] h-[280px] rounded-full bg-gradient-to-br from-signal-orange/20 to-signal-orange-light/10 border border-canvas-cream/10"></div>
                {{-- Medium circle overlapping --}}
                <div class="absolute -left-16 top-20 w-[200px] h-[200px] rounded-full bg-gradient-to-br from-signal-orange-light/15 to-transparent border border-canvas-cream/8"></div>
                {{-- Small accent circle --}}
                <div class="absolute -left-8 -top-8 w-[80px] h-[80px] rounded-full bg-signal-orange/10 border border-canvas-cream/5"></div>
            </div>
        </div>
    </div>
</section>
