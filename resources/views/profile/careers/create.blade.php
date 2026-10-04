@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('career.add_career') }}
    </h1>

    <x-card>
        <x-errors />

        <form method="POST" action="{{ route('dashboard.profile.careers.store') }}">
            @csrf

            <div class="space-y-4" x-data="{ is_current: {{ old('is_current', false) ? 'true' : 'false' }} }">
                <x-select name="employment_type" :label="__('career.employment_type')" :options="$employmentTypes" :value="old('employment_type')" required />

                <x-input name="job_title" :label="__('career.job_title')" :value="old('job_title')" required />
                <x-input name="company" :label="__('career.company')" :value="old('company')" required />
                <x-input name="industry" :label="__('career.industry')" :value="old('industry')" />
                <x-input name="location" :label="__('career.location')" :value="old('location')" />

                <div class="grid grid-cols-2 gap-4">
                    <x-year-select name="start_year" :label="__('career.start_year')" :value="old('start_year')" required />
                    <x-month-select name="start_month" :label="__('career.start_month')" :value="old('start_month')" />
                </div>

                <x-form.checkbox name="is_current" :label="__('career.currently_working')" x-model="is_current" />

                <div class="grid grid-cols-2 gap-4" x-show="!is_current">
                    <x-year-select name="end_year" :label="__('career.end_year')" :value="old('end_year')" />
                    <x-month-select name="end_month" :label="__('career.end_month')" :value="old('end_month')" />
                </div>

                <x-form.textarea name="description" :label="__('career.description')" :value="old('description')" />
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('career.add_career')" />
                <a href="{{ route('dashboard.profile').'#career' }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
