# soap_wsse
Implements basic WSSE functionality for SOAP client in PHP and allows to connet to secure SOAP service using user&pass credentials.

Honestly, soap_wsse lib prototype has been created for Magento 2 based project needs, so current implementation is constructed in "dependency injection" way - and, as a result, can be easily extended in any system.

# Install
* Can be installed via [Composer](https://getcomposer.org/). Run in you project root:
```bash
composer require vpodorozh/soap_wsse
```  
* To install it manually, just download and require all lib files in your script.

# Use
Code example:
```php
$wsdl = 'http://www.example.com?wsdl'; // WSDL path;
$options = ['trace' => 1]; // \SoapClient construct '$options' param;
$user = 'username';
$pass = 'password'; // Pass in unencrypted format - sha1 encription is implemented in header factory;


$headerFactory = new \SoapWsse\SecureHeader\WsseFactory();
$clientFactory = new \SoapWsse\ClientFactory($headerFactory);

/** @var \SoapClient $client */
$client = $clientFactory->create($wsdl, $options, $user, $pass);
```
