<?php

namespace SoapWsse\SecureHeader;

class WsseFactory implements FactoryInterface
{
    const WSSE_PATH = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';

    /**
     * {@inheritdoc}
     */
    public function create($user, $pass)
    {
        $userVar = new \SoapVar($user, XSD_STRING, null, static::WSSE_PATH, null, static::WSSE_PATH);
        $pass = sha1($pass);
        $passVar = new \SoapVar($pass, XSD_STRING, null, static::WSSE_PATH, null, static::WSSE_PATH);

        $usernameTokenObj = new \stdClass();
        $usernameTokenObj->Username = $userVar;
        $usernameTokenObj->Password = $passVar;
        $usernameTokenVar = new \SoapVar($usernameTokenObj, SOAP_ENC_OBJECT, null, static::WSSE_PATH, 'UsernameToken', static::WSSE_PATH);

        $securityObj = new \stdClass();
        $securityObj->UsernameToken = $usernameTokenVar;
        $securityVar = new \SoapVar($securityObj, SOAP_ENC_OBJECT, null, static::WSSE_PATH, 'Security', static::WSSE_PATH);

        $header = new \SoapHeader(static::WSSE_PATH, 'Security', $securityVar);

        return $header;
    }
}