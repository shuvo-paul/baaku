<section id="join" class="px-6 py-24 lg:px-12 lg:py-32">
    @php $content = \App\Models\Content::values(); @endphp
    <div class="bg-ink rounded-[40px] px-8 py-16 lg:px-20 lg:py-20 text-center">
        {{-- Eyebrow --}}
        <div class="flex items-center justify-center gap-2 mb-6">
            <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
            <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-dust-taupe">{{ $content['cta.eyebrow'] ?? '' }}</span>
        </div>

        <h2 class="text-[36px] lg:text-[56px] font-medium leading-[1.1] tracking-[-0.02em] text-canvas-cream mb-6 text-balance max-w-[700px] mx-auto">
            {{ $content['cta.heading'] ?? '' }}
        </h2>

        <p class="text-[16px] lg:text-[18px] text-dust-taupe leading-[1.5] mb-10 max-w-[550px] mx-auto" style="font-weight: 450;">
            {{ $content['cta.body'] ?? '' }}
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ $content['cta.primary_url'] ?? '' }}" class="inline-flex items-center px-8 py-4 bg-canvas-cream text-ink rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:opacity-90 transition-opacity">
                {{ $content['cta.primary_label'] ?? '' }}
            </a>
            <a href="{{ $content['cta.secondary_url'] ?? '' }}" class="inline-flex items-center px-8 py-4 border-[1.5px] border-canvas-cream/30 text-canvas-cream rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:bg-canvas-cream/10 transition-colors">
                {{ $content['cta.secondary_label'] ?? '' }}
            </a>
        </div>
    </div>
</section>
