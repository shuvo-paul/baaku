<?php

use Alumkit\Alumkit\Models\CommitteeMember;
use Alumkit\Alumkit\Models\Position;
use App\Committee;

it('serves the committee page', function () {
    $position = Position::create(['name' => 'সভাপতি']);
    CommitteeMember::create(['position_id' => $position->id, 'name' => 'লাবণ্য', 'sort_order' => 0]);

    $this->get('/committee')
        ->assertOk()
        ->assertSee('বর্তমান কার্যনির্বাহী কমিটি')
        ->assertSee('লাবণ্য')
        ->assertSee('সভাপতি');
});

it('maps backend members and omits the stored initial', function () {
    $position = Position::create(['name' => 'সভাপতি']);
    CommitteeMember::create(['position_id' => $position->id, 'name' => 'লাবণ্য', 'sort_order' => 0]);

    $members = Committee::all();

    expect($members)
        ->toHaveCount(1)
        ->and($members[0]['role'])->toBe('সভাপতি')
        ->and($members[0]['name'])->toBe('লাবণ্য')
        ->and($members[0]['image'])->toBeNull()
        ->and($members[0]['vacant'])->toBeFalse()
        ->and($members[0])->not->toHaveKey('initial');
});

it('marks unassigned seats as vacant', function () {
    $position = Position::create(['name' => 'সাধারণ সম্পাদক']);
    CommitteeMember::create(['position_id' => $position->id, 'sort_order' => 0]);

    $members = Committee::all();

    expect($members[0]['vacant'])->toBeTrue()
        ->and($members[0]['name'])->toBe('—');
});

it('renders the committee page without crashing when no members exist', function () {
    $this->get('/committee')
        ->assertOk()
        ->assertSee('বর্তমান কার্যনির্বাহী কমিটি');
});
