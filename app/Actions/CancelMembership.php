<?php

declare(strict_types=1);

namespace App\Actions;

use App\Enums\MembershipStatus;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class CancelMembership
{
    /**
     * Cancel an active membership. No refund handling — payments are offline.
     */
    public function handle(Membership $membership, ?User $actor = null): Membership
    {
        if ($membership->status !== MembershipStatus::Active->value) {
            throw ValidationException::withMessages([
                'membership' => __('membership.membership_not_active'),
            ]);
        }

        $membership->update([
            'status' => MembershipStatus::Cancelled->value,
            'cancelled_at' => now(),
        ]);

        activity('memberships')
            ->performedOn($membership)
            ->event('membership_cancelled')
            ->withProperties([
                'cancelled_by' => $actor?->getKey(),
            ])
            ->log('membership cancelled');

        return $membership;
    }
}
