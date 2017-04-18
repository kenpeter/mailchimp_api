<?php

require '../vendor/autoload.php';
require '../lib/MailChimp.php';

// name space, needs to match up with whatever in class
use \DrewM\MailChimp\MailChimp;

// my config
$config = include('../config.php');

// build the obj
$MailChimp = new MailChimp($config->apikey);
// get all lists
$result = $MailChimp->get('lists');

echo "\n----- get all list -----\n";
print_r($result);
