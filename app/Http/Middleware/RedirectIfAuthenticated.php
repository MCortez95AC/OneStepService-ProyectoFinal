<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "worker" && Auth::guard($guard)->check()) {
            return redirect('/worker');
        }
        if ($guard == "client" && Auth::guard($guard)->check()) {
            return redirect('/client');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}