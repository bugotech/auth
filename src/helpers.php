<?php

if (! function_exists('auth')) {
    /**
     * Get the available auth instance.
     *
     * @param  string|null  $guard
     * @return \Illuminate\Contracts\Auth\Factory
     */
    function auth($guard = null)
    {
        if (is_null($guard)) {
            return app('\Illuminate\Contracts\Auth\Factory');
        }

        return app('\Illuminate\Contracts\Auth\Factory')->guard($guard);
    }
}