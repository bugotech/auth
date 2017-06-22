<?php namespace Bugotech\Auth\Contracts;

interface Tenant
{
    /**
     * Return ID do inquilino.
     * @return int
     */
    public function getId();

    /**
     * Procurar inquilino.
     * @param $name
     * @return \Bugotech\Auth\Contracts\Tenant
     */
    public function findTenant($name);

    /**
     * Verifica se um inquilino existe.
     * @param $name
     * @return bool
     */
    public function existsTenant($name);
}