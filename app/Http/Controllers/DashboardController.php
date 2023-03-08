<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    function loggedin_deshboard()
    {
        $orders = Order::where('d_id',session()->get('session_id'))
        ->where('status','Pending')
        ->paginate(10);
        $pendingorder = Order::where('d_id',session()->get('session_id'))
        ->where('status','Pending')
        ->get();
        $pendingorder = count($pendingorder);

        return view("LoggedinDashboard.loggedin_dashboard")
        ->with('pendingorders',$pendingorder)
        ->with('orders',$orders);
    }

    function order_details($id)
    {
        $orders = Order::where('order_id',$id)
        ->get(); 
        return view("LoggedinDashboard.order_details")
        ->with('orders',$orders);
    }

    function change_status(Request $req)
    {
        $orders = Order::where('order_id',$req->order_id)->first(); 

        $orders->status=$req->status;
        $orders->save();
        
        return redirect()->route('loggedin_deshboard');

        
    }
    
}