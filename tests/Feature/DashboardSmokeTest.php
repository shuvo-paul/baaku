<?php

use App\Enums\UserState;
use App\Models\Profile;
use App\Models\User;

it('serves the dashboard to a verified user with a complete profile', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
        'state' => UserState::Active->value,
    ]);

    Profile::create([
        'user_id' => $user->id,
        'gender' => 'male',
        'blood_group' => 'A+',
    ]);

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertOk()
        ->assertSee(__('dashboard.welcome_back', ['name' => $user->name]));
});

it('serves the login page', function () {
    $this->get('/login')
        ->assertOk()
        ->assertSee(__('auth.sign_in'));
});
