@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-navy">
            {{ __('committee.manage_positions') }}
        </h1>

        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard.committee.index') }}" class="text-navy hover:text-gold">
                ← Back to Committee
            </a>
            <a href="{{ route('dashboard.positions.create') }}">
                <x-button :text="__('committee.new_position')" />
            </a>
        </div>
    </div>

    <x-card>
        @if ($positions->isEmpty())
            <p class="text-gray-600">
                {{ __('committee.no_positions') }}
            </p>
        @else
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">{{ __('committee.position_name') }}</th>
                        <th class="text-left py-3 px-4">{{ __('committee.members') }}</th>
                        <th class="text-right py-3 px-4">{{ __('dashboard.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">
                                {{ $position->name }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ trans_choice('committee.member_count', $position->committee_members_count) }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                <a href="{{ route('dashboard.positions.edit', $position) }}" class="text-navy hover:text-gold mr-3">
                                    {{ __('dashboard.edit') }}
                                </a>

                                <form method="POST" action="{{ route('dashboard.positions.destroy', $position) }}" class="inline" onsubmit="return confirm('{{ __('dashboard.confirm_delete') }}')">
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
