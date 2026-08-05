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

        {{-- Two-column: President hero left, roster right --}}
        <section class="px-6 pb-24 lg:px-12 lg:pb-32">
            <div class="max-w-[1200px] mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

                    {{-- Left: President --}}
                    <div class="lg:col-span-5">
                        <div class="lg:sticky lg:top-40">
                            <div class="relative mb-8">
                                <div class="w-[220px] h-[220px] lg:w-[300px] lg:h-[300px] rounded-full overflow-hidden bg-gradient-to-br from-ink/8 to-charcoal/5 border border-ink/5">
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-[64px] lg:text-[88px] font-medium text-ink/15">লা</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light"></span>
                                <span class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray">সভাপতি (ভারপ্রাপ্ত)</span>
                            </div>
                            <h2 class="text-[28px] lg:text-[36px] font-medium leading-[1.15] tracking-[-0.02em] text-ink mb-3">লাবণ্য</h2>
                        </div>
                    </div>

                    {{-- Right: Full roster --}}
                    <div class="lg:col-span-7">

                        {{-- Officers --}}
                        <div class="mb-12">
                            <div class="flex items-center gap-2 mb-6">
                                <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                                <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-slate-gray">Officers</span>
                            </div>

                            @php
                            $officers = [
                                ['initial' => 'লি', 'role' => 'সহ-সভাপতি', 'name' => 'লিওন'],
                                ['initial' => 'সু', 'role' => 'সহ-সভাপতি', 'name' => 'সুফল'],
                                ['initial' => 'লা', 'role' => 'সাধারণ সম্পাদক', 'name' => 'লাবণ্য'],
                                ['initial' => 'ক', 'role' => 'যুগ্ম-সাধারণ সম্পাদক', 'name' => 'কনক'],
                                ['initial' => 'সা', 'role' => 'কোষাধ্যক্ষ', 'name' => 'সাগর'],
                            ];
                            @endphp

                            <div class="space-y-4">
                                @foreach($officers as $officer)
                                <div class="flex items-center gap-4 group">
                                    <div class="w-[48px] h-[48px] rounded-full overflow-hidden bg-gradient-to-br from-charcoal/6 to-ink/4 border border-ink/5 shrink-0">
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="text-[16px] font-medium text-ink/15">{{ $officer['initial'] }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex items-center justify-between border-b border-ink/8 pb-3">
                                        <div>
                                            <h3 class="text-[16px] font-medium leading-[1.3] tracking-[-0.01em] text-ink">{{ $officer['name'] }}</h3>
                                            <span class="text-[13px] text-slate-gray" style="font-weight: 450;">{{ $officer['role'] }}</span>
                                        </div>
                                        <svg class="w-4 h-4 text-ink/30 group-hover:text-ink transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path d="M7 17L17 7M17 7H7M17 7v10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Secretaries --}}
                        <div class="mb-12">
                            <div class="flex items-center gap-2 mb-6">
                                <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                                <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-slate-gray">Secretaries</span>
                            </div>

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

                            <div class="space-y-4">
                                @foreach($secretaries as $sec)
                                <div class="flex items-center gap-4 group {{ $sec['vacant'] ?? false ? 'opacity-40' : '' }}">
                                    <div class="w-[48px] h-[48px] rounded-full overflow-hidden {{ $sec['vacant'] ?? false ? 'bg-dust-taupe/20 border border-dust-taupe/30' : 'bg-gradient-to-br from-charcoal/6 to-ink/4 border border-ink/5' }} shrink-0">
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="text-[16px] font-medium {{ $sec['vacant'] ?? false ? 'text-dust-taupe' : 'text-ink/15' }}">{{ $sec['initial'] }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex items-center justify-between border-b border-ink/8 pb-3">
                                        <div>
                                            <h3 class="text-[16px] font-medium leading-[1.3] tracking-[-0.01em] text-ink">{{ $sec['name'] }}</h3>
                                            <span class="text-[13px] text-slate-gray" style="font-weight: 450;">{{ $sec['role'] }}</span>
                                        </div>
                                        <svg class="w-4 h-4 text-ink/30 group-hover:text-ink transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path d="M7 17L17 7M17 7H7M17 7v10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Executive Members --}}
                        <div>
                            <div class="flex items-center gap-2 mb-6">
                                <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                                <span class="uppercase text-[13px] font-bold tracking-[0.04em] text-slate-gray">Executive Members</span>
                            </div>

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

                            <div class="grid grid-cols-2 gap-3">
                                @foreach($members as $member)
                                <div class="flex items-center gap-3 py-2">
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
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-layouts.app>
