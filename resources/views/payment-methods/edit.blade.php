@extends('layouts.dashboard')

@section('title', __('membership.edit_payment_method'))

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('membership.edit_payment_method') }}
    </h1>

    <x-card>
        <form method="POST" action="{{ route('dashboard.payment-methods.update', $paymentMethod) }}">
            @csrf
            @method('PUT')

            @include('payment-methods.form', ['method' => $paymentMethod])

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('membership.method_updated')" />
                <a href="{{ route('dashboard.payment-methods.index') }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
