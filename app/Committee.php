<?php

namespace App;

use Alumkit\Alumkit\Facades\Alumkit;
use Alumkit\Alumkit\Models\CommitteeMember;
use Illuminate\Support\Collection;

final class Committee
{
    /** @return array<int, array{role: string, name: string, image: string|null, vacant: bool}> */
    public static function all(): array
    {
        /** @var Collection<int, CommitteeMember> $members */
        $members = Alumkit::recentCommitteeMembers();

        return $members
            ->map(static fn (CommitteeMember $member): array => [
                'role' => $member->position->name ?? '',
                'name' => $member->displayName(),
                'image' => $member->photoUrl(),
                'vacant' => $member->user_id === null && $member->getAttribute('name') === null,
            ])
            ->values()
            ->all();
    }
}
