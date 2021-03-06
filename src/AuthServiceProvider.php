<?php namespace Bugotech\Auth;

class AuthServiceProvider extends \Illuminate\Auth\AuthServiceProvider
{
    /**
     * Register provider.
     */
    public function register()
    {
        // Carregar config
        $this->app->configure('auth', __DIR__ . '/../config/auth.php');

        // Registrar middlewares
        router()->middleware('auth', 'Bugotech\Auth\Middleware\Auth');
        router()->middleware('guest', 'Bugotech\Auth\Middleware\Guest');

        parent::register();

        // Alias
        $this->app->alias('auth', 'Illuminate\Contracts\Auth\Factory');
        $this->app->alias('auth.driver', 'Illuminate\Contracts\Auth\Guard');
    }
}
