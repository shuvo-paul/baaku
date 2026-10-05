@props(['name', 'label' => null, 'value' => null])

<div>
    @if ($label)
        <label class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif

    <div class="rounded-md border border-gray-300 bg-white shadow-sm"
         data-editor
         data-upload-url="{{ route('editor.image') }}"
         @if ($value) data-value="{{ $value }}" @endif>
        <input type="hidden" name="{{ $name }}" value="{{ $value ?? '' }}">
        <div class="editor-holder"></div>
    </div>

    @vite('resources/js/editor.js')
</div>
