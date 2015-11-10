<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function () use ($app) {

    $webapiKey = '69edff3c';
//    $userLogin ='zawodny_j';
//    $userPassword = 'jurek123';
//    $session = null;

    $result = [];

    $soapClient = new \SoapClient('https://webapi.allegro.pl/service.php?wsdl');

//    $result['sysStatus'] = $soapClient->doQueryAllSysStatus([
//        'countryId' => 1,
//        'webapiKey' => $webapiKey
//    ]);

    $result['itemList'] = $soapClient->doGetItemsList([
        'filterOptions' => [[
          'filterId' => 'category',
            'filterValueId' => [5893]
        ]],
        'countryId' => 1,
        'webapiKey' => $webapiKey
    ]);

//    $localVersion = (array) $soapClient->doQuerySysStatus([
//        'sysvar' => 1,
//        'countryId' => 1,
//        'webapiKey' => $webapiKey
//    ]);
//
//    $session = $soapClient->doLogin([
//        'userLogin' => $userLogin,
//        'userPassword' => $userPassword,
//        'countryCode' => 1,
//        'webapiKey' => $webapiKey,
//        'localVersion' => $localVersion['verKey']
//    ]);

//    $result['session'] = $session;

    return $app->json($result['itemList']->itemsList);
});

$app->run();