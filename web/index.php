<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function () use ($app) {

    $webapiKey = '69edff3c';

    $result = [];

    $soapClient = new \SoapClient('https://webapi.allegro.pl/service.php?wsdl');


    $result['itemList'] = $soapClient->doGetItemsList([
        'filterOptions' => [[
            'filterId' => 'category',
            'filterValueId' => [5893]
        ]],
        'countryId' => 1,
        'webapiKey' => $webapiKey,
        'resultSize' => 1000,
        'resultOffset' => 800,
        'sortOptions' => [
        'sortType' => 'name',
        'sortOrder' => 'asc'
],
    ]);


    return $app->json($result['itemList']->itemsList);
});

$app->run();