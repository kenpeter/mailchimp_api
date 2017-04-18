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

// get existing list
$data = $client->getData('lists');
$data = json_decode($data);
$lists = $data->lists;

// get the first one
echo "\n--- the first list id ---\n";
print_r($lists[0]->id);
echo "\n";

// Create new list
