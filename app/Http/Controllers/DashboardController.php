<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Render the dashboard home page.
     */
    public function __invoke(): View
    {
        return view('dashboard');
    }
}
