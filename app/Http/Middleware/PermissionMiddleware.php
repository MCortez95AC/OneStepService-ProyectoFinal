<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {

/*         if (Auth::guard()->check()) {
            if (! $request->user()->can($permission)) {
                abort(403);
            }
        }

        if (Auth::guard('worker')->check()) {
            if (! Auth::guard('worker')->user()->can($permission)) {
                abort(403);
            }
        } */

        return $next($request);
    }
}
