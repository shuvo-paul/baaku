<?php

use Alumkit\Alumkit\Enums\UserState;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

it('gates a newly registered user on email verification', function () {
    $this->post('/register', [
        'name' => 'New Member',
        'email' => 'new@example.com',
        'phone' => '01700000000',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])->assertRedirect('/dashboard');

    $user = User::where('email', 'new@example.com')->firstOrFail();

    expect($user->hasVerifiedEmail())->toBeFalse();

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertRedirect(Route::has('verification.notice') ? route('verification.notice') : '/email/verify');
});

it('sends an unverified user to complete their profile only after verification', function () {
    $user = User::factory()->create([
        'state' => UserState::Active->value,
        'email_verified_at' => Carbon::now(),
    ]);

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertRedirect(route('alumkit.profile.complete'));
});
