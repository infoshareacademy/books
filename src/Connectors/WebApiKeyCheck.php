<?php

namespace Books\Connectors;

$config = array(

    'login' => 'zawodny_j',
    'password' => 'jurek123',
    'apiKey' => '69edff3c'

);

$country = WebApiSoapClient::COUNTRY_PL;

try {

    $client = new WebAPISoapClient();
    // pobieranie wersji WebAPI
    $version = $client->doQuerySysStatus(WebAPISoapClient::QUERY_ALLEGROWEBAPI, $country, $config['apiKey']);
    // właściwe logowanie do serwisu
    $session = $client->doLogin($config['login'], $config['password'], $country, $config['apiKey'], $version['ver-key']);
}

catch(SoapFault $soapFault)
{
    /* obsługa wyjątku */
}