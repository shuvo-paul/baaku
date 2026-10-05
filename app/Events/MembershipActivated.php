<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Membership;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MembershipActivated
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public Membership $membership,
    ) {}
}
