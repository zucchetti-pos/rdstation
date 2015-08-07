<?php

require_once __DIR__.'/vendor/autoload.php';

use Rd\Station;
use Zend\Http\Request;

$options = [
    'token' => '5d0dbc001d9c0501d3c55f2f7e3e0991',
     'identifier' => '8c589d9387a3231f5515cc4d14031f87'
];

$data = [
    'c_utmz' => 'http://o2.ag/sistema/',

];

$station = new Station($options);
$response = $station->execut('/conversions', Request::METHOD_POST, $data);

var_dump($response);