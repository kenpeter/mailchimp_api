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


$data = array(
  "status" => "unsubscribed"
);

// It seems api is a bit slow, after post the request....
// need to wait for the result for the web interface.
$list_id = '1309575198';
$member_hash = '8f284b264a566d61b380edc781dc7a02';
$uri = 'lists/'. $list_id. '/members/'. $member_hash;
$return = $client->request('PATCH', $uri, ['json' => $data]);
var_dump($return);
