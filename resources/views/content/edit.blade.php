@extends('alumkit::layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Content</h1>

    <x-card>
        <form method="POST" action="{{ route('alumkit.content.update') }}">
            @csrf
            @method('PUT')

            @foreach ($groups as $group => $items)
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 {{ $loop->first ? '' : 'mt-8' }}">
                    {{ str($group)->headline() }}
                </h2>

                <div class="space-y-4">
                    @foreach ($items as $item)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                {{ str($item->key)->replace('.', ' ')->headline() }}
                            </label>
                            <textarea name="contents[{{ $item->key }}]" rows="2" class="w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">{{ $item->value ?? '' }}</textarea>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="mt-6 flex items-center gap-4">
                <x-button type="submit" text="Save Content" />
                <a href="{{ route('alumkit.dashboard') }}" class="text-gray-600 hover:text-gray-900">Back to dashboard</a>
            </div>
        </form>
    </x-card>
@endsection
