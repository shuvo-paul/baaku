<?php

declare(strict_types=1);

return [

    // App-wide currency for all membership money, rendered by
    // Members::formatMoney() (e.g. "BDT 1,500.00").
    'currency' => env('MEMBERSHIP_CURRENCY', 'BDT'),

    // Feature keys an admin can gate behind a membership plan. Each is a
    // toggle in the plan editor; when a plan grants a key, members with an
    // active plan reach the matching dashboard area. While the memberships
    // feature is enabled these areas require a granting plan (staff who
    // administer memberships bypass the gate). Apps may extend the list —
    // add a matching `feature_{key}` label to lang/en/membership.php.
    'gateable_features' => ['members', 'posts'],

    // Payment methods (bKash, Nagad, bank transfer) are managed from the
    // dashboard and stored in the database.
    'expiry' => [
        'enabled' => true,
        'at' => '00:30',
    ],

    'proof' => [
        'disk' => 'public',
        'max_kb' => 2048,
        'mimes' => ['jpg', 'jpeg', 'png', 'pdf'],
    ],

];
