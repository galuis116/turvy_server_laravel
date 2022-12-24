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


 
                                  
    $session = $client->proxy->v1->services("KSdd371da2dbfce527fcdfed23386f8e63")
                             ->sessions
                             ->create(["uniqueName" => "MyStartSession1"]);

print($session->sid);

//KSdd371da2dbfce527fcdfed23386f8e63
//KCe8b94714acf4ba28eb2917feacb4b6ed