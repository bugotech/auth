<?php namespace Bugotech\Auth\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Auth
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
        if (auth($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                throw new NotFoundHttpException();
            }

            // Tratar rot padrão
            $route = config('auth.middlewares-routes.auth');
            $route = is_null($route) ? '/login' : route($route);

            return redirect()->guest($route);
        }

        return $next($request);
    }
}
