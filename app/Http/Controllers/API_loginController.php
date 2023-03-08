<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Datetime;

use App\Models\DeliveryRiderInfo;
use App\Models\Token;

class API_loginController extends Controller
{
    function login_submit(Request $req)
    {
        $dr=DeliveryRiderInfo::where('delman_email',$req->email)
        ->where('password',md5($req->logpassword))
        ->first();

        if($dr)
        {
        $key = Str::random(64);
        $t = new Token();
        $t->user_id = $dr->delman_id;
        $t->token = $key;          
        $t->created_at = new Datetime();
        $t->save();
        return response()->json($t);
        }
    
        return response()->json(["msg"=>"Username password invalid"]);
    }
    function list(Request $req)
    {
               // $dr=DeliveryRiderInfo::where('delman_email','asd')
       // ->first();
//return $dr;

       }


    }