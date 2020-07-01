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
class ProductsController extends Controller
{
    function insert(){
    	return view("admin.products.insert");
    }
    function index(Request $request)
      {
      $category= Category::all();
      $page = $request->page;
      $product = Product::all()->skip($page * 5)->take(7);
      if($product->isEmpty())
      {
        $photos = Product::all()->take(7);
        return redirect('/home/?page=0');
      }
      else if($page < 0)
      {
        $totalPage = round(count(Product::all())/7)-1;
        return redirect('/home/?page='.$totalPage);
      }
      return view("user.home",[ "products" => $product,"categories"=>$category,"page" => $page]);
      }

   
    function table(){
      $products=Product::all();
      $categories=Category::all();
       return view("admin.products.insert",[ "display" => $products],['cate'=>$categories]);
    }
    function view()
    { 
      $products=Product::all();
      
      return view("admin.products.view",[ "products" => $products]);
        
    }

    
  //   function index(){
  //     $products=Product::all();
      
  //    return view("user.home", [ "products" => $products]);
     
  // }

    function dashboard(){
        $products = Product::all();
        
       return view("admin.dashboard",[ "display" => $products]);
    }
    function store(Request $request){
       $name = $request->input("name");
       $price = $request->input("price");
       $sale = $request->input("sale");
       $status = $request->input("status");
       $description=$request->input("description");
       $filePath =$request->file("image")->store("public");
       $category_id=$request->input("category_id");
      $request->validate([
        'name' => 'required|unique:products|max:255',
    ]);

      
      $product = new Product();
      $product->name=$name;
      $product->image=$filePath;
      $product->price=$price;
      $product->sale=$sale;
      $product->status=$status;
      $product->description=$description;
      $product->category_id=$category_id;
      $product->save();
      return redirect()->route('view');
      
   }

   
 
  function edit($id)
  {
   $products= Product::find($id);//để lấy ra một đối tượng
   $categories=Category::all();
    return view('admin.products.edit',["edit"=>$products],['category'=>$categories]);

  }

  function update($id, Request $request)
 {
  $category_id =$request->category_id;
    $name = $request->nameedit;
    $price =$request->priceedit;
    $sale = $request->saleedit;
    $status = $request->statusedit;
    $description=$request->description;
    
    $image =$request->file("imageedit")->store("public");
  
    $product = Product::find($id);
    $product->name=$name;
    $product->image=$image;
    $product->price=$price;
    $product->sale=$sale;
    $product->status=$status;
    $product->description=$description;
    $product->category_id=$category_id;
    $product->save();
    return redirect()->route('view');
  
     
 }
//  DELETE
 function destroy($id){
 Product::find($id)->delete();
 return redirect()->route('view');
}

// DETAIL
function detail($id)
{
 $products= Product::find($id);//để lấy ra một đối tượng

  return view('auth.detail',["detail"=>$products]);

}

// Sort
function sortBy()
{

$results = product::all()->sortBy("price");
return view("admin.products.view",[ "products" => $results]);
}
function sortDesc()
{

$results = product::all()->sortByDesc("price");
return view("admin.products.view",[ "products" => $results]);
}
}
