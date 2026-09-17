<?php

namespace App;

use Alumkit\Alumkit\Facades\Alumkit;
use Alumkit\Alumkit\Models\CommitteeMember;

final class Committee
{
    /** @return array<int, array{role: string, name: string, image: string|null, vacant: bool}> */
    public static function all(): array
    {
        return Alumkit::recentCommitteeMembers()
            ->map(static fn (CommitteeMember $member): array => [
                'role' => $member->position?->name ?? '',
                'name' => $member->displayName(),
                'image' => $member->photoUrl(),
                'vacant' => $member->user_id === null && $member->name === null,
            ])
            ->values()
            ->all();
    }
}
