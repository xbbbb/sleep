<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Websocket;

class ConnectionController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Websocket $websocket, $data)
    {
        $websocket->loginUsingId($data["uid"]);
       // echo ("hahaha");
        //$user=User::find($data["uid"]);
       // $websocket->toUserId(2)->emit('message', 'hi there');
       // echo $websocket->getUserId();

        // $websocket->emit('message', 'broadcasting');
       // $websocket->toUserId($data["uid"])->emit('message', 'hi there');
        //$websocket->to(1)->emit('return', 'for your eyes only');
        //echo($data["uid"]);
        //echo $websocket->getSender();
        // $websocket->to(1)->emit('return', "Message received" . json_encode($data));
       // $websocket->emit('return', "Message received" . json_encode($data));
    }

    public function operation(Websocket $websocket, $data){
        //echo ("hehehe");
        $user=auth()->user();
        $websocket->toUserId($user->id)->emit('operation',$data["operation"]);
    }
}
