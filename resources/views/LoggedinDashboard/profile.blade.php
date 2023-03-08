@extends('Layouts.afterlogin_layout')
@section('content')
<!DOCTYPE html>
<html>
<title>
    Profile
</title>

<head>
    <style>
    .container {
        width: 35%;
        padding-top: 15pt;
    }
    </style>
</head>

<body>
    <form class="container" action="" method="post" enctype="multipart/form-data">
        {{@csrf_field()}}
        <center>
            <h3 class="text-secondary">
                Profile
            </h3>
            <b>
                <span class="text-danger">
                    {{session()->get('msg')}}
                </span>
            </b>
        </center>
        @foreach($infos as $i)
        <center>
            <img src="{{asset('storage/ProfilePicture/'.$i->image)}}" width="120" height="100" alt="image">

        </center>


        <div class="form-group">

            <label for="name" class="fw-bold">Name:</label>
            <input type="text" class="form-control" name="delman_name" placeholder="Enter Name"
                value="{{$i->delman_name}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_name') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="email" class="fw-bold">E-mail:</label>
            <input type="email" class="form-control border-0" name="delman_email" placeholder="Enter E-mail"
                value="{{$i->delman_email}}" readonly>
            <center>
                <b>
                    <span class="text-danger">@error('delman_email') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="mob" class="fw-bold">Mobile Number:</label>
            <input type="text" class="form-control" name="delman_mob" placeholder="Enter Mobile Number"
                value="{{$i->delman_mob}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_mob') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="name" class="fw-bold">Date of Birth:</label>
            <input type="date" class="form-control" name="delman_dob" value="{{$i->delman_dob}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_dob') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="nid" class="fw-bold">NID</label>
            <input type="text" class="form-control border-0" name="delman_nid" placeholder="Enter NID"
                value="{{$i->delman_nid}}" readonly>
            <center>
                <b>
                    <span class="text-danger">@error('delman_nid') {{$message}} @enderror</span>
                </b>

            </center>
        </div>

        <div class="form-group">
            <label for="Address" class="fw-bold">Address</label>
            <input type="text" class="form-control" name="delman_add" placeholder="Enter Address"
                value="{{$i->delman_add}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_add') {{$message}} @enderror</span>
                </b>

            </center>
        </div><br>
        <div class="form-group">
            <label class="fw-bold">Profile Picture</label>
            <input type="file" name="profile_pic" class="form-control">

        </div>


        <br>
        <center>
            <input name="submit" type="submit" value="Update Profile" class="btn btn-primary">
        </center>
        @endforeach
    </form>


</body>

</html>
@endsection