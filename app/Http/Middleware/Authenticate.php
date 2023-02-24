<?php

namespace App\Http\Middleware;

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
        // if (!$request->expectsJson()) {
        //     return route('login');
        // }
        if (!auth()->guard('web')->check() && !auth()->guard('admin')->check()) {
                return route('login');
        }
        // dd(auth()->guard('admin')->check());
        // if()
        // dd(!auth()->guard('web')->check() || !auth()->guard('admin')->check());
    }
}
