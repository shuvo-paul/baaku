@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('career.update_career') }}
    </h1>

    <x-card>
        <form method="POST" action="{{ route('dashboard.careers.update', $career) }}">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <x-select name="employment_type" :label="__('career.employment_type')" :options="$employmentTypes" :value="$career->employment_type->value" required />

                <x-input name="job_title" :label="__('career.job_title')" :value="$career->job_title" required />
                <x-input name="company" :label="__('career.company')" :value="$career->company" required />
                <x-input name="industry" :label="__('career.industry')" :value="$career->industry" />
                <x-input name="location" :label="__('career.location')" :value="$career->location" />

                <div class="grid grid-cols-2 gap-4" x-data="{ is_current: {{ $career->is_current ? 'true' : 'false' }} }">
                    <x-year-select name="start_year" :label="__('career.start_year')" :value="$career->start_year" required />
                    <x-month-select name="start_month" :label="__('career.start_month')" :value="$career->start_month" />
                </div>

                <x-form.checkbox name="is_current" :label="__('career.currently_working')" x-model="is_current" />

                <div class="grid grid-cols-2 gap-4" x-show="!is_current">
                    <x-year-select name="end_year" :label="__('career.end_year')" :value="$career->end_year" />
                    <x-month-select name="end_month" :label="__('career.end_month')" :value="$career->end_month" />
                </div>

                <x-form.textarea name="description" :label="__('career.description')" :value="$career->description" />
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('career.update_career')" />
                <a href="{{ route('dashboard.careers.index') }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
