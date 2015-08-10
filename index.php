<?php

require_once __DIR__.'/vendor/autoload.php';

use RDStation\RDStation;
use Zend\Http\Request;

$options = [
    'token_rdstation' => '5d0dbc001d9c0501d3c55f2f7e3e0991',
    'identificador' => '8c589d9387a3231f5515cc4d14031f87'
];

$data = [
    'c_utmz' => 'compufacil',
    'tags' => '#inativoapagar',
    'email' => 'jesus@coderockr.com'
];

$station = new RDStation($options);
$response = $station->execute('/conversions', Request::METHOD_POST, $data);

var_dump($response);