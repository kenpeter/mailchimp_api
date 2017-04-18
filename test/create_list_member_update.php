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

// lists request
$req_list = new \GuzzleHttp\Psr7\Request('GET', 'lists');

// promise
$promise = $client
  ->sendAsync($req_list)
  ->then(function ($res) {
    $obj = json_decode( $res->getBody() );
    // always get the first list
    $first_list_id = $obj->lists[0]->id;
    echo $first_list_id;

  });
$promise->wait();


/*
$data = array(
  'email_address' => 'member@member.com',
  "status" => "subscribed"
);

// It seems api is a bit slow, after post the request....
// need to wait for the result for the web interface.
$list_id = '1309575198';
$uri = 'lists/'. $list_id. '/members';
$return = $client->request('POST', $uri, ['json' => $data]);
var_dump($return);
*/
