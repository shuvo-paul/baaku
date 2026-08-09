<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function edit(): View
    {
        $groups = Content::values()
            ->sortKeys()
            ->map(fn (?string $value, string $key) => (object) ['key' => $key, 'value' => $value])
            ->groupBy(fn (object $item) => Str::before($item->key, '.'));

        return view('content.edit', ['groups' => $groups]);
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

        return redirect()->route('alumkit.content.edit')->with('status', 'Content updated.');
    }
}
