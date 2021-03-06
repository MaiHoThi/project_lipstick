<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
 
	function index(){
		return view("auth.login");
	}
    function login(Request $request){
    $email=$request->email;
    $password=$request->password;
      if(Auth::attempt(["email"=>$email,"password"=>$password])){
        $user=Auth::user();
        
      
          if($user->role =="admin"){
              return redirect()->route('admin.dashboard');
           
          }
          else{
            return redirect()->route('home');
        }
      

      }else{
        return redirect()->route("auth.login",["error"=>"Invalid email or password"]);
      }
 
}

 
}
