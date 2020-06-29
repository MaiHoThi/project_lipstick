<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    function users(){
        $users = User::all();
        
       return view("admin.users.index", [ "users" => $users]);
    }
  function destroy($iduser){
    User::all()::where('id', '=', $iduser)->delete();
    return redirect('/auth/users');
  }

}
