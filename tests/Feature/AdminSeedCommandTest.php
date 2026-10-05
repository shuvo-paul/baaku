<?php

use App\Models\User;

it('seeds the admin user with the admin role and active state', function () {
    $this->artisan('roles:seed')->assertSuccessful();
    $this->artisan('admin:seed')->assertSuccessful();

    $admin = User::where('email', config('app.seeder.admin_email'))->first();

    expect($admin)
        ->not->toBeNull()
        ->and($admin->hasRole('admin'))->toBeTrue()
        ->and($admin->state)->toBe('active');
});
