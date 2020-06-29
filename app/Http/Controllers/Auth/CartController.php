<?php

namespace App\Http\Controllers\Auth;
use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{// SHOPPING CART
function index()
{
    
        $id=Auth::user()->id;
        $carts = Cart::where('user_id',$id)->get();
        foreach($carts as $cart){
            $cart->product;
        }
         echo"<pre>". json_encode($carts, JSON_PRETTY_PRINT)."</pre>";

        // $products = Product::all();
        // return view('auth.shopping_cart',['carts'=>$carts]);
    
}

function Shoppingcart()
{
if(!Auth::user()){
    return redirect()->route("home",["message"=>"Bạn cần phải đăng nhập hoặc đăng ký để xem giỏ hàng"]);
}else
    if(Auth::user()->role=='user')
    {
        $total=0;
    $idUser=Auth::user()->id;
    $products = Cart::where('user_id',$idUser)->get();
 
           // echo "<pre>".json_encode($products,JSON_PRETTY_PRINT)."</pre>";
             return view("auth.shopping_cart",['carts'=>$products]);
    }else if(Auth::user()->role=='admin'){
     return redirect()->route('admin.dashboard');
    }

}





function storecart( $id)
{
    // $id_user = User::find('id');

$id_user=Auth::user()->id;
$product_id= Product::find($id);
$id_product= $product_id->id;
// $quantity=1;

// $idu=Auth::user()->id;
$check = Cart::where('user_id',$id_user)->orWhere('product_id',$id_product)->count();
if( $check==1){
    $quantity= Cart::find('id')->quantity+=1;
    $cart=new Cart();
    $cart->quantity=$quantity;
    $cart->save();
    
    return redirect()->route('home', ["carts" => "Đã tăng số lượng giỏ hàng"]);
}else{
    $cart=new Cart();
    $cart->product_id=$id_product;
    $cart->user_id=$id_user;
    $cart->quantity=1;
    $cart->save();
    
    return redirect()->route('home', ["carts" => "Thêm vào giỏ hàng Thành Công"]);
}

    // $cart=new Cart();
    // $cart->product_id=$id_product;
    // $cart->user_id=$id_user;
    // $cart->quantity=1;
    // $cart->save();
    // return redirect()->route('home', ["carts" => "Thêm vào giỏ hàng Thành Công"]);
}
function destroy($id){
    $cart = Cart::find($id);
    $cart->delete();
    return redirect()->route('cart');
    }
    // CART
    function payment()
    {
        $idu=Auth::user()->id;
        $orders = Cart::where('user_id',$idu)->get();
        $total=0;

        $carts=Cart::where('user_id',$idu)->get();
       foreach($orders as $o)
       {
           foreach($o->product as $pro)
           {
            $totals = $total+($o->quantity*$pro->price)*(($pro->sale)/100);
          
           }
           
         
       }
        // echo "<pre>".json_encode($orders,JSON_PRETTY_PRINT)."</pre>";
        return view('auth.payment',['orders'=>" $carts"],['order'=>" $totals"]);
        //echo $total;
    }
    
  
}