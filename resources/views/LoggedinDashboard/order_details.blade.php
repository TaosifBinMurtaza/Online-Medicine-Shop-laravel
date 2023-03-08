@extends('Layouts.afterlogin_layout')
@section('content')



<!DOCTYPE html>
<html>
<title>
    Dashboard
</title>

<head>
    <style>
    .container {
        width: 50%;
        padding-top: 35pt;
    }
    </style>
</head>

<body>

    <div class="container">
        <br><br>

        <form action="" method="post">
            {{@csrf_field()}}
            @foreach($orders as $orders)
            <table class="table">
                <tr>
                    <td><b class="text-primary">Order ID:</b></td>
                    <td><input type="text" name="order_id" value='{{$orders->order_id}}' readonly class="border-0"></td>
                </tr>

                <tr>
                    <td><b class="text-primary">Ordered Date:</b></td>
                    <td><input type="text" value='{{$orders->created_at}}' readonly class="border-0"></td>
                </tr>
                <tr>
                    <td><b class="text-primary">Ordered By:</b></td>
                    <td><input type="text" value='{{$orders->customer->customer_name}}' readonly class="border-0"></td>
                </tr>
                <tr>
                    <td><b class="text-primary">Mobile Number:</b></td>
                    <td><input type="text" value='{{$orders->customer->customer_mob}}' readonly class="border-0"></td>
                </tr>
                <tr>
                    <td><b class="text-primary">Address:</b></td>
                    <td><input type="text" value='{{$orders->customer->customer_add}}' readonly class="border-0"></td>
                </tr>
                <tr>
                    <td><b class="text-primary">E-mail:</b></td>
                    <td><input type="text" value='{{$orders->customer->customer_email}}' readonly class="border-0"></td>
                </tr>
                <tr>
                    <td><b class="text-primary">Status:</b></td>
                    <td>
                        <select name="status" id="cars" value="{{$orders->status}}" class="form-group col-md-4">
                            <option value="pending">Pending</option>
                            <option value="delivered">Delivered</option>

                        </select>
                    </td>
                    <td><input name="change_status" type="submit" value="Change" class="btn btn-primary"></td>
                </tr>


            </table>

            @endforeach

        </form>



    </div>


</body>

</html>


@endsection