<?php namespace Bugotech\Auth;

class AuthServiceProvider extends \Illuminate\Auth\AuthServiceProvider
{
    public function register()
    {
        $this->app->configure('auth', __DIR__ . '/../config/auth.php');

        parent::register();
    }

}
