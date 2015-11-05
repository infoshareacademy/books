<?php

namespace Books\Connectors;

require_once 'config.php';

class AllegroApiConnector
{

    public static function fetchEbooksList()
    {
        $options['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;
        try {
            $soapClient = new SoapClient('https://webapi.allegro.pl/service.php?wsdl', $options);
            $request = array(
                'countryId' => COUNTRY_CODE,
                'webapiKey' => WEBAPI_KEY
            );
            $result = $soapClient->doQueryAllSysStatus($request);

            $versionKeys = array();
            foreach ($result->sysCountryStatus->item as $row) {
                $versionKeys[$row->countryId] = $row;
            }

            $request = array(
                'userLogin' => WEBAPI_USER_LOGIN,
                'userHashPassword' => WEBAPI_USER_ENCODED_PASSWORD,
                'countryCode' => COUNTRY_CODE,
                'webapiKey' => WEBAPI_KEY,
                'localVersion' => $versionKeys[COUNTRY_CODE]->verKey,
            );
            $session = $soapClient->doLoginEnc($request);

            $request = array(
                'sessionId' => $session->sessionHandlePart,
                'pageSize' => 50
            );

            $myWonItems = $soapClient->doGetMyWonItems($request);
            var_dump($myWonItems);

        } catch (Exception $e) {
            echo $e;
        }
    }
}