<x-layouts.app title="কার্যনির্বাহী কমিটি — বাকু">
    <x-nav />

    <main class="pt-32">
        {{-- Hero header --}}
        <section class="relative px-6 pb-12 lg:px-12 lg:pb-20 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
                <span class="text-[72px] lg:text-[160px] font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">
                    কমিটি
                </span>
            </div>

            <div class="relative z-10 max-w-[1200px] mx-auto">
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
            </div>
        </section>

        {{-- All members as uniform grid of cards --}}
        <section class="px-6 pb-24 lg:px-12 lg:pb-32">
            <div class="max-w-[1200px] mx-auto">

                {{-- President — wide card --}}
                <div class="bg-ink rounded-[40px] px-8 py-10 lg:px-14 lg:py-14 mb-10 flex flex-col lg:flex-row items-center lg:items-start gap-8">
                    <div class="w-[180px] h-[180px] lg:w-[200px] lg:h-[200px] rounded-full overflow-hidden bg-ink border border-white/10 shrink-0">
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-[64px] lg:text-[72px] font-medium text-white/15">লা</span>
                        </div>
                    </div>
                    <div class="text-center lg:text-left lg:pt-6">
                        <div class="flex items-center gap-2 mb-2 justify-center lg:justify-start">
                            <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                            <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-canvas-cream/60">সভাপতি (ভারপ্রাপ্ত)</span>
                        </div>
                        <h2 class="text-[32px] lg:text-[44px] font-medium leading-[1.1] tracking-[-0.02em] text-canvas-cream mb-3">লাবণ্য</h2>
                        <a href="#" class="inline-flex items-center gap-2 text-canvas-cream/70 hover:text-canvas-cream transition-colors text-[14px]" style="font-weight: 450;">
                            প্রোফাইল দেখুন
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M7 17L17 7M17 7H7M17 7v10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Officers & Secretaries — uniform card grid --}}
                @php
                $allMembers = [
                    ['initial' => 'লি', 'role' => 'সহ-সভাপতি', 'name' => 'লিওন', 'accent' => true],
                    ['initial' => 'সু', 'role' => 'সহ-সভাপতি', 'name' => 'সুফল', 'accent' => true],
                    ['initial' => 'লা', 'role' => 'সাধারণ সম্পাদক', 'name' => 'লাবণ্য', 'accent' => true],
                    ['initial' => 'ক', 'role' => 'যুগ্ম-সাধারণ সম্পাদক', 'name' => 'কনক', 'accent' => true],
                    ['initial' => 'সা', 'role' => 'কোষাধ্যক্ষ', 'name' => 'সাগর', 'accent' => true],
                    ['initial' => 'কি', 'role' => 'সাংগঠনিক সম্পাদক', 'name' => 'কিশোর'],
                    ['initial' => 'শা', 'role' => 'দপ্তর সম্পাদক', 'name' => 'শাহরিয়ার'],
                    ['initial' => 'তা', 'role' => 'সাংস্কৃতিক বিষয়ক সম্পাদক', 'name' => 'তাওসিফ'],
                    ['initial' => 'রু', 'role' => 'ক্রীড়া বিষয়ক সম্পাদক', 'name' => 'রুবেল'],
                    ['initial' => 'হ্যা', 'role' => 'আন্তর্জাতিক যোগাযোগ, প্রচার ও সংযোগ বিষয়ক সম্পাদক', 'name' => 'হ্যাপি'],
                ];
                @endphp

                <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-5 mb-10">
                    @foreach($allMembers as $m)
                    <div class="bg-lifted-cream rounded-[24px] p-5 lg:p-6 flex flex-col items-center text-center hover:shadow-elevated transition-shadow">
                        <div class="w-[80px] h-[80px] lg:w-[100px] lg:h-[100px] rounded-full overflow-hidden {{ $m['accent'] ?? false ? 'bg-gradient-to-br from-signal-orange/8 to-signal-orange-light/5' : 'bg-gradient-to-br from-ink/5 to-charcoal/3' }} border border-ink/5 mb-4">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-[28px] lg:text-[36px] font-medium text-ink/15">{{ $m['initial'] }}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="w-1 h-1 rounded-full bg-signal-orange-light"></span>
                            <span class="uppercase text-[10px] font-bold tracking-[0.04em] text-slate-gray">{{ $m['role'] }}</span>
                        </div>
                        <h3 class="text-[15px] font-medium leading-[1.2] tracking-[-0.02em] text-ink">{{ $m['name'] }}</h3>
                    </div>
                    @endforeach
                </div>

                {{-- Vacant positions --}}
                @php
                $vacant = [
                    ['role' => 'শিক্ষার্থী কল্যাণ বিষয়ক সম্পাদক'],
                    ['role' => 'সাহিত্য, গবেষণা ও প্রকাশনা সম্পাদক'],
                    ['role' => 'মিডিয়া ও প্রচার বিষয়ক সম্পাদক'],
                ];
                @endphp

                <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-5 mb-10">
                    @foreach($vacant as $v)
                    <div class="rounded-[24px] p-5 lg:p-6 flex flex-col items-center text-center border border-dashed border-dust-taupe/40 opacity-50">
                        <div class="w-[80px] h-[80px] lg:w-[100px] lg:h-[100px] rounded-full bg-dust-taupe/10 border border-dust-taupe/20 mb-4">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-[28px] lg:text-[36px] font-medium text-dust-taupe">—</span>
                            </div>
                        </div>
                        <span class="uppercase text-[10px] font-bold tracking-[0.04em] text-dust-taupe mb-1">{{ $v['role'] }}</span>
                        <h3 class="text-[15px] font-medium leading-[1.2] tracking-[-0.02em] text-dust-taupe">শূন্য আসন</h3>
                    </div>
                    @endforeach
                </div>

                {{-- Executive Members --}}
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

                <div class="mt-16">
                    <div class="flex items-center gap-2 mb-6">
                        <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-slate-gray">Executive Members</span>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
                        @foreach($members as $member)
                        <div class="flex flex-col items-center text-center">
                            <div class="w-[64px] h-[64px] rounded-full overflow-hidden bg-gradient-to-br from-ink/5 to-charcoal/3 border border-ink/5 mb-2">
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[20px] font-medium text-ink/15">{{ $member['initial'] }}</span>
                                </div>
                            </div>
                            <h3 class="text-[13px] font-medium leading-[1.2] tracking-[-0.01em] text-ink">{{ $member['name'] }}</h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-layouts.app>
