<?php

require_once __DIR__. '/../Model/EbookClass.php';
require_once __DIR__ . '/../../vendor/autoload.php';
use Symfony\Component\DomCrawler\Crawler;


class ApiConnector {

   static function FetchXml() {

    }

//    private function DecodeXml() {
//
//        if (file_exists('tests/ebooks.xml')) {
//            $xml = simplexml_load_file('tests/ebooks.xml');
//
//            print_r($xml);
//        } else {
//            exit('Failed to open ebooks.xml.');
//        }
//    }
}

$document = new \DOMDocument();
$document->loadXml(file_get_contents('ebooks.xml'));

$crawler = new Crawler();
$crawler->addDocument($document);
var_export($document);
