<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\MembershipPayment;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentRejected
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public MembershipPayment $payment,
    ) {}
}
