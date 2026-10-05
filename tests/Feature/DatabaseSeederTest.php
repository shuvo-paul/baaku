<?php

use App\Models\Position;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('seeds the full foundation and no test user', function () {
    $this->artisan('db:seed')->assertSuccessful();

    expect(Position::count())->toBe(14)
        ->and(Permission::count())->toBe(10)
        ->and(Role::pluck('name')->all())->toEqualCanonicalizing(['admin', 'moderator', 'member'])
        ->and(User::where('email', 'test@example.com')->exists())->toBeFalse()
        ->and(User::where('email', config('app.seeder.admin_email'))->exists())->toBeTrue();
});
