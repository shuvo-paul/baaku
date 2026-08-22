@php
    // First member is the president.
    $members = \App\Committee::all();
    $president = $members[0];

    $rows = [
        [
            'roles' => ['সহ-সভাপতি'],
            'columns' => 2,
            'narrow' => true,
            'curve' => 'M 200 120 Q 400 30 600 120 Q 800 210 1000 120',
            'gradients' => ['from-signal-orange/8 to-signal-orange-light/5', 'from-signal-orange-light/8 to-signal-orange/5'],
        ],
        [
            'roles' => ['সাধারণ সম্পাদক', 'যুগ্ম-সাধারণ সম্পাদক', 'কোষাধ্যক্ষ'],
            'columns' => 3,
            'curve' => 'M 200 120 Q 400 210 600 120 Q 800 30 1000 120',
            'gradients' => ['from-charcoal/8 to-ink/5', 'from-signal-orange-light/8 to-signal-orange/5', 'from-ink/6 to-charcoal/4'],
        ],
        [
            'roles' => ['সাংগঠনিক সম্পাদক', 'দপ্তর সম্পাদক', 'সাংস্কৃতিক বিষয়ক সম্পাদক', 'ক্রীড়া বিষয়ক সম্পাদক'],
            'columns' => 4,
            'curve' => 'M 100 120 Q 350 30 600 120 Q 850 210 1100 120',
            'gradients' => ['from-signal-orange/8 to-signal-orange-light/5', 'from-charcoal/8 to-ink/5', 'from-signal-orange-light/8 to-signal-orange/5', 'from-ink/6 to-charcoal/4'],
        ],
        [
            'roles' => ['আন্তর্জাতিক যোগাযোগ, প্রচার ও সংযোগ বিষয়ক সম্পাদক', 'শিক্ষার্থী কল্যাণ বিষয়ক সম্পাদক', 'সাহিত্য, গবেষণা ও প্রকাশনা সম্পাদক', 'মিডিয়া ও প্রচার বিষয়ক সম্পাদক'],
            'columns' => 4,
            'curve' => 'M 100 120 Q 350 30 600 120 Q 850 210 1100 120',
            'gradients' => ['from-signal-orange/8 to-signal-orange-light/5'],
        ],
        [
            'roles' => ['কার্যনির্বাহী সদস্য'],
            'columns' => 4,
            'curve' => 'M 100 120 Q 350 30 600 120 Q 850 210 1100 120',
            'gradients' => ['from-signal-orange/8 to-signal-orange-light/5', 'from-charcoal/8 to-ink/5', 'from-signal-orange-light/8 to-signal-orange/5', 'from-ink/6 to-charcoal/4'],
        ],
    ];

    $rest = collect($members)->slice(1);
    $grid = [2 => 'lg:grid-cols-2', 3 => 'lg:grid-cols-3', 4 => 'lg:grid-cols-4'];
@endphp

<x-layouts.app title="কার্যনির্বাহী কমিটি — বাকু">
    <x-nav />

    <main class="pt-32">
        {{-- Hero header --}}
        <section class="relative px-6 pb-16 lg:px-12 lg:pb-24 overflow-hidden">
            {{-- Ghost watermark --}}
            <div class="absolute top-0 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
                <span class="text-[72px] lg:text-[160px] font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">
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

        {{-- President — elevated hero --}}
        <section class="relative px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="relative z-10 max-w-[1200px] mx-auto">
                <div class="flex flex-col items-center">
                    <div class="relative mb-8">
                        <div class="w-[260px] h-[260px] lg:w-[340px] lg:h-[340px] rounded-full overflow-hidden bg-gradient-to-br from-ink/8 to-charcoal/5 border border-ink/5">
                            @isset($president['image'])
                                <img src="{{ $president['image'] }}" alt="{{ $president['name'] }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[72px] lg:text-[100px] font-medium text-ink/15">{{ $president['initial'] }}</span>
                                </div>
                            @endisset
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $president['role'] }}</span>
                    </div>
                    <h2 class="font-display text-[28px] lg:text-[32px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $president['name'] }}</h2>
                </div>
            </div>
        </section>

        {{-- Committee rows --}}
        @foreach($rows as $row)
        @php $rowMembers = $rest->whereIn('role', $row['roles'])->values(); @endphp
        <section class="relative px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[1200px] mx-auto">
                <div class="relative">
                    <svg class="absolute inset-0 w-full h-full pointer-events-none hidden lg:block" viewBox="0 0 1200 300" fill="none" preserveAspectRatio="xMidYMid meet">
                        <path d="{{ $row['curve'] }}" stroke="#F37338" stroke-width="1.2" fill="none" opacity="0.35"/>
                    </svg>

                    <div class="grid grid-cols-2 {{ $grid[$row['columns']] ?? 'lg:grid-cols-4' }} gap-12 lg:gap-6 {{ ($row['narrow'] ?? false) ? 'max-w-[560px] mx-auto' : '' }}">
                        @foreach($rowMembers as $member)
                        <div class="flex flex-col items-center {{ $loop->even ? 'lg:mt-10' : '' }}">
                            <div class="relative mb-6">
                                <div class="w-[180px] h-[180px] lg:w-[220px] lg:h-[220px] rounded-full overflow-hidden bg-gradient-to-br {{ ($member['vacant'] ?? false) ? 'from-dust-taupe/10 to-dust-taupe/5' : $row['gradients'][$loop->index % count($row['gradients'])] }} border {{ ($member['vacant'] ?? false) ? 'border-dust-taupe/30' : 'border-ink/5' }}">
                                    @isset($member['image'])
                                        <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="text-[48px] lg:text-[60px] font-medium {{ ($member['vacant'] ?? false) ? 'text-dust-taupe' : 'text-ink/15' }}">{{ $member['initial'] }}</span>
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
            </div>
        </section>
        @endforeach
    </main>

    <x-footer />
</x-layouts.app>
