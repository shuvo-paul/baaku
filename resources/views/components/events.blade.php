<section id="events" class="px-6 py-24 lg:px-12 lg:py-32 bg-lifted-cream">
    <div class="max-w-[1200px] mx-auto">
        {{-- Header --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16">
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Events</span>
                </div>
                <h2 class="font-display text-[36px] lg:text-[48px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance max-w-[500px]">
                    আসন্ন অনুষ্ঠান ও কার্যক্রম
                </h2>
            </div>
            <a href="#" class="mt-6 lg:mt-0 inline-flex items-center gap-2 text-ink font-medium text-[16px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
                সব ইভেন্ট দেখুন
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        {{-- Events with bold dates --}}
        <div class="flex flex-col gap-6">
            {{-- Event 1 --}}
            <div class="bg-white rounded-[40px] overflow-hidden flex flex-col lg:flex-row">
                {{-- Date block --}}
                <div class="flex flex-row lg:flex-col items-center justify-center gap-1 lg:gap-0 px-8 py-6 lg:py-0 lg:px-0 lg:w-[200px] shrink-0 border-b lg:border-b-0 lg:border-r border-canvas-cream">
                    <span class="text-[13px] font-bold uppercase tracking-[0.04em] text-signal-orange-light lg:mb-1">আগস্ট</span>
                    <span class="text-[48px] lg:text-[56px] font-medium leading-none tracking-[-0.02em] text-ink lg:mb-1">১৫</span>
                    <span class="text-[13px] text-slate-gray">২০২৬</span>
                </div>
                {{-- Content --}}
                <div class="p-8 lg:p-10 lg:py-8 flex-1 flex flex-col justify-center">
                    <h3 class="font-display text-[24px] font-medium leading-[1.2] tracking-[-0.02em] text-ink mb-3">
                        বার্ষিক সাহিত্য সম্মেলন
                    </h3>
                    <p class="text-[15px] text-slate-gray leading-[1.5] mb-6" style="font-weight: 450;">
                        বাংলা সাহিত্যের বর্তমান প্রবণতা ও ভবিষ্যৎ নিয়ে আলোচনা সভা। বিশিষ্ট সাহিত্যিক ও গবেষকরা উপস্থিত থাকবেন।
                    </p>
                    <div>
                        <a href="#" class="inline-flex items-center px-6 py-3 bg-ink text-canvas-cream rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:opacity-90 transition-opacity">
                            বিস্তারিত
                        </a>
                    </div>
                </div>
            </div>

            {{-- Event 2 --}}
            <div class="bg-white rounded-[40px] overflow-hidden flex flex-col lg:flex-row">
                {{-- Date block --}}
                <div class="flex flex-row lg:flex-col items-center justify-center gap-1 lg:gap-0 px-8 py-6 lg:py-0 lg:px-0 lg:w-[200px] shrink-0 border-b lg:border-b-0 lg:border-r border-canvas-cream">
                    <span class="text-[13px] font-bold uppercase tracking-[0.04em] text-signal-orange-light lg:mb-1">সেপ্টেম্বর</span>
                    <span class="text-[48px] lg:text-[56px] font-medium leading-none tracking-[-0.02em] text-ink lg:mb-1">৫</span>
                    <span class="text-[13px] text-slate-gray">২০২৬</span>
                </div>
                {{-- Content --}}
                <div class="p-8 lg:p-10 lg:py-8 flex-1 flex flex-col justify-center">
                    <h3 class="font-display text-[24px] font-medium leading-[1.2] tracking-[-0.02em] text-ink mb-3">
                        কবিতা আবৃত্তি প্রতিযোগিতা
                    </h3>
                    <p class="text-[15px] text-slate-gray leading-[1.5] mb-6" style="font-weight: 450;">
                        নতুন প্রজন্মের কবিদের জন্য কবিতা আবৃত্তি প্রতিযোগিতা। বিচারক হিসেবে থাকবেন বিশিষ্ট কবি ও সাহিত্য সমালোচক।
                    </p>
                    <div>
                        <a href="#" class="inline-flex items-center gap-2 text-ink font-medium text-[16px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
                            বিস্তারিত
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Event 3 --}}
            <div class="bg-white rounded-[40px] overflow-hidden flex flex-col lg:flex-row">
                {{-- Date block --}}
                <div class="flex flex-row lg:flex-col items-center justify-center gap-1 lg:gap-0 px-8 py-6 lg:py-0 lg:px-0 lg:w-[200px] shrink-0 border-b lg:border-b-0 lg:border-r border-canvas-cream">
                    <span class="text-[13px] font-bold uppercase tracking-[0.04em] text-signal-orange-light lg:mb-1">ফেব্রুয়ারি</span>
                    <span class="text-[48px] lg:text-[56px] font-medium leading-none tracking-[-0.02em] text-ink lg:mb-1">২১</span>
                    <span class="text-[13px] text-slate-gray">২০২৭</span>
                </div>
                {{-- Content --}}
                <div class="p-8 lg:p-10 lg:py-8 flex-1 flex flex-col justify-center">
                    <h3 class="font-display text-[24px] font-medium leading-[1.2] tracking-[-0.02em] text-ink mb-3">
                        আন্তর্জাতিক মাতৃভাষা দিবস
                    </h3>
                    <p class="text-[15px] text-slate-gray leading-[1.5] mb-6" style="font-weight: 450;">
                        ভাষা আন্দোলনের চেতনা স্মরণে বিশেষ অনুষ্ঠান। সেমিনার, সাংস্কৃতিক অনুষ্ঠান ও পুরস্কার বিতরণী অনুষ্ঠান।
                    </p>
                    <div>
                        <a href="#" class="inline-flex items-center gap-2 text-ink font-medium text-[16px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
                            বিস্তারিত
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
