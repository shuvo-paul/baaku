<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('seeds permissions without creating roles', function () {
    $this->artisan('permissions:seed')->assertSuccessful();

    expect(Permission::count())->toBe(10)
        ->and(Role::count())->toBe(0);
});
