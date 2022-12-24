<?php
//echo __DIR__;
error_reporting(1);
	ini_set('display_errors', '1');
	error_reporting(E_ALL ^ E_NOTICE); 
require __DIR__ . '/../../vendor/autoload.php';
use \Twilio\Rest\Client;


    // Create authenticated REST client using account credentials in
    // <project root dir>/.env
    $client = new Client(
        "AC4f17c9bd72175c222840779f7bf5be0b",
        "e6c794cd5148064641aee7daca2a37d9"
    );


$client->proxy->v1->services("KS7fe7732b63ffb0b6b329f57bc0ef519f")
                  ->sessions("KCf157b61d9b35e0a82cdc4679301375b7")
                  ->delete();
//print"<pre>";
//print_r($message_interaction);
//KSdd371da2dbfce527fcdfed23386f8e63
// KI3654f4347cbe4cf7f3f154b9b1979405