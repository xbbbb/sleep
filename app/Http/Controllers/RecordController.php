<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function store(Request $request){
        $record=new Record();
        $record->user_id=$request->user_id;
        $record->bmp=$request->bmp;
        $record->status=$request->status;
        $record->temperature=$request->temperature;
        $record->save();
        return response()->json(["response"=>"success"],200);
    }


    public function index(){
        $user=Auth::user();
        $records=Record::where("user_id",$user->id)->get();
        return view("record.index",compact("records"));

    }
}
