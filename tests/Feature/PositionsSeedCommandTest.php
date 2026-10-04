<?php

use App\Models\Position;

it('seeds the committee positions', function () {
    $this->artisan('positions:seed')->assertSuccessful();

    expect(Position::count())->toBe(14);
});
