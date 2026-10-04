<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\UserState;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSuspended
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->state === UserState::Suspended->value) {
            return redirect()->route('dashboard')
                ->with('error', __('dashboard.account_suspended'));
        }

        return $next($request);
    }
}
