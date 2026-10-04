@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-navy">
            {{ __('education.educations') }}
        </h1>

        @can('manage educations')
            <a href="{{ route('dashboard.educations.create') }}">
                <x-button :text="__('education.add_education')" />
            </a>
        @endcan
    </div>

    <x-card>
        @if ($educations->isEmpty())
            <p class="text-gray-600">
                {{ __('education.no_educations') }}
            </p>
        @else
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">{{ __('education.level') }}</th>
                        <th class="text-left py-3 px-4">{{ __('education.institution') }}</th>
                        <th class="text-left py-3 px-4">{{ __('education.subject') }}</th>
                        <th class="text-right py-3 px-4">{{ __('dashboard.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($educations as $education)
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">
                                {{ $education->level }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $education->institution }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $education->subject ?? '—' }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                @can('manage educations')
                                    <a href="{{ route('dashboard.educations.edit', $education) }}" class="text-navy hover:text-gold mr-3">
                                        {{ __('dashboard.edit') }}
                                    </a>

                                    <form method="POST" action="{{ route('dashboard.educations.destroy', $education) }}" class="inline" onsubmit="return confirm('{{ __('dashboard.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            {{ __('dashboard.delete') }}
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </x-card>
@endsection
