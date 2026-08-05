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
                <h1 class="text-[36px] lg:text-[56px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance max-w-[700px]">
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
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-[72px] lg:text-[100px] font-medium text-ink/15">লা</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">সভাপতি (ভারপ্রাপ্ত)</span>
                    </div>
                    <h2 class="text-[28px] lg:text-[32px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">লাবণ্য</h2>
                </div>
            </div>
        </section>

        {{-- Officers grid --}}
        <section class="relative px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[1200px] mx-auto">
                {{-- Section label --}}
                <div class="mb-12 lg:mb-16">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Officers</span>
                    </div>
                    <h2 class="text-[28px] lg:text-[36px] font-medium leading-[1.15] tracking-[-0.02em] text-ink">
                        প্রধান কর্মকর্তাবৃন্দ
                    </h2>
                </div>

                {{-- Orbital arc --}}
                <div class="relative">
                    <svg class="absolute inset-0 w-full h-full pointer-events-none hidden lg:block" viewBox="0 0 1200 300" fill="none" preserveAspectRatio="xMidYMid meet">
                        <path d="M 100 120 Q 350 30 600 120 Q 850 210 1100 120" stroke="#F37338" stroke-width="1.2" fill="none" opacity="0.35"/>
                    </svg>

                    <div class="grid grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-6">
                        @php
                        $officers = [
                            ['initial' => 'লি', 'role' => 'সহ-সভাপতি', 'name' => 'লিওন', 'gradient' => 'from-signal-orange/8 to-signal-orange-light/5', 'offset' => false],
                            ['initial' => 'সু', 'role' => 'সহ-সভাপতি', 'name' => 'সুফল', 'gradient' => 'from-signal-orange-light/8 to-signal-orange/5', 'offset' => true],
                            ['initial' => 'লা', 'role' => 'সাধারণ সম্পাদক', 'name' => 'লাবণ্য', 'gradient' => 'from-charcoal/8 to-ink/5', 'offset' => false],
                            ['initial' => 'ক', 'role' => 'যুগ্ম-সাধারণ সম্পাদক', 'name' => 'কনক', 'gradient' => 'from-signal-orange-light/8 to-signal-orange/5', 'offset' => true],
                            ['initial' => 'সা', 'role' => 'কোষাধ্যক্ষ', 'name' => 'সাগর', 'gradient' => 'from-ink/6 to-charcoal/4', 'offset' => false],
                        ];
                        @endphp

                        @foreach($officers as $officer)
                        <div class="flex flex-col items-center {{ $officer['offset'] ? 'lg:mt-10' : '' }}">
                            <div class="relative mb-6">
                                <div class="w-[180px] h-[180px] lg:w-[220px] lg:h-[220px] rounded-full overflow-hidden bg-gradient-to-br {{ $officer['gradient'] }} border border-ink/5">
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-[48px] lg:text-[60px] font-medium text-ink/15">{{ $officer['initial'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                                <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">{{ $officer['role'] }}</span>
                            </div>
                            <h3 class="text-[20px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $officer['name'] }}</h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Secretaries --}}
        <section class="relative px-6 pb-20 lg:px-12 lg:pb-28 bg-lifted-cream">
            <div class="max-w-[1200px] mx-auto pt-20 lg:pt-28">
                <div class="mb-12 lg:mb-16">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Secretaries</span>
                    </div>
                    <h2 class="text-[28px] lg:text-[36px] font-medium leading-[1.15] tracking-[-0.02em] text-ink">
                        বিভাগীয় সম্পাদকবৃন্দ
                    </h2>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-8">
                    @php
                    $secretaries = [
                        ['initial' => 'কি', 'role' => 'সাংগঠনিক সম্পাদক', 'name' => 'কিশোর'],
                        ['initial' => 'শা', 'role' => 'দপ্তর সম্পাদক', 'name' => 'শাহরিয়ার'],
                        ['initial' => 'তা', 'role' => 'সাংস্কৃতিক বিষয়ক সম্পাদক', 'name' => 'তাওসিফ'],
                        ['initial' => 'রু', 'role' => 'ক্রীড়া বিষয়ক সম্পাদক', 'name' => 'রুবেল'],
                        ['initial' => 'হ্যা', 'role' => 'আন্তর্জাতিক যোগাযোগ, প্রচার ও সংযোগ বিষয়ক সম্পাদক', 'name' => 'হ্যাপি'],
                        ['initial' => '—', 'role' => 'শিক্ষার্থী কল্যাণ বিষয়ক সম্পাদক', 'name' => 'শূন্য আসন', 'vacant' => true],
                        ['initial' => '—', 'role' => 'সাহিত্য, গবেষণা ও প্রকাশনা সম্পাদক', 'name' => 'শূন্য আসন', 'vacant' => true],
                        ['initial' => '—', 'role' => 'মিডিয়া ও প্রচার বিষয়ক সম্পাদক', 'name' => 'শূন্য আসন', 'vacant' => true],
                    ];
                    @endphp

                    @foreach($secretaries as $sec)
                    <div class="flex flex-col items-center">
                        <div class="relative mb-5">
                            <div class="w-[140px] h-[140px] lg:w-[170px] lg:h-[170px] rounded-full overflow-hidden border {{ $sec['vacant'] ?? false ? 'bg-dust-taupe/20 border-dust-taupe/30' : 'bg-gradient-to-br from-charcoal/6 to-ink/4 border-ink/5' }}">
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[40px] lg:text-[50px] font-medium {{ $sec['vacant'] ?? false ? 'text-dust-taupe' : 'text-ink/15' }}">{{ $sec['initial'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 mb-1.5">
                            <span class="w-1.5 h-1.5 rounded-full {{ $sec['vacant'] ?? false ? 'bg-dust-taupe' : 'bg-signal-orange-light' }}"></span>
                            <span class="uppercase text-[11px] font-bold tracking-[0.04em] text-slate-gray">{{ $sec['role'] }}</span>
                        </div>
                        <h3 class="text-[17px] font-medium leading-[1.2] tracking-[-0.02em] {{ $sec['vacant'] ?? false ? 'text-dust-taupe' : 'text-ink' }} text-center">{{ $sec['name'] }}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Executive Members --}}
        <section class="relative px-6 py-20 lg:px-12 lg:py-28">
            <div class="max-w-[1200px] mx-auto">
                <div class="mb-12 lg:mb-16">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Members</span>
                    </div>
                    <h2 class="text-[28px] lg:text-[36px] font-medium leading-[1.15] tracking-[-0.02em] text-ink">
                        কার্যনির্বাহী সদস্যবৃন্দ
                    </h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8 lg:gap-6">
                    @php
                    $members = [
                        ['initial' => 'না', 'name' => 'নাফিসা'],
                        ['initial' => 'সো', 'name' => 'সোনিয়া'],
                        ['initial' => 'আমি', 'name' => 'আমিনুর'],
                        ['initial' => 'আহ', 'name' => 'আহসান'],
                        ['initial' => 'অ', 'name' => 'অভিজিৎ'],
                        ['initial' => 'আবি', 'name' => 'আবিদ'],
                        ['initial' => 'আসা', 'name' => 'আসাদ'],
                        ['initial' => 'স্ম', 'name' => 'স্মরণ'],
                    ];
                    @endphp

                    @foreach($members as $member)
                    <div class="flex flex-col items-center">
                        <div class="relative mb-4">
                            <div class="w-[110px] h-[110px] lg:w-[130px] lg:h-[130px] rounded-full overflow-hidden bg-gradient-to-br from-ink/5 to-charcoal/3 border border-ink/5">
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[32px] lg:text-[40px] font-medium text-ink/15">{{ $member['initial'] }}</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-[15px] font-medium leading-[1.2] tracking-[-0.02em] text-ink text-center">{{ $member['name'] }}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-layouts.app>
