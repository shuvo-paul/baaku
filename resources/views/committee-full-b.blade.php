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

        {{-- Full list — editorial table style --}}
        <section class="px-6 pb-24 lg:px-12 lg:pb-32">
            <div class="max-w-[1200px] mx-auto">

                {{-- President row --}}
                <div class="flex items-center gap-6 lg:gap-10 py-10 border-b border-ink/10">
                    <div class="w-[100px] h-[100px] lg:w-[140px] lg:h-[140px] rounded-full overflow-hidden bg-gradient-to-br from-ink/8 to-charcoal/5 border border-ink/5 shrink-0">
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-[36px] lg:text-[52px] font-medium text-ink/15">লা</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                            <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">সভাপতি (ভারপ্রাপ্ত)</span>
                        </div>
                        <h2 class="text-[24px] lg:text-[32px] font-medium leading-[1.15] tracking-[-0.02em] text-ink">লাবণ্য</h2>
                    </div>
                </div>

                {{-- Officers rows --}}
                @php
                $officers = [
                    ['initial' => 'লি', 'role' => 'সহ-সভাপতি', 'name' => 'লিওন'],
                    ['initial' => 'সু', 'role' => 'সহ-সভাপতি', 'name' => 'সুফল'],
                    ['initial' => 'লা', 'role' => 'সাধারণ সম্পাদক', 'name' => 'লাবণ্য'],
                    ['initial' => 'ক', 'role' => 'যুগ্ম-সাধারণ সম্পাদক', 'name' => 'কনক'],
                    ['initial' => 'সা', 'role' => 'কোষাধ্যক্ষ', 'name' => 'সাগর'],
                ];
                @endphp

                <div class="py-8 border-b border-ink/10">
                    <div class="flex items-center gap-2 mb-6">
                        <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-slate-gray">Officers</span>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-0 lg:gap-6">
                        @foreach($officers as $officer)
                        <div class="flex items-center gap-4 py-4 lg:py-0 lg:flex-col lg:items-center lg:text-center">
                            <div class="w-[56px] h-[56px] lg:w-[100px] lg:h-[100px] rounded-full overflow-hidden bg-gradient-to-br from-charcoal/6 to-ink/4 border border-ink/5 shrink-0">
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[18px] lg:text-[34px] font-medium text-ink/15">{{ $officer['initial'] }}</span>
                                </div>
                            </div>
                            <div class="lg:mt-3">
                                <div class="flex items-center gap-1.5 mb-0.5 lg:mb-1 lg:justify-center">
                                    <span class="w-1 h-1 rounded-full bg-signal-orange-light"></span>
                                    <span class="uppercase text-[10px] lg:text-[11px] font-bold tracking-[0.04em] text-slate-gray">{{ $officer['role'] }}</span>
                                </div>
                                <h3 class="text-[16px] lg:text-[18px] font-medium leading-[1.2] tracking-[-0.02em] text-ink">{{ $officer['name'] }}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Secretaries rows --}}
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

                <div class="py-8 border-b border-ink/10">
                    <div class="flex items-center gap-2 mb-6">
                        <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-slate-gray">Secretaries</span>
                    </div>

                    <div class="space-y-0">
                        @foreach($secretaries as $sec)
                        <div class="flex items-center gap-4 py-3 {{ $sec['vacant'] ?? false ? 'opacity-40' : '' }}">
                            <div class="w-[40px] h-[40px] lg:w-[48px] lg:h-[48px] rounded-full overflow-hidden {{ $sec['vacant'] ?? false ? 'bg-dust-taupe/20 border border-dust-taupe/30' : 'bg-gradient-to-br from-charcoal/6 to-ink/4 border border-ink/5' }} shrink-0">
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[14px] lg:text-[16px] font-medium {{ $sec['vacant'] ?? false ? 'text-dust-taupe' : 'text-ink/15' }}">{{ $sec['initial'] }}</span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0 flex flex-col lg:flex-row lg:items-center lg:gap-3">
                                <h3 class="text-[15px] font-medium leading-[1.3] tracking-[-0.01em] text-ink shrink-0 lg:w-[120px]">{{ $sec['name'] }}</h3>
                                <span class="text-[13px] text-slate-gray truncate" style="font-weight: 450;">{{ $sec['role'] }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
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

                <div class="py-8">
                    <div class="flex items-center gap-2 mb-6">
                        <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                        <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-slate-gray">Executive Members</span>
                    </div>

                    <div class="flex flex-wrap gap-3 lg:gap-4">
                        @foreach($members as $member)
                        <div class="flex items-center gap-3 bg-lifted-cream rounded-full pr-5 py-2 pl-2">
                            <div class="w-[36px] h-[36px] rounded-full overflow-hidden bg-gradient-to-br from-ink/5 to-charcoal/3 border border-ink/5 shrink-0">
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-[12px] font-medium text-ink/15">{{ $member['initial'] }}</span>
                                </div>
                            </div>
                            <span class="text-[14px] font-medium text-ink">{{ $member['name'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-layouts.app>
