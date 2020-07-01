<?php

namespace App\Http\Controllers\Auth;

use App\Bill;
use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{// SHOPPING CART
function index()
{
    $useri=Auth::user()->id;
    $id_cart=Cart::find('id')->get();
   
        // $id_cart->id->first;
    
   
         echo"<pre>". json_encode($id_cart, JSON_PRETTY_PRINT)."</pre>";

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

    if(Auth::check()){

        $idUser = Auth::user()->id;
        
        $check = DB::table('carts')
        ->where('product_id', $id)
        ->where('user_id', $idUser)
        ->count();
        
        if ($check == 1) {
        $quantity = DB::table('carts')
        ->where('product_id', $id)
        ->where('user_id', $idUser)
        ->value('quantity') + 1;
        
        DB::table('carts')
        ->where('product_id', $id)
        ->where('user_id', $idUser)
        ->update(["quantity" => $quantity]);
        return redirect()->route('home', ["carts" => "Thêm vào giỏ hàng Thành Công"]);
        } else {
        DB::table('carts')->insert(["product_id" => $id, "quantity" => 1, "user_id" => $idUser]);
        return redirect()->route('home', ["carts" => "Thêm vào giỏ hàng Thành Công"]);
        }
        }
        else{
        return redirect("/auth/login");
        }

    
}
function destroy($id){
    $cart = Cart::find($id);
    $cart->delete();
    return redirect()->route('cart');
    }
    // ORDER
    function payment()
    {
        $idu=Auth::user()->id;
        $carts=Cart::where('user_id',$idu)->get();
        return view('auth.payment',['orders'=> $carts]);
        
    }
    function orders()
    {
       
       $orders=Order::all();
       foreach($orders as $od)
       {
           $pro=$od->product;
       }
       $products=json_decode($pro);
        return view('auth.bill',['orders'=> $orders],["products"=>$products]);
        
    }
    function order(Request $request)
    {
       
            $name = $request->input("name");
            $email = $request->input("email");
            $phone = $request->input("phone");
            $address = $request->input("address");
            $ship=30000;
            $code=0;
            $arrays=[];
            $listarrays=[];
            $id_user=Auth::user()->id;
            $carts=Cart::all();
            foreach($carts as $cart)
            {
                foreach($cart->product as $product)
                { $arrays=array(
                    'id'=>$product->id,
                    "name"=>$product->name,
                    "price"=>$product->price,
                    "image"=>$product->image,
                    "quantity"=>$cart->quantity,
                    "sale"=>$product->sale,
                  );}
                array_push($listarrays,$arrays);
            }
            $product=json_encode($listarrays);
            // $cart_id= $id_cart->id;
           $request->validate([
             'name' => 'required|unique:orders|max:255',
             'email'=>'required',
             'phone'=>'required',
             'address'=>'required',
         ]);
     
           
           $order = new Order();
           $order->name=$name;
           $order->email=$email;
           $order->phone=$phone;
           $order->address=$address;
           $order->ship=$ship;
           $order->code=$code;
           $order->user_id=$id_user;
            $order->product= $product;
           $order->save();
           return redirect()->route('bills', ["billso" => "Đặt hàng thành công"]);
           
        
    }
    function bill()
    {
        $orders=Order::all();
        foreach($orders as $od)
        {
            $pro=$od->product;
            $pro=$od->user;
        }
        $products=json_decode($pro);
        
       
        //  return view('auth.bill',["bills"=>$products]);
         echo "<pre>".json_encode($orders,JSON_PRETTY_PRINT)."</pre>";

    }
    function destroyBill($id)
    {
        
        $delete=Order::find($id);
        $delete->delete();
        return redirect()->route('bills');

    }
    
  
}