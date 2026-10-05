<div class="space-y-4">
    @if (blank($method?->type))
        <x-select
            name="type"
            :label="__('membership.method_type')"
            :options="\App\Enums\MembershipMethodType::options()"
            :value="old('type')"
            required
        />
    @else
        <div>
            <span class="block text-sm font-medium text-gray-700 mb-1">{{ __('membership.method_type') }}</span>
            <p class="text-sm text-navy">{{ $method->label() }}</p>
            <p class="mt-1 text-xs text-gray-500">{{ __('membership.method_type_locked') }}</p>
        </div>
    @endif

    <div>
        <x-editor-field name="instructions" :label="__('membership.instructions')" :value="old('instructions', $method?->instructions)" />
        <p class="mt-1 text-sm text-gray-500">{{ __('membership.instructions_help') }}</p>
    </div>

    <x-form.checkbox name="is_active" :label="__('membership.is_active')" :checked="old('is_active', $method?->is_active ?? true)" />
</div>
