<?php

require_once __DIR__.'/vendor/autoload.php';

use RDStation\RDStation;
use Zend\Http\Request;

$options = [
    'token_rdstation' => 'Token.....',
    'identificador' => 'Teste Manual'
];

$data = [
    'c_utmz' => 'compufacil',
    'tags' => '#inativoapagar',
    'email' => 'jesus@coderockr.com'
];

$station = new RDStation($options);
$response = $station->execute('/conversions', Request::METHOD_POST, $data);

var_dump($response);