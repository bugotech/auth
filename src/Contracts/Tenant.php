<?php namespace Bugotech\Auth\Contracts;

interface Tenant
{
    /**
     * Procurar inquilino.
     * @param $name
     * @return \Bugotech\Auth\Contracts\Tenant
     */
    public function find($name);

    /**
     * Verifica se um inquilino existe.
     * @param $name
     * @return boolean
     */
    public function exists($name);
}