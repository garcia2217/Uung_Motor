<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Tymon\JWTAuth\Facades\JWTAuth;

class AttachUserData
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            View::share('authUser', $user);
        }

        return $next($request);
    }
}
