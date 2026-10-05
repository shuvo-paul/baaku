<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserState;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {

        $defaultRoles = config('auth.default_roles', ['admin', 'moderator', 'member']);
        $adminRole = $defaultRoles[0] ?? 'admin';

        try {
            $role = Role::findByName($adminRole);
        } catch (RoleDoesNotExist) {
            return;
        }

        $user = User::updateOrCreate(
            ['email' => config('app.seeder.admin_email', 'admin@example.com')],
            [
                'name' => config('app.seeder.admin_name', 'Admin'),
                'password' => bcrypt(config('app.seeder.admin_password', 'password')),
                'email_verified_at' => now(),
                'state' => UserState::Active->value,
            ],
        );

        if (! $user->hasRole($role)) {
            $user->assignRole($role);
        }
    }
}
