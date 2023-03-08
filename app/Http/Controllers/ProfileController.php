<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRiderInfo;

class ProfileController extends Controller
{
    function profile()
    {
        $info = DeliveryRiderInfo::where('delman_id',session()->get('session_id'))
        ->get(); 
        return view("LoggedinDashboard.profile")
        ->with('infos',$info);
    }

    function profile_update(Request $req)
    {
        $this->validate($req,
        [
           // "delman_name"=>"required|max:40|min:3|regex:/^[A-Z a-z .-]+$/i",
           //"delman_mob"=>"required|regex:/(01)[0-9]{9}/|max:11",
           //"delman_dob"=>"required|date|before:-13 years ",
           //"delman_add"=>"required|min:12",
           //"profile_pic"=>"required|mimes:jpg,png,jpeg"
        ], 
        [
            "delman_name.required"=>"Please provide your name",
            "delman_name.max"=>"Name should not exceed 40 characters",
            "delman_name.min"=>"Name must be at least 3 characters",
            "delman_name.regex"=>"Invalid Name",

            "delman_mob.required"=>"Please provide your Mobile Number",
            "delman_mob.regex"=>"Mobile Number is Invalid",

            "delman_dob.required"=>"Please provide your Date of birth",
            "delman_dob.before"=>"Your age must be 18+",

            "delman_add.required"=>"Please provide your Address",
        ]);

           // $image = $request->file('profile_pic')->store('avatars');
           
           
           
            $dr = DeliveryRiderInfo::where('delman_id', session()->get('session_id')  )->first();
             
            $dr->delman_name = $req->delman_name;
            $dr->delman_mob = $req->delman_mob;
            $dr->delman_dob = $req->delman_dob;
            $dr->delman_add = $req->delman_add;
            //$dr->image = 'ProfilePicture'.$picname;
            if($req->file('profile_pic'))
           {
            $picname = session()->get('session_id')."_".session()->get('session_name').".".$req->file('profile_pic')->getClientOriginalExtension();
           $req->file('profile_pic')->storeAs('public/ProfilePicture',$picname);
           $dr->image =$picname;
           }
            
  
            $dr->save();

            session()->flash('msg','Your account has been Updated');
            return back();

    }
    function password()
    {

        return view("LoggedinDashboard.password_change");
    }
    function password_change(Request $req)
    {
        $this->validate($req,
            [
               "current_password"=>"required",
               "new_password"=>"required|regex:/^(?=.*[a-zA-z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}+$/",
               "conf_password"=>"required|same:new_password"
            ],
        
            [

                "current_password.required"=>"Fill up Password properly!!",
                "new_password.required"=>"Fill up Password properly!!",
                "new_password.regex"=>"Password must contain at least one number,one letter and one special character",
                
                "conf_password.required"=>"Confirm Password properly!!",
                "conf_password.same"=>"Password doesn't match",
            ]);
        $dr=DeliveryRiderInfo::where('delman_email',session()->get('session_email'))
        ->where('password',md5($req->current_password))
        ->first();

            if($dr)
            {
                $dr->password = md5($req->new_password);      
                $dr->save();
    
                session()->flash('msg','Password has been Updated');
                return back();

            }
            else
             {
                session()->flash('msg','Current password did not match');
                return back();
            }
    }




}