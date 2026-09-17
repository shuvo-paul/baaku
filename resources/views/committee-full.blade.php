@php
    $members = \App\Committee::all();
    $first = $members[0] ?? null;

    $remaining = array_slice($members, 1);
    $chunkSizes = [2, 3];
    $rows = [];
    $offset = 0;
    $i = 0;
    while ($offset < count($remaining)) {
        $size = $i < count($chunkSizes) ? $chunkSizes[$i] : 4;
        $rows[] = array_slice($remaining, $offset, $size);
        $offset += $size;
        $i++;
    }

    $gradients = ['from-signal-orange/8 to-signal-orange-light/5', 'from-charcoal/8 to-ink/5', 'from-signal-orange-light/8 to-signal-orange/5', 'from-ink/6 to-charcoal/4'];
@endphp

<x-layouts.app title="কার্যনির্বাহী কমিটি — বাকু">
    <x-nav />

    <main class="pt-32">
        {{-- Hero header --}}
        <section class="relative px-6 pb-16 lg:px-12 lg:pb-24 overflow-hidden">
            {{-- Ghost watermark --}}
            <div class="absolute top-0 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
                <span class="text-[72px] lg:text-[160px] font-display font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">
                    কমিটি
                </span>
            </div>

            <div class="relative z-10 max-w-[1200px] mx-auto">
                {{-- Back link --}}
                <a href="/" class="inline-flex items-center gap-2 mb-10 text-slate-gray hover:text-ink transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 5l-7 7 7 7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[14px] font-medium tracking-[-0.01em]">হোমে ফিরে যান</span>
                </a>

                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Current Committee</span>
                </div>
                <h1 class="font-display text-[36px] lg:text-[56px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance max-w-[700px]">
                    বর্তমান কার্যনির্বাহী কমিটি
                </h1>
                <p class="mt-6 text-[17px] text-slate-gray leading-[1.6] max-w-[560px]" style="font-weight: 450;">
                    বাংলা ভাষা ও সাহিত্য বিভাগ প্রাক্তন ছাত্র সমিতির কার্যনির্বাহী কমিটি।
                </p>
            </div>
        </section>

        @if($first)
        {{-- First member — elevated hero --}}
        <section class="relative px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="relative z-10 max-w-[1200px] mx-auto">
                <div class="flex flex-col items-center">
                    <div class="relative mb-8">
                        <div class="w-[260px] h-[260px] lg:w-[340px] lg:h-[340px] rounded-full overflow-hidden bg-gradient-to-br from-ink/8 to-charcoal/5 border border-ink/5">
                            @isset($first['image'])
                                <img src="{{ $first['image'] }}" alt="{{ $first['name'] }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[72px] lg:text-[100px] font-medium text-ink/15">{{ mb_substr($first['name'], 0, 1) }}</span>
                                </div>
                            @endisset
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $first['role'] }}</span>
                    </div>
                    <h2 class="font-display text-[28px] lg:text-[32px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $first['name'] }}</h2>
                </div>
            </div>
        </section>
        @endif

        {{-- Committee rows --}}
        @foreach($rows as $row)
        <section class="relative px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[1200px] mx-auto">
                <div class="flex flex-wrap justify-center gap-12 lg:gap-8">
                    @foreach($row as $member)
                    <div class="flex flex-col items-center w-[180px] lg:w-[220px]">
                        <div class="relative mb-6">
                            <div class="w-[180px] h-[180px] lg:w-[220px] lg:h-[220px] rounded-full overflow-hidden bg-gradient-to-br {{ ($member['vacant'] ?? false) ? 'from-dust-taupe/10 to-dust-taupe/5' : $gradients[$loop->index % 4] }} border {{ ($member['vacant'] ?? false) ? 'border-dust-taupe/30' : 'border-ink/5' }}">
                                @isset($member['image'])
                                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-[48px] lg:text-[60px] font-medium {{ ($member['vacant'] ?? false) ? 'text-dust-taupe' : 'text-ink/15' }}">{{ mb_substr($member['name'], 0, 1) }}</span>
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-1.5 h-1.5 rounded-full {{ ($member['vacant'] ?? false) ? 'bg-dust-taupe' : 'bg-signal-orange-light' }}"></span>
                            <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $member['role'] }}</span>
                        </div>
                        <h3 class="font-display text-[20px] font-medium leading-[1.2] tracking-[-0.02em] {{ ($member['vacant'] ?? false) ? 'text-dust-taupe' : 'text-ink' }} text-center">{{ $member['name'] }}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach
    </main>

    <x-footer />
</x-layouts.app>
