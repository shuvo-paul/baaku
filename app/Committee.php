<?php

namespace App;

use Illuminate\Support\Facades\File;

final class Committee
{
    /** @return array<int, array<string, mixed>> */
    public static function all(): array
    {
        return File::json(resource_path('committee.json'));
    }
}
