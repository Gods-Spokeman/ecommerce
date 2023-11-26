<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class UserController extends Controller
{
  public function LoadView()
  {
    //Insert into database using raw sql query
    //DB::insert('insert into users(name, email, password) values(?,?,?)', ['Junne', 'ghci@gmail.com','password']);

    //Updating database using raw sql query
    //DB::update('update users set name =? where id =1', ['grace']);
    
    //delete method
    //DB::delete('delete from users where id = 1');
    //$users = DB::select ('select * from users');
    //return $users;

    //using Eloquent method
    //$user = new User();
   // $user->name = 'Junne';
    //$user->email = 'great@gmail.com';
   // $user->password = 'findings';
   // $user->save();
    
    //User::where('id',3) ->update(['name' => 'Markus']);
   // $user = User::all();
   // return $user;
    //User::where ('id' ,2) ->delete();
 
    $data = [
      'name' => 'aRhi',
      'email' => 'wkdffar@gmail.com',
      'password' => 'pasdfdrsword',

    ];
    User::create($data);
   $user = User::all();
   return $user;


    return view('about');
 
  }

}
