@extends('layouts.app')

@section('content')
    <x-form-wrapper :title="__('auth.sign_in')" :show-errors="false">
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <x-input
                    type="email"
                    name="email"
                    :value="old('email')"
                    :label="__('auth.email')"
                    required
                    autofocus
                />
            </div>

            <div>
                <x-form.password
                    name="password"
                    :label="__('auth.password')"
                    required
                />
            </div>

            <div class="flex items-center justify-between">
                <x-checkbox name="remember" :label="__('auth.remember_me')" />

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                        {{ __('auth.forgot_password') }}
                    </a>
                @endif
            </div>

            <x-button type="submit" block :text="__('auth.sign_in')" />
        </form>

        @slot('footer')
            @if (Route::has('register'))
                <span class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('auth.no_account') }}
                </span>
                <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                    {{ __('auth.register') }}
                </a>
            @endif
        @endslot
    </x-form-wrapper>
@endsection
