<?php

namespace App\Http\Middleware;

use Closure;

class ProfileByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role == 'admin' || $request->user()->role == 'manager') {
            session(['role' => config('roles.admin.role')]);
        } else {
            session(['role' => $request->user()->role]);
        }
        return $next($request);
    }
}
