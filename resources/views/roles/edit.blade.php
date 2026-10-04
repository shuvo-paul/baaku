@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('dashboard.edit_role') }}
    </h1>

    <x-card>
        <form method="POST" action="{{ route('dashboard.roles.update', $role) }}">
            @csrf
            @method('PUT')

            <x-input name="name" :label="__('dashboard.role_name')" :value="$role->name" required />

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('dashboard.select_permissions') }}
                </label>

                <div class="space-y-2">
                    @foreach ($permissions as $permission)
                        <x-checkbox
                            name="permissions[]"
                            :label="$permission->name"
                            :value="$permission->name"
                            :checked="$role->hasPermissionTo($permission)"
                        />
                    @endforeach
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('dashboard.edit_role')" />
                <a href="{{ route('dashboard.roles.index') }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
