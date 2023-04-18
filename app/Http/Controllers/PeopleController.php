<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function create(Request $request){
        $obj = new Person();
        $obj->fname= $request->first_name;
        $obj->lname= $request->input('last_name','CS Class');
        $obj->age = $request->person_age;
        $obj->save();

//        $obj = Person::create([
//            'fname'=>$request->first_name,
//            'lname'=>$request->last_name,
//            'age'=>$request->person_age
//        ]);

//        $obj = Person::create($request->all());


        return "ok the data is saved";
    }

    public function GetData(){

        $allPeople= Person::all();
        $this->preparedata();
//        return view('firstpage',['test' => $allPeople,'ThisIsMyFlag'=>true]);
        return view('firstpage')->with('allPeople',$allPeople);
//        return view('firstpage',compact('allPeople'));



//        $allPeople= Person::all();
//        $allPeople= Person::where('fname','Ali')->get();
        //$allPeople= Person::where('fname','Ali')->first();
//        $allPeople= Person::firstWhere('fname','Ali');
//        $allPeople= Person::where('id',5)->first();
//        $allPeople= Person::find(7);
//        $allPeople= Person::WhereIn('id',array(4,5,6))->get();
//        $allPeople= Person::WhereBetween('id',[1,6])->get();
//        $allPeople= Person::where('fname','Ali')
//              ->OrWhere('fname','Ali 2')
//            ->get();
//                $allPeople= Person::where('fname','Ali')
//              ->where('lname','ibrahim')
//            ->get();


//        $allPeople= Person::all()->count();
//        $allPeople= Person::where('fname','Ali')->get()->count();
//        $allPeople= Person::all()->max('age');
//        $allPeople= Person::all()->min('age');
//        $allPeople= Person::all()->avg('age');

//        $allPeople= Person::select('id')->get();

//        $allPeople= Person::where('fname','Ali')->get()->take(1);

//        $allPeople= Person::findOrFail(1000);


//        $allPeople= Person::where('fname','david')->firstOrFail();


//        $allPeople= Person::where('fname','like','%Ali%')->get();

//        $allPeople= Person::findOr(5,function(){
//            return "this row does not exist";
//        });

//        $allPeople= Person::where('id',95)->firstOr(function(){
//            return "does not exist";
//        });

//        $allPeople= Person::where('fname','Ali')->orderBy('id','desc')->get();
//        return $allPeople;
    }


    public function preparedata(){
        $flag=false;
        $test="this is my name";
        View()->share(['flag'=>$flag,'test'=>$test]);
    }


    public function UpdateById($id,Request $request){
        $obj = Person::find($id);
        $obj->fill($request->all());
        if($obj->isClean()){
            return "no data modified";
        }
//        $obj->fname= $request->first_name;
//        $obj->lname= $request->input('last_name','CS Class');
//        $obj->age = $request->age;
      $obj->save();
        return "the data is updated";
    }
    public function UpdateByIdFromRequest(Request $request){
//        $obj=Person::where("fname","Ali")->update([
//            "age"=>100
//        ]);

        $obj = Person::find($request->id);
        $obj->fname= $request->first_name;
        $obj->lname= $request->input('last_name','CS Class');
        $obj->age = $request->age;
        $obj->save();



        return "the data is updated";
    }


    public function DeleteById(Request $request){
//        $obj = Person::find($request->id);
//        $obj->delete();
//

$obj = Person::where('fname','Cesar')->delete();

        return "deleted";

    }




}
