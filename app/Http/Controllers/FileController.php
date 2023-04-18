<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        return view('filepage');
    }

    public function store(Request $request){
        //php artisan storage:link
      $request->validate([
          'myfile'=>'required'
      ]);
      $originalname = $request->file('myfile')->getClientOriginalName();
      error_log("the original image name is " . $originalname);
      $filename= time().'.'.$request->file('myfile')->getClientOriginalExtension();
       error_log("the new image name is " . $filename);

//       $request->file('myfile')->move(public_path('uploads'),$filename);
//       $tosave= 'uploads/'.$filename;


//        $request->file('myfile')->storeAs('public/myimages',$filename);
//        $tosave= 'storage/myimages/'.$filename;


        $request->file('myfile')->store('public/myimages2');
        $tosave= 'storage/myimages2/'.$filename;
        return "k";


    }
}
