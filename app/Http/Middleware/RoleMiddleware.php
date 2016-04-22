<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @param                           $role
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check() && ( auth()->user()->rol === $role )) {
            return $next($request);
        }

        return redirect('login');
    }
}
