<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Parent Category</h2>
                </div>
                @can('manage parent category')
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('parent.create')}}"> Add Parent Category</a>
                </div>
                @endcan
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('home')}}"> Back</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    @can('manage parent category')
                    <th>EDIT</th>
                    <th>DELETE</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @php 
                $i=0;
                @endphp
                @if (count($parent) > 0)
                @foreach ($parent as $item)
                <tr>
                    <td>{{++$i}}</td>        
                    <td>{{$item->name}}</td>        
                    @can('manage parent category')            
                    <td> 
                        <a class="btn btn-primary" href="{{route('parent.edit',$item->id)}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('parent.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')    
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td> 
                    @endcan      
                </tr>
                @endforeach
                @else
                <div style="text-align: center">
                    <tr>
                        <th rowspan="4">No Items To Show</th>
                    </tr>
                </div>
                @endif
            </tbody>
            <tbody>
                
            </tbody>
        </table>
       
    </div>
</body>
</html>
