<?php

use App\Enums\UserState;
use App\Models\MembershipPlan;
use App\Models\Profile;
use App\Models\User;

beforeEach(function () {
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

    $this->actingAs($user);
});

it('renders the plan edit form without the features textarea', function () {
    $plan = MembershipPlan::create([
        'name' => 'Anual',
        'price' => '500.00',
        'duration_days' => 360,
        'features' => ['extra_key' => 'extra value'],
    ]);

    $this->get(route('dashboard.plans.edit', $plan))
        ->assertOk()
        ->assertSee('name="name"', false)
        ->assertDontSee('name="features"', false);
});

it('renders the plan create form without the features textarea', function () {
    $this->get(route('dashboard.plans.create'))
        ->assertOk()
        ->assertDontSee('name="features"', false);
});

it('stores the checkbox-built features map on update', function () {
    $plan = MembershipPlan::create([
        'name' => 'Anual',
        'price' => '500.00',
        'duration_days' => 360,
    ]);

    $this->put(route('dashboard.plans.update', $plan), [
        'name' => 'Anual',
        'price' => '500.00',
        'term_days' => 360,
        'feature_members' => '1',
    ])->assertRedirect(route('dashboard.plans.index'));

    expect($plan->fresh()->features)->toBe(['members' => '1']);
});

it('stores null features when no feature checkboxes are posted', function () {
    $plan = MembershipPlan::create([
        'name' => 'Anual',
        'price' => '500.00',
        'duration_days' => 360,
        'features' => ['members' => '1'],
    ]);

    $this->put(route('dashboard.plans.update', $plan), [
        'name' => 'Anual',
        'price' => '500.00',
        'term_days' => 360,
    ])->assertRedirect(route('dashboard.plans.index'));

    expect($plan->fresh()->features)->toBeNull();
});

it('drops non-gateable custom feature keys on update', function () {
    $plan = MembershipPlan::create([
        'name' => 'Anual',
        'price' => '500.00',
        'duration_days' => 360,
        'features' => ['extra_key' => 'extra value', 'members' => '1'],
    ]);

    $this->put(route('dashboard.plans.update', $plan), [
        'name' => 'Anual',
        'price' => '500.00',
        'term_days' => 360,
        'feature_posts' => '1',
    ])->assertRedirect(route('dashboard.plans.index'));

    expect($plan->fresh()->features)->toBe(['posts' => '1']);
});
