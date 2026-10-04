<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Render the signed-in user's dashboard profile page.
     */
    public function __invoke(): View
    {
        return view('profile.show');
    }
}
