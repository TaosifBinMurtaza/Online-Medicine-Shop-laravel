<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRiderInfo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcome;

class API_registrationController extends Controller
{

function registration_submit(Request $req)
    {
        $validator = Validator::make($req->all(),[
            "delman_name"=>"required|max:40|min:3|regex:/^[A-Z a-z .-]+$/i",
                "delman_email"=>"required|email|unique:deliverymans,delman_email",
                "delman_mob"=>"required|regex:/(01)[0-9]{9}/|max:11|unique:deliverymans,delman_mob",
                "delman_dob"=>"required|date|before:-13 years ",
                "delman_nid"=>"required|regex:/^[0-9]{11}$/i|unique:deliverymans,delman_nid",
                "delman_add"=>"required|min:12",
                "password"=>"required|regex:/^(?=.*[a-zA-z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,}+$/",
                "conf_password"=>"required|same:password"
        ],
        [

            "delman_name.required"=>"Please provide your name",
            "delman_name.max"=>"Name should not exceed 40 characters",
            "delman_name.min"=>"Name must be at least 3 characters",
            "delman_name.regex"=>"Invalid Name",


            "delman_email.required"=>"Please provide your E-mail",
            "delman_email.regex"=>"Invalid E-mail",
            "delman_email.unique"=>"Already exists",

            "delman_mob.required"=>"Please provide your Mobile Number",
            "delman_mob.regex"=>"Mobile Number is Invalid",
            "delman_mob.unique"=>"Already exists",

            "delman_dob.required"=>"Please provide your Date of birth",
            "delman_dob.before"=>"Your age must be 18+",

            "delman_nid.required"=>"Please provide your NID number",
            "delman_nid.regex"=>"Invalid NID.Must be 11 digits",
            "delman_nid.unique"=>"Already exists",

            "delman_add.required"=>"Please provide your Address",

            "password.required"=>"Fill up Password properly!!",
            "password.regex"=>"Password must contain at least one number,one letter and one special character",
            
            "conf_password.required"=>"Confirm Password properly!!",
            "conf_password.same"=>"Password doesn't match",
        ]
    );

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
           
        $dr = new DeliveryRiderInfo();
            $dr->delman_name = $req->delman_name;
            $dr->delman_email=$req->delman_email;
            $dr->delman_mob = $req->delman_mob;
            $dr->delman_dob = $req->delman_dob;
            $dr->delman_nid = $req->delman_nid;
            $dr->delman_add = $req->delman_add;
            $dr->password = md5($req->password);

            $dr->save();
            Mail::to("$req->delman_email")->send(new welcome("$req->delman_name"));

            return response()->json(
                [
                    "msg"=>"Your Profile had been created!!",
                    "data"=>$dr        
                ]
            );
           
    }



}