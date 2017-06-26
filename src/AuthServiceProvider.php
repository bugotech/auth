<?php namespace Bugotech\Auth;

class AuthServiceProvider extends \Illuminate\Auth\AuthServiceProvider
{
    /**
     * Register provider.
     */
    public function register()
    {
        $this->app->configure('auth', __DIR__ . '/../config/auth.php');

        router()->middleware('auth', '\Bugotech\Auth\Middleware\Auth');
        router()->middleware('guest', '\Bugotech\Auth\Middleware\Guest');

        parent::register();
    }
}
