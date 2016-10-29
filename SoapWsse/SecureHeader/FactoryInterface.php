<?php

namespace SoapWsse\SecureHeader;

interface FactoryInterface
{
    /**
     * Create and get secure header
     *
     * @param string $user Username
     * @param string $pass Password, use unencrypted format
     * @return \SoapHeader
     */
    public function create($user, $pass);
}