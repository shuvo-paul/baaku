<?php

use App\Enums\UserState;
use App\Models\MembershipPaymentMethod;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Js;

beforeEach(function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
        'state' => UserState::Active->value,
    ]);

    Profile::create([
        'user_id' => $user->id,
        'gender' => 'male',
        'blood_group' => 'A+',
    ]);

    $this->actingAs($user);

    MembershipPaymentMethod::create([
        'type' => 'bkash',
        'instructions' => '{"time":1,"blocks":[{"type":"paragraph","data":{"text":"Send money to 01XXXXXXXXX"}}],"version":"2.31.7"}',
        'is_active' => true,
        'sort_order' => 0,
    ]);

    MembershipPaymentMethod::create([
        'type' => 'nagad',
        'instructions' => '{"time":1,"blocks":[{"type":"paragraph","data":{"text":"Nagad number 01XXXXXXXXX"}}],"version":"2.31.7"}',
        'is_active' => true,
        'sort_order' => 1,
    ]);
});

it('preselects the first active payment method on first visit', function () {
    $expected = 'x-data="{ chosenMethod: '.Js::from('bkash')->toHtml().' }"';

    $this->get(route('dashboard.membership.payments.create'))
        ->assertOk()
        ->assertSee($expected, false);
});

it('preserves the chosen method after a validation error', function () {
    $this->post(route('dashboard.membership.payments.store'), ['method' => 'nagad'])
        ->assertSessionHasErrors();

    $expected = 'x-data="{ chosenMethod: '.Js::from('nagad')->toHtml().' }"';

    $this->get(route('dashboard.membership.payments.create'))
        ->assertOk()
        ->assertSee($expected, false);
});
