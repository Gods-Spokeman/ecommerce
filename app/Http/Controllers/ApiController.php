<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    //Register api
   public function register(Request $request){
        $request -> validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
        User::create([
            "name" =>$request->name,
            "email" => $request ->email,
            "password" => Hash::make($request ->password)

        ]);
          return response()->json([
                "status" => true,
                "message" => "user created successfully"
            ]);

   }

   public function login(Request $request){
        $request ->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if(Auth::attempt([
            "email" => $request ->email,
            "password" => $request ->password
          
        ])){
            $user = Auth::user();
            $token = $user->createToken("MyToken")->accessToken;
            return response()->json([
                "status" =>true,
                "message" => "Login success",
                "token" => $token
            ]);
        }else{
            return response()->json([
                "status" => false,
                "message" => "invalid login Credentials"
            ]);
        }
   }
   //user profile method
   public function profile(){
        $user = Auth::user();

        return response()->json([
            "status" =>true,
            "message" => "Login success",
            "Data" => $user
        ]);
   }
   //Logout method
   public function logout(){
    Auth::user()->token()->revoke();
    return response()->json([
        "status" =>true,
        "message" => "Logout success",
    ]);  
   }
}
