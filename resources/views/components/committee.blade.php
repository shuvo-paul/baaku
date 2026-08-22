{{-- Committee section: Leadership Arc — President elevated center, orbiting officers --}}
@php
    // First member is the president; next four orbit below.
    $committee = \App\Committee::all();
    $president = $committee[0];
    $officers = collect($committee)->slice(1, 4);
    $gradients = ['from-signal-orange/8 to-signal-orange-light/5', 'from-charcoal/8 to-ink/5', 'from-signal-orange-light/8 to-signal-orange/5', 'from-ink/6 to-charcoal/4'];
@endphp

<section id="committee" class="relative px-6 py-24 lg:px-12 lg:py-32 overflow-hidden">
    {{-- Ghost watermark --}}
    <div class="absolute top-8 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
        <span class="text-[72px] lg:text-[128px] font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">
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

        {{-- President — hero treatment --}}
        <div class="flex flex-col items-center mb-16 lg:mb-24">
            <div class="relative mb-8">
                <div class="w-[260px] h-[260px] lg:w-[320px] lg:h-[320px] rounded-full overflow-hidden bg-gradient-to-br from-ink/8 to-charcoal/5 border border-ink/5">
                    @isset($president['image'])
                        <img src="{{ $president['image'] }}" alt="{{ $president['name'] }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-[72px] lg:text-[96px] font-medium text-ink/15">{{ $president['initial'] }}</span>
                        </div>
                    @endisset
                </div>
                <a href="#" class="absolute -bottom-2 -right-2 w-[56px] h-[56px] rounded-full bg-white flex items-center justify-center shadow-elevated hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 text-ink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M7 17L17 7M17 7H7M17 7v10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $president['role'] }}</span>
            </div>
            <h3 class="font-display text-[24px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $president['name'] }}</h3>
        </div>

        {{-- Officers row — orbital arc connecting them --}}
        <div class="relative">
            <svg class="absolute inset-0 w-full h-full pointer-events-none hidden lg:block" viewBox="0 0 1200 400" fill="none" preserveAspectRatio="xMidYMid meet">
                <path d="M 200 150 Q 400 50 600 150 Q 800 250 1000 150" stroke="#F37338" stroke-width="1.2" fill="none" opacity="0.4"/>
            </svg>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                @foreach($officers as $officer)
                <div class="flex flex-col items-center {{ $loop->even ? 'lg:mt-8' : '' }}">
                    <div class="relative mb-6">
                        <div class="w-[180px] h-[180px] lg:w-[220px] lg:h-[220px] rounded-full overflow-hidden bg-gradient-to-br {{ $gradients[$loop->index % 4] }} border border-ink/5">
                            @isset($officer['image'])
                                <img src="{{ $officer['image'] }}" alt="{{ $officer['name'] }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[48px] lg:text-[60px] font-medium text-ink/15">{{ $officer['initial'] }}</span>
                                </div>
                            @endisset
                        </div>
                        <a href="#" class="absolute -bottom-1 -right-1 w-[44px] h-[44px] rounded-full bg-white flex items-center justify-center shadow-elevated hover:scale-105 transition-transform">
                            <svg class="w-4 h-4 text-ink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M7 17L17 7M17 7H7M17 7v10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $officer['role'] }}</span>
                    </div>
                    <h3 class="font-display text-[20px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $officer['name'] }}</h3>
                </div>
                @endforeach
            </div>
        </div>

        {{-- View All CTA --}}
        <div class="mt-16 lg:mt-24 text-center">
            <a href="{{ route('committee') }}" class="inline-flex items-center px-6 py-3 bg-ink text-canvas-cream rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:opacity-90 transition-opacity">
                সম্পূর্ণ কমিটি দেখুন
            </a>
        </div>
    </div>
</section>
