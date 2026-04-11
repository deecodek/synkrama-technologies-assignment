<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\UserType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureDealerLocationSetup
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->user_type === UserType::DEALER && ! $user->first_login_completed) {
            if (! $request->routeIs('dealer.setup-location', 'dealer.setup-location.store', 'logout')) {
                return redirect()->route('dealer.setup-location');
            }
        }

        return $next($request);
    }
}
