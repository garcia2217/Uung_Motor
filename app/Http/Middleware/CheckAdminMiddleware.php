<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the logged-in user's email is admin@gmail.com
        if (Auth::check() && Auth::user()->email == 'admin@gmail.com') {
            return $next($request);
        }

        // Return response if the user is not admin
        return response()->json(['error' => 'Only admin can view this resource.'], 403);
    }
}
