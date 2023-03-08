<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Token;

class API_pendingOrderController extends Controller
{
    function pending_order(Request $request)
    {
        $tk = $request->header("Authorization");
        if($tk !=null){
            $token = Token::where('token',$tk)
                     ->whereNull('expired_at')
                     ->first();
            if($token){
                $dr_id=$token->user_id;
                $orders = Order::where('d_id',$dr_id)
                ->where('status','Pending')
                ->get();
                return response()->json($orders);
                
            }
        }
        //$orders = Order::where('d_id',$req->id)
       // $orders = Order::where('status','Pending')
        //->get();
        //return response()->json($orders);
    }
    function order_details($id)
    {
        $orders = Order::where('order_id',$id)
        ->first(); 
        return response()->json($orders);
    }

    function change_status(Request $req)
    {
        $orders = Order::where('order_id',$req->order_id)->first(); 

        $orders->status=$req->status;
        $orders->save();
        return response()->json($orders);

        
    }

}