@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-navy">
            {{ __('dashboard.roles') }}
        </h1>

        @can('manage roles')
            <a href="{{ route('dashboard.roles.create') }}">
                <x-button :text="__('dashboard.create_role')" />
            </a>
        @endcan
    </div>

    <x-card>
        @if ($roles->isEmpty())
            <p class="text-gray-600">
                {{ __('dashboard.no_roles') }}
            </p>
        @else
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">{{ __('dashboard.role_name') }}</th>
                        <th class="text-left py-3 px-4">{{ __('dashboard.select_permissions') }}</th>
                        <th class="text-right py-3 px-4">{{ __('dashboard.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">{{ $role->name }}</td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ trans_choice('dashboard.permissions_count', $role->permissions->count(), ['count' => $role->permissions->count()]) }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                @can('manage roles')
                                    <a href="{{ route('dashboard.roles.edit', $role) }}" class="text-navy hover:text-gold mr-3">
                                        {{ __('dashboard.edit') }}
                                    </a>

                                    <form method="POST" action="{{ route('dashboard.roles.destroy', $role) }}" class="inline" onsubmit="return confirm('{{ __('dashboard.confirm_delete') }}')">
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
