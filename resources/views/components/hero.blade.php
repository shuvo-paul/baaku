<section id="home" class="px-6 pt-28 pb-16 lg:px-12 lg:pt-32 lg:pb-24">
    <div class="relative bg-ink rounded-[40px] overflow-hidden min-h-[60vh] lg:min-h-[70vh]">
        {{-- Content + Video grid --}}
        <div class="relative z-10 grid lg:grid-cols-2 gap-0 min-h-[inherit]">
            {{-- Left: Text --}}
            <div class="flex flex-col justify-center px-8 py-16 lg:px-16 lg:py-20">
                {{-- Eyebrow --}}
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-signal-orange-light"></span>
                    <span class="uppercase text-[14px] font-bold tracking-[0.04em] text-dust-taupe">Est. 2011 · Khulna University</span>
                </div>

                {{-- Headline --}}
                <h1 class="font-display text-[40px] lg:text-[64px] font-medium leading-[1] tracking-[-0.02em] text-canvas-cream mb-6 text-balance">
                    বাংলা অ্যালামনাই অ্যাসোসিয়েশন
                </h1>

                {{-- Subtitle --}}
                <p class="text-[18px] lg:text-[20px] font-normal leading-[1.5] text-dust-taupe mb-10 max-w-[500px]">
                    বাংলা ডিসিপ্লিনের প্রাক্তন গ্র্যাজুয়েটদের একটি সংবদ্ধ নেটওয়ার্ক। আমাদের উদ্দেশ্য বিশ্বজুড়ে ছড়িয়ে থাকা অ্যালামনাইদের সংযুক্ত করা, প্রবীণ-নবীনদের বন্ধন অটুট রাখা।
                </p>

                {{-- CTAs --}}
                <div class="flex flex-wrap gap-4">
                    <a href="/register" class="inline-flex items-center px-6 py-3 bg-canvas-cream text-ink rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:opacity-90 transition-opacity">
                        সদস্য হোন
                    </a>
                    <a href="/login" class="inline-flex items-center px-6 py-3 border-[1.5px] border-canvas-cream/40 text-canvas-cream rounded-[20px] font-medium text-[16px] tracking-[-0.02em] hover:bg-canvas-cream/10 transition-colors">
                        প্রবেশ করুন
                    </a>
                </div>
            </div>

            {{-- Right: Video --}}
            <div class="flex items-center justify-center p-6 lg:p-10">
                <div class="relative w-full aspect-video rounded-[24px] overflow-hidden shadow-elevated">
                    <iframe
                        src="https://www.youtube.com/embed/hQ6CzYpGipM?rel=0&modestbranding=1"
                        title="রোদ মাখা দিনগুলি — বাংলা অ্যালামনাই অ্যাসোসিয়েশন"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        loading="lazy"
                        class="absolute inset-0 w-full h-full"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
