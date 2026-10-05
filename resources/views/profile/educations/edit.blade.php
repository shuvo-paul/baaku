@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-navy mb-6">
        {{ __('education.update_education') }}
    </h1>

    <x-card>
        <x-errors />

        <form method="POST" action="{{ route('dashboard.profile.educations.update', $education) }}">
            @csrf
            @method('PUT')

            <div class="space-y-4" x-data="{ is_current: {{ old('is_current', $education->is_current) ? 'true' : 'false' }} }">
                <x-suggest name="level" :label="__('education.level')" :value="old('level', $education->level)" :suggestions="config('education.levels', [])" required />

                <x-suggest name="institution" :label="__('education.institution')" :value="old('institution', $education->institution)" :suggestions="config('education.institutions', [])" required />
                <x-suggest name="subject" :label="__('education.subject')" :value="old('subject', $education->subject)" :suggestions="config('education.subjects', [])" required />
                <x-input type="text" name="student_id" :label="__('education.student_id')" :value="old('student_id', $education->student_id)" />

                <div class="grid grid-cols-2 gap-4">
                    <x-year-select name="start_year" :label="__('education.start_year')" :value="old('start_year', $education->start_year)" required />
                    <x-month-select name="start_month" :label="__('education.start_month')" :value="old('start_month', $education->start_month)" />
                </div>

                <x-form.checkbox name="is_current" :label="__('education.currently_studying')" x-model="is_current" />

                <div class="grid grid-cols-2 gap-4" x-show="!is_current">
                    <x-year-select name="end_year" :label="__('education.end_year')" :value="old('end_year', $education->end_year)" />
                    <x-month-select name="end_month" :label="__('education.end_month')" :value="old('end_month', $education->end_month)" />
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" :text="__('education.update_education')" />
                <a href="{{ route('dashboard.profile').'#education' }}" class="text-gray-600 hover:text-navy">
                    {{ __('dashboard.back_to_dashboard') }}
                </a>
            </div>
        </form>
    </x-card>
@endsection
