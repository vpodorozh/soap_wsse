<?php

namespace SoapWsse\SecureHeader;

interface FactoryInterface
{
    /**
     * Create and get secure header
     * @param $user
     * @param $pass
     * @return \SoapHeader
     */
    public function create($user, $pass);
}