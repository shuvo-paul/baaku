<?php

declare(strict_types=1);

namespace App\Services;

use App\Content\ContentRegistry;
use App\Content\GlobalSchema;
use App\Content\PageSchema;
use App\Models\Content as ContentModel;
use App\Models\Page;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Content schemas and stored page/global content.
 */
final class Content
{
    /**
     * Register a page schema.
     */
    public static function page(string $slug, callable $callback): void
    {
        app(ContentRegistry::class)->registerPage($slug, $callback);
    }

    /**
     * Register a global schema.
     */
    public static function global(string $key, callable $callback): void
    {
        app(ContentRegistry::class)->registerGlobal($key, $callback);
    }

    /**
     * Get all registered page schemas.
     *
     * @return array<string, PageSchema>
     */
    public static function pages(): array
    {
        return app(ContentRegistry::class)->getPages();
    }

    /**
     * Get all registered global schemas.
     *
     * @return array<string, GlobalSchema>
     */
    public static function globals(): array
    {
        return app(ContentRegistry::class)->getGlobals();
    }

    /**
     * Get content for a page.
     *
     * @return Collection<int, ContentModel>
     */
    public static function pageContent(string $slug): Collection
    {
        return ContentModel::forPage($slug)->get();
    }

    /**
     * Get content for a global.
     *
     * @return Collection<int, ContentModel>
     */
    public static function globalContent(string $key): Collection
    {
        return ContentModel::forGlobal($key)->get();
    }

    /**
     * Closure for a public page route. Renders the page through its registered
     * schema view; unpublished pages 404 for everyone except users holding the
     * "manage pages" permission (preview).
     *
     * @return Closure(Request): View
     */
    public static function pageRoute(string $slug): Closure
    {
        return function (Request $request) use ($slug) {
            $page = Page::where('slug', $slug)->first();
            $viewName = app(ContentRegistry::class)->getPage($slug)?->viewName();

            if (
                $page === null
                || $viewName === null
                || (! $page->is_published && ! $request->user()?->can('manage pages'))
            ) {
                abort(404);
            }

            $contents = ContentModel::forPage($slug)->get()->keyBy('type');

            /** @phpstan-ignore argument.type */
            return view($viewName, compact('page', 'contents'));
        };
    }
}
