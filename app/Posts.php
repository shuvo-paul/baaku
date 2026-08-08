<?php

namespace App;

use Illuminate\Support\Facades\File;

final class Posts
{
    /** @return array<int, array<string, mixed>> */
    public static function all(): array
    {
        return File::json(resource_path('posts.json'));
    }

    /** @return array<string, mixed>|null */
    public static function find(string $slug): ?array
    {
        return collect(self::all())->firstWhere('slug', $slug);
    }

    /** @return array<int, array<string, mixed>> */
    public static function related(string $slug, int $count = 3): array
    {
        $all = self::all();
        $index = array_search($slug, array_column($all, 'slug'), true);

        if ($index === false) {
            return [];
        }

        return array_values(array_slice(array_merge($all, $all), $index + 1, $count));
    }
}
