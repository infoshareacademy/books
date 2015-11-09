<?php

namespace Books\Connectors;

class WebApiKeyCheck
{
    public function checkApiKey()
    {
        $config = array(

            'userLogin' => 'zawodny_j',
            'userPassword' => 'jurek123',
            'WebapiKey' => '69edff3c',

        );

        $countryCode = WebApiSoapClient::COUNTRY_PL;

        try {

            print_r('fsdfdsfsd');
            $client = new WebAPISoapClient();
            // pobieranie wersji WebAPI
            $version = $client->doQuerySysStatus(WebAPISoapClient::QUERY_ALLEGROWEBAPI, $countryCode, $config['WebapiKey']);
            // właściwe logowanie do serwisu
            $session = $client->doLogin($config['userlogin'], $config['userpassword'], $countryCode, $config['WebapiKey'], $version['ver-key']);
            $list = $client->doGetItemList();
            var_dump($list);
        } catch
        (SoapFault $soapFault) {
            /* obsługa wyjątku */
        }
    }
}