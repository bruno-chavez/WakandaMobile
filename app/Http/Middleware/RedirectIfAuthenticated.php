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
        // Mis cambios que empeoran en vez de solucionar
        /*switch ($guard) {
            case 'division':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('division.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('/home');
                }
                break;
        }*/


        // Funciona pero no con '/home'
        if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }

        if (Auth::guard('division')->check()) {
            return redirect()->route('division.dashboard');
        }

        #dd($guard);
        /*if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }*/
        return $next($request);
    }
}
