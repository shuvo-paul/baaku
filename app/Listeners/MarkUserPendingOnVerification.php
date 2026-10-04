<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Enums\UserState;
use App\Models\User;
use Illuminate\Auth\Events\Verified;

class MarkUserPendingOnVerification
{
    public function handle(Verified $event): void
    {
        $user = $event->user;

        if ($user instanceof User && $user->state === UserState::Unverified->value) {
            // Transition from Unverified → Pending so the user enters
            // the admin approval queue before gaining full access.
            $user->update(['state' => UserState::Pending->value]);
        }
    }
}
