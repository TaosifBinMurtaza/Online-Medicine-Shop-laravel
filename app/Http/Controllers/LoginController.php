<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRiderInfo;

class LoginController extends Controller
{
    function login_submit(Request $req)
    {
        $this->validate($req,
            [
                "email"=>"required",
                "logpassword"=>"required"
            ], 
            [
                "logpassword.required"=>"Password Required!!",
            ]);


        $dr=DeliveryRiderInfo::where('delman_email',$req->email)
                            ->where('password',md5($req->logpassword))->first();

        if($dr){
           session()->put('session_email',$dr->delman_email);
           session()->put('session_id',$dr->delman_id);
           session()->put('session_name',$dr->delman_name);
            return redirect()->route('loggedin_deshboard');
        }
        else {
            session()->flash('msg','User not valid');
        return back();
        }
    }

    
}