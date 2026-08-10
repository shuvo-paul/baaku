<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function edit(string $section): View
    {
        $sections = Content::sections();

        abort_unless(isset($sections[$section]), 404);

        $values = Content::values();

        $fields = collect($sections[$section]['fields'])
            ->map(function (array $field, string $key) use ($values) {
                if (($field['type'] ?? null) === 'link') {
                    return (object) [
                        'type' => 'link',
                        'label' => $field['label'],
                        'label_key' => $field['label_key'],
                        'url_key' => $field['url_key'],
                        'label_value' => $values[$field['label_key']],
                        'url_value' => $values[$field['url_key']],
                    ];
                }

                return (object) [
                    'key' => $key,
                    'label' => $field['label'],
                    'type' => $field['type'],
                    'value' => $values[$key],
                ];
            });

        return view('content.edit', [
            'section' => $sections[$section]['label'],
            'fields' => $fields,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'contents' => ['required', 'array'],
            'contents.*' => ['nullable', 'string'],
        ]);

        foreach ($validated['contents'] as $key => $value) {
            $value = is_string($value) ? trim($value) : null;

            Content::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value === '' ? null : $value],
            );
        }

        $section = Str::before(array_key_first($validated['contents']), '.');

        return redirect()->route("alumkit.content.$section")->with('status', 'Content updated.');
    }
}
