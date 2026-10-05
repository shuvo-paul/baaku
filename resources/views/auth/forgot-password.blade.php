@extends('layouts.app')

@section('content')
    <x-card>
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('auth.forgot_password') }}
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('auth.forgot_password_text') }}
            </p>
        </div>

        <x-errors />

        @if (session('status'))
            <div class="mt-4 text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
            @csrf

            <x-input
                type="email"
                name="email"
                :value="old('email')"
                :label="__('auth.email')"
                required
                autofocus
            />

            <x-button type="submit" block :text="__('auth.send_link')" />
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                {{ __('auth.back_to_login') }}
            </a>
        </div>
    </x-card>
@endsection
