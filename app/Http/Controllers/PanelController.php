<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;

class PanelController extends Controller
{
    public function home(){
        return redirect()->to("/manager_talking/1");
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
            return redirect("/manager_talking/1");
        }
        $manager=User::find($to);
        if($manager->admin_level==1){
            $name=$manager->name;
            return view("user.talking",compact("to","name"));
        }
        else{
            return redirect("/");
        }

    }



    public function manager_talking($to){
        $user=Auth::user();
        if($user->admin_level==0){
            return redirect("/user_talking/1");
        }
        $customer=User::find($to);
        $name=$customer->name;
        $email=$customer->email;
        return view("manager.talking",compact("to","name","email"));
    }


    public function export_pdf($json){
        $result=json_decode($json);
        $data=array('results'=>$result);
        $pdf=PDF::loadView("pdf.record",$data);
        return $pdf->download('record.pdf');

    }
}
