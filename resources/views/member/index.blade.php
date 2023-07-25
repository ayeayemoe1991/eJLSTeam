<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Index Page</title>
    <style>
        body{
            padding:100px;
        },
       
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 "></div>
            <div class="col-md-8">
                <h5 class="title text-primary mb-3">Staff List</h5>
                <a href="{{url('members/create')}}" >
                    <div class="btn btn-primary btn-sm mb-2 float-end"><i class="fa fa-plus-circle">Add New</i></div>
                </a>
                @if(session('successAlert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('successAlert')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif


                <table class="table table-bordered table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                       @foreach ($members as $member)
                       <tr>
                        <td>{{$member->id}}</td>
                        <td>{{$member->name}}</td>
                        <td>{{$member->phone}}</td>
                        <td>{{$member->dob}}</td>
                        <td>{{$member->gender}}</td>
                        <td>{{$member->position}}</td>
                        <td>
                            <form action="{{url('members/'.$member->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('members/'.$member->id.'/edit')}}">
                                    <button class="btn btn-success btn-sm" type="button"><i class="fa fa-pencil"></i>Edit</button>
        
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="confirm('Are you sure you want to delete?')"></i>Delete</button>
        
                            </form>
                        </td>
                    </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>