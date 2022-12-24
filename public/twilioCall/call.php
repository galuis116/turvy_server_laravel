<?php
//echo __DIR__;
require __DIR__ . '/../../vendor/autoload.php';
use \Twilio\Rest\Client;



function twilio_create_call($client, $userPhone, $TWILIO_NUMBER, $salesPhone, $host) {
    $encodedSalesPhone = urlencode($salesPhone);
    $outboundUri = "https://www.turvy.net/twilioCall/outbound.php?sales_phone=$encodedSalesPhone";

    try {
        $client->calls->create(
            $userPhone,                 // The visitor's phone number
            $TWILIO_NUMBER,    // A Twilio number in your account
            array(
                "url" => $outboundUri   // public URL TwiML that handles the call
            )
        );
    } catch (Exception $e) {
        // Failed calls will throw
        return 'ERROR:' . $e;
    }
    return 'Call Incoming !';
}

if (!empty($_POST) ){
    // Create authenticated REST client using account credentials in
    // <project root dir>/.env
    $client = new Client(
        "AC4f17c9bd72175c222840779f7bf5be0b",
        "e6c794cd5148064641aee7daca2a37d9"
    );


    // Get form input
    $userPhone = $_POST['userPhone'];
    $TWILIO_NUMBER = "+61253008384";
    $salesPhone = $_POST['salesPhone'];

    // Set URL for outbound call - this should be your public server URL
    $host = $_SERVER['HTTP_HOST'];

    print_r(twilio_create_call($client, $userPhone, $TWILIO_NUMBER, $salesPhone, $host));
}
