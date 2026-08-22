<footer id="contact" class="bg-ink px-6 pt-16 pb-32 lg:px-[100px] lg:pt-20 lg:pb-36">
    <div class="max-w-[1200px] mx-auto">
        {{-- Conversational headline --}}
        <h2 class="font-display text-[32px] lg:text-[48px] font-medium leading-[1.1] tracking-[-0.02em] text-white mb-16 max-w-[500px]">
            আমরা সবসময় আপনার পাশে
        </h2>

        {{-- 4-column grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 lg:gap-8 mb-16">
            {{-- Column 1: Quick Links --}}
            <div>
                <h4 class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray mb-6">দ্রুত লিংক</h4>
                <ul class="flex flex-col gap-4">
                    <li><a href="#home" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">হোম</a></li>
                    <li><a href="#about" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">আমাদের সম্পর্কে</a></li>
                    <li><a href="#events" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">ইভেন্ট</a></li>
                </ul>
            </div>

            {{-- Column 2: Contact --}}
            <div>
                <h4 class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray mb-6">যোগাযোগ</h4>
                <ul class="flex flex-col gap-4">
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-white/60 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-[14px] text-white" style="font-weight: 450;">বাংলা বিভাগ, খুলনা বিশ্ববিদ্যালয়, খুলনা-৯১০০</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-white/60 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="mailto:info@banglaalumni.org" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">info@banglaalumni.org</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-white/60 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="tel:+880 1700-000000" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">+880 1700-000000</a>
                    </li>
                </ul>
            </div>

            {{-- Column 3: Membership --}}
            <div>
                <h4 class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray mb-6">সদস্যপদ</h4>
                <ul class="flex flex-col gap-4">
                    <li><a href="#" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">সদস্য হোন</a></li>
                    <li><a href="#" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">সদস্য তালিকা</a></li>
                    <li><a href="#" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">সদস্য সুবিধা</a></li>
                    <li><a href="#" class="text-[14px] text-white hover:opacity-70 transition-opacity" style="font-weight: 450;">বার্ষিক সমাবেশ</a></li>
                </ul>
            </div>

            {{-- Column 4: Social --}}
            <div>
                <h4 class="uppercase text-[12px] font-bold tracking-[0.04em] text-slate-gray mb-6">সামাজিক যোগাযোগ</h4>
                <div class="flex gap-4">
                    {{-- Facebook --}}
                    <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="Facebook">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    {{-- YouTube --}}
                    <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="YouTube">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                    {{-- LinkedIn --}}
                    <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="LinkedIn">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    {{-- Email --}}
                    <a href="mailto:info@banglaalumni.org" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="Email">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="border-t border-white/10 mb-8"></div>

        {{-- Bottom row --}}
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4">
            <p class="text-[13px] text-slate-gray" style="font-weight: 450;">
                © ২০২৬ বাংলা ভাষা ও সাহিত্য প্রাক্তন ছাত্র সমিতি। সর্বস্বত্ব সংরক্ষিত।
            </p>
            <div class="flex items-center gap-6">
                <a href="#" class="text-[13px] text-slate-gray hover:text-white transition-colors" style="font-weight: 450;">গোপনীয়তা নীতি</a>
                <a href="#" class="text-[13px] text-slate-gray hover:text-white transition-colors" style="font-weight: 450;">ব্যবহারের শর্তাবলী</a>
            </div>
        </div>
    </div>
</footer>
