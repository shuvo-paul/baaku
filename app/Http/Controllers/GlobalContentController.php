<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Content\ContentRegistry;
use App\Content\FieldExtractor;
use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class GlobalContentController extends Controller
{
    public function index(ContentRegistry $registry): View
    {
        $globals = $registry->getGlobals();

        /** @var View $view */
        $view = view('globals.index', compact('globals'));

        return $view;
    }

    public function edit(string $key, ContentRegistry $registry): View
    {
        $schema = $registry->getGlobal($key);

        abort_unless($schema !== null, 404, "No schema registered for global '{$key}'.");

        $contents = Content::forGlobal($key)->first();

        /** @var View $view */
        $view = view('globals.edit', [
            'key' => $key,
            'schema' => $schema,
            'contents' => $contents,
        ]);

        return $view;
    }

    public function update(string $key, Request $request, ContentRegistry $registry): RedirectResponse
    {
        $schema = $registry->getGlobal($key);

        abort_unless($schema !== null, 404, "No schema registered for global '{$key}'.");

        $owner = "global:{$key}";
        $fields = (new FieldExtractor($request))->extract($schema->fields(), $owner, 'global');

        Content::updateOrCreate(
            ['owner' => $owner, 'type' => 'global'],
            ['fields' => $fields],
        );

        return redirect()->route('dashboard.globals.edit', $key)
            ->with('status', 'Global content updated successfully.');
    }
}
