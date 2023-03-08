@extends('Layouts.homedashboard_layout')
@section('content')
<!DOCTYPE html>
<html>
<title>
    Registration
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
    <form class="container" action="" method="post">
        {{@csrf_field()}}
        <center>
            <h3 class="text-secondary">
                Registration
            </h3>
            <b>
                <span class="text-danger">
                    {{session()->get('msg')}}
                </span>
            </b>
        </center>

        <div class="form-group">
            <label for="name" class="fw-bold">Name:</label>
            <input type="text" class="form-control" name="delman_name" placeholder="Enter Name"
                value="{{old('delman_name')}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_name') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="email" class="fw-bold">E-mail:</label>
            <input type="email" class="form-control" name="delman_email" placeholder="Enter E-mail"
                value="{{old('delman_email')}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_email') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="mob" class="fw-bold">Mobile Number:</label>
            <input type="text" class="form-control" name="delman_mob" placeholder="Enter Mobile Number"
                value="{{old('delman_mob')}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_mob') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="name" class="fw-bold">Date of Birth:</label>
            <input type="date" class="form-control" name="delman_dob" value="{{old('delman_dob')}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_dob') {{$message}}<br> @enderror</span>
                </b>
            </center>

        </div>

        <div class="form-group">
            <label for="nid" class="fw-bold">NID</label>
            <input type="text" class="form-control" name="delman_nid" placeholder="Enter NID"
                value="{{old('delman_nid')}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_nid') {{$message}} @enderror</span>
                </b>

            </center>
        </div>

        <div class="form-group">
            <label for="Address" class="fw-bold">Address</label>
            <input type="text" class="form-control" name="delman_add" placeholder="Enter Address"
                value="{{old('delman_add')}}">
            <center>
                <b>
                    <span class="text-danger">@error('delman_add') {{$message}} @enderror</span>
                </b>

            </center>
        </div>

        <div class="form-group">
            <label for="pasword" class="fw-bold">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password"
                value="{{old('password')}}">
            <center>
                <b>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </b>

            </center>
        </div>
        <div class="form-group">
            <label for="pasword" class="fw-bold">Confirm Password</label>
            <input type="password" class="form-control" name="conf_password" placeholder="Enter Password">
            <center>
                <b>
                    <span class="text-danger">@error('conf_password') {{$message}} @enderror</span>
                </b>

            </center>
        </div>
        <br>
        <center>
            <input name="submit" type="submit" value="Registration" class="btn btn-primary">
        </center>

    </form>

</body>

</html>


@endsection