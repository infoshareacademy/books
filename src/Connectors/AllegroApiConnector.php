<?php

namespace Books\Connectors;

require_once 'config.php';

class AllegroApiConnector
{

    public static function fetchEbooksList()
    {


        print_r(COUNTRY_CODE);
        $options['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;
        $soapClient = new \SoapClient('https://webapi.allegro.pl.webapisandbox.pl/service.php?wsdl', $options);
        $request = [
            'countryId' => 1,
            'webapiKey' => WEBAPI_KEY
        ];
        $result = $soapClient->doQueryAllSysStatus($request);
        $apiVersion = $result->sysCountryStatus->item[0]->verKey;

        $response = $soapClient->doLogin([
            'userLogin' => WEBAPI_USER_LOGIN,
            'userPassword' => WEBAPI_USER_ENCODED_PASSWORD,
            'countryCode' => 1,
            'webapiKey' => WEBAPI_KEY,
            'localVersion' => $apiVersion
        ]);


        $sessionId = $response->sessionHandlePart;

        $soldItems = $soapClient->doGetMyWonItems(
            [
                'sessionId' => $sessionId,
                'pageSize' => 50,
            ]
        );

        var_export($soldItems->wonItemsList->item);

    }
}
