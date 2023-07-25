<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Edit Page</title>
    <style>
        body{
            padding:100px;
        },
       
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 "></div>
            <div class="col-md-6">
                <h5 class="title text-primary mb-3"> Update Staff</h5>
                <form action="{{url('members/'.$member->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name" >Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name.." class="form-control @error('name') is_invalid @enderror" value="{{$member->name ??old('name')}}" required>
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="phone" >Phone Number</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter phone number.." value="{{$member->phone ?? old('phone')}}" class="form-control @error('phone') is_invalid @enderror" required>
                        @error('phone')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="dob" >Date of Birth</label>
                        <input type="date" name="dob" id="dob"  value="{{$member->dob ?? old('dob')}}" placeholder="Enter date of birth.." class="form-control @error('dob') is_invalid @enderror" required>
                        @error('dob')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" >
                                                                <option value="">Choose...</option>
                                                                <option value="Male" {{ ($member->gender == "Male") ? 'selected' : ''}}>Male</option>
                                                                <option value="Female" {{ ( $member->gender== "Female") ? 'selected' : '' }}>Female</option>
                        </select> 
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    
                      <div class="form-check mt-3 @error('position') is_invalid @enderror" required >
                        <input class="form-check-input" type="radio" name="position" value="editor" id="Editor" {{ ($member->position == "editor") ? 'checked' : ''}}>
                        <label class="form-check-label" for="Editor">
                          Editor
                        </label>
                        @error('position')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="position" id="developer" value="developer" {{ ($member->position == "developer") ? 'checked' : ''}}>
                        <label class="form-check-label" for="developer">
                          Developer
                        </label>
                      </div>  

                      

                      <button type="submit" class="btn btn-primary btm-sm">Update</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>