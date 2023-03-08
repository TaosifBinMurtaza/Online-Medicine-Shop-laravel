@extends('Layouts.afterlogin_layout')
@section('content')
<!DOCTYPE html>
<html>
<title>
    Change Password
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
                Change Password
            </h3><br>
            <b>
                <span class="text-danger">
                    {{session()->get('msg')}}
                </span>
            </b>
        </center>

        <div class="form-group">
            <label for="current_pasword" class="fw-bold">Enter Current Password</label>
            <input type="password" class="form-control" name="current_password" placeholder="Enter Password">
            <center>
                <b>
                    <span class="text-danger">@error('current_password') {{$message}} @enderror</span>
                </b>

            </center>
        </div>

        <div class="form-group">
            <label for="pasword" class="fw-bold">Enter New Password</label>
            <input type="password" class="form-control" name="new_password" placeholder="Enter Password">
            <center>
                <b>
                    <span class="text-danger">@error('new_password') {{$message}} @enderror</span>
                </b>

            </center>
        </div>
        <div class="form-group">
            <label for="pasword" class="fw-bold">Confirm Password</label>
            <input type="password" class="form-control" name="conf_password" placeholder="Enter Password"
                value="{{old('conf_password')}}">
            <center>
                <b>
                    <span class="text-danger">@error('conf_password') {{$message}} @enderror</span>
                </b>

            </center>
        </div>
        <br>
        <center>
            <input name="submit" type="submit" value="Confirm Password" class="btn btn-primary">
        </center>

    </form>

</body>

</html>


@endsection