<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Membership;
use App\Models\MembershipPayment;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentApproved
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public MembershipPayment $payment,
        public Membership $membership,
    ) {}
}
