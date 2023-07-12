<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

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
            return route('login');
        }
    }

    protected function auth($request) {
        // Get the token from the request (e.g., from the Authorization header)
        $token = $request->header('Authorization');
        
        // Verify the tokens
        if (Auth::guard('api')->check()) {
            // Token is valid, user is authenticated
            $user = Auth::guard('api')->user();
            // Do something with the authenticated user
            return true;
        } else {
            // Token is invalid or user is not authenticated
            // Handle the unauthorized request accordingly
            return false;
        }
    }

}
