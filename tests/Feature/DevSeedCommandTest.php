<?php

use App\Models\User;

it('creates the dev user in local', function () {
    app()->detectEnvironment(fn () => 'local');

    $this->artisan('dev:seed')->assertSuccessful();

    $admin = User::where('email', 'test@example.com')->first();

    expect($admin)->not->toBeNull()
        ->and($admin->name)->toBe('Test User');
});

it('aborts outside the local environment', function () {
    app()->detectEnvironment(fn () => 'production');

    $this->artisan('dev:seed')->assertFailed();

    expect(User::where('email', 'test@example.com')->exists())->toBeFalse();
});
