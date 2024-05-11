<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('parent.index')}}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{route('parent.store')}}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="1">Category Name</label>
                        <input type="text" name="name" class="form-control" id="1">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                
                <button type="submit" class="btn btn-primary ml-3">Add</button>
            </div>
        </form>
    </div>
</body>

</html>