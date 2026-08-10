@extends('alumkit::layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">{{ $section }}</h1>

    <x-card>
        <form method="POST" action="{{ route('alumkit.content.update') }}">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                @foreach ($fields as $field)
                    @if ($field->type === 'link')
                        <x-link-field :field="$field" />
                    @else
                        <div>
                            <label for="{{ $field->key }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                {{ $field->label }}
                            </label>
                            @if ($field->type === 'textarea')
                                <textarea name="contents[{{ $field->key }}]" id="{{ $field->key }}" rows="3" class="w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">{{ $field->value ?? '' }}</textarea>
                            @else
                                <input type="text" name="contents[{{ $field->key }}]" id="{{ $field->key }}" value="{{ $field->value ?? '' }}" class="w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" text="Save Section" />
                <a href="{{ route('alumkit.dashboard') }}" class="text-gray-600 hover:text-gray-900">Back to dashboard</a>
            </div>
        </form>
    </x-card>
@endsection
