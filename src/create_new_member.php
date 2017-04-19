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
  'email_address' => 'member@member.com',
  "status" => "subscribed"
);

// It seems api is a bit slow, after post the request....
// need to wait for the result for the web interface.
$list_id = '7fa67852fc'; // hardcode
$uri = 'lists/'. $list_id. '/members';
$return = $client->request('POST', $uri, ['json' => $data]);
var_dump($return);
