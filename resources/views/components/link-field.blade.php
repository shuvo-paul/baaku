<div
    x-data="{ open: false, label: {{ Js::from($field->label_value ?? '') }}, url: {{ Js::from($field->url_value ?? '') }}, draftLabel: '', draftUrl: '', sugOpen: false, highlight: -1, routes: {{ Js::from($routes ?? []) }}, suggestions() { const q = this.draftUrl.trim().toLowerCase(); return this.routes.filter(r => !q || r.uri.toLowerCase().includes(q) || r.label.toLowerCase().includes(q)).slice(0, 8); }, pick(r) { this.draftUrl = r.uri; this.highlight = -1; this.sugOpen = false; }, onKeydown(e) { const list = this.suggestions(); if (e.key === 'ArrowDown') { e.preventDefault(); this.highlight = Math.min(this.highlight + 1, list.length - 1); } else if (e.key === 'ArrowUp') { e.preventDefault(); this.highlight = Math.max(this.highlight - 1, 0); } else if (e.key === 'Enter' && this.highlight >= 0) { e.preventDefault(); this.pick(list[this.highlight]); } else if (e.key === 'Escape') { this.sugOpen = false; } }, openModal() { this.draftLabel = this.label; this.draftUrl = this.url; this.open = true; }, save() { this.label = this.draftLabel; this.url = this.draftUrl; this.open = false; } }"
>
    <input type="hidden" name="contents[{{ $field->label_key }}]" x-model="label">
    <input type="hidden" name="contents[{{ $field->url_key }}]" x-model="url">

    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ $field->label }}</label>
    <button type="button" @click="openModal()" class="w-full flex items-center justify-between gap-3 rounded-md border border-gray-300 bg-white px-3 py-2 text-left shadow-sm hover:border-indigo-400 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
        <span class="truncate">
            <span class="font-medium" x-text="label || 'No label'"></span>
            <span class="text-xs text-gray-400 ml-2" x-text="url"></span>
        </span>
        <span class="shrink-0 text-xs font-medium text-indigo-600 dark:text-indigo-400">Edit</span>
    </button>

    {{-- Popup --}}
    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="open = false">
        <div class="absolute inset-0 bg-gray-900/50" @click="open = false"></div>
        <div class="relative w-full max-w-sm rounded-lg bg-white p-8 shadow-xl dark:bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ $field->label }}</h3>
            <div class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">Label</label>
                    <input type="text" x-model="draftLabel" class="w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                    <div class="relative">
                        <input type="text" x-model="draftUrl" @focus="sugOpen = true" @blur="sugOpen = false" @keydown="onKeydown($event)" class="w-full rounded-md border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        <div x-show="sugOpen && suggestions().length" x-cloak class="absolute z-10 mt-1 w-full max-h-48 overflow-auto rounded-md border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800">
                            <template x-for="(r, i) in suggestions()" :key="r.uri">
                                <button type="button" @mousedown.prevent="pick(r)" @mouseenter="highlight = i" :class="i === highlight ? 'bg-indigo-50 dark:bg-gray-700' : ''" class="flex w-full items-center justify-between px-3 py-2 text-left text-sm">
                                    <span class="font-medium text-gray-900 dark:text-white" x-text="r.label"></span>
                                    <span class="text-xs text-gray-400" x-text="r.uri"></span>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-3">
                <button type="button" @click="open = false" class="px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900">Cancel</button>
                <button type="button" @click="save()" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">Save</button>
            </div>
        </div>
    </div>
</div>
