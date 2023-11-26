<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class ApiController extends Controller
{
    //Register Api
    public function register(Request $request){
        $request -> validate([
            "name"=> "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
        //create user

        User::create([
            "name" =>$request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        return response()->json([
            "status" => true,
            "message" => "user created successfully"
        ]);
    }
    //Lo
    public function login(Request $request){
        //This is to handle login code
    }

    //Profile Api
    public function profile(){


    }
    //Logout or destroy function
    public function logout(){
        
    }


}
