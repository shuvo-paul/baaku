<?php

use Alumkit\Alumkit\Models\Position;
use Database\Seeders\PositionSeeder;

it('seeds all fourteen committee positions', function () {
    $this->seed(PositionSeeder::class);

    expect(Position::count())->toBe(14)
        ->and(Position::where('name', 'সভাপতি (ভারপ্রাপ্ত)')->exists())->toBeTrue()
        ->and(Position::where('name', 'কার্যনির্বাহী সদস্য')->exists())->toBeTrue();
});

it('is idempotent', function () {
    $this->seed(PositionSeeder::class);
    $this->seed(PositionSeeder::class);

    expect(Position::count())->toBe(14);
});
