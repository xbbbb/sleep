<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanelController extends Controller
{
    public function home(){
        $user=Auth::user();
        return view("home",compact("user"));
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
