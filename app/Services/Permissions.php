<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Built-in permissions shipped with the dashboard. Always seeded; cannot be
 * removed by app-specific config.
 */
final class Permissions
{
    /**
     * Package-defined permissions. Always seeded; cannot be removed by the consumer app.
     */
    public const array PERMISSIONS = [
        'manage roles',
        'manage permissions',
        'manage members',
        'manage educations',
        'manage committee',
        'manage pages',
        'manage membership plans',
        'manage memberships',
        'view dashboard',
        'view activity log',
    ];
}
