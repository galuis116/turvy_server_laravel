<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Socket;

require dirname( __FILE__ ) . '/vendor/autoload.php';

//echo dirname( __FILE__ ) . '/vendor/autoload.php';
//exit;
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Socket()
        )
    ),
    8443,
   '209.142.65.183',
);


$server->run();
