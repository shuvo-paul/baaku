<section id="announcement" class="px-6 pb-16 lg:px-12 lg:pb-24">
    @php $content = \App\Models\Content::values(); @endphp
    <div class="max-w-[1200px] mx-auto">
        <div class="bg-ink rounded-[40px] overflow-hidden">
            <div class="px-8 py-10 lg:px-16 lg:py-12 flex flex-col lg:flex-row lg:items-center gap-8 lg:gap-16">
                {{-- Date stamp --}}
                <div class="flex items-center gap-6 lg:gap-0 lg:flex-col lg:text-center shrink-0 lg:w-[140px]">
                    <div class="relative flex items-center justify-center" aria-hidden="true">
                        <span class="relative w-3 h-3 rounded-full bg-signal-orange-light pulse-dot"></span>
                    </div>
                    <div class="lg:mt-4">
                        <span class="text-[12px] font-bold uppercase tracking-[0.04em] text-signal-orange-light block lg:mb-1">{{ $content['announcement.month'] ?? '' }}</span>
                        <span class="text-[48px] lg:text-[56px] font-medium leading-none tracking-[-0.02em] text-canvas-cream block">{{ $content['announcement.day'] ?? '' }}</span>
                        <span class="text-[13px] text-dust-taupe block mt-1">{{ $content['announcement.year'] ?? '' }}</span>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="hidden lg:block w-px h-24 bg-canvas-cream/10 shrink-0" aria-hidden="true"></div>

                {{-- Content --}}
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-dust-taupe">{{ $content['announcement.label'] ?? '' }}</span>
                    </div>
                    <h2 class="font-display text-[24px] lg:text-[28px] font-medium leading-[1.2] tracking-[-0.02em] text-canvas-cream mb-3">
                        {{ $content['announcement.title'] ?? '' }}
                    </h2>
                    <p class="text-[15px] text-dust-taupe leading-[1.5] mb-6 max-w-[550px]" style="font-weight: 450;">
                        {{ $content['announcement.body'] ?? '' }}
                    </p>
                    <a href="{{ $content['announcement.cta_url'] ?? '' }}" class="inline-flex items-center gap-2 text-canvas-cream font-medium text-[16px] tracking-[-0.02em] hover:text-signal-orange-light transition-colors group">
                        {{ $content['announcement.cta_label'] ?? '' }}
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
