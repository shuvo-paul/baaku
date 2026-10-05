<?php

declare(strict_types=1);

namespace App\Actions;

use App\Enums\PaymentStatus;
use App\Models\Membership;
use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class ApprovePayment
{
    public function __construct(
        private ActivateMembership $activate,
    ) {}

    /**
     * Staff approval of a pending payment. Approving runs the payment through
     * the single activation path (create or extend a membership).
     */
    public function handle(MembershipPayment $payment, ?User $actor = null): Membership
    {
        if ($payment->status !== PaymentStatus::Pending->value) {
            throw ValidationException::withMessages([
                'payment' => __('membership.payment_not_pending'),
            ]);
        }

        return $this->activate->handle($payment, $actor);
    }
}
