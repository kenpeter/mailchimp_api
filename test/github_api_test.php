<?php

require '../vendor/autoload.php';

// get client
$client = new GuzzleHttp\Client();
$username = '';
$password = '';

// client request to github api user
$res = $client->request('GET', 'https://api.github.com/user', [
  'auth' => [$username, $password]
]);

echo $res->getStatusCode();
// "200"

print_r( $res->getHeader('content-type') );
// 'application/json; charset=utf8'

echo $res->getBody();
// {"type":"User"...'

/*
// Psr7 async ......
// Send an asynchronous request.
$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');

// promise
// client send async
// $request from above url
// then callback func
// with $res
$promise = $client->sendAsync($request)->then(function ($response) {
  echo 'I completed! ' . $response->getBody();
});

// run promise
$promise->wait();
*/
