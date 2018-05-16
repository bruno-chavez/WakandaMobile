<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Verifica el tipo de guard al que corresponda el request y redirige acordemente.
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }

        if (Auth::guard('division')->check()) {
            return redirect()->route('division.dashboard');
        }
        return $next($request);
    }
}
