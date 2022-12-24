<?php
//echo __DIR__;
require __DIR__ . '/../../vendor/autoload.php';
use \Twilio\Rest\Client;


    // Create authenticated REST client using account credentials in
    // <project root dir>/.env
    $client = new Client(
        "AC4f17c9bd72175c222840779f7bf5be0b",
        "e6c794cd5148064641aee7daca2a37d9"
    );


  $phone_number = $client->proxy->v1->services("KSdd371da2dbfce527fcdfed23386f8e63")
                                  ->phoneNumbers
                                  ->create([
                                               "sid" => "PNae31154e3af9ac6ab90029d3116ebb2f"
                                           ]
                                  );

print_r($phone_number);
//KSdd371da2dbfce527fcdfed23386f8e63