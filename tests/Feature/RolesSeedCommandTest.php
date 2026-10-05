<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('seeds roles and grants, ensuring permissions exist first', function () {
    $this->artisan('roles:seed')->assertSuccessful();

    expect(Permission::count())->toBe(10)
        ->and(Role::pluck('name')->all())->toEqualCanonicalizing(['admin', 'moderator', 'member']);

    $adminRole = Role::findByName('admin');
    $moderatorRole = Role::findByName('moderator');

    expect($adminRole->permissions)->toHaveCount(10)
        ->and($moderatorRole->hasPermissionTo('manage members'))->toBeTrue()
        ->and($moderatorRole->hasPermissionTo('view dashboard'))->toBeTrue();
});
