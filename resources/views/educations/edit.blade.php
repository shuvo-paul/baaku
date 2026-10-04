@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('education.education') }}
    </h1>

    <x-card>
        <form method="POST" action="{{ route('dashboard.educations.update', $education) }}">
            @csrf
            @method('PUT')

            <div class="space-y-4" x-data="{ is_current: {{ old('is_current', $education->is_current) ? 'true' : 'false' }} }">
                <x-suggest name="level" :label="__('education.level')" :value="$education->level" :suggestions="config('alumkit.education.levels', [])" required />

                <x-suggest name="institution" :label="__('education.institution')" :value="$education->institution" :suggestions="config('alumkit.education.institutions', [])" required />
                <x-suggest name="subject" :label="__('education.subject')" :value="$education->subject" :suggestions="config('alumkit.education.subjects', [])" required />
                <x-input type="text" name="student_id" :label="__('education.student_id')" :value="old('student_id', $education->student_id)" />

                <div class="grid grid-cols-2 gap-4">
                    <x-year-select name="start_year" :label="__('education.start_year')" :value="$education->start_year" required />
                    <x-month-select name="start_month" :label="__('education.start_month')" :value="$education->start_month" />
                </div>

                <x-form.checkbox name="is_current" :label="__('education.currently_studying')" x-model="is_current" />

                <div class="grid grid-cols-2 gap-4" x-show="!is_current">
                    <x-year-select name="end_year" :label="__('education.end_year')" :value="$education->end_year" />
                    <x-month-select name="end_month" :label="__('education.end_month')" :value="$education->end_month" />
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('education.update_education')" />
                <a href="{{ route('dashboard.educations.index') }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
