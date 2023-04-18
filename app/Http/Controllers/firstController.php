<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstController extends Controller
{
    public function index(){
        return view('test');
    }

    public function index2($id){
    return "Hi, this is the parameter". $id;
    }

    public function create(Request $request){

        return $request->input("email","myemail");
//        return response()
//            ->json(["the posted name is"=>$request->name, "the posted email is " => $request->email]);
    }

}
