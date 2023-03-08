@extends('Layouts.afterlogin_layout')
@section('content')



<!DOCTYPE html>
<html>
<title>
    Dashboard
</title>

<head>

</head>

<body>
    <div class="container">
        <center>
            <h2>Pending Order List:</h2><br>
        </center>
        <h5>Total Pending Orders: <span class="text-danger">{{$pendingorders}}</span></h5>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Status</th>
                </tr>

                @foreach($orders as $order)
                <tr>
                    <td scope="row">{{$order->order_id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->customer->customer_name}}</td>
                    <td>{{$order->customer->customer_mob}}</td>
                    <td>{{$order->customer->customer_add}}</td>
                    <td>{{$order->customer->customer_email}}</td>
                    <td><a href="{{route('order.details',['id'=>$order->order_id])}}">{{$order->status}}</a></td>

                </tr>
                @endforeach
            </thead>
        </table>


        <div class="pagination justify-content-center">
            {{$orders->links()}}
        </div>





    </div>


</body>

</html>


@endsection