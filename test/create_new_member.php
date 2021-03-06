<?php

// auto load
require '../vendor/autoload.php';

// my lib
require '../lib/MailchimpClient.php';

// use it
use \Classy\MailchimpClient;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

// my config
$config = include('../config.php');

// init
$client = new MailchimpClient($config->apikey);


$promise = $client->requestAsync('GET', 'https://us12.api.mailchimp.com/3.0/lists');
$promise->then(
  function (ResponseInterface $res) {
    echo "good!";
    echo $res->getStatusCode() . "\n";
  },
  function (RequestException $e) {
    echo "bad!";
    echo $e->getMessage() . "\n";
    echo $e->getRequest()->getMethod();
  }
);

echo "end!!";

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
