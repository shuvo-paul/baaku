<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Grants need the permissions to exist first.
        (new PermissionsSeeder)->run();

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
    }
}
