<?php

namespace Books\Connectors;

class WebApiSoapClient extends \SoapClient
{
    const COUNTRY_PL = 1;
    const QUERY_ALLEGROWEBAPI = 1;

    public function __construct()
    {
        parent::__construct('http://webapi.allegro.pl/service.php?wsdl');
    }

}

