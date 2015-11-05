<?php

require_once __DIR__.'/../vendor/autoload.php';
use Books\Connectors\AllegroApiConnector as Connector;

$app = new Silex\Application();
$app['debug'] = true;

return Connector::fetchEbooksList();
$app->get('/books', function () use ($app) {

    return $app->json(Connector::fetchEbooksList());
});

$app->run();