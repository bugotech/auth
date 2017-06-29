<?php namespace Bugotech\Auth\Middleware;

use Closure;

class Guest
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
        // Tratar rot padrão
        $route = config('auth.middlewares-routes.guest');
        $route = is_null($route) ? '/' : route($route);

        if (auth($guard)->check()) {
            return redirect($route);
        }

        return $next($request);
    }
}
