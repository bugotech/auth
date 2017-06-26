<?php

if (! function_exists('auth')) {
    /**
     * Get the available auth instance.
     *
     * @param  string|null  $guard
     * @return \Illuminate\Contracts\Auth\Factory|\Illuminate\Contracts\Auth\Guard
     */
    function auth($guard = null)
    {
        if (is_null($guard)) {
            return app('\Illuminate\Contracts\Auth\Factory');
        }

        return app('\Illuminate\Contracts\Auth\Factory')->guard($guard);
    }
}

if (! function_exists('tenant')) {
    /**
     * @param null $tenantName
     * @return \Bugotech\Auth\Contracts\Tenant|mixed
     * @throws Exception
     */
    function tenant($tenantName = null)
    {
        $tenant = app('\Bugotech\Auth\Contracts\Tenant');

        // Verificar se deve carregar o tenant
        if (! is_null($tenantName)) {
            if (! $tenant->existsTenant($tenantName)) {
                throw new Exception(sprintf('Inquilino %s não foi encontrado', $tenantName));
            }

            app()->instance('tenant', $tenant->findTenant($tenantName));
        }

        return app('tenant');
    }
}