<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     function index(){
    	return view("user.home");
    }
    function indexCategory($id)
    {
        $categories=Category::all();
        $products=Product::where('category_id',$id)->get();
        return view('user.homeCate',["products"=>$products],["categories"=>$categories]);
    }




    

}
