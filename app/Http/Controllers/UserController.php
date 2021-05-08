<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login_page($merchant){
        if(Auth::check()){
            return redirect("/user_talking/".$merchant);
        }
        return view("user.login",compact("merchant"));
    }

    public function user_login(Request $request){
        $user=User::where("email",$request->email)->get();

        if(count($user)==0){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|unique:users|max:100',
            ]);
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password= Hash::make($request->email);
            $user->admin_level=0;
            $user->save();
            Auth::loginUsingId($user->id,true);
        }
        else{

            if($user[0]->admin_level==1){

                return redirect("/");
            }
            Auth::loginUsingId($user[0]->id,true);
        }
        $merchant=User::find($request->merchant);
        if ($merchant->if_online==1){
            return redirect("/user_talking/".$request->merchant);
        }
        else{
            return redirect("/email/".$request->merchant);
        }

    }


    public function change_if_online(){
        $user=Auth::user();
        if($user->if_online==0){
            $user->if_online=1;
        }
        else{
            $user->if_online=0;
        }
        $user->save();
        return redirect()->back();

    }
}
