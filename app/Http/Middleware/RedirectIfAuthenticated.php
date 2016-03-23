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
      if (Auth::guard($guard)->check()) {
        switch (Auth::guard($guard)->user()->rol) {
          case 'estudiante':
          return redirect()->route('estudiante.index');
          break;
          case 'admin':
          return redirect()->route('admin.index');
          break;
          case 'consejo_curricular':
          return redirect()->route('consejo.index');
          break;
          case 'director_grado':
          return redirect()->route('director.index');
          break;
          case 'jurado':
          return redirect()->route('jurado.index');
          break;
          case 'profesor':
          return redirect()->route('profesor.index');
          break;
          
          default:
          return redirect()->route('auth.login');
          break;
        }
          
      }

      return $next($request);
    }
  }
