<?php


use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    //$request->user();
   // $user=auth()->user();
   // echo "connect";
    //echo $user."connect";
    //$websocket->emit('message', "hehehe");
});

Websocket::on('disconnect', function ($websocket) {
    $websocket->logout();
    // called while socket on disconnect
});

Websocket::on('example', function ($websocket, $data) {
    $websocket->emit('message', $data);
});
Websocket::on('login', 'App\Http\Controllers\ConnectionController@index');
Websocket::on('web_operation', 'App\Http\Controllers\ConnectionController@operation');
