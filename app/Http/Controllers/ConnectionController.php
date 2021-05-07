<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function manager_send(Websocket $websocket, $data){

        $websocket->toUserId($data["user"])->emit('operation',$data["content"]);
    }


    public function client_send(Websocket $websocket, $data){
        $user=User::find($data["user"]);
        $name=$user->name."|".$user->email;
        $result=[
          "user"=>  $data["user"],
          "content"=>$data["content"],
            "name"=>$name,
        ];
        $websocket->toUserId($data["to"])->emit('receive',$result);
    }






}
