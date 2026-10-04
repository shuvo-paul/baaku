<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Services\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
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

        $defaultRoles = config('alumkit.permission.default_roles', ['admin', 'moderator', 'member']);

        foreach ($defaultRoles as $roleName) {
            Role::findOrCreate($roleName);
        }

        $adminRole = Role::findByName($defaultRoles[0] ?? 'admin');
        $adminRole->givePermissionTo(Permission::all());

        if (isset($defaultRoles[1])) {
            $moderatorRole = Role::findByName($defaultRoles[1]);
            $moderatorRole->givePermissionTo(['manage members', 'view dashboard']);
        }

        if (isset($defaultRoles[2])) {
            Role::findByName($defaultRoles[2]);
        }
    }
}
