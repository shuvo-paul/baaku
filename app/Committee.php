<?php

namespace App;

use App\Models\CommitteeMember;
use App\Services\Committee as CommitteeService;
use Illuminate\Support\Collection;

final class Committee
{
    /** @return array<int, array{role: string, name: string, image: string|null, vacant: bool}> */
    public static function all(): array
    {
        /** @var Collection<int, CommitteeMember> $members */
        $members = CommitteeService::recentMembers();

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
