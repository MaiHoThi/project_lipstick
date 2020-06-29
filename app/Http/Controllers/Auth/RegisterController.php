<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index(){
		return view("auth.register");
	}
	function register(Request $request){
		
		
	
    	$email=$request->email;
    	$password=$request->password;
    	$hashedPassword = Hash::make($password);
    	$name=$request->name;
    	$role="user";
		$birthday=$request->birthday;
		$gender=$request->gender;
		$request->validate([
			'email' => 'required|unique:users|max:100',
			'password'=>'required',
			'name' => 'required',
			'gender' => 'required',
			'birthday' => 'required',
		]);
	  
		$user = DB::table('users')->where('email',$email)->first();
		if($user){
			return redirect()->route("auth.register",["error"=>"email has exists"]);
	 }
	 if(!$user){
			// user found 
			DB::table("users")->insert(["email"=>$email,"password"=>$hashedPassword,"name"=>$name,"birthday"=>$birthday,"gender"=>$gender,"role"=>$role]);
		return redirect('/auth/login');
	 }
    	

}
}
