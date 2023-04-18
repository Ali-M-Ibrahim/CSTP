<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
   public function create(){
       return view('myform');
   }
    public function store(Request $request){
       error_log(Auth::user()->name);
       $request->validate([
           'title'=>'required|unique:courses|same:title2',
           'title2'=>'required',
           'coursedescription'=>'required',
           'coursenbofcredits'=>'required|numeric',
           'coursecoordinatorname'=>'required',

       ],
       [
           'required'=>"You should input the field :attribute"
       ]
       );

        $data = new Course();
        $data->title=$request->title;
        $data->description=$request->coursedescription;
        $data->nbofcredetis=$request->coursenbofcredits;
        $data->coordinatorname=$request->coursecoordinatorname;
        $data->save();
        return redirect(Route('listcourses'));
    }

    public function index(){
       $data = Course::all();
        return view('list')->with('courses',$data);
    }


    public function edit($id){
       $data= Course::find($id);
        return view('editform')->with('course',$data);
    }


    public function update($id,Request $request){
        $data= Course::find($id);
        $data->title=$request->coursetitle;
        $data->description=$request->coursedescription;
        $data->nbofcredetis=$request->coursenbofcredits;
        $data->coordinatorname=$request->coursecoordinatorname;
        $data->save();
        return redirect(Route('listcourses'));
    }


    public function delete($id){
        $data= Course::find($id);
        $data->delete();
        return redirect(Route('listcourses'));
    }

}
