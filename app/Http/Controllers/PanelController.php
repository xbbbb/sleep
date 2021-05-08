<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;
use Mail;


class PanelController extends Controller
{
    public function home(){
        return redirect()->to("/manager_talking");
    }

    public function logout(){
        auth()->logout();
        Session::flush();
        echo auth()->user();
        return redirect('/');
    }



    public function user_talking($to){
        $user=Auth::user();
        if($user->admin_level==1){
            return redirect("/manager_talking");
        }
        $manager=User::find($to);
        if($manager->if_online==0){
            return redirect("/email/".$to);
        }
        if($manager->admin_level==1){
            $name=$manager->name;
            return view("user.talking",compact("to","name"));
        }
        else{
            return redirect("/");
        }

    }



    public function manager_talking(){
        $user=Auth::user();
        if($user->admin_level==0){
            return redirect("/user_talking/1");
        }

        return view("manager.talking");
    }


    public function export_pdf($json){
        $result=json_decode($json);
        $data=array('results'=>$result);
        $pdf=PDF::loadView("pdf.record",$data);
        return $pdf->download('record.pdf');

    }


    public function email($merchant){
        return view("user.email",compact("merchant"));
    }

    public function send_info(Request $request){
        $user=User::find($request->merchant);
        $data = array('first_name'=>$request->first_name,'last_name'=>$request->last_name,'email'=>$request->email,'messages'=>$request->messages);
        Mail::send('mail.info', $data, function($message) use ($user) {
            $message->to( $user->email, 'Sales')->subject
            ('Information');
            $message->from('810610025wu@gmail.com','Customer');
        });
        return redirect()->back()->with("success","Your Email has been sent");
    }
}
