@extends('layouts.dashboard')

@section('title', __('membership.record_payment'))

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('membership.record_payment') }}
    </h1>

    <x-card>
        <form method="POST" action="{{ route('dashboard.payments.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">
                <x-user-search name="user_id" :label="__('dashboard.select_user')" />

                <x-select name="membership_plan_id" :label="__('membership.plan')" :options="$plans->pluck('name', 'id')->all()" :value="old('membership_plan_id')" required />

                <div class="grid grid-cols-2 gap-4">
                    <x-input name="amount" type="number" step="0.01" min="0" :label="__('membership.amount')" :value="old('amount')" required />
                    <x-select name="method" :label="__('membership.method')" :options="$methods->mapWithKeys(fn ($m) => [$m->type => $m->label()])->all()" :value="old('method')" required />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <x-input name="reference" :label="__('membership.reference')" :value="old('reference')" />
                    <x-input name="paid_at" type="date" :label="__('membership.paid_at')" :value="old('paid_at', now()->format('Y-m-d'))" required />
                </div>

                <x-form.textarea name="notes" :label="__('membership.notes')" :value="old('notes')" />

                <x-input name="proof" type="file" :label="__('membership.upload_proof')" />

                <x-form.checkbox name="activate" label="Activate membership immediately" :checked="old('activate')" />
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('membership.record_payment')" />
                <a href="{{ route('dashboard.payments.index') }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
