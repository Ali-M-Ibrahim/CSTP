@extends('layouts.app')


@section('content')


    @foreach($allPeople as $p)

<h1> the data of this person is {{$p->fname}}</h1>
    @endforeach


       @if($flag)

        <h1>the value of the flag is true</h1>
       @else
           <h1>the value of the flag is false</h1>
        @endif


    @isset($flag2)
        <h1>the value of flag2 is not null</h1>
    @endisset


    @for($i=0;$i<10;$i++)

        {{$i}}

    @endfor
@endsection



