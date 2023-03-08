<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\DeliveryRiderInfo;

class API_profileController extends Controller
{
   public function profile(Request $request)
    {
      $tk = $request->header("Authorization");
      if($tk !=null){
          $token = Token::where('token',$tk)
                   ->whereNull('expired_at')
                   ->first();
          if($token){
            $dr_id=$token->user_id;
            $info = DeliveryRiderInfo::where('delman_id',$dr_id)
            ->first(); 
              return response()->json($info);
              
          }
      }
    }
    
    function password_change(Request $req)
    {

      $validator = Validator::make($req->all(),[
            "current_password"=>"required",
            "new_password"=>"required|regex:/^(?=.*[a-zA-z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}+$/",
            "conf_password"=>"required|same:new_password"
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        
        $tk = $req->header("Authorization");
        if($tk !=null){
            $token = Token::where('token',$tk)
                    ->whereNull('expired_at')
                    ->first();
            if($token){
                $dr_id=$token->user_id;
                $dr = DeliveryRiderInfo::where('delman_id',$dr_id)
                ->where('password',md5($req->current_password))
                ->first();                
                if($dr)
                {
                    $dr->password = md5($req->new_password);      
                    $dr->save();
                    return response()->json(
                        [
                            "msg"=>"Password has been Updated",
                            "data"=>$dr        
                        ]
                    );  
                }
                else
                    {
                    return response()->json(
                    [
                        "msg"=>"Current Password did not match!",
                        "data"=>$dr        
                    ]
                );
                }              
            }
        }
    }

    function profile_update(Request $req)
    {

        $validator = Validator::make($req->all(),[
            "delman_name"=>"required|max:40|min:3|regex:/^[A-Z a-z .-]+$/i",
           "delman_mob"=>"required|regex:/(01)[0-9]{9}/|max:11",
           "delman_dob"=>"required|date|before:-13 years ",
           "delman_add"=>"required|min:12",
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

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $tk = $req->header("Authorization");
        if($tk !=null){
            $token = Token::where('token',$tk)
                    ->whereNull('expired_at')
                    ->first();
            if($token){
                $dr_id=$token->user_id;
                $dr = DeliveryRiderInfo::where('delman_id',$dr_id)
                ->first();                  
                if($dr)
                {
                    $dr->delman_name = $req->delman_name;
                    $dr->delman_mob = $req->delman_mob;
                    $dr->delman_dob = $req->delman_dob;
                    $dr->delman_add = $req->delman_add;
                    

                    
                    
                    $dr->save();
                    
                    return response()->json(
                        [
                            "msg"=>"Profile has been Updated",
                            "data"=>$dr        
                        ]
                    );  
                }
                else
                    {
                    return response()->json(
                    [
                        "msg"=>"Profile did not updated!",
                        "data"=>$dr        
                    ]
                );
                }              
            }
        }
    }
  
        function status_update(Request $req)
        {   
    
            $tk = $req->header("Authorization");
            if($tk !=null){
                $token = Token::where('token',$tk)
                        ->whereNull('expired_at')
                        ->first();
                if($token){
                    $dr_id=$token->user_id;
                    $dr = DeliveryRiderInfo::where('delman_id',$dr_id)
                    ->first();                  
                    if($dr)
                    {
                        if($dr->status=='available')
                        {
                            $dr->status = 'unavailable';  
                        }
                        
                     else
                            $dr->status = 'available';  
                        
                                        
                        $dr->save();                       
                        return response()->json(
                            [
                                "msg"=>"Status has been Updated",
                                "data"=>$dr        
                            ]
                        );  
                    }
                    else
                        {
                        return response()->json(
                        [
                            "msg"=>"Status did not updated!",
                            "data"=>$dr        
                        ]
                    );
                    }              
                }
            }     
        }      
  

    function pic_change(Request $req)
    {
        $tk = $req->header("Authorization");
        if($tk !=null){
            $token = Token::where('token',$tk)
                    ->whereNull('expired_at')
                    ->first();
            if($token){
                $dr_id=$token->user_id;
                $dr = DeliveryRiderInfo::where('delman_id',$dr_id)
                ->first();                  
                if($dr)
                {
                    if($req->hasfile('file'))
                    {
                    //$picname = dr->delman_id."_".dr->delman_name.".".$req->file->getClientOriginalExtension();
                    $picname = $dr_id.".". $req->file->getClientOriginalExtension();
                    $req->file->storeAs('public/ProfilePicture',$picname);
                    $dr->image =$picname;
                    $dr->save();     
                    } 

                    return response()->json(["msg"=>"Profile Picture updated!"]);
   
                }
                return response()->json(
                    [
                        "msg"=>"Not updated!",
                             
                    ]
                );

            }
        }

       
    }


}