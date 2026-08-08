@php
$posts = [
    ['title' => 'আধুনিক বাংলা কবিতায় নারীর ভাষা: একটি নতুন পাঠ', 'category' => 'সাহিত্য আলোচনা', 'date' => '১২ জুলাই, ২০২৬', 'excerpt' => 'বিংশ শতাব্দীর শেষার্ধে বাংলা কবিতায় নারী কবিদের অবদান কেবল সাহিত্যিক নয়, বরং সামাজিক পরিবর্তনের একটি শক্তিশালী মাধ্যম ছিল।', 'initial' => 'প', 'gradient' => 'from-ink/5 to-signal-orange/5'],
    ['title' => 'লোকসাহিত্যে বাংলার গ্রামীণ জীবন', 'category' => 'গবেষণা', 'date' => '৫ জুলাই, ২০২৬', 'excerpt' => 'গ্রামবাংলার লোককথা, প্রবাদ ও গানে লুকিয়ে থাকা সামাজিক ইতিহাসের একটি গবেষণামূলক পাঠ।', 'initial' => 'ল', 'gradient' => 'from-signal-orange/8 to-signal-orange-light/5'],
    ['title' => 'অধ্যাপক আনিসুজ্জামানের সাথে এক আলোচনা', 'category' => 'সাক্ষাৎকার', 'date' => '২৮ জুন, ২০২৬', 'excerpt' => 'বাংলা সাহিত্যের বর্তমান অবস্থা ও ভবিষ্যৎ সম্ভাবনা নিয়ে বিশিষ্ট সাহিত্যিকের সাথে একটি দীর্ঘ সাক্ষাৎকার।', 'initial' => 'অ', 'gradient' => 'from-charcoal/8 to-ink/5'],
    ['title' => 'রবীন্দ্রনাথের শেষ কবিতা: প্রেম ও বিচ্ছেদের দর্শন', 'category' => 'সাহিত্য আলোচনা', 'date' => '২০ জুন, ২০২৬', 'excerpt' => 'শেষ কবিতা উপন্যাসের ভাষা ও দর্শন নিয়ে একটি নিবিড় পাঠ — প্রেম যেখানে পরিণত হয় মৃত্যুর সঙ্গে সংলাপে।', 'initial' => 'র', 'gradient' => 'from-signal-orange-light/8 to-signal-orange/5'],
    ['title' => 'পুরান ঢাকার গলিপথে ভাষার বিবর্তন', 'category' => 'গবেষণা', 'date' => '১২ জুন, ২০২৬', 'excerpt' => 'চারশো বছরের পুরান ঢাকার বাণিজ্য, ধর্ম ও অভিবাসনের ছাপ বাংলা ভাষার আঞ্চলিক রূপে কীভাবে রয়ে গেছে।', 'initial' => 'প', 'gradient' => 'from-ink/6 to-charcoal/4'],
    ['title' => 'কবি শঙ্খ ঘোষের সঙ্গে এক সন্ধ্যা', 'category' => 'সাক্ষাৎকার', 'date' => '১ জুন, ২০২৬', 'excerpt' => 'কবিতা, সমাজ ও ভাষার ভবিষ্যৎ — প্রখ্যাত কবির সঙ্গে আড্ডাভরা এক বিকেলের স্মৃতি।', 'initial' => 'শ', 'gradient' => 'from-signal-orange/8 to-signal-orange-light/5'],
    ['title' => 'নজরুলের গজল ও তার কাব্যভাষা', 'category' => 'প্রবন্ধ', 'date' => '২৫ মে, ২০২৬', 'excerpt' => 'বিদ্রোহী কবির গজল-পরম্পরার উৎস, ভাষার গঠন ও তার অনন্য সুরের রসায়ন।', 'initial' => 'ন', 'gradient' => 'from-charcoal/8 to-ink/5'],
    ['title' => 'বাংলা ছোটগল্পে নিম্নবর্গের চিত্র', 'category' => 'সাহিত্য আলোচনা', 'date' => '১৮ মে, ২০২৬', 'excerpt' => 'ষাট-সত্তরের দশকের গল্পকারদের লেখায় শ্রমজীবী মানুষের মুখ — একটি সমাজতাত্ত্বিক পাঠ।', 'initial' => 'ব', 'gradient' => 'from-signal-orange-light/8 to-signal-orange/5'],
    ['title' => 'মুক্তিযুদ্ধভিত্তিক সাহিত্য: স্মৃতি ও ইতিহাসের সংলাপ', 'category' => 'প্রবন্ধ', 'date' => '১০ মে, ২০২৬', 'excerpt' => 'মুক্তিযুদ্ধের উপন্যাস ও স্মৃতিকথা কীভাবে ব্যক্তিগত স্মৃতিকে জাতীয় ইতিহাসের সঙ্গে মেলায়।', 'initial' => 'ম', 'gradient' => 'from-ink/6 to-charcoal/4'],
];
@endphp

<x-layouts.app title="সব প্রবন্ধ — বাকু">
    <x-nav />

    <main class="pt-32">
        <section class="relative px-6 pb-16 lg:px-12 lg:pb-24 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
                <span class="text-[72px] lg:text-[160px] font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">প্রবন্ধ</span>
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
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Blog</span>
                </div>
                <h1 class="text-[36px] lg:text-[56px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance max-w-[700px]">সব প্রবন্ধ</h1>
                <p class="mt-6 text-[17px] text-slate-gray leading-[1.6] max-w-[560px]" style="font-weight: 450;">
                    বাংলা ভাষা ও সাহিত্যের নানা প্রসঙ্গে আমাদের লেখা, গবেষণা ও সাক্ষাৎকার।
                </p>
            </div>
        </section>

        {{-- Featured + secondary row --}}
        <section class="relative px-6 pb-24 lg:px-12 lg:pb-32">
            <div class="max-w-[1200px] mx-auto">
                <div class="grid lg:grid-cols-5 gap-6 mb-6">
                    {{-- Featured post (spans 3 cols) --}}
                    <div class="lg:col-span-3 bg-white rounded-[40px] overflow-hidden shadow-elevated">
                        <div class="aspect-[16/10] bg-gradient-to-br {{ $posts[0]['gradient'] }} flex items-center justify-center">
                            <span class="text-[80px] font-medium text-ink/10">{{ $posts[0]['initial'] }}</span>
                        </div>
                        <div class="p-8 lg:p-10">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-4 py-2 bg-canvas-cream rounded-[999px] text-[13px] font-medium text-ink">{{ $posts[0]['category'] }}</span>
                                <span class="text-[13px] text-slate-gray">{{ $posts[0]['date'] }}</span>
                            </div>
                            <h3 class="text-[24px] lg:text-[28px] font-medium leading-[1.2] tracking-[-0.02em] text-ink mb-4">{{ $posts[0]['title'] }}</h3>
                            <p class="text-[15px] text-slate-gray leading-[1.6] mb-6" style="font-weight: 450;">{{ $posts[0]['excerpt'] }}</p>
                            <a href="#" class="inline-flex items-center gap-2 text-ink font-medium text-[16px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
                                পুরো প্রবন্ধ পড়ুন
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Secondary posts (spans 2 cols, stacked) --}}
                    <div class="lg:col-span-2 flex flex-col gap-6">
                        @foreach ([1, 2] as $i)
                        <div class="bg-white rounded-[40px] p-8 flex-1">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-4 py-2 bg-canvas-cream rounded-[999px] text-[13px] font-medium text-ink">{{ $posts[$i]['category'] }}</span>
                                <span class="text-[13px] text-slate-gray">{{ $posts[$i]['date'] }}</span>
                            </div>
                            <h3 class="text-[20px] font-medium leading-[1.2] tracking-[-0.02em] text-ink mb-3">{{ $posts[$i]['title'] }}</h3>
                            <p class="text-[14px] text-slate-gray leading-[1.5] mb-5" style="font-weight: 450;">{{ $posts[$i]['excerpt'] }}</p>
                            <a href="#" class="inline-flex items-center gap-2 text-ink font-medium text-[14px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
                                পড়ুন
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Remaining grid --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach (array_slice($posts, 3) as $post)
                    <div class="bg-white rounded-[40px] overflow-hidden">
                        <div class="aspect-[16/10] bg-gradient-to-br {{ $post['gradient'] }} flex items-center justify-center">
                            <span class="text-[64px] font-medium text-ink/10">{{ $post['initial'] }}</span>
                        </div>
                        <div class="p-6 lg:p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-4 py-2 bg-canvas-cream rounded-[999px] text-[13px] font-medium text-ink">{{ $post['category'] }}</span>
                                <span class="text-[13px] text-slate-gray">{{ $post['date'] }}</span>
                            </div>
                            <h3 class="text-[20px] font-medium leading-[1.2] tracking-[-0.02em] text-ink mb-3">{{ $post['title'] }}</h3>
                            <p class="text-[14px] text-slate-gray leading-[1.5] mb-5" style="font-weight: 450;">{{ $post['excerpt'] }}</p>
                            <a href="#" class="inline-flex items-center gap-2 text-ink font-medium text-[14px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
                                পড়ুন
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</x-layouts.app>
