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
        $user = Auth::user();
        if ($user == null || $user->role == 'admin')
            $link = '/admin';
        else
            $link = '/profile';
        if (Auth::guard($guard)->check()) {
            return redirect($link);
        }

        return $next($request);
    }
}