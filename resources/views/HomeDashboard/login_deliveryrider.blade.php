@extends('Layouts.homedashboard_layout')
@section('content')

<!DOCTYPE html>
<html>
<title>
    LogIn
</title>

<head>
    <style>
    .container {
        width: 35%;
        padding-top: 35pt;
    }
    </style>
</head>

<body>
    <form class="container" action="" method="post">
        {{@csrf_field()}}
        <center>
            <h3 class="text-secondary">
                Log In
            </h3>
            <br>
            <b>
                <span class="text-danger">
                    {{session()->get('msg')}}
                </span>
            </b>
        </center>
        <br>


        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter E-mail" value="{{old('email')}}">
            <span class="text-danger">@error('email') {{$message}}@enderror</span>
        </div>
        <br>
        <div class="form-group">
            <label for="pasword">Password</label>
            <input type="password" class="form-control" name="logpassword" placeholder="Enter Password"
                value="{{old('logpassword')}}">
            <center>
                <span class="text-danger">@error('logpassword') {{$message}} @enderror</span>
            </center>

        </div>
        <br><br>
        <center>
            <input name="submit" type="submit" value="LOGIN" class="btn btn-primary">
            <br>
            <br>
            <a href="{{route('deliveryrider.registration')}}">Don't have an account yet? Sign Up</a>
        </center>

    </form>



</body>

</html>



@endsection