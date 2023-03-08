<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datetime;
use App\Models\Token;

class API_logoutController extends Controller
{
    public function logout(Request $request)
    {
       $token = Token::where('token',$request->token)->first();

       if($token)
       {
           $token->expired_at = new DateTime();
           $token->save();
           return "Logout";
       }

   }
}