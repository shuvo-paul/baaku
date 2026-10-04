<?php

use App\Enums\UserState;
use App\Models\MembershipPlan;
use App\Models\Profile;
use App\Models\User;

it('renders the plan edit form for a user with the manage membership plans permission', function () {
    $this->artisan('permissions:seed')->assertSuccessful();

    $user = User::factory()->create([
        'email_verified_at' => now(),
        'state' => UserState::Active->value,
    ]);

    Profile::create([
        'user_id' => $user->id,
        'gender' => 'male',
        'blood_group' => 'A+',
    ]);

    $user->givePermissionTo('manage membership plans');

    $plan = MembershipPlan::create([
        'name' => 'Anual',
        'price' => '500.00',
        'duration_days' => 360,
        'features' => ['extra_key' => 'extra value'],
    ]);

    $this->actingAs($user)
        ->get(route('dashboard.plans.edit', $plan))
        ->assertOk()
        ->assertSee('name="name"', false)
        ->assertSee('name="features"', false)
        ->assertSee('extra_key=extra value');
});
