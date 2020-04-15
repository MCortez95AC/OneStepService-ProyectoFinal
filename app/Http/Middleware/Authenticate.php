<?php

namespace App\Http\Middleware;
use Route;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (Route::is('admin.*')) {
                return route('worker.login');
            }
            if (Route::is('client.*')) {
                return route('client.login');
            }
            return route('login');
        }
    }
}
