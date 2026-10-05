@extends('layouts.dashboard')

@section('content')
    <div class="space-y-12">
        @if (Auth::user()->state === \App\Enums\UserState::Suspended->value)
            <div class="rounded-lg border border-error/25 bg-error/5 px-4 py-3 text-sm text-error">
                {{ __('dashboard.account_suspended') }}
            </div>
        @endif

        {{-- Hero --}}
        <section class="flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-2xl">
                <p class="label-caps text-gold">Alumni Network</p>
                <h1 class="mt-3 font-serif text-3xl sm:text-4xl font-semibold text-navy">
                    {{ __('dashboard.welcome_back', ['name' => Auth::user()->name]) }}
                </h1>
                <p class="mt-4 text-lg leading-8 text-on-surface-variant">
                    {{ __('dashboard.welcome_text') }}
                </p>
            </div>
            @include('users.partials.state-badge', ['state' => Auth::user()->state, 'emailVerifiedAt' => Auth::user()->email_verified_at])
        </section>

        {{-- Quick links --}}
        @php
            $canManageMembers = auth()->user()->can('manage members');
            $links = [
                ['route' => 'dashboard.roles.index', 'show' => auth()->user()->can('manage roles'), 'overline' => __('dashboard.roles'), 'title' => __('dashboard.roles'), 'description' => __('dashboard.manage_roles_description')],
                ['route' => 'dashboard.users.index', 'show' => auth()->user()->state === \App\Enums\UserState::Active->value, 'overline' => __('dashboard.member_directory'), 'title' => __('dashboard.member_directory'), 'description' => $canManageMembers ? __('dashboard.manage_members_description') : __('dashboard.member_directory_description')],
                ['route' => 'dashboard.careers.index', 'show' => auth()->user()->can('manage careers'), 'overline' => __('career.careers'), 'title' => __('career.careers'), 'description' => __('dashboard.careers_description')],
                ['route' => 'dashboard.posts.index', 'show' => config('features.posts') && auth()->user()->state === \App\Enums\UserState::Active->value, 'overline' => __('post.posts'), 'title' => __('post.posts'), 'description' => __('dashboard.posts_description')],
                ['route' => 'dashboard.committee.index', 'show' => config('features.committee') && auth()->user()->can('manage committee'), 'overline' => __('committee.committee'), 'title' => __('committee.committee'), 'description' => __('dashboard.committee_description')],
                ['route' => 'dashboard.membership.show', 'show' => config('features.memberships') && auth()->user()->state === \App\Enums\UserState::Active->value, 'overline' => __('membership.membership'), 'title' => __('membership.membership'), 'description' => __('membership.view_plans')],
            ];
            $links = array_values(array_filter($links, fn ($link) => $link['show']));
        @endphp

        @if (Auth::user()->state !== \App\Enums\UserState::Suspended->value && ! empty($links))
            <section>
                <h2 class="font-serif text-xl font-semibold text-navy">
                    {{ __('dashboard.quick_links') }}
                </h2>
                <div class="mt-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach ($links as $link)
                        <a href="{{ route($link['route']) }}"
                           class="card group p-6 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_6px_24px_rgba(0,33,71,0.08)]">
                            <p class="label-caps text-gold">{{ $link['overline'] }}</p>
                            <h3 class="mt-2 font-serif text-xl font-semibold text-navy">{{ $link['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-on-surface-variant">{{ $link['description'] }}</p>
                            <p class="mt-4 text-sm font-semibold text-navy transition-colors group-hover:text-gold">
                                {{ __('dashboard.open') }} →
                            </p>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        @if (Auth::user()->state !== \App\Enums\UserState::Suspended->value && config('features.memberships'))
            @php
                $activeMembership = Auth::user()->activeMembership()->with('plan')->first();
            @endphp
            <section class="card p-6 lg:p-8">
                <p class="label-caps text-gold">{{ __('membership.membership') }}</p>

                @if ($activeMembership)
                    <h2 class="mt-2 font-serif text-2xl font-semibold text-navy">
                        {{ $activeMembership->plan?->name ?? '—' }}
                    </h2>
                    <div class="mt-3 flex flex-wrap items-center gap-2">
                        <span class="rounded bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-800">{{ __('membership.status_active') }}</span>
                        @if ($activeMembership->isLifetime())
                            <span class="rounded bg-purple-100 px-2 py-0.5 text-xs font-medium text-purple-800">{{ __('membership.lifetime_membership') }}</span>
                        @endif
                    </div>
                    <p class="mt-3 text-sm text-on-surface-variant">
                        {{ __('membership.ends_at') }}: {{ $activeMembership->ends_at?->format('d M Y') ?? __('membership.never') }}
                    </p>
                @else
                    <h2 class="mt-2 font-serif text-2xl font-semibold text-navy">
                        {{ __('membership.no_membership') }}
                    </h2>
                @endif

                <a href="{{ route('dashboard.membership.show') }}" class="btn-primary mt-5 inline-block">
                    {{ __('membership.membership') }} →
                </a>
            </section>
        @endif

        @if (Auth::user()->state !== \App\Enums\UserState::Suspended->value)
        {{-- Heritage accent: high-prestige content --}}
        <section class="card border-l-4 border-gold p-8 sm:p-10">
            <p class="label-caps text-gold">Heritage</p>
            <h2 class="mt-2 font-serif text-2xl font-semibold text-navy">
                {{ __('dashboard.manage_your_profile') }}
            </h2>
            <p class="mt-3 max-w-2xl leading-7 text-on-surface-variant">
                {{ __('dashboard.profile_cta') }}
            </p>
            <a href="{{ route('dashboard.profile') }}" class="btn-primary mt-6">
                {{ __('dashboard.view_profile') }}
            </a>
        </section>
        @endif
    </div>
@endsection
