@extends('layouts.app')

@section('content')
    <x-card>
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('auth.confirm_password_title') }}
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('auth.confirm_password_text') }}
            </p>
        </div>

        <x-errors />

        <form method="POST" action="{{ route('password.confirm') }}" class="mt-6 space-y-4">
            @csrf

            <x-form.password
                name="password"
                :label="__('auth.password')"
                required
                autofocus
            />

            <x-button type="submit" block :text="__('auth.confirm')" />
        </form>
    </x-card>
@endsection
