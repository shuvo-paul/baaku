<?php

use Illuminate\Pagination\LengthAwarePaginator;

it('renders pagination views from their new first-party location', function () {
    $paginator = new LengthAwarePaginator(['a', 'b'], 2, 1, 5);

    expect(view('pagination.simple', ['paginator' => $paginator])->render())
        ->toContain('role="navigation"');

    expect(view('pagination.users', ['paginator' => $paginator])->render())
        ->toContain('role="navigation"');
});
