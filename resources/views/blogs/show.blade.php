@php $related = \App\Posts::related($post['slug']); @endphp

<x-layouts.app title="{{ $post['title'] }} — বাকু">
    <x-nav />

    <main class="pt-32">
        {{-- Article header --}}
        <section class="relative px-6 pb-16 lg:px-12 lg:pb-24 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 pointer-events-none select-none" aria-hidden="true">
                <span class="text-[72px] lg:text-[160px] font-medium tracking-[-0.02em] text-ghost-cream leading-none block px-6 lg:px-12">প্রবন্ধ</span>
            </div>
            <div class="relative z-10 max-w-[1200px] mx-auto">
                <a href="{{ route('blogs') }}" class="inline-flex items-center gap-2 mb-10 text-slate-gray hover:text-ink transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 5l-7 7 7 7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[14px] font-medium tracking-[-0.01em]">সব প্রবন্ধে ফিরে যান</span>
                </a>
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">Blog</span>
                </div>
                <div class="flex items-center gap-3 mb-6">
                    <span class="px-4 py-2 bg-canvas-cream rounded-[999px] text-[13px] font-medium text-ink">{{ $post['category'] }}</span>
                    <span class="text-[13px] text-slate-gray">{{ $post['date'] }}</span>
                </div>
                <h1 class="font-display text-[36px] lg:text-[56px] font-medium leading-[1.1] tracking-[-0.02em] text-ink text-balance max-w-[700px]">{{ $post['title'] }}</h1>
                <p class="mt-6 text-[14px] text-slate-gray" style="font-weight: 450;">{{ $post['author'] }} · {{ $post['reading_time'] }}</p>
            </div>
        </section>

        {{-- Media + body --}}
        <section class="relative px-6 pb-24 lg:px-12 lg:pb-32">
            <div class="max-w-[1200px] mx-auto">
                @if (! empty($post['image']))
                    <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="aspect-[16/10] w-full object-cover rounded-[40px]">
                @else
                    <div class="aspect-[16/10] bg-gradient-to-br {{ $post['gradient'] }} flex items-center justify-center rounded-[40px]">
                        <span class="text-[120px] lg:text-[200px] font-medium text-ink/10">{{ $post['initial'] }}</span>
                    </div>
                @endif

                <div class="max-w-[720px] mx-auto mt-14 lg:mt-16">
                    @foreach ($post['body'] as $block)
                        @if ($block['type'] === 'h2')
                            <h2 class="font-display text-[24px] lg:text-[28px] font-medium tracking-[-0.02em] text-ink mt-12 mb-5">{{ $block['text'] }}</h2>
                        @elseif ($block['type'] === 'quote')
                            <div class="bg-lifted-cream rounded-[40px] p-10 lg:p-12 my-12 text-center">
                                <span class="text-[56px] text-signal-orange-light font-bold leading-none block mb-4" aria-hidden="true">"</span>
                                <p class="text-[22px] lg:text-[26px] font-medium tracking-[-0.02em] text-ink leading-[1.5]">{{ $post['quote'] }}</p>
                            </div>
                        @elseif ($loop->first)
                            <p class="text-[19px] lg:text-[21px] leading-[1.8] text-ink mb-8" style="font-weight: 450;">{{ $block['text'] }}</p>
                        @else
                            <p class="text-[17px] leading-[1.8] text-ink mb-6" style="font-weight: 450;">{{ $block['text'] }}</p>
                        @endif
                    @endforeach

                    {{-- Share row --}}
                    <div class="mt-14 pt-10 border-t border-ink/10">
                        <div class="flex flex-col lg:flex-row lg:items-center gap-6">
                            <span class="text-[14px] text-slate-gray" style="font-weight: 450;">শেয়ার করুন</span>
                            <div class="flex items-center gap-3">
                                <a href="#" class="w-12 h-12 rounded-full border border-ink/15 flex items-center justify-center text-ink hover:bg-soft-bone transition-colors" aria-label="ফেসবুকে শেয়ার">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-full border border-ink/15 flex items-center justify-center text-ink hover:bg-soft-bone transition-colors" aria-label="এক্স-এ শেয়ার">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-full border border-ink/15 flex items-center justify-center text-ink hover:bg-soft-bone transition-colors" aria-label="লিংকডইনে শেয়ার">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-full border border-ink/15 flex items-center justify-center text-ink hover:bg-soft-bone transition-colors" aria-label="লিংক কপি">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- End-of-article link --}}
                    <a href="{{ route('blogs') }}" class="mt-10 inline-flex items-center gap-2 text-ink font-medium text-[16px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
                        সব প্রবন্ধ দেখুন
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- Related posts --}}
        <section class="relative px-6 pb-24 lg:px-12 lg:pb-32">
            <div class="max-w-[1200px] mx-auto">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-slate-gray">আরও পড়ুন</span>
                </div>
                <h2 class="font-display text-[36px] font-medium tracking-[-0.02em] text-ink mb-10">সম্পর্কিত প্রবন্ধ</h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($related as $related)
                    <div class="bg-white rounded-[40px] overflow-hidden">
                        @if (! empty($related['image']))
                            <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" class="aspect-[16/10] w-full object-cover">
                        @else
                            <div class="aspect-[16/10] bg-gradient-to-br {{ $related['gradient'] }} flex items-center justify-center">
                                <span class="text-[64px] font-medium text-ink/10">{{ $related['initial'] }}</span>
                            </div>
                        @endif
                        <div class="p-6 lg:p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-4 py-2 bg-canvas-cream rounded-[999px] text-[13px] font-medium text-ink">{{ $related['category'] }}</span>
                                <span class="text-[13px] text-slate-gray">{{ $related['date'] }}</span>
                            </div>
                            <h3 class="font-display text-[20px] font-medium leading-[1.2] tracking-[-0.02em] text-ink mb-3">{{ $related['title'] }}</h3>
                            <p class="text-[14px] text-slate-gray leading-[1.5] mb-5" style="font-weight: 450;">{{ $related['excerpt'] }}</p>
                            <a href="{{ route('blogs.show', ['post' => $related['slug']]) }}" class="inline-flex items-center gap-2 text-ink font-medium text-[14px] tracking-[-0.02em] hover:opacity-70 transition-opacity">
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
