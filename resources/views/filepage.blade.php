<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 File Upload Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2>Laravel 9 File Upload Example - ItSolutionStuff.com</h2>
        </div>

        <div class="panel-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form action="{{Route('file.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="inputFile">File:</label>
                    <input
                        type="file"
                        name="myfile"
                        id="inputFile"
                        class="form-control @error('file') is-invalid @enderror">



                    <img src="{{asset('uploads/1681833100.png')}}"



                    @error('file')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </form>

        </div>
    </div>
</div>
</body>

</html>
