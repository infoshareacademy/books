<?php

require_once __DIR__.'/../vendor/autoload.php';
use Books\Connectors\AllegroApiConnector as Connector;

$app = new Silex\Application();
$app['debug'] = true;

return Connector::getWebApiKey();
$app->get('/getkey', function () use ($app) {

    return $app->json(Connector::getWebApiKey());
});

$app->run();