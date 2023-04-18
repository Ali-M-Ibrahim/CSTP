<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    public function create(){

        $data= new Blog();
        $data->nbofview=0;
        $data->title='This is my title';
        $data->description= 'This is my description';
        $data->save();

        $data1 =  Blog::create([
            'title'=>'title 2',
            'description'=>'description 2',
            'nbofview'=>1
        ]);

        return "Done creation";

    }
}
