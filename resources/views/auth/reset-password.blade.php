@extends('layouts.app')

@section('content')
    <x-card>
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('auth.reset_password') }}
            </h1>
        </div>

        <x-errors />

        <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-4">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <x-input
                type="email"
                name="email"
                :value="old('email', $request->email)"
                :label="__('auth.email')"
                required
                autofocus
            />

            <div>
                <x-form.password
                    name="password"
                    :label="__('auth.password')"
                    required
                />
            </div>

            <div>
                <x-form.password
                    name="password_confirmation"
                    :label="__('auth.confirm_password')"
                    required
                />
            </div>

            <x-button type="submit" block :text="__('auth.reset_password')" />
        </form>
    </x-card>
@endsection
