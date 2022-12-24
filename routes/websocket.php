<?php
     
    use SwooleTW\Http\Websocket\Facades\Websocket;
     
    /*
    |--------------------------------------------------------------------------
    | Websocket Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register Websocket events for your application.
    |
    */
     
    Websocket::on('connect', function ($websocket, $request) {
        // in connect callback, illuminate request will be injected here
        $websocket->emit('message', 'welcome');
    });
     
    Websocket::on('disconnect', function ($websocket) {
        // this callback will be triggered when a websocket is disconnected
    });
     
    Websocket::on('example', function ($websocket, $data) {
        $websocket->emit('message', $data);
    });
     
    Websocket::on('test', 'ExampleController@method');