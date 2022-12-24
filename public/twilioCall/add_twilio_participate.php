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

$participant = $client->proxy->v1->services("KS7fe7732b63ffb0b6b329f57bc0ef519f")
                                 ->sessions("KC2232651adf7b3f6f7a67465aa9da8a4b")
                                 ->participants
                                 ->create("+61285038000", // identifier
                                          ["friendlyName" => "test"]
                                 );

print_r($participant);
//KSdd371da2dbfce527fcdfed23386f8e63
//KP5b815d633d3a1b6f8e6e393878306dd5 -  justine 