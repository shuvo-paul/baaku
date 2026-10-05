@extends('layouts.dashboard')

@section('title', __('membership.membership'))

@section('content')
    <div class="space-y-8">
        @if ($pendingPayment)
            <div class="rounded-lg border border-amber-800/25 bg-amber-800/5 px-4 py-3 text-sm text-amber-800">
                {{ __('membership.pending_review_notice') }}
                <a href="{{ route('dashboard.membership.payments.show', $pendingPayment) }}" class="font-semibold underline">
                    {{ __('membership.payment') }} →
                </a>
            </div>
        @endif

        <section class="card p-6 lg:p-8">
            <p class="label-caps text-gold">{{ __('membership.current_membership') }}</p>

            @if ($activeMembership)
                <h1 class="mt-2 font-serif text-3xl font-semibold text-navy">{{ $activeMembership->plan?->name ?? '—' }}</h1>

                <div class="mt-3 flex flex-wrap items-center gap-2">
                    <span class="rounded bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-800">{{ __('membership.status_active') }}</span>
                    @if ($activeMembership->isLifetime())
                        <span class="rounded bg-purple-100 px-2 py-0.5 text-xs font-medium text-purple-800">{{ __('membership.lifetime_membership') }}</span>
                    @endif
                </div>

                <dl class="mt-6 space-y-3 border-t border-outline-variant/60 pt-5 text-sm">
                    <div class="flex items-start justify-between gap-4">
                        <dt class="shrink-0 text-on-surface-variant">{{ __('membership.starts_at') }}</dt>
                        <dd class="text-right text-navy">{{ $activeMembership->starts_at?->format('d M Y') ?? '—' }}</dd>
                    </div>
                    <div class="flex items-start justify-between gap-4">
                        <dt class="shrink-0 text-on-surface-variant">{{ __('membership.ends_at') }}</dt>
                        <dd class="text-right text-navy">{{ $activeMembership->ends_at?->format('d M Y') ?? __('membership.never') }}</dd>
                    </div>
                </dl>

                @if ($activeMembership->plan?->features)
                    <div class="mt-6 border-t border-outline-variant/60 pt-5">
                        <p class="label-caps text-gold">{{ __('membership.features') }}</p>
                        <ul class="mt-3 space-y-1.5 text-sm text-on-surface-variant">
                            @foreach ($activeMembership->plan->features as $key => $value)
                                <li class="flex items-center gap-2">
                                    <span class="text-gold">✓</span>
                                    <span>{{ $key }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('dashboard.membership.plans') }}" class="btn-primary">{{ __('membership.renew') }}</a>
                </div>
            @else
                <h1 class="mt-2 font-serif text-3xl font-semibold text-navy">{{ __('membership.no_membership') }}</h1>
                <p class="mt-3 max-w-2xl leading-7 text-on-surface-variant">
                    {{ __('membership.view_plans') }}
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('dashboard.membership.plans') }}" class="btn-primary">{{ __('membership.view_plans') }}</a>
                    <a href="{{ route('dashboard.membership.payments.create') }}" class="btn-secondary">{{ __('membership.submit_payment') }}</a>
                </div>
            @endif
        </section>

        <section class="card p-6 lg:p-8">
            <p class="label-caps text-gold">{{ __('membership.membership_history') }}</p>

            @if ($payments->isEmpty())
                <p class="mt-4 text-sm text-on-surface-variant">{{ __('membership.no_payments') }}</p>
            @else
                <table class="mt-4 w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2 px-3 text-xs uppercase text-on-surface-variant">{{ __('membership.paid_at') }}</th>
                            <th class="text-left py-2 px-3 text-xs uppercase text-on-surface-variant">{{ __('membership.plan') }}</th>
                            <th class="text-left py-2 px-3 text-xs uppercase text-on-surface-variant">{{ __('membership.amount') }}</th>
                            <th class="text-left py-2 px-3 text-xs uppercase text-on-surface-variant">{{ __('membership.status') }}</th>
                            <th class="text-right py-2 px-3 text-xs uppercase text-on-surface-variant">{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr class="border-b">
                                <td class="py-2 px-3 text-sm text-navy">{{ $payment->paid_at?->format('d M Y') }}</td>
                                <td class="py-2 px-3 text-sm text-navy">{{ $payment->plan?->name ?? '—' }}</td>
                                <td class="py-2 px-3 text-sm text-navy">
                                    {{ \App\Services\Members::formatMoney($payment->amount) }}
                                </td>
                                <td class="py-2 px-3 text-sm">
                                    <span class="rounded px-2 py-0.5 text-xs font-medium {{ $payment->status === 'approved' ? 'bg-emerald-100 text-emerald-800' : ($payment->status === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-gray-100 text-gray-600') }}">
                                        {{ __('membership.payment_'.$payment->status) }}
                                    </span>
                                </td>
                                <td class="py-2 px-3 text-right">
                                    <a href="{{ route('dashboard.membership.payments.show', $payment) }}" class="text-navy hover:text-gold text-sm">
                                        {{ __('dashboard.edit') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6">
                    @include('pagination.simple', ['paginator' => $payments])
                </div>
            @endif
        </section>
    </div>
@endsection
