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

// Create a new list
$data = array(
  "name" => "test_mailchimp",
  "contact" => array(
    "company" => "MailChimp",
    "address1" => "675 Ponce De Leon Ave NE",
    "address2" => "Suite 5000",
    "city" => "Atlanta",
    "state" => "GA",
    "zip" => "30308",
    "country" => "US",
    "phone" => "12345678",
  ),
  "permission_reminder" => "You're receiving this email because you signed up for updates.",
  "use_archive_bar" => true,
  "campaign_defaults" => array(
    "from_name" => "test",
    "from_email" => "test@test.com",
    "subject" => "test_subject",
    "language" => "en",
  ),
	"notify_on_subscribe" => "",
	"notify_on_unsubscribe" => "",
	"email_type_option" => true,
	"visibility" => "pub",
);

$return = $client->request('POST', 'lists', ['json' => $data]);
var_dump($return);
