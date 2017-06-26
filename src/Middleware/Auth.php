<?php namespace Bugotech\Auth\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
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

            return redirect()->guest(route('auth.login.get'));
        }

        return $next($request);
    }
}
