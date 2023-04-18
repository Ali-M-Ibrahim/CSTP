<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\CustomAuthController;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DIController;

use App\Http\Controllers\FileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
});

Route::get('firsturl',function(){
    return "Hi Class, this is my first route";
});

Route::get('number',function(){
    return 123;
});

Route::get('boolean',function(){
    return true;
});

Route::get('myfirstpage',function(){
    return view('test');
});

Route::get('test/{id}',function($id){
    return "hello, this is the parameter: ". $id;
});

Route::get('test2/{id}/{name}',function($id,$name){
    return "hello, this is the first parameter: ". $id ." and this is the second " . $name;
});


Route::get('json',function(){
    return response()
        ->json(["name"=>"ali","family"=>"ibrahim"]);
});


Route::get('jsonwithparameter',function(){
    return response()
        ->json(["name"=>"ali","family"=>"ibrahim"])
        ->header("mysecretkey","web 1");
});

Route::get("fromcontroller",'App\Http\Controllers\firstController@index');
Route::get("fromcontroller/{id}",'App\Http\Controllers\firstController@index2');

Route::get("secondMethod",[firstController::class,'index']);
Route::get("secondMethod/{id}",[firstController::class,'index2'])->name("myroute");

Route::get("thirdMethod",[
    'uses'=>'App\Http\Controllers\firstController@index',
    'as'=>'test'
]);


Route::post('postExample',[firstController::class,'create'])->name('NamePostExample');
Route::put('putExample',[firstController::class,'create']);


Route::resource('resource',ResourceController::class);



Route::get("createBlog",[BlogController::class,'create']);



Route::post('createPerson',[PeopleController::class,'create']);

Route::get('getPerson',[PeopleController::class,'GetData']);

Route::put('updatePerson/{id}',[PeopleController::class,'UpdateById']);

Route::put('updatePerson2',[PeopleController::class,'UpdateByIdFromRequest']);



Route::delete('deletePerson',[PeopleController::class,'DeleteById']);





Route::get('firstpage',function(){
    return view('firstpage');
});



Route::get('secondpage',function(){
    return view('pages.secondpage');
});

Route::get('addCourse',[CourseController::class,'create']);
Route::post('saveCourse',[CourseController::class,'store'])->name('storeCourse');
Route::get('listCourse',[CourseController::class,'index'])->name('listcourses');
Route::get('editCourse/{id}',[CourseController::class,'edit'])->name('editCourse');
Route::put('updateCourse/{id}',[CourseController::class,'update'])->name('updateCourse');
Route::get('deleteCourse/{id}',[CourseController::class,'delete'])->name('deleteCourse');
Route::delete('deleteCourse/{id}',[CourseController::class,'delete'])->name('deleteCourse');



Route::get('DITest',[DIController::class,'index'])->name('DITestDITest');
Route::get('DITestConstructor',[DIController::class,'index2'])->name('DITestConstructor');


Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');



Route::get('mypage/{type}',function(){
    return view('welcome');
})->middleware('checkStatus');


Route::group(['middleware' => ['checkStatus']], function () {
    Route::get('mypage',function(){
        return view('welcome');
    });
});


Route::get('file-upload', [FileController::class, 'index']);
Route::post('file-store', [FileController::class, 'store'])->name('file.store');

