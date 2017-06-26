<?php namespace Bugotech\Auth\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

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
        if (auth($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}