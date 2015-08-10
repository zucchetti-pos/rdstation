<?php

namespace RDStation;

use Zend\Http\Client;
use Zend\Http\Request;

class Leads extends RDStation
{
    const API_URL = parent::API_URL . '/leads';
}
