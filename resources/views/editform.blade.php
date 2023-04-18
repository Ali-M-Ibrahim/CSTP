<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;`
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>

</head>

<body>

<h3>Using CSS to style an HTML Form</h3>

<div>
    <form method="post" action="{{Route('updateCourse',['id'=>$course->id])}}">
        @csrf
        @method('put')
        <label for="title">Title</label>
        <input type="text" id="title" value="{{$course->title}}" name="coursetitle" placeholder="Please enter a title">

        <label for="description">Description</label>    <br>
        <textarea id="description" name="coursedescription">{{$course->description}}</textarea>
       <br>
        <label for="nbofcredits">Number of credits</label>
        <input type="text" id="nbofcredits" value="{{$course->nbofcredetis}}" name="coursenbofcredits" placeholder="Please enter the number of credits">

        <label for="coordinatorname">Coordinator name</label>
        <input type="text" value="{{$course->coordinatorname}}" id="coordinatorname" name="coursecoordinatorname" placeholder="Please enter the number of credits">

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>


