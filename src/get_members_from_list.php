<?php

// auto load
require '../vendor/autoload.php';

// my lib
require '../lib/MailchimpClient.php';

// use it
use \Classy\MailchimpClient;

// my config
$config = include('../config.php');

// init
$client = new MailchimpClient($config->apikey);

// It seems api is a bit slow, after post the request....
// need to wait for the result for the web interface.
$list_id = '1309575198';
$uri = 'lists/'. $list_id. '/members';
$data = $client->request('GET', $uri);
$obj = json_decode( $data->getBody() );

//test
print_r($obj);
