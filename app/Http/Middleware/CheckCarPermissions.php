<?php

namespace App\Http\Middleware;

use Closure;

class CheckCarPermissions
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            return $next($request);
        }

        return redirect()->route('login'); // Redirect to the login page
    }
}
