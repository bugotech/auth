<?php namespace Bugotech\Auth;

class AuthServiceProvider extends \Illuminate\Auth\AuthServiceProvider
{
    /**
     * Register provider.
     */
    public function register()
    {
        $this->app->configure('auth', __DIR__ . '/../config/auth.php');

        parent::register();
    }
}
