<section id="about" class="relative px-6 py-24 lg:px-12 lg:py-32 overflow-hidden">
    {{-- Ghost watermark --}}
    <div class="absolute top-8 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
        <span class="text-[72px] lg:text-[128px] font-display font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">
            পরিচিতি
        </span>
    </div>

    <div class="relative z-10 max-w-[1200px] mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-24 items-start">
            {{-- Left: Eyebrow + Heading --}}
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">About Us</span>
                </div>
                <h2 class="font-display text-[36px] lg:text-[48px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance">
                    খুলনা বিশ্ববিদ্যালয়ের বাংলা ডিসিপ্লিন: ঐতিহ্য, সাফল্য ও গৌরবের এক অনন্য পথচলা
                </h2>
            </div>

            {{-- Right: Body text --}}
            <div class="pt-2 lg:pt-16">
                <p class="text-[16px] font-normal leading-[1.5] text-ink mb-6" style="font-weight: 450;">
                    খুলনা বিশ্ববিদ্যালয়ের ১৯তম বিভাগ হিসেবে ২০১১ সালে যাত্রা শুরু করা ‘বাংলা ডিসিপ্লিন’ আজ শিক্ষা, সাহিত্য, সংস্কৃতি ও ক্রীড়াঙ্গনের এক অনন্য প্রাণকেন্দ্র।
                </p>
                <p class="text-[16px] font-normal leading-[1.5] text-ink mb-8" style="font-weight: 450;">
                    চারজন শিক্ষক ও একটিমাত্র শ্রেণিকক্ষ নিয়ে সীমিত পরিসরে পথচলা শুরু হলেও বর্তমানে ১২ জনেরও বেশি অভিজ্ঞ শিক্ষকের নির্দেশনায় ডিসিপ্লিনটি এক সুবিশাল রূপ নিয়েছে। প্রায় ১৫টি ব্যাচের শিক্ষার্থীরা শিক্ষা সম্পন্ন করে বিসিএস, বিশ্ববিদ্যালয়ের শিক্ষকতা, প্রশাসন, কর্পোরেট ও গণমাধ্যমে সফল অবস্থান সুদৃঢ় করেছেন।
                </p>
                <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 bg-ink text-canvas-cream rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:opacity-90 transition-opacity">
                    বিস্তারিত জানুন
                </a>
            </div>
        </div>
    </div>
</section>
