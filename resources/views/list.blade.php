<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>A Fancy Table</h1>

<table id="customers">
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Description</th>
        <th># of Credits</th>
        <th>Coordinator name</th>
        <th>Actions</th>
    </tr>

    @foreach($courses as $c)

        <tr>

            <td>{{$c->id}}</td>
        <td>{{$c->title}}</td>
        <td>{{$c->description}}</td>
        <td>{{$c->nbofcredetis}}</td>
        <td>{{$c->coordinatorname}}</td>
            <td>
                <a href="{{Route('editCourse',['id'=>$c->id])}}">Edit</a>
                <a href="{{Route('deleteCourse',['id'=>$c->id])}}">Delete</a>
                <form method="post" action="{{Route('deleteCourse',['id'=>$c->id])}}">
                @csrf
                @method('delete')

                    <input type="submit" value="delete">

                </form>
            </td>
        </tr>

    @endforeach


</table>

</body>
</html>


