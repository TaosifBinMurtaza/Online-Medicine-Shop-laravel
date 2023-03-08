<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Token;

class API_orderHistoryController extends Controller
{
    function orderhistory_details(Request $request)
    {
        $tk = $request->header("Authorization");
        if($tk !=null){
            $token = Token::where('token',$tk)
                     ->whereNull('expired_at')
                     ->first();
            if($token){
                $dr_id=$token->user_id;
                $orders = Order::where('d_id',$dr_id)
                ->where('status','Delivered')
                ->orderBy('order_id', 'DESC')
                ->get();
                return response()->json($orders);
                
            }
        }
    }
}