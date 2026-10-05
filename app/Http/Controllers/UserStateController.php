<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\UserState;
use App\Models\User;
use App\Notifications\UserActivatedNotification;
use App\Notifications\UserRejectedNotification;
use App\Notifications\UserSuspendedNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserStateController extends Controller
{
    public function update(Request $request, string $user): RedirectResponse
    {
        $targetUser = User::findOrFail($user);

        $request->validate([
            'state' => ['required', 'string', 'in:'.implode(',', array_column(UserState::cases(), 'value'))],
            'reason' => ['required_if:state,rejected,suspended', 'nullable', 'string', 'max:2000'],
        ]);

        // Prevent state changes on unverified users: email must be verified before membership actions.
        if (is_null($targetUser->email_verified_at)) {
            return redirect()->route('dashboard.users.show', $targetUser)
                ->with('error', __('dashboard.unverified_user_no_transition'));
        }

        // Prevent self-lockout: an admin cannot change their own membership state.
        if ($request->user()->getKey() === $targetUser->getKey()) {
            return redirect()->route('dashboard.users.show', $targetUser)
                ->with('error', __('dashboard.cannot_change_own_state'));
        }

        $newState = UserState::from($request->input('state'));
        $currentState = UserState::from($targetUser->state);

        if (! $currentState->canTransitionTo($newState)) {
            return redirect()->route('dashboard.users.index')
                ->with('error', __('dashboard.invalid_state_transition'));
        }

        $targetUser->update(['state' => $newState->value]);

        activity('member_management')
            ->performedOn($targetUser)
            ->event('state_changed')
            ->withProperties([
                'old_state' => $currentState->value,
                'new_state' => $newState->value,
                'reason' => $request->input('reason'),
            ])
            ->log('member state changed');

        if ($newState === UserState::Rejected) {
            $targetUser->notify(new UserRejectedNotification($request->input('reason')));
        } elseif ($newState === UserState::Suspended) {
            $targetUser->notify(new UserSuspendedNotification($request->input('reason')));
        } elseif ($newState === UserState::Active) {
            $targetUser->notify(new UserActivatedNotification);
        }

        return redirect()->route('dashboard.users.index')
            ->with('status', __('dashboard.user_state_updated'));
    }
}
