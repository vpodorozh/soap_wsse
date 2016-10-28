<?php

namespace SoapWsse;

use SoapWsse\SecureHeader\FactoryInterface as HeaderFactory;

class ClientFactory
{
    /**
     * @var HeaderFactory
     */
    protected $headerFactory;

    public function __construct(HeaderFactory $headerFactory)
    {
        $this->headerFactory = $headerFactory;
    }

    /**
     * Factory method for \SoapClient using secure header
     *
     * @param $wsdl
     * @param array $options
     * @param $user
     * @param $pass
     * @return \SoapClient
     */
    public function create($wsdl, array $options = [], $user, $pass)
    {
        $client = new \SoapClient($wsdl, $options);
        $header = $this->headerFactory->create($user, $pass);
        $client->__setSoapHeaders($header);

        return $client;
    }
}