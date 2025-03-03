<?php

namespace App\Http\Controllers\API;

use Swoole\Http\Request;
use App\Http\Controllers\Controller;
use Swoole\WebSocket\Frame;
use Swoole\Http\Server;



class WebSocketCont extends Controller
{
    //
    public function index()
    {
        $server = new Server("turvy.net", 5200);

			$server->on("Start", function(Server $server)
			{
			    echo "Swoole WebSocket Server is started at http://127.0.0.1:9502\n";
			});
			
			$server->on('Open', function(Server $server, Swoole\Http\Request $request)
			{
			    echo "connection open: {$request->fd}\n";
			
			    $server->tick(1000, function() use ($server, $request)
			    {
			        $server->push($request->fd, json_encode(["hello", time()]));
			    });
			});
			
			$server->on('Message', function(Server $server, Frame $frame)
			{
			    echo "received message: {$frame->data}\n";
			    $server->push($frame->fd, json_encode(["hello", time()]));
			});
			
			$server->on('Close', function(Server $server, int $fd)
			{
			    echo "connection close: {$fd}\n";
			});
			
			$server->on('Disconnect', function(Server $server, int $fd)
			{
			    echo "connection disconnect: {$fd}\n";
			});
			
			$server->start();

    }
}