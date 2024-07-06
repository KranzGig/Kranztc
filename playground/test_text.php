<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Twilio\Rest\Client;
require __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';
//require __DIR__ . "/vendor/twilio/sdk/src/Twilio/Rest/Client.php";

// Your Account SID and Auth Token from twilio.com/console
// To set up environmental variables, see http://twil.io/secure
$account_sid = 'AC41dfb8b1dc3f281c1c66281fd306798d';
$auth_token = '6e9a7684e44a6e39eb866bdfa7de8217';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18445311557";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+19705678863',
    array(
        'from' => $twilio_number,
        'body' => 'Test Message'
    )
);
echo "HI";
?>