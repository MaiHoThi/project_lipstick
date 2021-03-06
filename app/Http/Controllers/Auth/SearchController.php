<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $q = $request->input('search');
        $products = DB::table('products')->where('name','LIKE','%'.$q.'%')->orWhere('price','LIKE','%'.$q.'%')->get();
        if(!$products){
            return view("auth.search",["searchnull"=>"Không tìm thấy sản phẩm"]);
        }else{
            return view("auth.search",["search"=>$products]);
        }
        
    }
}
