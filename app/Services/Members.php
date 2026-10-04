<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Membership;
use App\Models\MembershipPaymentMethod;
use App\Models\MembershipPlan;
use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Membership domain: plans, the current user's membership, money formatting,
 * and dashboard-managed payment methods.
 */
final class Members
{
    /**
     * Active membership plans, ordered for display. Pricing/gating reads only —
     * plans are authored in the dashboard.
     *
     * @return Collection<int, MembershipPlan>
     */
    public static function activePlans(): Collection
    {
        return MembershipPlan::active()->get();
    }

    /**
     * The user's current membership, or null when they have none.
     */
    public static function membershipFor(User $user): ?Membership
    {
        /** @var Membership|null $membership */
        $membership = $user->activeMembership()->with('plan')->first();

        return $membership;
    }

    /**
     * Whether the user currently holds an active membership.
     */
    public static function hasActiveMembership(User $user): bool
    {
        return $user->hasActiveMembership();
    }

    /**
     * Format an amount in the app-wide membership currency, e.g. "BDT 1,500.00".
     */
    public static function formatMoney(float|string $amount): string
    {
        $currency = (string) config('alumkit.membership.currency', 'BDT');

        return $currency.' '.number_format((float) $amount, 2);
    }

    /**
     * The dashboard-managed payment methods (type => label). Only methods
     * staff created in the dashboard are listed.
     *
     * @return array<string, string>
     */
    public static function paymentMethods(): array
    {
        /** @var array<string, string> $methods */
        $methods = MembershipPaymentMethod::active()
            ->get()
            ->mapWithKeys(fn (MembershipPaymentMethod $method): array => [$method->type => $method->label()])
            ->all();

        return $methods;
    }
}
