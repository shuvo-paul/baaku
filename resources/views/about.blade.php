<x-layouts.app title="পরিচিতি — বাকু">
    <x-nav />

    <main class="pt-32">
        {{-- Hero header --}}
        <section class="relative px-6 pb-16 lg:px-12 lg:pb-24 overflow-hidden">
            {{-- Ghost watermark --}}
            <div class="absolute top-0 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
                <span class="text-[72px] lg:text-[160px] font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">
                    পরিচিতি
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
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">About Us</span>
                </div>
                <h1 class="font-display text-[36px] lg:text-[56px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance max-w-[700px]">
                    বাংলা সাহিত্যের ঐতিহ্য বহনকারী একটি সম্প্রদায়
                </h1>
            </div>
        </section>

        {{-- Intro paragraph --}}
        <section class="px-6 pb-16 lg:px-12 lg:pb-24">
            <div class="max-w-[800px] mx-auto">
                <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                    দক্ষিণ-পশ্চিমাঞ্চলের সর্বোচ্চ বিদ্যাপীঠ খুলনা বিশ্ববিদ্যালয়ের বাংলা ভাষা ও সাহিত্য বিভাগ—যা সাধারণভাবে বাংলা ডিসিপ্লিন নামে পরিচিত—২০১১ সালে যাত্রা শুরু করে। প্রতিষ্ঠাকালে মাত্র ৪ জন শিক্ষক নিয়ে যাত্রা শুরু করা এই বিভাগ আজ ১২ জনের বেশি শিক্ষক নিয়ে দক্ষিণ-পশ্চিমাঞ্চলের বাংলা ভাষা ও সাহিত্য শিক্ষার অন্যতম প্রধান কেন্দ্র হিসেবে প্রতিষ্ঠিত। বর্তমান পর্যন্ত প্রায় ১৫টি ব্যাচ স্নাতক ডিগ্রি অর্জন করেছে এবং অনেকে স্নাতকোত্তর ও গবেষণায় সমৃদ্ধ কর্মজীবন গড়ে তুলেছেন।
                </p>
            </div>
        </section>

        {{-- Section: আমাদের পথচলা ও ঐতিহ্য --}}
        <section class="px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[800px] mx-auto">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">আমাদের পথচলা ও ঐতিহ্য</span>
                </div>
                <div class="space-y-6">
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        ২০১১ সালে খুলনা বিশ্ববিদ্যালয়ের বাংলা ভাষা ও সাহিত্য বিভাগে যাত্রা শুরু হয়। প্রাথমিক পর্যায়ে মাত্র ৪ জন শিক্ষক নিয়ে বিভাগটি কার্যক্রম শুরু করে। প্রথম ব্যাচের (ব্যাচ '১১) ছাত্রছাত্রীরা ছিলেন এই বিভাগের প্রথম পরিপক্ব মুখ।
                    </p>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        বর্তমানে বিভাগে ১২ জনের বেশি শিক্ষক কার্যরত আছেন। বাংলা সাহিত্য, ভাষাবিজ্ঞান, লোকসাহিত্য, সাংস্কৃতিক অধ্যয়নসহ বিভিন্ন বিষয়ে স্নাতক ও স্নাতকোত্তর পর্যায়ে পাঠদান চলছে। গবেষণা কার্যক্রমেও বিভাগ ক্রমশ সমৃদ্ধ হয়ে উঠছে।
                    </p>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        প্রায় ১৫টি ব্যাচ এ পর্যন্ত স্নাতক ডিগ্রি অর্জন করেছে। অনেক প্রাক্তন ছাত্র-ছাত্রী এখন শিক্ষা, প্রশাসন, কর্পোরেট জগত এমনকি আন্তর্জাতিক পরিসরে কাজ করছেন। এই বিভাগের ঐতিহ্য ক্রমশ বিস্তার লাভ করছে।
                    </p>
                </div>
            </div>
        </section>

        {{-- Section: সাংস্কৃতিক উৎকর্ষ ও নেতৃত্ব --}}
        <section class="px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[800px] mx-auto">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">সাংস্কৃতিক উৎকর্ষ ও নেতৃত্ব</span>
                </div>
                <div class="space-y-6">
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        খুলনা বিশ্ববিদ্যালয়ের বাংলা ডিসিপ্লিন সাংস্কৃতিক ক্রিয়াকলাপে সর্বদা অগ্রণী ভূমিকা পালন করে আসছে। কাব্যিক আবৃত্তি, নাট্যমঞ্চ, সাহিত্য আলোচনা ও প্রকাশনায় বিভাগের ছাত্র-ছাত্রীরা বিশ্ববিদ্যালয় পর্যায়ে নেতৃত্ব দিচ্ছে।
                    </p>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        বার্ষিক সাংস্কৃতিক অনুষ্ঠান, কবিতা পাঠ, নাটক মঞ্চায়ন এবং সাহিত্য সম্মেলন আয়োজনে বিভাগ সুনাম অর্জন করেছে। প্রাক্তন ছাত্র সমিতি (BAAKU) এর সাংস্কৃতিক অনুষ্ঠানগুলো এখন খুলনা বিশ্ববিদ্যালয়ের অন্যতম বৃহত্তম সাংস্কৃতিক আয়োজন হিসেবে বিবেচিত হয়।
                    </p>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        সাহিত্য পত্রিকা ও সম্পাদনা কাজেও বিভাগের ছাত্ররা উল্লেখযোগ্য অবদান রেখেছে। বিভিন্ন সময় প্রকাশিত সাময়িকী ও সাহিত্য গ্রন্থ বিভাগের সাংস্কৃতিক ঐতিহ্যের ধারাবাহিকতা প্রমাণ করে।
                    </p>
                </div>
            </div>
        </section>

        {{-- Section: ক্রীড়াঙ্গনে গৌরবময় সাফল্য --}}
        <section class="px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[800px] mx-auto">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">ক্রীড়াঙ্গনে গৌরবময় সাফল্য</span>
                </div>
                <div class="space-y-6">
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        বাংলা ডিসিপ্লিনের ছাত্র-ছাত্রীরা শুধু সাহিত্য ও সংস্কৃতিতে নয়, ক্রীড়াঙ্গনেও সমান দক্ষতা প্রদর্শন করে আসছে। খুলনা বিশ্ববিদ্যালয়ের বিভিন্ন ক্রীড়া প্রতিযোগিতায় বাংলা ডিসিপ্লিনের দলগুলো ধারাবাহিকভাবে ভালো ফলাফল করে এসেছে।
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                            <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light mt-2.5 shrink-0"></span>
                            <span>ভলিবলে পুরুষ দল ৩ বার বিশ্ববিদ্যালয় চ্যাম্পিয়ন</span>
                        </li>
                        <li class="flex items-start gap-3 text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                            <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light mt-2.5 shrink-0"></span>
                            <span>ফুটবলে পুরুষ দল ২ বার চ্যাম্পিয়ন</span>
                        </li>
                        <li class="flex items-start gap-3 text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                            <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light mt-2.5 shrink-0"></span>
                            <span>ভলিবলে মহিলা দল বিশ্ববিদ্যালয় পর্যায়ে সফল প্রদর্শনী</span>
                        </li>
                        <li class="flex items-start gap-3 text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                            <span class="w-1.5 h-1.5 rounded-full bg-signal-orange-light mt-2.5 shrink-0"></span>
                            <span>টেবিল টেনিসে অপরাজিত রেকর্ড</span>
                        </li>
                    </ul>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        এই ক্রীড়া সাফল্য বাংলা ডিসিপ্লিনের বহুমুখী দক্ষতার প্রমাণ। শিক্ষা ও সংস্কৃতির পাশাপাশি ক্রীড়াঙ্গনেও এই বিভাগের ছাত্র-ছাত্রীরা নিজেদের প্রতিভা প্রমাণ করেছেন।
                    </p>
                </div>
            </div>
        </section>

        {{-- Section: আমাদের অ্যালামনাই ও কর্মক্ষেত্র --}}
        <section class="px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[800px] mx-auto">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">আমাদের অ্যালামনাই ও কর্মক্ষেত্র</span>
                </div>
                <div class="space-y-6">
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        বাংলা ডিসিপ্লিন থেকে উত্তীর্ণ প্রাক্তন ছাত্র-ছাত্রীরা বিভিন্ন ক্ষেত্রে সফল কর্মজীবন গড়ে তুলেছেন। তাদের মধ্যে অনেকে শিক্ষাক্ষেত্রে, অনেকে সরকারি প্রশাসনে, আবার অনেকে কর্পোরেট জগতে গুরুত্বপূর্ণ পদে কাজ করছেন।
                    </p>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        কিছু প্রাক্তন ছাত্র আন্তর্জাতিক পরিসরে কাজ করছেন। তাদের সাফল্য বাংলা ডিসিপ্লিনের মান ও মানদণ্ডকে আরও শক্তিশালী করেছে। এই প্রাক্তন ছাত্রদের সফলতা বিভাগের গর্বের বিষয়।
                    </p>
                </div>
            </div>
        </section>

        {{-- Section: আমাদের ভবিষ্যৎ অঙ্গীকার --}}
        <section class="px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-[800px] mx-auto">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">আমাদের ভবিষ্যৎ অঙ্গীকার</span>
                </div>
                <div class="space-y-6">
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        আমরা বিশ্বাস করি বাংলা ভাষা ও সাহিত্য আমাদের জাতীয় পরিচয়ের মূল ভিত্তি। এই ভিত্তিকে শক্তিশালী করতে আমরা সাহিত্য আলোচনা, সেমিনার, প্রকাশনা এবং সাংস্কৃতিক অনুষ্ঠানের আয়োজন করি।
                    </p>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        ভবিষ্যতে আমরা আরও বেশি সাংস্কৃতিক ও সাহিত্যিক কার্যক্রমে অংশ নিতে চাই। প্রাক্তন ছাত্রদের মধ্যে পারস্পরিক যোগাযোগ বৃদ্ধি করা, নতুন প্রজন্মকে বাংলা সাহিত্যে উদ্বুদ্ধ করা এবং খুলনা বিশ্ববিদ্যালয়ের বাংলা ডিসিপ্লিনের ঐতিহ্য রক্ষা করা—এগুলো আমাদের প্রধান অঙ্গীকার।
                    </p>
                    <p class="text-[17px] leading-[1.8] text-ink" style="font-weight: 450;">
                        বাংলা অ্যালামনাই অ্যাসোসিয়েশন (BAAKU) এর মাধ্যমে আমরা এই লক্ষ্যে এগিয়ে যাচ্ছি। আমাদের সকল সদস্যের সহযোগিতায় এই যাত্রা আরও সমৃদ্ধ হবে—এ আমাদের আশা ও বিশ্বাস।
                    </p>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-layouts.app>
