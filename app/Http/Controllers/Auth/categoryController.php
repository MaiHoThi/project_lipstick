<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class categoryController extends Controller
{
  

    
    function index(){
      $categories=Category::all();
      
     return view("admin.categories.insert", [ "categories" => $categories]);
  }

  
    function store(Request $request){
       $name = $request->input("name");
      $request->validate([
        'name' => 'required|unique:categories|max:255',
    ]);

      
      $category = new Category();
      $category->name=$name;
      $category->save();
      return redirect()->route('categories');
      
   }

   
 
  function edit($id)
  {
   $categories= Category::find($id);//để lấy ra một đối tượng
 
   return view("admin.categories.update", [ "category" => $categories]);

  }

  function update($id, Request $request)
 {
    $name = $request->name;
    $category = Category::find($id);
    $category->name=$name;
    $category->save();
    return redirect()->route('categories');
  
     
 }
//  DELETE
 function destroy($id){
 Category::find($id)->delete();
 return redirect()->route('categories');
}




}
