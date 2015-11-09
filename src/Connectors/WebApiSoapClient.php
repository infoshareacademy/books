<?php

namespace Books\Connectors;

class WebApiSoapClient extends \SoapClient
{
    const COUNTRY_PL = 1;
    const QUERY_ALLEGROWEBAPI = 1;

    // Automatycznie tworzy klienta AllegroWebApi

    public function __construct()
    {
        parent::__construct('https://webapi.allegro.pl/service.php?wsdl', true);
    }

}

//class WebApiSoapClient
//{
//    protected $_instance;
//    protected $_config;
//    protected $_session;
//    protected $_client;
//    protected $_local_version;
//
//    const COUNTRY_CODE = ALLEGRO_COUNTRY;
//
//
//    //Zapis ustawień oraz połączenie z WebAPI
//
//    public function __construct()
//    {
//        $this->_config = array(
//            'allegro_key' => '69edff3c',
//            'allegro_login' => 'zawodny_j',
//            'allegro_password' => 'jurek123'
//        );
//
//        $this->_client = new SoapClient('http://webapi.allegro.pl/service.php?wsdl');
//    }
//
//    /**
//     * Sprawdzanie połączenia oraz poprawnego zalogowania do allegro
//     */
//    private function checkConnection() {
//        if (!$this->_session) {
//            throw new userException('Nie utworzono połączenia z kontem allegro. Należy użyć metody <strong>Login()</strong>');
//        }
//    }
//
//    /**
//     * Wywołanie dowolnej metody przez SOAP
//     *
//     * @param string $Method
//     * @param string/int/array $Data
//     * @return array
//     */
//    public function getMethod($Method, $Data=array()) {
//        return $this->_client->__soapCall($Method, $Data);
//    }
//
//    public function getKey() {
//        return $this->_config['allegro_key'];
//    }
//
//
//}
