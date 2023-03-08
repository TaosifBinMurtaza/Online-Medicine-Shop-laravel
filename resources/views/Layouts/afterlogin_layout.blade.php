<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid fw-bold fs-4">

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loggedin_deshboard')}}">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('order.history.details')}}">Order
                            History</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{session()->get('session_name')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('password')}}">Change Password</a></li>
                            <li><a class="dropdown-item text-danger" href="{{route('logout')}}">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
    </nav>

    @yield('content')
</body>

</html>