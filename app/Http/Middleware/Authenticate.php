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
        if (request('token') != '') {
            if (request('token') != '123') {
                return response()->json('unauthenticaed',403);  
            }
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
