@extends('layouts.dashboard')

@section('title', __('membership.plans'))

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-navy">
            {{ __('membership.plans') }}
        </h1>

        <a href="{{ route('dashboard.plans.create') }}">
            <x-button :text="__('membership.new_plan')" />
        </a>
    </div>

    <x-card>
        @if ($plans->isEmpty())
            <p class="text-gray-600">
                {{ __('membership.no_plans') }}
            </p>
        @else
            <p class="text-sm text-gray-500 mb-4">{{ __('membership.drag_to_reorder') }}</p>

            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4 w-8"></th>
                        <th class="text-left py-3 px-4">{{ __('membership.plan_name') }}</th>
                        <th class="text-left py-3 px-4">{{ __('membership.term') }}</th>
                        <th class="text-left py-3 px-4">{{ __('membership.price') }}</th>
                        <th class="text-left py-3 px-4">{{ __('membership.status') }}</th>
                        <th class="text-right py-3 px-4">{{ __('dashboard.actions') }}</th>
                    </tr>
                </thead>
                <tbody x-data x-init="
                    import('{{ url('assets/sortable.esm.js') }}').then(function(m) {
                        new m.default($el, {
                            animation: 150,
                            handle: '.drag-handle',
                            onEnd: function(evt) {
                                var ids = Array.from($el.querySelectorAll('tr')).map(function(row) { return row.dataset.id; });
                                fetch('{{ route('dashboard.plans.reorder') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-XSRF-TOKEN': decodeURIComponent(document.cookie.match(/XSRF-TOKEN=([^;]+)/)?.[1] || ''),
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({ ids: ids })
                                });
                            }
                        });
                    });
                ">
                    @foreach ($plans as $plan)
                        <tr class="border-b" data-id="{{ $plan->id }}">
                            <td class="py-3 px-4">
                                <span class="drag-handle cursor-grab text-gray-400 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                    </svg>
                                </span>
                            </td>
                            <td class="py-3 px-4 font-medium">
                                {{ $plan->name }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $plan->termLabel() }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ \App\Services\Members::formatMoney($plan->price) }}
                            </td>
                            <td class="py-3 px-4">
                                @if ($plan->is_active)
                                    <span class="rounded bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-800">{{ __('membership.active') }}</span>
                                @else
                                    <span class="rounded bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600">{{ __('membership.inactive') }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right">
                                <a href="{{ route('dashboard.plans.edit', $plan) }}" class="text-navy hover:text-gold mr-3">
                                    {{ __('dashboard.edit') }}
                                </a>

                                <form method="POST" action="{{ route('dashboard.plans.destroy', $plan) }}" class="inline" onsubmit="return confirm('{{ __('dashboard.confirm_delete') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        {{ __('dashboard.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </x-card>
@endsection
