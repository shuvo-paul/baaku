<section class="px-6 py-24 lg:px-12 lg:py-32">
    @php $content = \App\Models\Content::values(); @endphp
    <div class="max-w-[1200px] mx-auto">
        {{-- Eyebrow --}}
        <div class="flex items-center gap-2 mb-6">
            <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
            <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">{{ $content['stats.eyebrow'] ?? '' }}</span>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            @foreach ([1, 2, 3, 4] as $i)
                <div>
                    <span class="text-[48px] lg:text-[64px] font-medium leading-[1] tracking-[-0.02em] text-ink">{{ $content["stats.value_{$i}"] ?? '' }}</span>
                    <p class="text-[16px] text-slate-gray mt-3" style="font-weight: 450;">{{ $content["stats.label_{$i}"] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
