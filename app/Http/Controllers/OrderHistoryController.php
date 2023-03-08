<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    function orderhistory_details()
    {
  

        $orders = Order::where('d_id',session()->get('session_id'))
        ->where('status','Delivered')
        ->paginate(10);
        $ordersCount = Order::where('d_id',session()->get('session_id'))
        ->where('status','Delivered')
        ->get();
        $income=0;
        $ordersCount = count($ordersCount);
        $income=$ordersCount * 30 ;
        
        return view("LoggedinDashboard.order_history")
        ->with('orderscount',$ordersCount)
        ->with('income',$income)
        ->with('orders',$orders);
    }
}