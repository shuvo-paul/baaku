@extends('layouts.dashboard')

@section('title', __('membership.memberships'))

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-navy">
            {{ __('membership.memberships') }}
        </h1>
    </div>

    <x-card>
        <div class="mb-4 flex flex-wrap gap-2">
            @foreach (['all' => __('membership.status'), 'active' => __('membership.status_active'), 'expired' => __('membership.status_expired'), 'cancelled' => __('membership.status_cancelled')] as $key => $label)
                <a href="{{ route('dashboard.memberships.index', ['status' => $key]) }}"
                   class="rounded px-3 py-1.5 text-sm {{ $status === $key ? 'bg-navy text-white' : 'bg-surface-container text-on-surface-variant hover:text-navy' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        @if ($memberships->isEmpty())
            <p class="text-gray-600">
                {{ __('membership.no_memberships') }}
            </p>
        @else
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">{{ __('dashboard.user_name') }}</th>
                        <th class="text-left py-3 px-4">{{ __('membership.plan') }}</th>
                        <th class="text-left py-3 px-4">{{ __('membership.status') }}</th>
                        <th class="text-left py-3 px-4">{{ __('membership.starts_at') }}</th>
                        <th class="text-left py-3 px-4">{{ __('membership.ends_at') }}</th>
                        <th class="text-right py-3 px-4">{{ __('dashboard.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memberships as $membership)
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">
                                {{ $membership->user?->name ?? '—' }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $membership->plan?->name ?? '—' }}
                            </td>
                            <td class="py-3 px-4">
                                @php $effective = $membership->effectiveStatus(); @endphp
                                <span class="rounded px-2 py-0.5 text-xs font-medium {{ $effective->value === 'active' ? 'bg-emerald-100 text-emerald-800' : ($effective->value === 'expired' ? 'bg-amber-100 text-amber-800' : 'bg-gray-100 text-gray-600') }}">
                                    {{ __('membership.status_'.$effective->value) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $membership->starts_at?->format('d M Y') ?? '—' }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $membership->ends_at?->format('d M Y') ?? __('membership.never') }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                <a href="{{ route('dashboard.memberships.show', $membership) }}" class="text-navy hover:text-gold">
                                    {{ __('dashboard.edit') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                @include('pagination.simple', ['paginator' => $memberships])
            </div>
        @endif
    </x-card>
@endsection
