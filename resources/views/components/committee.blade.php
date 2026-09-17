@php
    $committee = \App\Committee::all();
    $first = $committee[0] ?? null;
    $others = collect($committee)->slice(1, 4);
    $gradients = ['from-signal-orange/8 to-signal-orange-light/5', 'from-charcoal/8 to-ink/5', 'from-signal-orange-light/8 to-signal-orange/5', 'from-ink/6 to-charcoal/4'];
@endphp

<section id="committee" class="relative px-6 py-24 lg:px-12 lg:py-32 overflow-hidden">
    {{-- Ghost watermark --}}
    <div class="absolute top-8 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
        <span class="text-[72px] lg:text-[128px] font-display font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">
            কমিটি
        </span>
    </div>

    <div class="relative z-10 max-w-[1200px] mx-auto">
        {{-- Header --}}
        <div class="mb-16 lg:mb-24 max-w-[600px]">
            <div class="flex items-center gap-2 mb-6">
                <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Current Committee</span>
            </div>
            <h2 class="font-display text-[36px] lg:text-[48px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance">
                বর্তমান কার্যনির্বাহী কমিটি
            </h2>
        </div>

        @if($first)
        {{-- First member — hero treatment --}}
        <div class="flex flex-col items-center mb-16 lg:mb-24">
            <div class="relative mb-8">
                <div class="w-[260px] h-[260px] lg:w-[320px] lg:h-[320px] rounded-full overflow-hidden bg-gradient-to-br from-ink/8 to-charcoal/5 border border-ink/5">
                    @isset($first['image'])
                        <img src="{{ $first['image'] }}" alt="{{ $first['name'] }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-[72px] lg:text-[96px] font-medium text-ink/15">{{ mb_substr($first['name'], 0, 1) }}</span>
                        </div>
                    @endisset
                </div>
            </div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $first['role'] }}</span>
            </div>
            <h3 class="font-display text-[24px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $first['name'] }}</h3>
        </div>
        @endif

        @if($others->isNotEmpty())
        {{-- Next members — centered row --}}
        <div class="flex flex-wrap justify-center gap-12 lg:gap-8">
            @foreach($others as $member)
            <div class="flex flex-col items-center">
                <div class="relative mb-6">
                    <div class="w-[180px] h-[180px] lg:w-[220px] lg:h-[220px] rounded-full overflow-hidden bg-gradient-to-br {{ $gradients[$loop->index % 4] }} border border-ink/5">
                        @isset($member['image'])
                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-[48px] lg:text-[60px] font-medium text-ink/15">{{ mb_substr($member['name'], 0, 1) }}</span>
                            </div>
                        @endisset
                    </div>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $member['role'] }}</span>
                </div>
                <h3 class="font-display text-[20px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $member['name'] }}</h3>
            </div>
            @endforeach
        </div>
        @endif

        {{-- View All CTA --}}
        <div class="mt-16 lg:mt-24 text-center">
            <a href="{{ route('committee') }}" class="inline-flex items-center px-6 py-3 bg-ink text-canvas-cream rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:opacity-90 transition-opacity">
                সম্পূর্ণ কমিটি দেখুন
            </a>
        </div>
    </div>
</section>
