<?php
   //Create a websocket server object, monitor port 0.0.0.0:9501, and open an SSL tunnel
    $ws = new swoole_websocket_server("209.142.65.183", 5200, SWOOLE_PROCESS, SWOOLE_SOCK_TCP | SWOOLE_SSL);
    print"<pre>";
    print_r($ws);
    exit;
    //209.142.65.183:5200
   //Configuration parameters
    $ws ->set([
	'daemonize' => false,//daemonize.
	//Configure the SSL certificate and key path
	/*'ssl_cert_file' => "/etc/letsencrypt/live/oyhdo.com/fullchain.pem",
	'ssl_key_file' => "/etc/letsencrypt/live/oyhdo.com/privkey.pem"
	*/
    ]);
 
   //Monitor WebSocket connection open event
    $ws->on('open', function ($ws, $request) {
        echo "client-{$request->fd} is open\n";
    });
 
   //Monitor WebSocket message events
    $ws->on('message', function ($ws, $frame) {
        echo "Message: {$frame->data}\n";
        $ws->push($frame->fd, "server: {$frame->data}");
    });
 
   //Monitor the WebSocket connection close event
    $ws->on('close', function ($ws, $fd) {
        echo "client-{$fd} is closed\n";
    });
 
    $ws->start();