<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param  string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $machete;
            switch (Auth::guard($guard)->user()->rol) {
                case 'estudiante':
                    $machete = 'estudiante.index';
                    break;
                case 'admin':
                    $machete = 'admin.index';
                    break;
                case 'consejo_curricular':
                    $machete = 'consejo.index';
                    break;
                case 'director_grado':
                    $machete = 'director.index';
                    break;
                case 'jurado':
                    $machete = 'jurado.index';
                    break;
                default:
                    return redirect()->route('auth.login');

            }

            return redirect()->route($machete);

        }

        return $next($request);
    }
}
