<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class apiController extends Controller
{
    public function index(Request $req)
    {
        $token=$req->header('AppKey');
   
        if($token!='abcdef')
        return 'app key not found';
    return User::all();
    }

    public function login(Request $req)
    {
     
        $validated=  Validator::make($req->all(),[
          
           'name' =>  'required' ,
            'password'  => 'required'

        ]);
            if($validated->fails())
        return $validated->errors()->getMessages();
     
      
       $user=User::where('username',$req->name)->first();

       if($user==null||$user->password!=$req->password)
       return response()->json(['message'=>'Invalid credentials']);
       $accessToken=$user->createToken('authToken')->accessToken;
       return with(['user'=>$user , 'access_token' => $accessToken]);
    
       
       
    }


   

 




    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->getMessages();
    }
}

