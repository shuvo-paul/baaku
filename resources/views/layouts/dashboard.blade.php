<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('auth.dashboard')) — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700&family=Source+Serif+4:opsz,wght@8..60,600;8..60,700&display=swap" rel="stylesheet">
    @tallStackUiStyle
    @vite('resources/css/dashboard.css')
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body>
    <div class="min-h-screen flex" x-data="{ sidebarOpen: false }">
        {{-- Mobile top bar --}}
        <div class="fixed inset-x-0 top-0 z-40 flex items-center justify-between border-b border-outline-variant/60 bg-white/85 px-4 py-3 backdrop-blur lg:hidden">
            <span class="font-serif text-lg font-semibold text-navy">{{ config('app.name') }}</span>
            <button type="button" @click="sidebarOpen = true" class="btn-secondary px-3 py-1.5">
                {{ __('dashboard.menu') }}
            </button>
        </div>

        {{-- Scrim behind the mobile drawer --}}
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-navy/40 lg:hidden" aria-hidden="true"></div>

        {{-- Sidebar: glassmorphism over tonal layering --}}
        <aside class="fixed inset-y-0 left-0 z-50 flex h-screen w-64 shrink-0 -translate-x-full flex-col border-r border-outline-variant/60 bg-white/85 backdrop-blur transition-transform duration-200 lg:sticky lg:top-0 lg:z-auto lg:translate-x-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="flex items-start justify-between px-6 pt-6 pb-4">
                <div>
                    <p class="label-caps text-gold">Alumni Network</p>
                    <h2 class="mt-1 text-xl font-semibold text-navy">
                        {{ config('app.name') }}
                    </h2>
                </div>
                <button type="button" @click="sidebarOpen = false" class="rounded p-1 text-on-surface-variant hover:text-navy lg:hidden" aria-label="Close menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <nav class="mt-2 flex-1 overflow-y-auto pb-4">
                @php
                    $items = [
                        ['label' => __('dashboard.dashboard'), 'route' => 'dashboard', 'show' => true],
                        ['label' => __('dashboard.roles'), 'route' => 'dashboard.roles.index', 'show' => auth()->user()->can('manage roles')],
                        ['label' => __('dashboard.member_directory'), 'route' => 'dashboard.users.index', 'show' => auth()->user()->state === \App\Enums\UserState::Active->value && auth()->user()->canAccessMembershipFeature('members')],
                        ['label' => __('activity_log.title'), 'route' => 'dashboard.activity.index', 'show' => auth()->user()->can('view activity log')],
                        ['label' => __('career.careers'), 'route' => 'dashboard.careers.index', 'show' => auth()->user()->can('manage careers')],
                        ['label' => __('post.posts'), 'route' => 'dashboard.posts.index', 'show' => config('features.posts') && auth()->user()->state === \App\Enums\UserState::Active->value && auth()->user()->canAccessMembershipFeature('posts')],
                        ['label' => __('committee.committee'), 'route' => 'dashboard.committee.index', 'show' => config('features.committee') && auth()->user()->can('manage committee')],
                        ['label' => __('membership.membership'), 'route' => 'dashboard.membership.show', 'show' => config('features.memberships') && auth()->user()->state === \App\Enums\UserState::Active->value],
                    ];
                @endphp

                @foreach ($items as $item)
                    @if ($item['show'])
                        @php $active = request()->routeIs($item['route']) || request()->routeIs($item['route'].'.*'); @endphp
                        <a href="{{ route($item['route']) }}"
                           class="relative flex items-center px-6 py-2.5 text-sm font-medium transition-colors {{ $active ? 'text-navy bg-surface-container' : 'text-on-surface-variant hover:text-navy hover:bg-surface-container/60' }}">
                            @if ($active)
                                <span class="absolute left-0 inset-y-0 w-1 bg-gold" aria-hidden="true"></span>
                            @endif
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach

                @if (config('features.memberships'))
                    @php
                        $membershipAdminItems = [
                            ['label' => __('membership.manage_plans'), 'route' => 'dashboard.plans.index', 'show' => auth()->user()->can('manage membership plans')],
                            ['label' => __('membership.manage_payment_methods'), 'route' => 'dashboard.payment-methods.index', 'show' => auth()->user()->can('manage membership plans')],
                            ['label' => __('membership.member_memberships'), 'route' => 'dashboard.memberships.index', 'show' => auth()->user()->can('manage memberships')],
                            ['label' => __('membership.payment_queue'), 'route' => 'dashboard.payments.index', 'show' => auth()->user()->can('manage memberships')],
                        ];
                        $membershipAdminItems = array_values(array_filter($membershipAdminItems, fn ($i) => $i['show']));
                    @endphp

                    @if (! empty($membershipAdminItems))
                        <p class="label-caps px-6 pt-5 pb-1 text-on-surface-variant">
                            {{ __('membership.memberships') }}
                        </p>
                        @foreach ($membershipAdminItems as $item)
                            @php $active = request()->routeIs($item['route']) || request()->routeIs($item['route'].'.*'); @endphp
                            <a href="{{ route($item['route']) }}"
                               class="relative flex items-center pl-10 pr-6 py-2 text-sm font-medium transition-colors {{ $active ? 'text-navy bg-surface-container' : 'text-on-surface-variant hover:text-navy hover:bg-surface-container/60' }}">
                                @if ($active)
                                    <span class="absolute left-0 inset-y-0 w-1 bg-gold" aria-hidden="true"></span>
                                @endif
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    @endif
                @endif


                @if (Auth::user()->state !== \App\Enums\UserState::Suspended->value)
                    @php $profileActive = request()->routeIs('dashboard.profile'); @endphp
                    <a href="{{ route('dashboard.profile') }}"
                       class="relative flex items-center px-6 py-2.5 text-sm font-medium transition-colors {{ $profileActive ? 'text-navy bg-surface-container' : 'text-on-surface-variant hover:text-navy hover:bg-surface-container/60' }}">
                        @if ($profileActive)
                            <span class="absolute left-0 inset-y-0 w-1 bg-gold" aria-hidden="true"></span>
                        @endif
                        {{ __('auth.profile') }}
                    </a>
                @endif

                <div class="mt-4 border-t border-outline-variant/60 pt-4">
                    <a href="{{ url('/') }}" target="_blank" rel="noopener"
                       class="flex items-center gap-2 px-6 py-2 text-sm font-medium text-on-surface-variant transition-colors hover:text-navy">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H8M17 7v9"/>
                        </svg>
                        {{ __('dashboard.visit_site') }}
                    </a>
                </div>
            </nav>

            <div class="p-4 border-t border-outline-variant/60">
                <p class="text-sm font-semibold text-navy">{{ Auth::user()->name }}</p>
                <p class="text-xs text-on-surface-variant mb-3 truncate">{{ Auth::user()->email }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-secondary w-full">
                        {{ __('auth.logout') }}
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main content: fixed 1280px grid, framed by 48px desktop margins --}}
        <main class="flex-1 min-w-0">
            <div class="mx-auto w-full max-w-[1280px] px-4 pb-8 pt-20 sm:px-6 lg:px-12 lg:pb-12 lg:pt-12">
                @if (session('status'))
                    <div class="mb-6 rounded-lg border border-emerald-800/25 bg-emerald-800/5 px-4 py-3 text-sm text-emerald-800">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 rounded-lg border border-error/25 bg-error/5 px-4 py-3 text-sm text-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
    @include('layouts.partials.form-script')
    @tallStackUiScript
    @livewireScripts
</body>
</html>
