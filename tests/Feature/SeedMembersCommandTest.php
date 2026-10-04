<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('seeds the built-in permissions, default roles, and the admin user', function () {
    $this->artisan('members:seed')->assertSuccessful();

    expect(Permission::count())->toBe(10)
        ->and(Role::pluck('name')->all())->toEqualCanonicalizing(['admin', 'moderator', 'member']);

    $admin = User::where('email', config('alumkit.seeder.admin_email'))->first();

    expect($admin)
        ->not->toBeNull()
        ->and($admin->hasRole('admin'))->toBeTrue()
        ->and($admin->state)->toBe('active');
});
