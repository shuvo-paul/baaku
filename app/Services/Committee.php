<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\CommitteeMember;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Committee-member queries shared by the dashboard and the public site.
 */
final class Committee
{
    /**
     * All committee members sorted by dashboard order, with position and user eager-loaded.
     *
     * @return Builder<CommitteeMember>
     */
    public static function members(): Builder
    {
        return CommitteeMember::with(['position', 'user'])->orderBy('sort_order');
    }

    /**
     * The N most recent committee members (sorted by dashboard order). Limit 0 returns all.
     *
     * @return Collection<int, CommitteeMember>
     */
    public static function recentMembers(int $limit = 0): Collection
    {
        $query = self::members();

        if ($limit > 0) {
            $query->limit($limit);
        }

        return $query->get();
    }
}
