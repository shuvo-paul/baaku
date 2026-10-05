@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('dashboard.assign_roles') }}
    </h1>

    <x-card>
        <div class="mb-4">
            <p class="text-gray-600">
                {{ __('dashboard.user_name') }}: <strong>{{ $user->name }}</strong>
                ({{ __('dashboard.user_email') }}: {{ $user->email }})
            </p>
        </div>

        <form method="POST" action="{{ route('dashboard.users.roles.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('dashboard.select_roles') }}
                </label>

                <div class="space-y-2">
                    @foreach ($roles as $role)
                        <x-checkbox
                            name="roles[]"
                            :label="$role->name"
                            :value="$role->name"
                            :checked="$user->hasRole($role)"
                        />
                    @endforeach
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('dashboard.assign_roles')" />
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
