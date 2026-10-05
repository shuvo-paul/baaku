<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Dashboard-authored post queries, distinct from the public-site \App\Posts
 * JSON helper.
 */
final class Posts
{
    /**
     * Published posts, newest first, author eager-loaded. Compose further (paginate, filter) on the builder.
     *
     * @return Builder<Post>
     */
    public static function published(): Builder
    {
        return Post::published()->with('user')->latest();
    }

    /**
     * The N most recent published posts (author eager-loaded). Limit is clamped to >= 0.
     *
     * @return Collection<int, Post>
     */
    public static function recent(int $limit = 5): Collection
    {
        return self::published()->limit(max(0, $limit))->get();
    }
}
