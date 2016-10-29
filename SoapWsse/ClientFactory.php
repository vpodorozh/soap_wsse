<?php

namespace SoapWsse;

use SoapWsse\SecureHeader\FactoryInterface as HeaderFactory;

class ClientFactory
{
    /**
     * @var HeaderFactory
     */
    protected $headerFactory;

    /**
     * Constructor
     *
     * @param HeaderFactory $headerFactory
     */
    public function __construct(HeaderFactory $headerFactory)
    {
        $this->headerFactory = $headerFactory;
    }

    /**
     * Factory method for \SoapClient using secure header
     *
     * @param string $wsdl	WSDL of SOAP API
     * @param array  $options	Options for \SoapClient
     * @param string $user	User name for WSSE header
     * @param string $pass	Password for WSSE header, use unencrypted format
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