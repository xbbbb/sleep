<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanelController extends Controller
{
    public function home(){
        return view("home");
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
