<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "worker" && Auth::guard($guard)->check()) {
            return redirect('/admin/worker');
        }
        if ($guard == "client" && Auth::guard($guard)->check()) {
            return redirect('/client/home');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/admin/super');
        }
/*         if (Auth::guard($guard)->check()) {

            if($guard == "worker"){
                return redirect('/admin/worker');
            } else if ($guard == "client") {
                return redirect('/client');
            }else {
                return redirect('/admin/super');
            }
    
        } */
        return $next($request);
    }
}