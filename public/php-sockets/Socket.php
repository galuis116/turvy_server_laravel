<?php  
require 'vendor/autoload.php';  
use Ratchet\MessageComponentInterface;  
use Ratchet\ConnectionInterface;

require 'data_web.php';

// Run the server application through the WebSocket protocol on port 8080
$app = new Ratchet\App("localhost", 8080, '209.142.65.183', $loop);
$app->route('/data_web', new data_web, array('*'));

$app->run();