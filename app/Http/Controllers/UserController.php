<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login_page(){
        if(Auth::check()){
            return redirect("/user_talking/1");
        }
        return view("user.login");
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
        return redirect("/user_talking/1");
    }
}
