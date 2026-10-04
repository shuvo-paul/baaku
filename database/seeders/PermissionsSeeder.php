<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Services\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Built-in permissions — always seeded, cannot be removed by the app.
        foreach (Permissions::PERMISSIONS as $permission) {
            Permission::findOrCreate($permission);
        }

        // App-specific extensions via config('alumkit.permission.permissions').
        foreach ((array) config('alumkit.permission.permissions', []) as $permission) {
            Permission::findOrCreate($permission);
        }
    }
}
